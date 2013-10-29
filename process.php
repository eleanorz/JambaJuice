<?php 
session_start();
//WARNING!!  currently subject to mysql injection , but, I am not yet ready to connect to a database, will adjust later on!

if (isset($_SESSION['total_drinks'])==FALSE) 
{
	$_SESSION['total_drinks']=0;
	echo "I am not set";
}


if(isset($_POST['action']) AND $_POST['action'] == 'add_to_cart')
{
	echo "before number total of drinks: ".$_SESSION['total_drinks']."<br>";
	$newDrinkNo=$_POST['number_drinks'];
	$_SESSION['total_drinks']=$_SESSION['total_drinks']+$newDrinkNo;
	echo "you just added in: ".$newDrinkNo."<br>";
	echo 'your new total is: '.$_SESSION['total_drinks']."<br>";

	$size=$_POST['size'];

	echo '<br>'."your size is".$size;
 
	// die();
	header('location: jambaDraft_1.php');
}

?>