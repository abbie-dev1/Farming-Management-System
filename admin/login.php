<?php include './../includes/session.php';

if(isset($_SESSION["loggedin"])){
 header("location: welcome.php");
}
?>
<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="UTF-8">
  <title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
 <style type="text/css"> body{ font: 14px sans-serif; } .wrapper{ width: 350px; padding: 20px; } </style>
  </head> 
  <body>
   <div class="wrapper">
    <h2>Login</h2> 
    <p>Please fill in your credentials to login.</p>
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
     <form action="../verify.php" method="post" name="login">
         <input name="login" hidden>
<!--        -->
         <label>Username</label> <input type="text" name="username" class="form-control" required">


          <label>Password</label> <input type="password" name="password" class="form-control" required>

          <input type="submit" class="btn btn-primary" value="Login"> </div>
    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </form>
</div> 
</body> 
</html>