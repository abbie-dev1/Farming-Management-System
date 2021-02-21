<?php
include './../includes/session.php';

$conn = $pdo->open();

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];

    $stmt = $conn->prepare("SELECT * FROM farmer WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    echo json_encode($row);
}




if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM farmer WHERE email=:email AND id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $conn->prepare("UPDATE farmer SET email=:email, password=:password, firstName=:firstname,
                                         lastName=:lastname,gender=:gender,mobile=:mobile,address=:address
                                         WHERE id=:id");
        $stmt->execute(['email' => $email, 'password' => $password, 'firstname' =>
            $firstname, 'lastname' => $lastname, 'gender' => $gender,'mobile' => $mobile, 'address' => $address,'id'=>$id]);

        $_SESSION['success'] = 'Record updated successfully';
    }
    header('location: welcome.php');
}

if (isset($_POST['course_id'])) {

    $stmt = $conn->prepare("SELECT * FROM course");
    $stmt->execute();
    $row = $stmt->fetch();

    echo json_encode($row);
}


if(isset($_POST['addnew'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM farmer WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();
    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Email already exits';
    } else {

        $stmt = $conn->prepare("INSERT INTO farmer (firstName, lastName,gender, mobile, address, email, password) 
						VALUES (:firstName, :lastName,:gender, :mobile, :address, :email,:password)");
        $stmt->execute(['firstName'=>$firstname, 'lastName'=>$lastname, 'gender'=>$gender,'mobile'=>$mobile, 'address'=>$address, 'email'=>$email, 'password'=>$password]);
        $userid = $conn->lastInsertId();
        $_SESSION['success'] = 'Farmer added successfully';

    }
    header('Location: welcome.php');
}

if(isset($_POST['decline'])){
    $id = $_POST['decline'];

    try{
        $stmt = $conn->prepare("UPDATE space SET status_id=1 WHERE id=:id");
        $stmt->execute(['id'=>$id]);

        $_SESSION['success'] = 'Record approved successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);

}

if(isset($_POST['approve'])){
    $id = $_POST['approve'];

    try{
        $stmt = $conn->prepare("UPDATE space SET status_id=2 WHERE id=:id");
        $stmt->execute(['id'=>$id]);

        $_SESSION['success'] = 'Record accepted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    return 0;

}

if(isset($_POST['id_delete'])){
    $id = $_POST['id_delete'];

    try{
        $stmt = $conn->prepare("DELETE FROM farmer WHERE id=:id");
        $stmt->execute(['id'=>$id]);

        $_SESSION['success'] = 'Farmer deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: welcome.php');

}
$pdo->close();

?>