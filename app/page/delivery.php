<?php

$coucou = 'coucou';

if (!isset($order_null))
	$order_null = true;

if (!isset($message_delivery))
	$message_delivery = "";

if (isset($_SESSION['login']))
{
	if (isset($_POST['deliver']))
	{
		$tab = array_keys($_POST);
		$i=0;
		while (isset($tab[$i]))
		{
			$quantity = $tab[$i];
			$value = $_POST[$quantity];
			if ($value != "" && $value != "Order")
				$order_null = false;
			$i++;
		}
		if ($order_null == true)
		{
			$message_delivery = "At least one quantity must be set.";
			require('./views/delivery.html');
		}
		else
		{
			$date = date("Y-m-d H:i:s");
			$user_id = $_SESSION['user_id'];

			$delivery_query = 'INSERT INTO delivery (datetime, user_id) VALUES ("'.$date.'","'.$user_id.'")';

			mysqli_query($mysqli,$delivery_query);
			$newdelivery_id = mysqli_insert_id($mysqli);
			if ($newdelivery_id <= 0)
			{
				$message_delivery = "Error when posting your order: ".mysqli_error($mysqli)."<br\>Please try again";
				require('./views/delivery.html');
			}
			else
			{
				$j=0;
				while (isset($tab[$j]))
				{
					$quantity = $tab[$j];
					$value = $_POST[$quantity];
					if ($value != "" && $value != "Order")
					{
						$order_query = 'INSERT INTO orders (article_id,delivery_id,quantity) VALUES ("'.$tab[$j].'","'.$newdelivery_id.'","'.$value.'")';

						mysqli_query($mysqli,$order_query);
						$neworder_id = mysqli_insert_id($mysqli);
						if ($neworder_id <= 0)
						{
							$message_delivery = "Error when proceding your order : ".mysqli_error($mysqli)."<br\>Please try again";
							require('./views/delivery.html');
						}
					}
					$j++;
				}
			}
			$message_delivery = "Your delivery will arrive in 30min";
			require('./views/delivery.html');
		}
	}
	else
		require('./views/delivery.html');
}
else
{
	$message_delivery = "You must be connected to order.";
	require('./views/delivery.html');
}
?>