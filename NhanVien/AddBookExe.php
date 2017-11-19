<?php require_once('ConnectDBbookstore.php'); ?>
<?php session_start(); ?>
<?php 
		
		$path = "";
		if (isset($_POST['image'])) {
			//$path = 'Image/'.basename($_FILES['image']['name']);
			$i = $_POST['image'];
			$im = explode('\\', $i);
			$path = 'Image/'.$im[2];
			$_SESSION['path'] = $path;
			echo $path;
			// header("location:AddBook.php?path=$path");
		}elseif (isset($_POST['addbookbtn'])) {
			$quantity = $_POST['bookquantity'];
			$category = $_POST['bookcategory'];
			$discount = $_POST['discount'];
			$dis =  explode(":", $discount);
			$iddis = (int)$dis[0];
			$name = $_POST['bookname'];
			$author = $_POST['author'];
			$au = explode(":", $author);
			$idau = (int)$au[0];
			$publisher = $_POST['publisher'];
			$pu = explode(":", $publisher);
			$idpu = (int)$pu[0];
			$price = $_POST['price'];
			$intro = $_POST['introduction'];
			if (!isset($_SESSION['path'])) {
				header("location:AddBook.php?checkbook=0");
			}else{
				$path = $_SESSION['path'];
			$sql = "INSERT into bookstore.book(book.idAuthor,book.idCompany,book.idDiscount,book.caregory,book.name,book.price,book.introduction,book.quantity,book.image)
				 valueS ('$idau','$idpu','$iddis','$category','$name','$price','$intro','$quantity','$path')";
			mysqli_query($connb,$sql);
			unset($_SESSION['path']);
			header("location:AddBook.php?checkbook=1");
			}	
		}

 ?>