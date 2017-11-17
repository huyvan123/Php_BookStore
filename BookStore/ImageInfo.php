<?php require_once("ConnectDB.php"); ?>
<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM bookstore.book WHERE book.ID = $id";
	$query = mysqli_query($conn,$sql);

	
 ?>