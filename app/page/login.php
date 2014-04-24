 <?php 

   /*
   $message="";
   
   
   if(isset($_POST["login"],$_POST["password"]))
   {
        $login = mysqli_real_escape_string($mysqli,$_POST["login"]);
        $password = mysqli_real_escape_string($mysqli,$_POST["password"]);

        $query = 'SELECT * FROM users WHERE login = "'.$login.'"';
        
        $res = mysqli_query($mysqli,$query);

        $post = mysqli_fetch_assoc($res); 

                   
       if($post["login"])
       {
          $message = "ok";


       }

       else
       {
          $message = "login";
       }
      */

   $message="";
   $password="";
   $login="";
   $error="";

   if(isset($_POST["login"],$_POST["password"]))
   {
       $login = mysqli_real_escape_string($mysqli,$_POST["login"]);
       $password = mysqli_real_escape_string($mysqli,$_POST["password"]);

       $query = 'SELECT * FROM users WHERE login = "'.$login.'"';

       $res = mysqli_query($mysqli,$query);

       $fetch = mysqli_fetch_assoc($res);
       
        if($fetch)
        {

           
            if(password_verify($password,$fetch["password"]))
            {
                 
                 
                 $_SESSION["user_id"]=$fetch["id"];
                 $_SESSION["login"]=$fetch["login"];
                 $_SESSION["admin"]=$fetch["admin"];

                 
                  header("Location:index.php?page=logged");

            }
            else
            {
            
               $message= "login : ".$fetch["login"]."<br/>mot de passe : inconnu";
             }
            
        }

       
   }

  require("./views/login.html");

    ?>