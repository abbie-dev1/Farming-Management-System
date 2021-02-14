<?php include './../includes/session.php';
if($_SESSION['user'] == 'lessor'){
    header('location: ./../lessor/welcome.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css"> body{ font: 14px sans-serif;
            text-align: center; }
    </style>
    <?php include './../includes/navbar.php'; ?>
</head>
<body>
<div class="page-header">


    <h1>STUDENTS PROFILES</h1><button class="btn-secondary addnew">Add New Student <i class="fa fa-plus"></i></button>

</div>

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
                        <div class='alert alert-warning beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
    unset($_SESSION['success']);
}
?>

<div class="bs-example w3layouts">
    <table class="table" id="orderTable">
        <thead>
        <tr>
            <th>ID </th>
            <th>First Name </th>
            <th>Last Name </th>
            <th>E-mail </th>
            <th>Course Registered</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody align="left">
        <?php
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM lessor ");
        $stmt->execute(['admin_id'=>$_SESSION['admin']]);

        foreach($stmt as $row){

            echo'<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['first_name'].'</td>
            <td>'.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['course_name'].'</td>
             <td><button class="btn-primary view" id="'.$row['id'].'"><i class="fa fa-eye"></i></button>
             <button class="btn-warning edit" id="'.$row['id'].'"><i class="fa fa-edit"></i></button>
             <button class="btn-danger delete" id="'.$row['id'].'"><i class="fa fa-trash-o"></i></button></td>
            </tr>';

        }
        $pdo->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
<script src="./../assets/js/main.js"></script>
<?php /*include ('./../admin/files/students_modal.php')*/?>
<script>
    $(function() {
        $(document).on('click', '.courses', function (e) {

            e.preventDefault();
            $('#courses').modal('show');
        });
        $(document).on('click', '.announcements', function (e) {

            e.preventDefault();
            $('#announcements').modal('show');
        });
        $(document).on('click', '.materials', function (e) {

            e.preventDefault();
            $('#materials').modal('show');
        });

        $(document).on('click', '.edit', function (e) {

            e.preventDefault();
            $('#edit').modal('show');
            var id = this.id;
            getRowEdit(id);
        });


        $(document).on('click', '.addnew', function (e) {

            e.preventDefault();
            $('#addnew').modal('show');
        });

        $(document).on('click', '.delete', function (e) {

            e.preventDefault();
            $('#delete').modal('show');
            var id = this.id;

            $.ajax({
                type: 'POST',
                url: './../admin/students_handle.php',
                data: {stud_id:id},
                dataType: 'json',
                success: function(response){
                    $('#id_delete').val(response.id);
                    $('.fullname').html(response.first_name+' '+response.last_name);
                }
            });
        });

        $(document).on('click', '.view', function (e) {

            e.preventDefault();
            $('#view').modal('show');
            var id = this.id;
            getRow(id);

        });
    });
    function getCourse(){

        $.ajax({
            type: 'POST',
            url: './../admin/students_handle.php',
            data: {stud_id:id},
            dataType: 'json',
            success: function(response){
                $('.userid').val(response.id);
                $('#id').val(response.id);
                $('#email').val(response.email);
                $('#password').val(response.password);
                $('#firstname').val(response.first_name);
                $('#lastname').val(response.last_name);
                $('#mark').val(response.mark);
                $('.fullname').val(response.first_name+' '+response.last_name);
            }
        });
    }

    function getRowEdit(id){

        $.ajax({
            type: 'POST',
            url: './../admin/students_handle.php',
            data: {stud_id:id},
            dataType: 'json',
            success: function(response){

                $('#edit_id').val(response.id);
                $('#edit_email').val(response.email);
                $('#edit_password').val(response.password);
                $('#edit_firstname').val(response.first_name);
                $('#edit_lastname').val(response.last_name);
                $('.fullname').html(response.first_name+' '+response.last_name);
            }
        });
    }

    function getRow(id){

        $.ajax({
            type: 'POST',
            url: './../admin/students_handle.php',
            data: {stud_id:id},
            dataType: 'json',
            success: function(response){

                $('#id').html(response.id);
                $('#email').html(response.email);
                $('#password').html(response.password);
                $('#firstname').html(response.first_name);
                $('#lastname').html(response.last_name);
                $('#course_name').html(response.course_name);
                $('#mark').html(response.mark);
                $('.fullname').html(response.first_name+' '+response.last_name);
            }
        });
    }
</script>

<script src="./../assets/js/main.js"></script>
<?php /*include ('./../admin/files/students_modal.php')*/?>

<script>
    $(function() {

        $(document).on('click', '.courses', function (e) {

            e.preventDefault();
            $('#courses').modal('show');
        });


        $(document).on('click', '.add-course', function (e) {

            e.preventDefault();
            $('.add-btn').attr('disabled',false);
            $('.input-course').html(
                '<div class="form-group">\n' +
                '                    <label for="photo" class="col-sm-3 control-label">Course Name</label>\n' +
                '\n' +
                '                    <div class="col-sm-9">\n' +
                '                      <input type="text" id="course_name" placeholder="Enter Course Name" name="course_name" onkeypress="return /[a-z]/i.test(event.key)" required>\n' +
                '                    </div>\n' +
                '                </div>'+


                '<div class="form-group">\n' +
                '                    <label for="photo" class="col-sm-3 control-label">Fee Amount</label>\n' +
                '\n' +
                '                    <div class="col-sm-9">\n' +
                '                      <input type="text" id="fee" placeholder="Enter Fee Amount In Integer Format" name="fee" onkeypress="return /[0-9]/i.test(event.key)" required>\n' +
                '                    </div>\n' +
                '                </div>'
            )
        });
    });


</script>