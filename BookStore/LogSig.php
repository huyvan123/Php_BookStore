<?php require_once("ConnectDB.php"); ?>
<!DOCTYPE html >
<html>
<head>
<script type="text/javascript"
	src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript"
	src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css"
	href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<script type="text/javascript"
	src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css"
	href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<title>Login</title>

</head>

<body>

	<br>
	<div class="container">

		<!-- 	login -->

		<div class="row">
			<nav class="navbar navbar-inverse">
			<form name="login" action="Login.php" method="POST"
				class="navbar-form navbar-right">
				<input name="username" type="text" class="form-control"
					placeholder="username"> 
				<input name="password"
					type="password" class="form-control" placeholder="password">
				<button class="btn btn-primary" type="submit" name="login">
					<i class="glyphicon glyphicon-log-in"></i>
				</button>
			</form>
			</nav>

			<?php if(isset($_GET['checku'])){
				$check = $_GET['checku'];
				if ($check == 0) {?>
					<h5 style="color: red; text-align: center;">Your username or password incorrect!</h5>
				<?php }elseif ($check == 1) {?>
					<h5 style="color: red; text-align: center;">Your username is available!</h5>
				<?php }elseif ($check == 2) {?>
					<h5 style="color: green; text-align: center;">Sigup successfully!</h5>
				<?php }
			} ?>
			<!-- <c:choose>
				<c:when test="${check == 0 }">
					<h5 style="color: red; text-align: center;">Your username or password incorrect!</h5>
				</c:when>
			</c:choose> -->
		</div>

		<!-- 		sign up -->

		<div style="text-align: center">
			<h2>
				<b><i>If you have not any account, please Sign Up!</i></b>
			</h2>
		</div>
		<br>

		<!-- <c:choose>
			<c:when test="${checkUS == 1}">
				<script type="text/javascript">
					alert("Sign up successful");
				</script>
			</c:when>
			<c:when test="${checkUS == 0}">
				<div class="alert alert-danger">
					<strong>Your username is available!</strong>
				</div>
			</c:when>
			<c:otherwise>
			</c:otherwise>
		</c:choose> -->

		<div class="row">
			<form name="sigup" action="Login.php" method="POST">
				<div class="col-sm-4">
					<b>UserName:</b> <input name="usernamecus" type="text"
						class="form-control" placeholder="enter your username"
						pattern=".{3,12}" required title="Cần 3 ký tự trở lên"><br>
					<b>PassWord:</b> <input name="passwordcus" type="text"
						class="form-control" placeholder="enter your password"
						pattern=".{5,15}" required title="Cần 5 ký tự trở lên"><br>
					<b>PhoneNumber:</b> <input type="text" name="phonenumber"
						class="form-control" placeholder="enter your phonenumber"
						pattern="[0-9].{9,12}" required title="Cần số điện thoại"><br>
					<b>Email:</b> <input type="text" name="email" class="form-control"
						placeholder="enter your email"
						pattern="[a-z0-9]+@[a-z]+\.[a-z]{2,3}" title="Cần email chuẩn"><br>
				</div>
				<div class="col-sm-4">

					<b>Country: </b> <select class="form-control" name="country">

						<?php $sql = "SELECT country.name FROM bookstore.country order by country.name asc";
							$query = mysqli_query($conn,$sql);
							while($data = mysqli_fetch_array($query)){
						 ?>

<!-- 						<sql:setDataSource var="country" driver="com.mysql.jdbc.Driver"
							url="jdbc:mysql://localhost:3306/bookstore" user="root" password="van123" />

						<sql:query dataSource="${country}" var="result">
           					 SELECT country.name FROM bookstore.country order by country.name asc;
        				 </sql:query> -->
        				 
        				 <!-- <c:forEach var="name" items="${result.rows}"> -->
        				 	<option> <?= $data['name']  ?></option>
        				 <!-- </c:forEach> -->
        				 <?php } ?>
					</select> <br> <b>Address:</b> <input type="text"
						name="address" class="form-control"
						placeholder="enter your address" pattern=".{5,}" required
						title="Cần 5 - 16 ký tự"><br> <b>Gender:</b>
					<ul>
						<li class="list-unstyled"><input type="radio" name="gender"
							value="male" checked="checked" /> Male<bR></li>
						<li class="list-unstyled"><input type="radio" name="gender"
							value="female" /> Female<br></li>
					</ul>
					<br>
					<br>
					<div style="margin-left: 40%">
						<button class="btn btn-primary" name="signup" type="submit">
						Sign Up</button>
					</div>
					<br><br><br>
				</div>

				<div class="col-sm-4">
					<b>First Name:</b> <input name="firstname" type="text"
						class="form-control" placeholder="enter your firstname"
						pattern=".{1,6}" required title="Cần 1 - 6 ký tự"><br>
					<b>Second Name:</b> <input name="secondname" type="text"
						class="form-control" placeholder="enter your secondname"><br>
					<b>Last Name:</b> <input type="text" name="lastname"
						class="form-control" placeholder="enter your lastname"
						pattern=".{1,6}" required title="Cần 1-6 ký tự "><br>

					<b>Date of birth:</b> <input type="text" class="form-control"
						name="birthdate" value="10/24/2012" />

					<script type="text/javascript">
						$(function() {
							$('input[name="birthdate"]').daterangepicker({
								singleDatePicker : true,
								showDropdowns : true
							});
						});
					</script>
					<br>


				</div>
			</form>
		</div>

	</div>

</body>
</html>