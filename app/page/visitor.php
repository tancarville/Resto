<?php 


if(isset($_GET["id"]))
{
	$id_post = $_GET["id"];
	$get_post = 'SELECT * FROM visitorsbook WHERE id ="'.$id_post.'"';

	$res_get_post = mysqli_query($mysqli,$get_post);
	while($fetch = mysqli_fetch_assoc($res_get_post))
	{
		$id = $fetch["id"];
		$content = $fetch["content"];
		$date = $fetch["date"];
		$id_user=$fetch["id_user"];

		echo 
	}
}

require("./views/visitor.html");

;?>