<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Registrazione Cliente</h1><br>       
    
<div class="container">
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="codiceFiscale">Codice fiscale</label>
      <input type="text" class="form-control" id="codiceFiscale" name="codiceFiscale" placeholder="Codice fiscale">
    </div>
    <div class="form-group col-md-6">
      <label for="cognome">Cognome</label>
      <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
    </div>
  </div>
  <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
    </div>
  </div>
  <div class="form-group col-md-6">
      <label for="dataNascita">Data di nascita</label>
      <input type="date" class="form-control" id="dataNascita" name="dataNascita" placeholder="Data di nascita">
    </div>
  </div>
  <div class="form-group">
    <label for="indirizzoResidenza">Indirizzo di residenza</label>
    <input type="text" class="form-control" id="indirizzoResidenza" name="indirizzoResidenza" placeholder="Indirizzo di residenza">
  </div>
  <div class="form-group">
    <label for="citta">Città</label>
    <input type="text" class="form-control" id="citta" name="citta" placeholder="Città">
  </div>
  <div class="form-group">
    <label for="provincia">Provincia</label>
    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Città">
  </div>
  <div class="form-group">
    <label for="citta">Città</label>
    <input type="text" class="form-control" id="citta" name="citta" placeholder="Città">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

  <?php
      include "connessione.php";  
      if(isset($_POST["submit_btn"])){
                                                                            
        
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $classe = $_POST["classe"];
        $sezione = $_POST["sezione"];
        $indirizzo = $_POST["indirizzo"];

        $isOk=true;
        
        if($nome==""){
          $isOk=false;
          echo "Nome non inserito <br />";
        }
        if($cognome==""){
          $isOk=false;
          echo "Cognome non inserito <br />";
        }
        if($classe=="0"){
          $isOk=false;
          echo "Classe non inserita <br />";
        }
        if($sezione==""){
          $isOk=false;
          echo "Sezione non inserita <br />";
        }
        if($indirizzo=="0"){
          $isOk=false;
          echo "Indirizzo non inserito <br />";
        }

        if($isOk){
          $ok=$db_connection->query("INSERT INTO Studenti (nome,cognome,classe,sezione,indirizzo) VALUES ('$nome','$cognome','$classe','$sezione','$indirizzo')");
          if($ok==TRUE){
              echo "Inserimento dei dati nella tabella: 100% completato.";
          }else{
              die("Errore: " . $db_connection->connect_error);  
          }
          $db_connection->close();        
        }                                                                     
      }
    ?>
</center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>