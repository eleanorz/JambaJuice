<?php 

session_start();
//WARNING!!  currently subject to mysql injection , but, I am not yet ready to connect to a database, will adjust later on!

// $_SESSION['total_drinks']=0;


if (isset($_SESSION['total_drinks'])==FALSE) 
{
	$_SESSION['order_array']=[];
	$_SESSION['total_drinks']=0;
	echo "I am not set";
}


if(isset($_POST['action']) AND $_POST['action'] == 'add_to_cart')
{
	echo "before number total of drinks: ".$_SESSION['total_drinks']."<br>";
	$exist=0;
	$newDrinkNo=$_POST['number_drinks'];
	$newDrinkName=$_POST['drinkname'];
	$size=$_POST['size'];
	$_SESSION['total_drinks']=$_SESSION['total_drinks']+$newDrinkNo;

	//if this type of drink already exists, will add to this instead of 

	foreach ($_SESSION['order_array'] as $key => $value) 
	{
		if ($value[2]==$newDrinkName)
		{
			$value[0]+=$newDrinkNo;
			$exist=1;
			break;
		}
	}

	if (isset($newDrinkName)) {
	echo "you just added in: ".$newDrinkNo."<br>".$newDrinkName.' s smoothies';
		# code...
	}
	echo 'your new total is: '.$_SESSION['total_drinks']."<br>";
	echo '<br>'."your size is".$size;

	if ($exist=0) 
	{
		$newItemAdded=[$newDrinkNo, $size, $newDrinkName];
		array_push($_SESSION['order_array'], $newItemAdded);
	}

	var_dump($_SESSION['order_array']);
	// die(); 
	header('location: jambaDraft_1.php');
}

if(isset($_POST['action']) AND $_POST['action'] == 'clear_cart')
{
	$_SESSION['total_drinks']=0;
	header('location: jambaDraft_1.php');
}



?>