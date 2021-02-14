<?php

include 'includes/session.php';
$conn = $pdo->open();
$return = $_SERVER['HTTP_REFERER'];

	if(isset($_POST['signup'])){

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['current_password'];
            $companyName =$_POST['companyName'];
            $companyNo=$_POST['companyNo'];
            $pNumber=$_POST['pNumber'];
            $address=$_POST['address'];
            $bankDetails=$_POST['bankDetails'];

            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['email'] = $email;

            $photo = $_FILES['photo']['name'];

            $target_dir = "C:/xampp/htdocs/HotDesk/idCopies/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $_SESSION['error'] = "File is not an image.";
                    $uploadOk = 0;
                    header('location:' . $return);
                }
            }

// Check if file already exists
            if (file_exists($target_file)) {
                $_SESSION['error'] = "Sorry, file already exists.";
                $uploadOk = 0;
                header('location:' . $return);
            }

// Check file size
            if ($_FILES["photo"]["size"] > 500000) {
                $_SESSION['error'] = "Sorry, your file is too large.";
                $uploadOk = 0;
                header('location:' . $return);
            }

// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                header('location:' . $return);
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $_SESSION['error'] = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
                } else {
                    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                    header('location:' . $return);
                }
            }


            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM lessor,admin WHERE lessor.email=:email OR admin.email=:email");
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch();
            if($row['numrows'] > 0){
                $_SESSION['error'] = 'Email already taken';
                header('location: register.php');
                exit();
            }
			else{

				try{

					$stmt = $conn->prepare("INSERT INTO lessor (firstName, lastName, companyName,companyRegNo, contactNo, 	address, email, password, bankDetails, idCopy) 
						VALUES (:firstName, :lastName, :companyName, :companyNo, :pNumber, :address, :email,:password, :bankDetails, :idCopy)");
					$stmt->execute(['firstName'=>$firstName, 'lastName'=>$lastName, 'companyName'=>$companyName, 'companyNo'=>$companyNo, 'pNumber'=>$pNumber, 'address'=>$address, 'email'=>$email, 'password'=>$password, 'bankDetails'=>$bankDetails, 'idCopy'=>$photo]);
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