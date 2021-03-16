<?php
include './../includes/session.php';

$conn = $pdo->open();
$return = $_SERVER['HTTP_REFERER'];

if (isset($_POST['coords'])) {

    $serial= $_POST['coords'];
    if($serial == 'track_all'){
        $stmts = $conn->prepare("SELECT * FROM livestock WHERE status='online' AND (latitude IS NOT NULL) AND farmer_id=:id");
        $stmts->execute(['id'=>$_SESSION['admin']]);
        $rows = $stmts->fetchAll();
        echo json_encode($rows);
    }else {
        $stmt = $conn->prepare("SELECT * FROM livestock WHERE serial_no=:serial");
        $stmt->execute(['serial' => $serial]);
        $row = $stmt->fetchAll();
        echo json_encode($row);
    }


}

if (isset($_POST['userid'])) {
    $id = $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM lessor WHERE email=:email AND id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $conn->prepare("UPDATE lessor SET email=:email,
    password=:password, first_name=:first_name, last_name=:last_name WHERE id=:id");
        $stmt->execute(['email' => $email, 'password' => $password, 'first_name' =>
            $firstname, 'last_name' => $lastname, 'id' => $id]);

        $_SESSION['success'] = 'Venue updated successfully';
    }
    header('location: welcome.php');
}

if (isset($_POST['profile'])) {

    $stmt = $conn->prepare("SELECT * FROM farmer WHERE id=:id");
    $stmt->execute(['id'=>$_SESSION['admin']]);
    $row = $stmt->fetch();

    echo json_encode($row);
}


if (isset($_POST['edit_farmer'])) {
    $id = $_SESSION['admin'];
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


if(isset($_POST['animal_type'])){
    $id = $_SESSION['admin'];
    $type = $_POST['animal_type'];
    $image = $_POST['breed_type'];
    $description = $_POST['description'];
    $serial_no = md5(uniqid(rand(), true));
    $serial_no= substr($serial_no,0,10);
    $breed_type= substr($image,strrpos($image,'/')+1);
    $breed_type= substr($breed_type,0,strrpos($breed_type,'.'));

    try{
        $stmt = $conn->prepare("INSERT INTO livestock(serial_no,animal_type,breed_type,description,image,farmer_id,status) 
                                        VALUES(:serial_no,:animal_type,:breed_type,:description,:image,:farmer_id,:status)");
        $stmt->execute(['serial_no'=>$serial_no,'animal_type'=>$type,'breed_type'=>$breed_type,'description'=>$description,'image'=>
                        $image,'farmer_id'=>$id,'status'=>'offline']);

        $_SESSION['success'] = 'Tracker added successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}





if(isset($_POST['anim_delete'])){
    $id = $_POST['anim_delete'];

    try{
        $stmt = $conn->prepare("DELETE FROM livestock WHERE serial_no=:id");
        $stmt->execute(['id'=>$id]);

        $_SESSION['success'] = 'Tracker deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}
$pdo->close();

?>