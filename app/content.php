<?php

if (isset($page))
{
	$showPage = $page;
	require("views/content.html");
}

else
{
	header("location:index.php?page=home");
}
?>