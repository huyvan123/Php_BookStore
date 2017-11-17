
<?php require_once('ConnectDB.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css.map">
	<link rel="stylesheet" href="js/bootstrap.min.js">
	<link rel="stylesheet" href="js/jquery-3.2.1.min.js">
	<link rel="stylesheet" href="js/npm.js">
	<link rel="stylesheet" href="js/bootstrap.js">

		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<br><br><br><br>
	<div class="container" style="background-color: silver;width: 600px;">
	<div ><h1 style="color: green; text-align: center;">Sign in!</h1></div><br>
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4" style="align-items: center;">
			<?php if (isset($_GET['iduser'])) {
				$iduser = $_GET['iduser'];
				$position = $_GET['position'];
				$_SESSION['iduser'] = $iduser; 
				$_SESSION['position'] = $position;
				if ($iduser === "PSND" && $position === "Manager") { ?>
					
					<div class="row">

							<form action="AddDelFix.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="add">Add Employee</button><button style="width: 150px;" class="btn btn-primary" type="submit" name="del">Delete Employee</button><button style="width: 150px;" class="btn btn-primary" type="submit" name="update">Update Info</button>
							</form>

					</div>

			<?php }else if($iduser === "PDD" && $position === "ImportItem"){ ?>
					<div class="row">

							<form action="AddBook.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="addbook">Add Book</button>
							</form>
							<form action="AddAuthor.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="addauthor">Add Author</button>
							</form>
							<form action="AddCategory.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="addcategory">Add Category</button>
							</form>
							<form action="AddPublisher.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="addpublisher">Add Publisher</button>
							</form>
							<form action="AddDiscount.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="adddiscount">Add Discount</button>
							</form>
							<form action="AddDelFix.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="update">Update Info</button>
							</form>

					</div>

			<?php }else if($iduser === "SD" && $position === "Seller"){ ?>
					<div class="row">

							<form action="CheckOrder.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="add">Check Order</button>
							</form>
							<form action="#" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="add">Create Order</button>
							</form>
							<form action="AddDelFix.php" method="POST">
								<button class="btn btn-primary" style="width: 150px;" type="submit" name="update">Update Info</button>
							</form>


					</div>

			<?php }else{ ?>


						<div class="row">

							<form action="AddDelFix.php" method="POST">
								<button class="btn btn-primary" type="submit" name="update">Update Info</button>
							</form>


					</div>
			<?php }	?>
						<div class="row">

							<form action="Login.php" method="POST">
								<button style="width: 150px;" class="btn btn-primary" type="submit" name="logout">Logout</button>
							</form>
						</div>


			<?php }else{

			 ?>
			<?php if (isset($_GET['check'])) {?>
				<h5 style="color: red; text-align: center;">The account unavailable!</h5>
			<?php } ?>
			<form action="Login.php" method="POST">
				<b>Username:</b>
				<input type="text" name="username" class="form-control" placeholder="enter your username"><br>
				<b>Password:</b>
				<input type="password" name="password" class="form-control" placeholder="enter your password"><br>
				<button type="submit" class="btn btn-primary" name="login">Login</button>
			</form>

			<?php } ?>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
</body>
</html>