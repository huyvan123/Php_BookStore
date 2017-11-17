<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<?php 

  function Search($value,$conn)
	{
		$sql = "SELECT * from bookstore.book
				where book.caregory like '%$value%'";
		$queryb = mysqli_query($conn,$sql);
		if ($queryb->num_rows > 0) {
			 while ($data = mysqli_fetch_array($queryb)) {
  					 ?>
  					<div class="col-md-4">
  						<div class="thumbnail" style="width: 200px;height: 320px;">
  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
  								<div class="caption">
  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
  								</div>
  							</a>
  						</div>
  					</div>
  					<?php } 
		}
	}
	function SearchByName($value,$conn)
	{
		$sql = "SELECT * from bookstore.book
				where book.name like '%$value%'";
		$queryb = mysqli_query($conn,$sql);
		if ($queryb->num_rows > 0) {
			 while ($data = mysqli_fetch_array($queryb)) {
  					 ?>
  					<div class="col-md-4">
  						<div class="thumbnail" style="width: 200px;height: 320px;">
  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
  								<div class="caption">
  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
  								</div>
  							</a>
  						</div>
  					</div>
  					<?php } 
		}
	}

 ?>