<?php
 $db = mysqli_connect('localhost', 'root', '', 'collage');
 $db->set_charset('utf8mb4');

 if (!$db) {
     unset($_SESSION['email']);
     echo '<script>window.location.assign("error.php");</script>';
 }