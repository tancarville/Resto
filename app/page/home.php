<?php

$queryPostV = 'SELECT * FROM post ORDER BY date DESC LIMIT 0,5';
$resQueryPostV = mysqli_query($mysqli,$queryPostV);

while ($resPostV = mysqli_fetch_assoc($resQueryPostV))
{
	$postId = $resPostV["id"];
	$postTitle = htmlentities($resPostV["titre"]);
	$postContent = htmlentities(substr($resPostV["contenu"],0,300));
	$postPhoto = htmlentities($resPostV["photo"]);
	$postDate = htmlentities($resPostV["date"]);
	$postIdU = $resPostV["id_user"];

	$queryPostUser = 'SELECT login FROM users WHERE id = "'.$postIdU.'"';
	$resQueryPostUser = mysqli_query($mysqli,$queryPostUser);
	$resPostUser = mysqli_fetch_assoc($resQueryPostUser);

	$postUser = $resPostUser["login"];

	require("views/home.html");
}

?>