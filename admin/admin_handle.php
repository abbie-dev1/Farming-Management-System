<?php
include './../includes/session.php';

$conn = $pdo->open();

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];

    $stmt = $conn->prepare("SELECT * FROM farmer WHERE farmer_id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    echo json_encode($row);
}

if (isset($_POST['course_add'])) {

    $course_name = $_POST['course_name'];
    $fee =$_POST['fee'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM course WHERE course_name=:course_name");
    $stmt->execute(['course_name'=>$course_name]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Course Name Already Exits';
    }else {

        $stmt = $conn->prepare("INSERT INTO course(course_name,fee) VALUES(:course_name,:fee)");
        $stmt->execute(['fee' => $fee, 'course_name' => $course_name]);
        $_SESSION['success'] = 'Course added successfully';

    }
    header('location: '.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['announce'])) {

    $news =$_POST['news'];
    $date = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO announcement(news,date_created) VALUES(:news,:date_created)");
    $stmt->execute(['news' => $news, 'date_created' => $date]);
    $_SESSION['success'] = 'Announcement posted successfully';


    header('location: '.$_SERVER['HTTP_REFERER']);
}

if (isset($_FILES['file'])) {

    $file =$_FILES['file']['name'];
    $tool =$_POST['tool'];
    $date = date('Y-m-d');

    try {

        $stmt = $conn->prepare("INSERT INTO material(date_created,tool,file) VALUES(:date_created,:tool,:file)");
        $stmt->execute(['date_created' => $date, 'tool' => $tool, 'file' => $file]);
        $_SESSION['success'] = 'Material posted successfully';
    }
  catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('location: '.$_SERVER['HTTP_REFERER']);
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

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM farmer WHERE farmer_email=:email AND farmer_id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $conn->prepare("UPDATE farmer SET farmer_email=:email, password=:password, farmer_fname=:firstname,
                                         farmer_lname=:lastname,farmer_sex=:gender,mobile=:mobile,farmer_address=:address
                                         WHERE farmer_id=:id");
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

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM farmer WHERE farmer_email=:email");
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();
    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Email already exits';
    } else {

        $stmt = $conn->prepare("INSERT INTO farmer(farmer_email, password, farmer_fname,farmer_lname,farmer_sex,mobile,farmer_address) 
                                        VALUES(:email, :password, :first_name,:last_name,:gender,:mobile,:address)");
        $stmt->execute(['email' => $email, 'password' => $password, 'first_name' =>
            $firstname, 'last_name' => $lastname, 'gender' => $gender,'mobile' => $mobile, 'address' => $address]);
        $_SESSION['success'] = 'Farmer updated successfully';

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
        $stmt = $conn->prepare("DELETE FROM farmer WHERE farmer_id=:id");
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