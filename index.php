<?php 
header("Content-text:html/text charset=utf-8");

session_start();

$db = mysqli_connect("localhost","root","troiswa","resto");
$page="";
if(isset($_GET["page"]))
{

$page = "app/".$_GET["page"].".php";
require($page);
}
require("app/skel.php");
?>