<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Hub persona</h1><br>    
        <h3> Caro utente in questo sito potrai prenotare i tuoi migliori viaggi!</h3>
        <div class="container ml-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Cognome</th>
      <th scope="col">Nome</th>
      <th scope="col">Data di nascita</th>
      <th scope="col">Indirizzo di residenza</th>
      <th scope="col">Città</th>
      <th scope="col">Provincia</th>
      <th scope="col">Regione</th>
      <th scope="col">Password</th>
      <th scope="col">Ripeti password</th>
    </tr>
  </thead>
  <tbody>
  <?php

        include "connessione.php";                                                                      

        $result = $db_connection->query("SELECT codiceFiscale,cognome,nome,dataNascita,indirizzoResidenza,citta,provincia,regione,password1,ripetiPassword FROM Cliente");                      
        $rows = $result->num_rows;                                                                                                                         

        if($rows > 0){  
        
            while($row = $result->fetch_assoc()){                                                       
                echo "<tr> <th scope=."."row"."class="."secondary".">"."<a href="."oneElement.php?val=$row[codiceFiscale]".">". "$row[codiceFiscale] </a> </th>";
                echo "<th scope=."."row".">". "$row[cognome] </th>";
                echo "<th scope=."."row".">". "$row[nome] </th>";
                echo "<th scope=."."row".">". "$row[dataNascita] </th>";
                echo "<th scope=."."row".">". "$row[indirizzoResidenza] </th>";
                echo "<th scope=."."row".">". "$row[citta] </th>";
                echo "<th scope=."."row".">". "$row[provincia] </th>";
                echo "<th scope=."."row".">". "$row[regione] </th>";
                echo "<th scope=."."row".">". "$row[password1] </th>";
                echo "<th scope=."."row".">". "$row[ripetiPassword] </th></tr>";                             
            }
        }  
        <a class="btn btn-primary" role="button" href="registrazione.php"> Registrazione cliente </a> <br><br>
        <a class="btn btn-primary" role="button"  href="visualizzazione.php"> Visualizzazione clienti registrati </a> <br><br>
        <a class="btn btn-primary" role="button"  href="login.php"> Login</a> <br><br>
        <a class="btn btn-primary" role="button"  href="ricercaSimple.php"> Ricerca semplice</a> <br><br>
        <a class="btn btn-primary" role="button"  href="ricercaAdvanced.php"> Ricerca avanzata</a> <br><br>
    </center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>