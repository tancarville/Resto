<?php

if (!isset($booking_message))
	$booking_message="";

$today_day = date('d');
$today_month = date('m');
$today_year = date('Y');

if (isset($_SESSION['login']))
{
	if (isset($_POST['book']))
	{
		$day = mysqli_real_escape_string($mysqli,$_POST['day']);
		$number = mysqli_real_escape_string($mysqli,$_POST['number']);
		$time = mysqli_real_escape_string($mysqli,$_POST['time']);

		if ($time = "8PM")
		{
			$hour = "0830";
		}
		else if ($time = "9:30PM")
		{
			$hour = "0930";
		}
		
		$today = date("Y-m-d");

		$today_hour = date("h");
		$today_minute = date("i");
		$today_time = $today_hour.$today_minute;


		if ((time($day) < time($today)) || (time($day) == time($today) && $time > $today_time))
		{
				$booking_message = "We are sorry but you cannot book a table in the past...";
				require('./views/booking.html');
		}
		else
		{
			$check_avail_query = 'SELECT number from booking WHERE day ="'.$day.'" AND time = "'.$time.'" ';

			$check_avail_res = mysqli_query($mysqli,$check_avail_query);
			$taken = 0;
			while ($booked = mysqli_fetch_assoc($check_avail_res))
			{
				$taken = $taken + $booked['number'];
			}

			if (($taken+$number)>=10)
			{
				$remain = 10 - $taken;
				if ($remain == 0)
				{
					$booking_message = "We are sorry but we are fully booked for this day and time...";
					require('./views/booking.html');
				}
				else if ($remain == 1)
				{
					$booking_message = "We are sorry but we only have 1 seat available.";
					require('./views/booking.html');
				}
				else
				{
					$booking_message = "We are sorry but we only have ".$remain." seats available.";
					require('./views/booking.html');
				}
			}
			else
			{
				$id = $_SESSION['user_id'];
				$date = date("Y-m-d H:i:s");
				$book_query = 'INSERT INTO booking(day,time,number,id_user,date) VALUES ("'.$day.'","'.$time.'","'.$number.'","'.$id.'","'.$date.'")';

				mysqli_query($mysqli,$book_query);
				$booking_id = mysqli_insert_id($mysqli);

				if ($booking_id > 0)
				{
					$booking_message = "Your table for ".$number." on ".$day." at ".$time." is booked. It's a pleasure to see you soon.";
					require('./views/booking.html');
				}
				else
				{
					$booking_message = mysqli_error($mysqli);
					/*$booking_message = "We are sorry, an error occurred when booking. Please try again.";*/
					require('./views/booking.html');
				}
			}
		}
	}
	else
	{
		require("./views/booking.html");
	}
}
else
{
	$booking_message = 'You need to be registered to book a table. Please <span id="booking_login_link">log in</span> or <span id="booking_register_link">register</span><script type="text/javascript" src="./sources/js/jquery.js"></script><script type="text/javascript" src="./sources/js/needtoconnect.js"></script>';
	require("./views/booking.html");
}
?>