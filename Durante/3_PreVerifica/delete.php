<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <<body style = "background-color:white">
    <center><br><br><h1>Visualizzazione clienti tramite ricerca avanzata</h1><br>   
    
    <?php include "connessione.php"; ?>

    <div class="container">
<form action="#" method="POST">
  <div class="form-row">
    <?php

      echo '<div class="form-group my-2">
    <label for="codiceFiscale">Codice fiscale</label>
    <select id="codiceFiscale" name="codiceFiscale" class="form-control">
      <option selected value="0">Scegli il codice fiscale</option>';

      $result = $db_connection->query("SELECT DISTINCT CodFisc FROM valutazione");                      
      $rows = $result->num_rows;  
      echo $rows;
      if($rows > 0){  
        while($row = $result->fetch_assoc()){                                                    
          echo '<option value='."$row[CodFisc]".'>'."$row[CodFisc]".'</option>';
        }
      }
      echo '</select> </div>';


      echo '<div class="form-group my-2">
    <label for="codiceContenuto">Codice contenuto</label>
    <select id="codiceContenuto" name="codiceContenuto" class="form-control">
      <option selected value="0">Scegli il codice contenuto</option>';

      $result = $db_connection->query("SELECT DISTINCT CodContenuto FROM valutazione");                      
      $rows = $result->num_rows;  
      echo $rows;
      if($rows > 0){  
        while($row = $result->fetch_assoc()){                                                    
          echo '<option value='."$row[CodContenuto]".'>'."$row[CodContenuto]".'</option>';
        }
      }
      echo '</select> </div>';

    ?>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Ricerca</button>
</form>
</div>

  <?php                                                                     
        
        if (isset($_POST["submit_btn"])) {
            
            $regione = $_POST["regione"];
            $provincia = $_POST["provincia"];
            $citta = $_POST["citta"];
            $isRegione=true;
            $isProvincia=true;
            $isCitta=true;

            $ricercaDaEffettuare = true;

            if($regione==0){
              $isRegione=false;
            }
            if($provincia==0){
              $isProvincia=false;
            }
            if($citta==""){
              $isCitta=false;
            }

            if(!$isRegione AND !$isProvincia AND !$isCitta){
              echo "ao, inserisci qualcosa";
            }else{

              if($isRegione AND $isProvincia AND $isCitta AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (regione = '$regione' AND provincia = '$provincia' AND citta = '$citta')");                      
                $rows = $result->num_rows;   
                $ricercaDaEffettuare = false;
              }

              if($isRegione AND $isProvincia AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (regione = '$regione' AND provincia = '$provincia')");                      
                $rows = $result->num_rows; 
                $ricercaDaEffettuare = false;  
              }

              if($isProvincia AND $isCitta AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (provincia = '$provincia' AND citta = '$citta')");                      
                $rows = $result->num_rows;   
                $ricercaDaEffettuare = false;
              }

              if($isRegione AND $isCitta AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (regione = '$regione' AND citta = '$citta')");                      
                $rows = $result->num_rows;   
                $ricercaDaEffettuare = false;
              }
              
              if($isRegione AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (regione = '$regione')");                      
                $rows = $result->num_rows;   
                $ricercaDaEffettuare = false;
              }

              if($isProvincia AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (provincia = '$provincia')");                      
                $rows = $result->num_rows;   
                $ricercaDaEffettuare = false;
              }

              if($isCitta AND $ricercaDaEffettuare){
                $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione FROM Cliente WHERE (citta = '$citta')");                      
                $rows = $result->num_rows;   
                $ricercaDaEffettuare = false;
              }

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
            
            }else{
              echo "Nessun cliente trovato.";
            }
        }
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