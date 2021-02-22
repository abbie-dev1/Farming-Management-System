<?php
	include 'conn.php';


        session_start();

        if ($_SESSION['admin'] == 'farmer' && $_SESSION[' loggedin']) {
            header('location: ./../farmer/welcome.php');
        }

        if ($_SESSION['admin'] == 'admin' && $_SESSION[' loggedin']) {
            header('location: ./../admin/welcome.php');
        }



?>