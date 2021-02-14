<?php
	include 'conn.php';
	session_start();
//
//    if($_SESSION['admin'] =='lessor' && $_SESSION[' loggedin']){
//		header('location: ./../lessor/welcome.php');
//	}
//
//if($_SESSION['admin'] =='lessor' && $_SESSION[' loggedin']){
//    header('location: ./../admin/welcome.php');
//}

//
//
//	if(isset($_SESSION['user'])){
//		$conn = $pdo->open();
//		header('location: user/home.php');
//
//		try{
//			$stmt = $conn->prepare("SELECT * FROM customer WHERE id=:id");
//			$stmt->execute(['id'=>$_SESSION['user']]);
//			$user = $stmt->fetch();
//		}
//		catch(PDOException $e){
//			echo "There is some problem in connection: " . $e->getMessage();
//		}
//
//		$pdo->close();
//		header('location: user/home.php');
//
//	}
?>