<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    

  <form class="needs-validation" id="justValidateForm" action="#" method="POST">
  <div>
  <div class="form-group">
    <label for="exampleInputText">Codice Fiscale</label>
    <input type="text" class="form-control" id="codice_fiscale">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Cognome</label>
    <input type="text" class="form-control" id="cognome">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Nome</label>
    <input type="text" class="form-control" id="nome">
  </div>
  <div class="form-group">
    <label class="active" for="dateStandard">Data di Nascita</label>
    <input type="date" id="dateStandard" name="data_nascita">
</div>
  <div class="form-group">
    <label class="active" for="exampleInputTime">Indirizzo di residenza</label>
    <input type=text" class="form-control" id="residenza">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Città</label>
    <input type="text" data-bs-input class="form-control" id="citta">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Provincia</label>
    <input type="text" data-bs-input class="form-control" id="provincia">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Regione</label>
    <input type="text" data-bs-input class="form-control" id="regione">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Password</label>
    <input type="password" data-bs-input class="form-control" id="password">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Ripeti Password</label>
    <input type="password" data-bs-input class="form-control" id="ripeti_password">
  </div>
</div>
<div>
   <center>
    <button id="invia" name="invia" type="submit">Invia</button>
     </center>
    </div>

    <?php
            include "connessione.php";



            if (isset($_POST["invia"])) {
                $codice_fiscale = $_POST["codice_fiscale"];
                $cognome = $_POST["cognome"];
                $nome = $_POST["nome"];
                
                $data_nascita = $_POST["data_nascita"];
                $residenza = $_POST["residenza"];
                $citta = $_POST["citta"];

                $provincia = $_POST["provincia"];
                $regione = $_POST["regione"];

                $password = $_POST["password"];
                $ripeti_password = $_POST["ripeti_password"];
                

                if($password == $ripeti_password){
                    $sql = "INSERT INTO Clienti (CodiceFiscale Cognome, Nome, DataNascita, Indirizzo, Citta, Provincia, Regione, Password, RipetiPassword) 
                    VALUES ('$codice_fiscale', '$cognome', '$nome', '$data_nascita', '$residenza', '$citta', '$provincia', '$regione', '$password', '$ripeti_password')";
                    
                    echo "Dati inseriti correttamente!";
                    $db_connection->query($sql);
                }else{
                    echo "Le due password non corrispondono";
                }
                $db_connection->close();
            }
            ?>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>