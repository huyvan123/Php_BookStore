<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<?php 

	if (isset($_POST['delete'])) {
		$name = $_POST['delete'];
		echo "$name";
		$sql = "DELETE from bookstore.cart
					where cart.idBook = '$name'";
		mysqli_query($conn,$sql);
		$_SESSION['itemquantity'] = $_SESSION['itemquantity'] -1 ;
		header("location:CartDetail.php");
	}

 ?>