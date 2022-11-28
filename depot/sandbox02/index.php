<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - sandbox02</title>
  </head>
  <body style="background-color:<?php echo $_SERVER['EDCS_ENV_BGCOLOR'];?>;color:<?php echo $_SERVER['EDCS_ENV_FONTCOLOR'];?>;" >

    <h1>Sandbox02</h1>

    <?php

     // Les variables
     $servername = $_SERVER['EDCS_ENV_DB_HOSTNAME'];
     $username = $_SERVER['EDCS_ENV_DB_USERNAME'];
     $password = $_SERVER['EDCS_ENV_DB_PASSWORD'];
     $dbname = $_SERVER['EDCS_ENV_DB_NAME'];

     // La connexion
     $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }

      // La requête
      $sql = "SELECT name, file FROM characters";
      $result = $conn->query($sql);

      // Le parcours des résultats
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "name: " . $row["name"] . "<br>\n";
        }
      } else {
        echo "0 results";
      }

      // La fermeture de la connexion
      $conn->close();
    ?>

    <br>

    <?php
                                                    
     $to = "laurent.lavaud@developpement-durable.gouv.fr";     
     $to2 = "laurent.lavaud@free.fr";
     $subject = "Test mail";
     $message = "Coucou de l interieur de l instance";
     $from = "laurent.lavaud@developpement-durable.gouv.fr";
     $headers = "From:" . $from;

     echo "Envoi d'un petit mail à " . $to;
     mail($to,$subject,$message,$headers);

     echo "<br>\n";
		  
     echo "Envoi d'un petit mail à " . $to2;
     mail($to2,$subject,$message,$headers);
   ?>

  </body>
</html>
