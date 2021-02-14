<?php

session_start();

include 'config.php';

if (empty($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_abort();
    header('location: login.php');
} else {
    $cell = $_SESSION['id'];

    $query = "SELECT * FROM lessor WHERE 'username' = '$username'";
    $result = mysqli_query($link, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            header('location: index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lessor landing</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    
  <p> hi. welcom student..... this is a landing page for  lessors</p> 

depending on course links will differ
  <a href="lessor/graphicdesign.php">Register!</a>
  <a href="lessor/graphicdesign.php">Register!</a>
  <a href="lessor/graphicdesign.php">Register!</a>
   
</body>

</html> 