
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>

    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="insertlessor.php" method="POST">
            
        <div class="form-group ">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control">
               
            </div>
            <div class="form-group ">
                <label>Surname</label>
                <input type="text" name="last_name" class="form-control" >
                
            </div>
            <div class="form-group '; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" >
               
            </div>

            <div class="form-group ?>">
                <label>Course</label>
                >
                <select name="course">
                    <option value="" disabled selected >choose course</option>
                    <option value="programming">Programming</option>
                    <option value="graphic design">Graphic design</option>
                    <option value="animation">Animation</option>
                </select>
                <?php
//<input type="submit" name="submit" value = "choose option"class="form-control">
         
?>

</div> 
            

            <div class="form-group ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                
            </div>    
            <div class="form-group?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                
            </div>
            <div class="form-group ">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
               
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>