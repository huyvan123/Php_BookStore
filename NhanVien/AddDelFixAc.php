<?php require_once('ConnectDB.php'); ?>
<?php session_start(); ?>
<?php 

	if (isset($_POST['add'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$position = $_POST['position'];
		$iddepart = $_POST['department'];
		$end = strpos($iddepart, '-');
		$depart  = substr($iddepart, 0,$end);
		$sql = "SELECT * from mydb.account where account.idEmployee = '$username'";
		$que = mysqli_query($conn,$sql);
		if ($que->num_rows > 0) {
			header("location:AddDelFix.php?check1=0");
		}else{
		$sqlemp  = "INSERT into mydb.employee
					values ('$username','$name','$email','$address','$phone','$dob' ,'$position','$depart')";
		mysqli_query($conn,$sqlemp);
		$sqlacc  = "INSERT into mydb.account
					values ('$username','$password')";
		mysqli_query($conn,$sqlacc);
		header("location:AddDelFix.php?check1=1");
		}
	}elseif (isset($_POST['delete'])) {
		$em = $_POST['employee'];
		if ($em == "") {
			header("location:AddDelFix.php?check2=0");
		}else{
		$end = stripos($em, "*")-1;
		$idem = substr($em, 0,$end);
		$sqlacc = "DELETE from mydb.account
				where account.idEmployee = '$idem'";
		mysqli_query($conn,$sqlacc); 
		$sqle = "DELETE from mydb.employee
				where employee.idEmployee = 'nam'";
		mysqli_query($conn,$sqle); 
		header("location:AddDelFix.php?check2=2");
		}
	}elseif (isset($_POST['update'])) {
		$username = $_SESSION['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$position = $_POST['position'];
		$iddepart = $_POST['department'];
		$end = strpos($iddepart, '-')-1;
		$depart  = substr($iddepart, 0,$end);
		$sqlem = "UPDATE mydb.employee
				set nameEmployee = '$name' , email = '$email' , address = '$address' , phone = '$phone' , dob = '$dob' , position ='$position' ,
				department_idDepartment = '$depart'
    			where idEmployee = '$username' ";
    	mysqli_query($conn,$sqlem);
    	$sqlacc = "UPDATE mydb.account
					set  password = '$password'
    					where idEmployee = '$username' ";
    	mysqli_query($conn,$sqlacc);
    	header("location:AddDelFix.php?check3=3");
	}
	$conn->close();
 ?>