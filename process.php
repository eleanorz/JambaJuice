<?php 
session_start();


if(isset($_POST['action']) AND $_POST['action'] == 'add_to_cart')
	{
		echo "hello world";
		die();
	}

?>