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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<br><br><br><br>
	<div class="container" style="background-color: silver;width: 600px;">
	<br>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">
			<?php 
				$iduser = $_SESSION['iduser'];
				$position = $_SESSION['position']; 
			 ?>
			<?php if (isset($_POST['add']) || isset($_GET['check1'])) { 
				?>
					<div ><h1 style="color: green; text-align: center;">Add Employee!</h1></div>
						<?php if(isset($_GET['check1'])){ 
							$check1 = $_GET['check1'];
							if($check1 == 0){ ?>
							<div class="alert alert-warning"><h5 style="color: violet; text-align: center;">Failed!</h5></div><bR>
							<?php }else{ ?>
						<div class="alert alert-success"><h5 style="color: violet; text-align: center;">Successfull!</h5></div><bR>
						<?php } }?>

							<form action="AddDelFixAc.php" method="POST">
								<b>Username:</b>
								<input type="text" name="username" class="form-control" placeholder="enter employee username" required>
								<b>Password:</b>
								<input type="text" name="password" required class="form-control" placeholder="enter employee password" >
								<b>Employee name:</b>
								<input type="text" name="name" class="form-control" placeholder="enter employee name" >
								<b>Address:</b>
								<input type="text" name="address" class="form-control" placeholder="enter employee address" >
								<b>Date of birth:</b>
								<input type="text" name="dob" class="form-control" placeholder="enter employee dob" >
								<b>PhoneNumber:</b>
								<input type="text" name="phone" class="form-control" placeholder="enter employee phone number" >
								<b>Email:</b>
								<input type="text" name="email" class="form-control" placeholder="enter employee email" >
								<b>Position:</b>
								<input type="text" name="position" class="form-control" placeholder="enter employee position" >
								<b>Department:</b>
								<select class="form-control" name="department">
									
								<?php 
									$sql = "SELECT *
										from mydb.department;";
									$query = mysqli_query($conn,$sql);
									while ($data = mysqli_fetch_row($query)) {
										$depart = $data[0]."-".$data[1]; ?>
										<option> <?= $depart  ?></option>
								<?php	}
								 ?>
								</select>
								<br>
								<button style="width: 150px;" name="add" type="submit" class="btn btn-primary" >ADD</button>
							</form>
							<!-- <form action="HomePage.php?iduser=<?=$iduser?>&position=<?=$position?>" method="POST">
								<button class="btn btn-primary" type="submit" name="update">Cancel</button>
							</form> -->


			<?php	}else if(isset($_POST['del']) || isset($_GET['check2'])){ ?>

			<div ><h1 style="color: green; text-align: center;">Delete Employee!</h1></div>
							<?php if(isset($_GET['check2'])){ 
								$check2 = $_GET['check2'];
								if($check2 == 0 ){ ?>
								<div class="alert alert-warning"><h5 style="color: violet; text-align: center;">Failed!</h5></div><br>
								<?php }else{ ?>
						<div class="alert alert-success"><h5 style="color: violet; text-align: center;">Successfull!</h5></div><br>
						<?php } }?>
							<form action="AddDelFixAc.php" method="POST">
								<select class="form-control" name="employee">
									
							<?php 
								$sql = "SELECT *
 												from mydb.employee,mydb.department
 											where employee.department_idDepartment = department.idDepartment and
                                            (employee.department_idDepartment <> 'PSND'
												or employee.position <> 'Manager')";
								$query = mysqli_query($conn,$sql);
								if ($query->num_rows >0) {
									while ($data = mysqli_fetch_row($query)) {
										$em = $data[0]." * ". $data[1]." - ".$data[6]." - ".$data[7]." - ".$data[9]; ?>
										<option><?=$em ?> </option>
								<?php	}
								}else{ ?>
									<option></option>
							<?php	}
							 ?>
								</select>
								<br>
								<button style="width: 150px;" class="btn btn-primary" type="submit" name="delete">Delete</button>
							</form>

			<?php }else if(isset($_POST['update']) || isset($_GET['check3'])){ 

					$user = $_SESSION['username'];
					$sql = "SELECT *
 					from mydb.employee,mydb.account,mydb.department
 							where employee.idEmployee = account.idEmployee and
								employee.department_idDepartment = department.idDepartment and
										employee.idEmployee = '$user'";
 					$query = mysqli_query($conn,$sql);
 					$data = mysqli_fetch_row($query);
				?>
				<div ><h1 style="color: green; text-align: center;">Your Infomation!</h1></div>
				<?php if(isset($_GET['check3'])){ ?>
						<div class="alert alert-success"><h5 style="color: violet; text-align: center;">Successfull!</h5></div><br>
						<?php } ?>
			<form action="AddDelFixAc.php" method="POST">
								<b>Username:</b>
								<input type="text" disabled = "true" name="username" class="form-control" value=<?=$data[0]; ?> >
								<b>Password:</b>
								<input type="text" name="password" class="form-control" value="<?=$data[9]; ?>" >
								<b>Employee name:</b>
								<input type="text" name="name" class="form-control" value = "<?=$data[1]; ?>" >
								<b>Address:</b>
								<input type="text" name="address" class="form-control" value="<?=$data[3]; ?>" >
								<b>Date of birth:</b>
								<input type="text" name="dob" class="form-control" value="<?=$data[5]; ?>" >
								<b>PhoneNumber:</b>
								<input type="text" name="phone" class="form-control" value="<?=$data[4]; ?>">
								<b>Email:</b>
								<input type="text" name="email" class="form-control" value="<?=$data[2]; ?>" >
								<b>Position:</b>
								<input type="text" name="position" class="form-control" value="<?=$data[6]; ?>" >
								<b>Department:</b>
								<select class="form-control" name="department" required>
									
								<?php 
									$sql = "SELECT *
										from mydb.department;";
									$query = mysqli_query($conn,$sql);
									while ($data1 = mysqli_fetch_row($query)) {
										$depart = $data1[0]." - ".$data1[1]; 
										if($data1[0] === $data[7]){ ?>
										<option selected="true"> <?= $depart  ?></option>
										<?php }else{ ?>
											<option > <?= $depart  ?></option>
								<?php	}
									}
								 ?>
								</select>
								<br>
				<button type="submit" style="width: 150px;" class="btn btn-primary" name="update">Update</button>
			</form>

			<?php } ?>
							<form action="HomePage.php?iduser=<?=$iduser?>&position=<?=$position?>" method="POST">
								<button style="width: 150px;" class="btn btn-success" type="submit" name="update">Cancel</button>
							</form>
			
		</div>
		<div class="col-sm-2">
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
</body>
</html>