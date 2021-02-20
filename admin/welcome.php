<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php';

if($_SESSION['user'] == 'farmer'){
    header('location: ./../farmer/welcome.php');
}
?>


     <!DOCTYPE html>
     <html lang="en">
     <head>
      <meta charset="UTF-8">
      <title>Welcome</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
       <style type="text/css"> body{ font: 14px sans-serif;text-align: center; }</style>
</head>
<body>
<div class="intro-text" style="padding-top: 50px">
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
                        <div class='alert btn-success  beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
        unset($_SESSION['success']);
    }

    ?>
</div>
<div class="page-header">
     <h1>ADMINISTRATION DASHBOARD</h1>
 </div>
<button style="padding: 5px;margin: 5px" class="btn-secondary add"><i class="fa fa-plus-square-o"></i> Add Member</button><br/>
 <div class="bs-example w3layouts">

     <?php
     $conn = $pdo->open();

     try {
         $stmt = $conn->prepare("SELECT * from farmer");
         $stmt->execute();

     }
     catch (Exception $e){
         print_r($e->getMessage());
     }


     if($stmt->rowCount() > 0) {
         echo '
                                    <table class="table" id="orderTable">
                                         <tr style="background: dimgrey;">
                                            <th>No #</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                        ';
         foreach ($stmt as $key=> $row) {

             echo '<tr>
                                 <td>' . $key . '</td>
                                 <td>'.$row['firstName'].' '. $row['lastName'] .'</td>
                                 <td>'. $row['gender'] .'</td>
                                 <td>' . $row['email'] . '</td>
                                 <td>' . $row['mobile'] . '</td>
                                     <td>
                                         
                                         <button class="btn-warning edit" id="'.$row['id'].'"><i class="fa fa-check-circle-o"></i> Edit</button>
                                         <button class="btn-danger delete" id="'.$row['id'].'"><i class="fa fa-trash-o"></i> Delete</button>
                                     </td>
                                </tr>
                                </tr>';
         }
         echo ' </table>';
         $pdo->close();
     }else{
         echo '<tr>No Records Found ...</tr>' ;
     }
     ?>



 </div>

 </body>
 </html>
<?php include('./../includes/scripts.php') ?>
<?php include('./files/admin_modal.php') ?>
<script>
    console.log('ddd');
    $(function() {

        $(document).on('click', '.edit', function (e) {

            e.preventDefault();
            var id = this.id;
            editUser(id);
            $('#edit').modal('show');
        });
        $(document).on('click', '.delete', function (e) {

            e.preventDefault();
            var id = this.id;
            deleteUser(id);
            $('#delete').modal('show');
        });
        $(document).on('click', '.add', function (e) {

            console.log('ss');
            e.preventDefault();
            $('#add').modal('show');
        });

        //
        // $(document).on('click', '.add-course', function (e) {
        //
        //     e.preventDefault();
        //     $('.add-btn').attr('disabled',false);
        //     $('.input-course').html(
        //         '<div class="form-group">\n' +
        //         '                    <label for="photo" class="col-sm-3 control-label">Course Name</label>\n' +
        //         '\n' +
        //         '                    <div class="col-sm-9">\n' +
        //         '                      <input type="text" id="course_name" placeholder="Enter Course Name" name="course_name" onkeypress="return /[a-z]/i.test(event.key)" required>\n' +
        //         '                    </div>\n' +
        //         '                </div>'+
        //
        //
        //         '<div class="form-group">\n' +
        //         '                    <label for="photo" class="col-sm-3 control-label">Fee Amount</label>\n' +
        //         '\n' +
        //         '                    <div class="col-sm-9">\n' +
        //         '                      <input type="text" id="fee" placeholder="Enter Fee Amount In Integer Format" name="fee" onkeypress="return /[0-9]/i.test(event.key)" required>\n' +
        //         '                    </div>\n' +
        //         '                </div>'
        //     )
        // });
    });

    function editUser(id){
        $.ajax({
            type: 'POST',
            url: './../admin/admin_handle.php',
            data: {user_id:id},
            dataType: 'json',
            success: function(response){

                $('input[name=edit_id]').val(response.id);
                $('input[name=firstname]').val(response.firstName);
                $('input[name=lastname]').val(response.lastName);
                $('input[name=email]').val(response.email);
                $('input[name=gender]').val(response.gender);
                $('input[name=mobile]').val(response.mobile);
                $('input[name=address]').val(response.address);

            }
        });

    }

    function deleteUser(id){

        $.ajax({
            type: 'POST',
            url: './../admin/admin_handle.php',
            data: {user_id:id},
            dataType: 'json',
            success: function(response){

                $('input[name=id_delete]').val(id);
                $('.fullname').html(response.firstName+' '+response.lastName);
            }
        });
    }
</script>