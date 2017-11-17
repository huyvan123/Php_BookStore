<?php require_once('ConnectDB.php'); ?>
<?php session_start(); ?>
<?php 
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * from mydb.account
				where account.idEmployee = '$username' and account.password = '$password'";
		$query = mysqli_query($conn,$sql);
		if($query->num_rows >0 ){
			$data = mysqli_fetch_row($query);
			$idEmployee = $data[0];
			$sql = "SELECT department.idDepartment,employee.position
				from mydb.department,mydb.employee
				where employee.department_idDepartment = department.idDepartment
				and idEmployee = '$idEmployee'";
			$queryemp = mysqli_query($conn,$sql);
			$data = mysqli_fetch_row($queryemp);
			$idDepartment = $data[0];
			$position = $data[1];
				$_SESSION['username'] = $username;
				header("location:HomePage.php?iduser=$idDepartment&position=$position");
		}else{
			header("location:HomePage.php?check=0");
		}
	}else if (isset($_POST['logout'])) {
		session_destroy();
		header("location:HomePage.php");
	}
 ?>