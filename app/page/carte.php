<?php

if($mysqli)
{

	$carte = 'SELECT * FROM carte';

	$res = mysqli_query($mysqli,$carte);

	$starter = array();
	$main = array();
	$dessert = array();
	$drink = array();


	while($ligne = mysqli_fetch_assoc($res))
	{
		if($ligne['type'] == "starter")
		{
			$starter[] = $ligne;
		}

		if($ligne['type'] == "main")
		{
			$main[] = $ligne;
		}

		if($ligne['type'] == "dessert")
		{
			$dessert[] = $ligne;
		}

		if($ligne['type'] == "drink")
		{
			$drink[] = $ligne;
		}
	}

	$i=0;
	while(isset($starter[$i]))
	{
		require('views/carte_module/carte_starter.html');
		$i++;
	}

	$i=0;
	while(isset($main[$i]))
	{
		require('views/carte_module/carte_main.html');
		$i++;
	}

	$i=0;
	while(isset($dessert[$i]))
	{
		require('views/carte_module/carte_dessert.html');
		$i++;
	}

	$i=0;
	while(isset($drink[$i]))
	{
		require('views/carte_module/carte_drink.html');
		$i++;
	}
	
}

?>









