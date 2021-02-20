<?php

include 'includes/session.php';
$conn = $pdo->open();
$return = $_SERVER['HTTP_REFERER'];

	if(isset($_POST['signup'])){

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $mobile= $_POST['mobile'];
            $password = $_POST['password'];
            $repassword = $_POST['current_password'];
            $gender =$_POST['gender'];
            $address=$_POST['address'];

            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM farmer,admin WHERE farmer.email=:email OR admin.email=:email");
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch();
            if($row['numrows'] > 0){
                $_SESSION['error'] = 'Email already taken';
                header('location: register.php');
                exit();
            }
			else{

				try{

					$stmt = $conn->prepare("INSERT INTO farmer (firstName, lastName,gender, mobile, address, email, password) 
						VALUES (:firstName, :lastName,:gender, :mobile, :address, :email,:password)");
					$stmt->execute(['firstName'=>$firstName, 'lastName'=>$lastName, 'gender'=>$gender,'mobile'=>$mobile, 'address'=>$address, 'email'=>$email, 'password'=>$password]);
					$userid = $conn->lastInsertId();

					// $message = "
					// 	<h2>Thank you for Registering.</h2>
					// 	<p>Your Account:</p>
					// 	<p>Email: ".$email."</p>
					// 	<p>Password: ".$_POST['password']."</p>
					// 	<p>Please click the link below to proceed to the login page</p>
					// 	<a href='http://localhost/Truber/login.php>Login to your Account</a>
					// ";

					$_SESSION['success'] = 'Account created. Proceed to Login';
					header('location: login.php');


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

			}

    }
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: register.php');
    }
$pdo->close();
?>