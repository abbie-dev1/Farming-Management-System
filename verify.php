<?php
include 'includes/session.php';

session_start();
$conn = $pdo->open();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    try{

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM admin WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch();

        if($row['numrows1'] > 0){
            if($password == $row['password']){
                $_SESSION['user'] = 'admin';
                $_SESSION['admin'] = $row['id'];
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $row['email'];
            }
            else{
                $_SESSION['error'] = 'Incorrect Password';
                header('location: login.php');
            }
        }

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM farmer WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch();

        if($row['numrows1'] > 0){
            if($password == $row['password']){
                $_SESSION['user'] = 'farmer';
                $_SESSION['admin'] = $row['id'];
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $row['email'];
                $_SESSION['name'] = $row['firstName'];
                $_SESSION['surname'] = $row['lastName'];
            }
            else{
                $_SESSION['error'] = 'Incorrect Password';
                header('location: login.php');
            }
        }
        else{
             $_SESSION['error'] = 'Username Does Not Exist';
             header('location: login.php');
        }



    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

}
else{
    $_SESSION['error'] = 'Input login credentials first';
}

$pdo->close();

header('location: login.php');

?>