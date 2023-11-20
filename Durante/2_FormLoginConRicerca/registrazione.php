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
<form action="#" method="POST">
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
    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
  </div>
  <div class="form-group">
    <label for="regione">Regione</label>
    <input type="text" class="form-control" id="regione" name="regione" placeholder="Regione">
  </div>
  <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="confermaPassword">Conferma la password</label>
      <input type="password" class="form-control" id="confermaPassword" placeholder="Conferma la password">
    </div>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Registrati</button>
</form>
</div>

  <?php
      include "connessione.php";  
      if(isset($_POST["submit_btn"])){
                                                                            
        $cognome = $_POST["cognome"];
        $nome = $_POST["nome"];
        $dataNascita = $_POST["dataNascita"];
        $indirizzoResidenza = $_POST["indirizzoResidenza"];
        $citta = $_POST["citta"];
        $provincia = $_POST["provincia"];
        $regione = $_POST["regione"];
        $password = $_POST["password"];
        $ripetiPassword = $_POST["ripetiPassword"];

        $isOk=true;
        
        if($cognome==""){
          $isOk=false;
          echo "Cognome non inserito <br />";
        }
        if($nome==""){
          $isOk=false;
          echo "Nome non inserito <br />";
        }
        if($dataNascita==""){
          $isOk=false;
          echo "Data di nascita non inserita <br />";
        }
        if($indirizzoResidenza==""){
          $isOk=false;
          echo "Indirizzo di residenza non inserito <br />";
        }
        if($citta==""){
          $isOk=false;
          echo "Città non inserita <br />";
        }
        if($provincia==""){
          $isOk=false;
          echo "Provincia non inserita <br />";
        }
        if($regione==""){
          $isOk=false;
          echo "Regione non inserita <br />";
        }
        if($password==""){
          $isOk=false;
          echo "Password non inserita <br />";
        }
        if($ripetiPassword=""){
          $isOk=false;
          echo "Ripeti password non inserita <br />";
        }
        $isOk2=true;

        if($isOk){
          if($password!=$ripetiPassword){
            $isOk2=false;
            echo "Le due password non coincidono <br />";
          }
        }

        if($isOk2){
          $ok=$db_connection->query("INSERT INTO Cliente (cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione,password1,ripetiPassword) VALUES //dacabiarmejsgjhsagjhsgjhsgj('$nome','$cognome','$classe','$sezione','$indirizzo')");
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