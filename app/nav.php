<?php

if (isset($_SESSION['login']) && isset($_SESSION['admin']) && $_SESSION['admin']==true)
{
	require('./views/navadmin.html');
}
else
	require('./views/nav.html');

?>