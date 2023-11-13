<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Inserimento studenti</h1><br>       
    
<div class="container">
  <div class="row">
    <div class="col-2">
      <BR>
</div>
    <div class="col-4 my-2">
<form class="form-horizontal" action="#" method="POST">
  <div class="form-group">
    <label class="control-label" for="nome">Nome</label>
    <div class="my-2">
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci nome">
    </div>
  </div>
</div>
<div class="col-4 my-2">
  <div class="form-group">
    <label class="control-label" for="cognome">Cognome</label>
    <div class="my-2">
      <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Inserisci cognome">
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-2">
      <BR>
</div>
  <div class="col-2">
  <div class="form-group my-2">
      <label for="classe">Classe</label>
      <select id="classe" name="classe" class="form-control">
        <option selected value="0">Scegli la classe</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
</div>
<div class="col-2">
  <div class="form-group my-2">
    <label class="control-label" for="sezione">Sezione</label>
    <div class="form">
      <input type="text" class="form-control" id="sezione" name="sezione" placeholder="Inserisci sezione">
    </div>
  </div>
</div>
  <div class="col-4">
  <div class="form-group my-2">
      <label for="indirizzo">Indirizzo</label>
      <select id="indirizzo" name="indirizzo" class="form-control">
        <option selected value="0">Scegli l'indirizzo</option>
        <option value="informatica">Informatica</option>
        <option value="meccanica">Meccanica</option>
        <option value="chimica">Chimica</option>
        <option value="elettronica">Elettronica</option>
        <option value="biotecnologie">Biotecnologie saniterie</option>
        <option value="energia">Energia</option>
        <option value="costruzioni">Costruzioni</option>
      </select>
    </div>
</div>
</div>
<div class="row">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-light my-3" id="submit_btn" name="submit_btn">Invia</button>
    </div>
  </div>
</form>
</div>
</div>
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
          $db_connection->query("INSERT INTO Studenti (nome,cognome,classe,sezione,indirizzo) VALUES ('$nome','$cognome','$classe','$sezione','$indirizzo')");
          echo "Inserimento dei dati nella tabella: 100% completato.";
          $db_connection->close();        
        }                                                                     
      }
    ?>
</center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>