<?php 
	

	$birthday = new DateTime('2011-11-21');
	 $today = new DateTime('today');
    $diff = $birthday->diff($today);
    echo $diff->y;
 ?>