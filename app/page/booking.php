<?php
if (isset($_SESSION['login']))
{
	if (!isset($_POST['Book']))
	{

	}
	else
	{
		
		require("./index.php?page=booking");
	}
}
else
{
	$booking_message = "";
}
?>