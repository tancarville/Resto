<?php 
$visitorsbook = "";
if(isset($_SESSION["login"]))
{
	if($_SESSION["admin"]==1)
	{
         $visitorsbook = "adminvisitor";
	}
	else
	{
         $visitorsbook = "uservisitor";

	}
 
}

else
{
	$visitorsbook ="visitor";
}

require("./views/visitorsbook.html");
 
?>