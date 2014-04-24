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
       $password = mysqli_real_escape_string($mysqli,sha1($_POST["password"]));

       $query = 'SELECT * FROM users WHERE login = "'.$login.'"';

       $res = mysqli_query($mysqli,$query);

       $fetch = mysqli_fetch_assoc($res);
       
        if($fetch)
        {

           
            if($fetch["password"]==$_POST["password"])
            {
                  $message= "login : ".$fetch["login"]."<br/>mot de passe : ".$password;
                  $_SESSION["id"]=$fetch["id"];
                 $_SESSION["login"]=$fetch["login"];



            }
            else
            {
               $message= "login : ".$fetch["login"]."<br/>mot de passe : inconnu";
            }
        }

       /*
          if($fetch)
          {
              if($fetch['password'] == sha1($_POST['password']));
              {
                $_SESSION['login'] = $_POST['login'];
              }
              else{
                $erreur = "Password incorrecte";
              }
          }
          else{
              $erreur = "Login incorrecte";
          }
        */

        /*
       if($fetch["login"])
       {

          echo $fetch["login"];
           if($fetch["password"]==true)
           {
               
          echo $fetch["password"];

           }
       }
      */
   }

  require("./views/login.html");

    ?>