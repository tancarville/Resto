<?php

$query_starters = 'SELECT * FROM carte WHERE type="main" ORDER BY name DESC';

$res_starters = mysqli_query($mysqli,$query_starters);

while($starter = mysqli_fetch_assoc($res_starters))
{
	$id = $starter['id'];
	/*on crée des variables pour donner des noms aux elements HTML*/
	$span_price = 'price_'.$id;
	$td_total = 'total_'.$id;

	$name = $starter['name'];
	$price = $starter['price_delivery'];
	$photo = $starter['photo'];
	$photo_path = './sources/img/'.$photo;

	require('./views/delivery_module/delivery_line.html');
}

?>