<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8"   >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><h1>Visualizzazione cliente singolo</h1><br>   
    
<div class="container ml-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Codice fiscale</th>
      <th scope="col">Cognome</th>
      <th scope="col">Nome</th>
      <th scope="col">Data di nascita</th>
      <th scope="col">Indirizzo di residenza</th>
      <th scope="col">Città</th>
      <th scope="col">Provincia</th>
      <th scope="col">Regione</th>
      <th scope="col">Password</th>
      <th scope="col">Ripeti password</th>
    </tr>
  </thead>
  <tbody>
  <?php

        include "connessione.php";                                                                      

        $val = $_GET["val"];
        $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione,password1,ripetiPassword FROM Cliente");                      
        $rows = $result->num_rows;                                                                                                                         
        
        if($rows > 0){  
        
            while($row = $result->fetch_assoc()){     
              if($val == "$row[codiceFiscale]"){                                         
                echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[codiceFiscale] </a> </th>";
                echo "<th scope=."."row".">". "$row[cognome] </th>";
                echo "<th scope=."."row".">". "$row[nome] </th>";
                echo "<th scope=."."row".">". "$row[dataNascita] </th>";
                echo "<th scope=."."row".">". "$row[indirizzoResidenza] </th>";
                echo "<th scope=."."row".">". "$row[citta] </th>";
                echo "<th scope=."."row".">". "$row[provincia] </th>";
                echo "<th scope=."."row".">". "$row[regione] </th>";
                echo "<th scope=."."row".">". "$row[password1] </th>";
                echo "<th scope=."."row".">". "$row[ripetiPassword] </th></tr>";                             
            }
          }
        }

        $result->close();                                                                               
        $db_connection->close();                                                                                 

    ?>
  </tbody>
</table>

    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>