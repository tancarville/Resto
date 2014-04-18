<?php

$regMsg = "";

if (isset($_POST["login"], $_POST["pass"]))
{
	$loginU = mysqli_real_escape_string($mysqli,$_POST["login"]);
	$passU = mysqli_real_escape_string($mysqli,sha1($_POST["pass"]));

	$queryChk = 'SELECT id FROM users WHERE login ="'.$loginU.'"';
	$resQueryChk = mysqli_query($mysqli,$queryChk);
	$resChk = mysqli_fetch_assoc($resQueryChk);

	if (isset($resChk))
	{
		$regMsg =  "Login déjà utilisé";
	}

	else
	{
		$queryInsert = 'INSERT INTO users (login,password) VALUES ("'.$loginU.'","'.$passU.'")';
		$resQueryInsert = mysqli_query($mysqli,$queryInsert);
		$regMsg = "Inscription terminée";
	}
}

require("views/register.html");

?>