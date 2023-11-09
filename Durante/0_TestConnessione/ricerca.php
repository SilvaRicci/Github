<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">

    <center><h1>Ricerca studenti</h1><br>   
    
<div class="container ml-5">
    <form method='POST' action='#'>
  <?php

        include "connessione.php";                                                                      

        $arrayIndirizzi = $db_connection->query("SELECT DISTINCT Indirizzo FROM Studenti");   
        $rows = $arrayIndirizzi->num_rows;

        if($rows > 0){  
            echo "<select class='form-select' aria-label='Default select example' id='ind' name='ind'>
            <option value='dsf' selected>Per Indirizzo</option>";
            while($row = $arrayIndirizzi->fetch_assoc()){                                                       
                echo "<option value='$row[Indirizzo]'>$row[Indirizzo]</option>";                           
            }
            echo "  </select> <br />";
        }

        $arrayClasse = $db_connection->query("SELECT DISTINCT Classe FROM Studenti");   
        $rows = $arrayClasse->num_rows;

        if($rows > 0){  
            echo "<select class='form-select' aria-label='Default select example' id='classe' name='classe'>
            <option selected>Per Classe</option>";
            while($row = $arrayClasse->fetch_assoc()){                                                       
                echo "<option value='$row[Classe]'>$row[Classe]</option>";                           
            }
            echo "  </select> <br />";
        }
        
        $arrayIndirizzi->close();          
        $arrayClasse->close();                                                                  
        $db_connection->close();                                                                                 
        
    ?>
        </form>
    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>