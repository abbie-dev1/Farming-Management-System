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
            $gender =$_POST['gender'];
            $address=$_POST['address'];
            $location =$_POST['location'];
            $farm_name=$_POST['farm_name'];



                    try {

                        $stmt = $conn->prepare("INSERT INTO farmer (firstName, lastName,gender, mobile, address, email, password) 
						VALUES (:firstName, :lastName,:gender, :mobile, :address, :email,:password)");
                        $stmt->execute(['firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender, 'mobile' => $mobile, 'address' => $address, 'email' => $email, 'password' => $password]);
                        $userid = $conn->lastInsertId();




                            try {
                                $stmts = $conn->prepare("SELECT * FROM farmer WHERE email=:email");
                                $stmts->execute(['email' => $email]);
                                $row = $stmts->fetch();


                                $stmt = $conn->prepare("INSERT INTO farm(name,farmer_id,location) VALUES (:name,:farmer_id, :location)");
                                $stmt->execute(['name' => $farm_name, 'farmer_id' => $row['id'], 'location' => $location]);

                            } catch (PDOException $e) {
                                $_SESSION['error'] = $e->getMessage();
                                header('location: register.php');
                                exit();
                            }




                        $_SESSION['success'] = 'Account created. Proceed to Login';
                        header('location: login.php');


                    } catch (PDOException $e) {
                        $_SESSION['error'] = $e->getMessage();
                        header('location: register.php');
                    }


    }
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: register.php');
    }
$pdo->close();
?>