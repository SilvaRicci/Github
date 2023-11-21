<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8"   >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><h1>Visualizzazione clienti tramite ricerca semplice</h1><br>   
    

    <div class="container">
<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="codiceFiscale">Codice fiscale</label>
      <input type="text" class="form-control" id="codiceFiscale" name="codiceFiscale" placeholder="Codice fiscale">
    </div>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Ricerca</button>
</form>
</div>

  <?php

        include "connessione.php";                                                                      
        
        if (isset($_POST["submit_btn"])) {
        $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente");                      
        $rows = $result->num_rows;                                                                                                                         

        if($rows > 0){  
                echo ' <div class="container ml-5">
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
                </tr>
              </thead>
              <tbody>';
                while($row = $result->fetch_assoc()){       
                    if("$row[codiceFiscale]")                                                
                    echo "<tr> <th scope=."."row"."class="."secondary".">"."<a href="."oneElement.php?val=$row[codiceFiscale]".">". "$row[codiceFiscale] </a> </th>";
                    echo "<th scope=."."row".">". "$row[cognome] </th>";
                    echo "<th scope=."."row".">". "$row[nome] </th>";
                    echo "<th scope=."."row".">". "$row[dataNascita] </th>";
                    echo "<th scope=."."row".">". "$row[indirizzoResidenza] </th>";
                    echo "<th scope=."."row".">". "$row[citta] </th>";
                    echo "<th scope=."."row".">". "$row[provincia] </th>";
                    echo "<th scope=."."row".">". "$row[regione] </th>";                          
                }
            }else{echo "Utente non trovato";}
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