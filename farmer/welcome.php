<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php';

if($_SESSION['user'] == 'admin'){
    header('location: ./../admin/welcome.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css"> body{ font: 14px sans-serif;
            text-align: center; }
    </style>


</head>

<body style="display: flex">
<?php include("../includes/side-menu.php")?>
<div class="body-content">
<div class="page-header">
    <?php
    if(isset($_SESSION['error'])){
        echo "
                        <div class='alert alert-warning beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['error']."</div>
                        ";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])){
        echo "
                        <div class='alert btn-success beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
        unset($_SESSION['success']);
    }
    ?>
    <h1>Farmer Dashboard</h1>
    <button class="btn btn-warning addnew">Add Tracker</button>
</div>

    <div class="row" style="padding: 10px" align="center">

<?php
        $conn = $pdo->open();

        try {
            $stmt = $conn->prepare("SELECT * FROM tracker");
            $stmt->execute();
        }
        catch (Exception $e){
            print_r($e->getMessage());
        }



        if($stmt->rowCount() > 0) {
            echo '
            <table class="table" id="orderTable">
            <tr style="background: orange;">
                <th>No #</th>
                <th>Animal Type</th>
                <th>Action</th>
            </tr>';

            foreach ($stmt as $key=> $row) {

                echo '<tr>
                                <td>' . $key . '</td>
                                <td>' . $row['type'] . '</td>
                                    <td><button class="btn-success approve" id="'.$row['tracker_id'].'"><i class="fa fa-check-circle-o"></i> Edit</button>
                                         <button class="btn-danger decline" id="'.$row['tracker_id'].'"><i class="fa fa-trash-o"></i> Delete</button>
                                     </td>

                                </tr>';
            }

            $pdo->close();
            echo '   </table>';
        }else{
            echo '<h3>No Records Found ...</h3>' ;
        }

        ?>

    </div>

</div>
</body>
</html>

<?php include('./../farmer/files/farmer_modal.php') ?>
<?php include('./../includes/scripts.php') ?>

<script>
    $(function() {
        $(document).on('click', '.approve', function (e) {

            e.preventDefault();
            var id = this.id;
            approve(id);
        });
        $(document).on('click', '.decline', function (e) {

            e.preventDefault();
            var id = this.id;
            decline(id);
        });

        $(document).on('click', '.addnew', function (e) {

            e.preventDefault();
            $('#addnew').modal('show');
        });

    });

    function approve(id){
        console.log('sfn');
        $.ajax({
            type: 'POST',
            url: './../lessor/lessor_handle.php',
            data: {approve:id},
            dataType: 'json',
            success: function(response){
            }
        });

        location.reload();
    }

    function decline(book_id) {

        $.ajax({
            type: 'POST',
            url: './../lessor/lessor_handle.php',
            data: {decline: book_id},
            dataType: 'json',
            success: function (response) {

            }
        });
    }


        function getRow(){

        $.ajax({
            type: 'POST',
            url: './../lessor/students_handle.php',
            data: {stud_id:1},
            dataType: 'json',
            success: function(response){

                $('#id').html(response.id);
                $('#email').html(response.email);
                $('#password').html(response.password);
                $('#firstname').html(response.first_name);
                $('#lastname').html(response.last_name);
                $('.fullname').html(response.first_name+' '+response.last_name);
            }
        });
    }
</script>