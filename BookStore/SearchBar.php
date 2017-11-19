<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css.map">
	<link rel="stylesheet" href="js/bootstrap.min.js">
	<link rel="stylesheet" href="js/jquery-3.2.1.min.js">
	<link rel="stylesheet" href="js/npm.js">
	<link rel="stylesheet" href="js/bootstrap.js">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$sql = "SELECT * from bookstore.book
				where book.name like '%$name%'";
		$queryb = mysqli_query($conn,$sql);
		echo '<h1 style="color: black; text-align: center;">Search!</h1><br>';
		if ($queryb->num_rows > 0) {
			 while ($data = mysqli_fetch_array($queryb)) {
  					
  				 echo  '<div class="col-md-4"> 
  						<div class="thumbnail" style="width: 200px;height: 320px;">';
  				echo '<a href="Book.php?id='.$data['ID'] .'" target="_blank">';
  				echo	'	<img src='.$data['image'].' alt='.$data['name'].' style="width: 100%;height: 80%">';
  				echo			'	<div class="caption">'.
  									 $data['name']. '<br>' . $data['price']. 'VNĐ
  								</div>
  							</a>
  						</div>
  					</div>
  					';
  			 } 
		}
	}
	$conn->close();
 ?>