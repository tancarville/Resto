<?php
$error="";
$message="";
$welcome="";

if(isset($_GET["adm"])&& $_GET["adm"] === "logout")
{

  echo "test";
   $_SESSION = array();
   session_destroy();

   header("Location:index.php?page=home");
}

if(!empty($_SESSION["login"]))
{

$login = mysqli_real_escape_string($mysqli,$_SESSION["login"]);
$password= mysqli_real_escape_string($mysqli,$_SESSION["password"]);

$query = 'SELECT * FROM users WHERE password ="'.$password.'" and login="'.$login.'"';

  $res = mysqli_query($mysqli,$query);

  $ligne = mysqli_fetch_assoc($res);

  $log = "logged";
  $welcome = htmlentities($login);

if($_SESSION["admin"]===1)
{
$message="status:admin";
}
else
{
$message="status:user";
}
}

else
{
 
if(isset($_POST["login"],$_POST["password"]))
{
$login = mysqli_real_escape_string($mysqli,$_POST["login"]);
$password= mysqli_real_escape_string($mysqli,sha1($_POST["password"]));

  $query = 'SELECT * FROM users WHERE password ="'.$password.'" and login="'.$login.'"';

  $res = mysqli_query($mysqli,$query);

  $ligne = mysqli_fetch_assoc($res);

  if($ligne["login"])
  {
    $log = "logged";

    $_SESSION["login"]=$login;
    $_SESSION["password"]=$password;
    $_SESSION["id"] = $ligne["id"];

       if($ligne["admin"]==1)
       {
           $_SESSION["admin"]=1;
       }
       else
       {
          $_SESSION["admin"]=0;
       }
       header("Location:index.php?page=home");
  }
  else
  {
    $log="login";
  $error="incorrect login or password";
}
}
else
{
  $log="login";
}
}


require("./views/header.html");
?>