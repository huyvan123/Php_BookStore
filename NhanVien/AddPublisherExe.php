<?php require_once('ConnectDBbookstore.php'); ?>
<?php 

	if (isset($_POST['add'])) {
		$intro = $_POST['introduction'];
		$rank = $_POST['rank'];
		$web = $_POST['website'];
		$addess = $_POST['address'].', '. $_POST['country'];
		$name = $_POST['name'];
		$phone = $_POST['phonenumber'];
		$email = $_POST['email'];
		$sql = "INSERT into bookstore.company(company.address,company.phoneNumber,company.email,company.introduction,company.rank,company.website,company.name)  
				 valueS ('$addess','$phone','$email','$intro','$rank','$web','$name')";
		mysqli_query($connb,$sql);
		header("location:AddPublisher.php?checkpu=1");
	}

 ?>