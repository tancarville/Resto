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

require('views/carte.html');

}

?>









