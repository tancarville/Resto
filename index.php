
 
<?php 
session_start();

$mysqli = mysqli_connect("localhost","root","troiswa","resto");

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


