<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT *
				 FROM bookstore.customer,bookstore.accountcus 
						WHERE customer.idAccount = accountcus.ID 
				        and accountcus.userName = '$username' and accountcus.passWord = '$password' ";
		$query = mysqli_query($conn,$sql);
		if($query->num_rows > 0){
			$itemquantity =0;
			//get id customer by username
			$sqlgetid = "SELECT customer.ID
				 FROM bookstore.customer,bookstore.accountcus
						WHERE customer.idAccount = accountcus.ID
				       and accountcus.userName = '$username'";
			$queryid = mysqli_query($conn,$sqlgetid);
			$data = mysqli_fetch_array($queryid);

					$idcus = $data['ID'];

			//get itemquantity
			$sqlitem = "SELECT count(cart.ID) from bookstore.cart where 
			cart.idCustomer = '$idcus'";
			$query = mysqli_query($conn,$sqlitem);
			if ($query->num_rows > 0) {
				while ($data = mysqli_fetch_row($query)) {
					$itemquantity = $data[0];
				}
			}
			$_SESSION['idcus'] = $idcus;
			echo "idcus: ".$idcus;
			$_SESSION['itemquantity'] = $itemquantity;
			$_SESSION['username'] = $username;
			header("location:Book.php");
		}else{
			header("location:LogSig.php?checku=0");
		}
	}else if(isset($_POST['logout'])){
			unset($_SESSION['username']);
			unset($_SESSION['itemquantity']);
			header("location:Book.php");
	}else if (isset($_POST['signup'])) {
		echo "vao dc sigup";
		$username = $_POST['usernamecus'];

		$password = $_POST['passwordcus'];
		$phone = $_POST['phonenumber'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$name = "";
		if (isset($_POST['secondname']) && ($cc1 =$_POST['secondname']!='') ) {
			$name = $_POST['firstname']." ".$_POST['secondname']." ". $_POST['lastname'];
		}else{
			$name = $_POST['firstname']." ". $_POST['lastname'];
		}
		$getdate = $_POST['birthdate'];
		$date = new DateTime($getdate);
		$sqldate = date("Y-m-d",strtotime($getdate));
		echo "sqldate: $sqldate";
		$today = new DateTime();
		$age1 = $date->diff($today);
		$age = $age1->format("%Y");
		$sql  = "SELECT *
				 FROM bookstore.customer,bookstore.accountcus
						WHERE customer.idAccount = accountcus.ID
				       and accountcus.userName = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			header("location:LogSig.php?checku=1");
		}else{
			//addperson
			$sqlper = "INSERT into bookstore.person(person.name,person.address,person.dateOfBirth,person.age,person.gender)
				 value ('$name','$address','$sqldate',$age,'$gender')";
			$queryper = mysqli_query($conn,$sqlper);
			echo $queryper===true;
			//add account
			$sqlacc = "INSERT into bookstore.accountcus(accountcus.userName,accountcus.passWord)
				 value ('$username','$password')";
			mysqli_query($conn,$sqlacc);
			//get last id person
			$sqlidper = "SELECT MAX(person.ID)
				 FROM bookstore.person";
			$queryidper = mysqli_query($conn,$sqlidper);
			$idper = 0;
			while ($data = mysqli_fetch_row($queryidper)) {
				$idper = $data[0];
			}
			//get last id account
			$sqlidacc  = "SELECT MAX(accountcus.ID) 
				 FROM bookstore.accountcus";
			$queryidacc = mysqli_query($conn,$sqlidacc);
			$idacc = 0;
			while ($data = mysqli_fetch_row($queryidacc)) {
				$idacc = $data[0];
			}
			//add customer
			$sqlcus = "INSERT into bookstore.customer(customer.idPerson,customer.idAccount,customer.phoneNumber,customer.email,customer.note,customer.category,customer.discountPercent)
				 VALUES ($idper,$idacc,'$phone','$email','','',0)";
			mysqli_query($conn,$sqlcus);
			header("location:LogSig.php?checku=2");
		}
	}
			$conn->close();
  ?>