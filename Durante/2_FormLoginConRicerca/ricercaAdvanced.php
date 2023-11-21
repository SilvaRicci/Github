<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><h1>Visualizzazione clienti tramite ricerca avanzata</h1><br>   
    
    <?php include "connessione.php"; ?>

    <div class="container">
<form action="#" method="POST">
  <div class="form-row">
    <?php

      echo '<div class="form-group my-2">
    <label for="regione">Regione</label>
    <select id="regione" name="regione" class="form-control">
      <option selected value="0">Scegli la regione</option>';

      $result = $db_connection->query("SELECT DISTINCT regione FROM Cliente");                      
      $rows = $result->num_rows;  
      echo $rows;
      if($rows > 0){  
        while($row = $result->fetch_assoc()){                                                    
          echo '<option value='."$row[regione]".'>'."$row[regione]".'</option>';
        }
      }
      echo '</select> </div>';


      echo '<div class="form-group my-2">
    <label for="provincia">Provincia</label>
    <select id="provincia" name="provincia" class="form-control">
      <option selected value="0">Scegli la provincia</option>';

      $result = $db_connection->query("SELECT DISTINCT provincia FROM Cliente");                      
      $rows = $result->num_rows;  
      echo $rows;
      if($rows > 0){  
        while($row = $result->fetch_assoc()){                                                    
          echo '<option value='."$row[provincia]".'>'."$row[provincia]".'</option>';
        }
      }
      echo '</select> </div>';

    ?>
    <div class="form-group col-md-6">
      <label for="citta">Città</label>
      <input type="text" class="form-control" id="citta" name="citta" placeholder="Città">
    </div>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Ricerca</button>
</form>
</div>

  <?php                                                                     
        
        if (isset($_POST["submit_btn"])) {
            
            $provincia = $_POST["provincia"];
            $provincia = $_POST["provincia"];
            $provincia = $_POST["provincia"];

            $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE codiceFiscale = '$codiceFiscale'");                      
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
        /*Pagina di ricerca avanzata
La ricerca deve avvenire per:
regione
provincia
città
Non necessariamente devono essere scelti tutti e tre i campi, ma bisogna sceglierne obbligatoriamente uno.
Regione e provincia devono essere due menu a tendina popolati con i valori presi dai rispettivi campi della tabella clienti (senza ripetizioni), città è un capo di testo.
Se presente risultati visualizza tutte le  informazioni degli utenti(tranne la password), se non presente alcun risultato, visualizza a video un messaggio appropriato. */



    ?>
  </tbody>
</table>

    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>