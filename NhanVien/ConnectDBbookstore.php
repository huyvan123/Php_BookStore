<?php 
	$username = "root";
	$password = "van123";
	$server_host = "localhost";
	$dbname = "bookstore";
	$connb = mysqli_connect($server_host,$username,$password,$dbname) or die("could not connect to database!");
	mysqli_query($connb,"SET NAMES 'UTF8'");
 ?>