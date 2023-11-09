<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><h1>Studenti</h1><br>   
    
<div class="container ml-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cognome</th>
      <th scope="col">Nome</th>
      <th scope="col">Classe</th>
      <th scope="col">Sezione</th>
      <th scope="col">Indirizzo</th>
    </tr>
  </thead>
  <tbody>
  <?php

        include "connessione.php";                                                                      

        $result = $db_connection->query("SELECT id,cognome,nome,classe,sezione,indirizzo FROM Studenti");                      
        $rows = $result->num_rows;                                                                      

        echo "Sono presenti $rows records <br /><br />";                                                      

        if($rows > 0){  
        
            while($row = $result->fetch_assoc()){                                                       
                echo "<tr> <th scope=."."row"."class="."secondary".">"."<a href="."oneElement.php?val=$row[id]".">". "$row[id] </a> </th>";
                echo "<th scope=."."row".">". "$row[cognome] </th>";
                echo "<th scope=."."row".">". "$row[nome] </th>";
                echo "<th scope=."."row".">". "$row[classe] </th>";
                echo "<th scope=."."row".">". "$row[sezione] </th>";
                echo "<th scope=."."row".">". "$row[indirizzo] </th></tr>";                             
            }
        }

        $result->close();                                                                               
        $db_connection->close();                                                                                 

    ?>
  </tbody>
</table>

        <a href="ricerca.php"> Temp </a>

    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>