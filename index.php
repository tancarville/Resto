<?php

header('Content-Type; text/html; charset = utf-8');

session_start();

$mysqli = mysqli_connect("localhost","root","troiswa","resto");

if(mysqli_connect_errno() !== 0)
    die(mysqli_connect_error());

$folder = "app/page/";
$filesPage = scandir($folder);
$pageGet = strtoLower(htmlentities($_GET["page"]));

if(isset($_GET["page"]))
{
    if(in_array($pageGet.".php",$filesPage))
    {
    	$page = "app/page/".$pageGet.".php";
    }
    else
    {
    	header("Location:index.php?page=home");
    }
    require("app/skel.php");
}
else
{
	header("Location:index.php?page=home");
}

?>



