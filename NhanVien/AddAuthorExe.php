<?php require_once('ConnectDBbookstore.php'); ?>
<?php 

	if (isset($_POST['add'])) {
		$exp = $_POST['exp'];
		$intro = $_POST['introduction'];
		$phone = $_POST['phonenumber'];
		$email = $_POST['email'];
		$address = $_POST['address'].', '.$_POST['country'];
		$name = $_POST['firstname'].' '.$_POST['secondname'].' '.$_POST['lastname'];
		$gender = $_POST['gender'];
		$dob = $_POST['birthdate'];
		$sqldate = date("Y-m-d",strtotime($dob));
		$bd = new DateTime($dob);
		$today = new DateTime();
		$a = $today->diff($bd);
		$age = $a->format("%Y");
		$sql = "INSERT into bookstore.person(person.name,person.address,person.dateOfBirth,person.age,person.gender)
				 values ('$name','$address','$sqldate','$age','$gender')";
		mysqli_query($connb,$sql);
		//get last id person
		$sqlidper = "SELECT MAX(person.ID)
				 FROM bookstore.person";
		$queryidper = mysqli_query($connb,$sqlidper);
		$idper = 0;
		while ($data = mysqli_fetch_row($queryidper)) {
				$idper = $data[0];
		}
		//add author
		$sqlau = "INSERT into bookstore.author(author.idPerson,author.exp,author.phoneNumber,author.email,author.introduction)
				 values ('$idper','$exp','$phone','$email','$intro')";
		mysqli_query($connb,$sqlau);
		header("location:AddAuthor.php?checkauthor=1");
	}

 ?>