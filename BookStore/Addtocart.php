<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<?php 

	if(isset($_POST['addtocart'])){
		if (isset($_SESSION['username'])) {
			$bookquantity = $_POST['bookquantity'];
			$username = $_SESSION['username'];
			$idbook = $_SESSION['idbook'];
			$idcus = $_SESSION['idcus'];
			$itemquantity = $_SESSION['itemquantity'];
			echo "idbook: ".$idbook;
			echo "idcus: ".$idcus;
			echo "bookquantity: ".$bookquantity;
			//get id cart from idbook and id username
			$sql = "SELECT cart.ID from bookstore.cart where cart.idbook = '$idbook' and cart.idcustomer = '$idcus'";
			$query = mysqli_query($conn,$sql);
			$idcart = 0;
			if ($query->num_rows > 0) {
				$data = mysqli_fetch_row($query);
				$idcart = $data[0];
				//update bookquantity
				$sql = "UPDATE bookstore.cart set cart.quantity = cart.quantity + '$bookquantity'	where cart.ID = '$idcart'";
				mysqli_query($conn,$sql);
			}else{
				$_SESSION['itemquantity'] = $itemquantity + 1;
				//add new cart
				$sql = "INSERT into bookstore.cart(cart.idBook,cart.idCustomer,cart.quantity) values ('$idbook','$idcus','$bookquantity')";
				mysqli_query($conn,$sql);
			}
			unset($_SESSION['idbook']);
			header("location: Book.php?checkadd=1");

		}else{
			$id = $_SESSION['idbook'];
			header("location:Book.php?checklogin=0&id=$id");
		}

	}
	$conn->close();
 ?>