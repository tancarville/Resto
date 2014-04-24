<?php

$i=0;
while(isset($drink[$i]))
{
	require('views/carte_module/carte_drink.html');
	$i++;
}

?>