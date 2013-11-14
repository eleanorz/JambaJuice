<?php 

session_start();
//WARNING!!  currently subject to mysql injection , but, I am not yet ready to connect to a database, will adjust later on!

if(isset($_POST['action']) AND $_POST['action'] == 'add_to_cart')
{
	if (!isset($_SESSION['total_drinks']))  //this means this is the first drink must be added
	{
		$_SESSION['order_array']=array(
			array(
				'drink_name' => $_POST['drinkname'],
				'num_of_drinks' => $_POST['number_drinks']
				)
			);
		$_SESSION['total_drinks']= $_POST['number_drinks'];
		echo "set session total drinks for first time!";
	}

	else  //this means that there are already drinks in the cart
	{	
		$exist=0;
		$newDrinkNo=$_POST['number_drinks'];
		$newDrinkName=$_POST['drinkname'];
		$size=$_POST['size'];
		$_SESSION['total_drinks']=$_SESSION['total_drinks']+$newDrinkNo;
		foreach ($_SESSION['order_array'] as $drink) 
		{
			echo $drink['num_of_drinks'];
			echo $drink['drink_name'];


			if ($drink['drink_name']==$newDrinkName) //this means we are adding on additional drinks 
			{
				echo "<br> we have another of the {$newDrinkName}!!";
				$drink['num_of_drinks'] = intval($drink['num_of_drinks'])+$newDrinkNo;
				echo "<br> new drink number is ".$drink['num_of_drinks'];
				var_dump($_SESSION['order_array']);
				$exist=1;
			}
			else  //this means we are adding a new drink to the existing order that hasn't been ordered
			{
				$new_drink = array(
				'drink_name' => $_POST['drinkname'],
				'num_of_drinks' => $_POST['number_drinks']
				);
				$_SESSION['order_array'][]= $new_drink;
			}
		}

		if(isset($newDrinkName))
		{
			echo "you just added in: ".$newDrinkNo."<br>".$newDrinkName.' s smoothies';	
		}

		// if ($exist==0) 
		// {
		// 	$newItemAdded=[$newDrinkNo, $size, $newDrinkName];
		// 	array_push($_SESSION['order_array'], $newItemAdded);
		// }

		var_dump($_SESSION['order_array']);
		echo "exist is...".$exist;
		die(); 
		header('location: jambaDraft_1.php');
	} //end of else case
} //end of add_to_cart statement

if(isset($_POST['action']) AND $_POST['action'] == 'clear_cart')
{
	unset($_SESSION['total_drinks']);
	unset($_SESSION['order_array']);
	header('location: jambaDraft_1.php');
}

if(isset($_POST['action']) AND $_POST['action'] == 'deleteItem')
{
	$_SESSION['order_array'][0]=0;
	echo "I have successfully set the number of drinks for this to 0".$_POST['value'];
	die();
	header('location: jambaDraft_1.php');
}

// function printDeleteButton(drinkname)
// 			{
// 				echo "<button name='' value='"drinkname"' action='process.php' method='post' type='button' class='btn btn-warning btn-xs'>&times;</button>      ";
// 			}value='".$drinkname.



?>