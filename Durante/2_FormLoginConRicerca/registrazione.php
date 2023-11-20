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
      <label for="inputEmail4">Nome</label>
      <input type="email" class="form-control" id="codiceFiscale" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
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