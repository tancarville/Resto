<?php
 
$error="";
$success="";

if(isset($_POST["login"],$_POST["name"],$_POST["firstname"],$_POST["password"],$_POST["address_number"],$_POST["address_street"],$_POST["address_zipcode"],$_POST["address_city"],$_POST["email"],$_POST["phone"],$_POST["birthdate"]))
{

$login = $_POST['login'];

$name = $_POST['name'];

$firstname = $_POST['firstname'];

$password = $_POST['password'];

$address_number = $_POST['address_number'];

$address_street = $_POST['address_street'];

$address_zipcode = $_POST['address_zipcode'];
    
$address_city = $_POST['address_city'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$birthdate = $_POST['birthdate'];

    
   
  


       $success="you are registered";
     
       $login = mysqli_real_escape_string($mysqli,$login);
       
       $name = mysqli_real_escape_string($mysqli,$name);
       
       $firstname = mysqli_real_escape_string($mysqli,$firstname);
       
       $password = mysqli_real_escape_string($mysqli,($password));

       $crypted = password_hash($password, PASSWORD_BCRYPT, ["cost"=>13]);
       
       $address_number = mysqli_real_escape_string($mysqli,$address_number);
       
       $address_street = mysqli_real_escape_string($mysqli,$address_street);
       
       $address_zipcode = mysqli_real_escape_string($mysqli,$address_zipcode);
       
       $address_city = mysqli_real_escape_string($mysqli,$address_city);
       
       $email = mysqli_real_escape_string($mysqli,$email);
       
       $phone = mysqli_real_escape_string($mysqli,$phone);
       
       $birthdate = mysqli_real_escape_string($mysqli,$birthdate);
       
       

       $query= 'INSERT INTO users(login,name,firstname,password,address_number,address_street,address_zipcode,address_city,email,phone,birthdate)
VALUES("'.$login.'","'.$name.'","'.$firstname.'","'.$crypted.'","'.$address_number.'","'.$address_street.'","'.$address_zipcode.'","'.$address_city.'","'.$email.'","'.$phone.'","'.$birthdate.'")';
       mysqli_query($mysqli,$query);

       $newpost_id= mysqli_insert_id($mysqli);
       if($newpost_id)
       {
          
          header("Location:index.php?page=login&registered=true");
       }
       else
       {
            $error="Error when posting: ".mysqli_error($mysqli);
       }
       
    


}
else
{
$error="Please fill the blanks!";
}

  require("./views/register.html");
?> 