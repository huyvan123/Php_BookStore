<?php require_once('ConnectDB.php'); ?>
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
		$sql  = "SELECT *
 				from mydb.employee,mydb.department
 				where employee.idEmployee = '$name' and employee.department_idDepartment = department.idDepartment";
 		$query = mysqli_query($conn,$sql);
		echo "<table class='table table-bordered '> 
			<tr class='info'>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
			<th>DOB</th>
			<th>Position</th>
			<th>Department</th>
			</tr>";
			while($row = mysqli_fetch_array($query)) {
			    echo "<tr class='active'>";
			    echo "<td>" . $row['nameEmployee'] . "</td>";
			    echo "<td>" . $row['email'] . "</td>";
			    echo "<td>" . $row['address'] . "</td>";
			    echo "<td>" . $row['phone'] . "</td>";
			    echo "<td>" . $row['dob'] . "</td>";
			    echo "<td>" . $row['position'] . "</td>";
			    echo "<td>" . $row['nameDepartment'] . "</td>";
			    echo "</tr>";
			}
			echo "</table>";
	}
 ?>