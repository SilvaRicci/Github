<!doctype html>

<?php
    include "config/connessione.php"; 
    session_start();
    if(!isset($_SESSION['CF'])){
      header("Location: login.php");
    }

    //recupero id utente con conseguente record dal database
    $CF = $_SESSION['CF'];
            
    $result = $db_connection->query("SELECT * FROM utente WHERE CF = '$CF'");                      
    $rows = $result->num_rows;                                                                                                                         
    $row = $result->fetch_assoc();   
?>

<?php
/*
  function adminPanel(){
      include "connessione.php"; 
      $resultAdmin = $db_connection->query("SELECT * FROM utente");                      
      $rowsAdmin = $resultAdmin->num_rows;

      echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">Codice fiscale</th>
            <th scope="col">Cognome</th>
            <th scope="col">Nome</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Comune</th>
            <th scope="col">CAP</th>
            <th scope="col">Data di nascita</th>
            <th scope="col">Genere</th>
            <th scope="col">Password</th>
            <th scope="col">T</th> 
            </tr>
        </thead>
        <tbody>';

      while($rowAdmin = $resultAdmin->fetch_assoc()){
        echo "<tr> <th scope=."."row"."class="."secondary".">". "$rowAdmin[CF]</th>";
        echo "<th scope=."."row".">". "$rowAdmin[cognome] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[nome] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[indirizzo] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[comune] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[CAP] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[provincia] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[dataNascita] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[genere] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[password] </th>";
        echo "<th> <form action='deleteUser.php'> <button type='submit' id='deleteUser_btn' name='deleteUser_btn' value='$rowAdmin[CF]' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button> </form> </th> </tr>";
      }
  }
*/
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Hub sito web</h1><br>    
    <?php 
            

        ?>
        
        <div class="container ml-5">
    
  <?php       
        //visualizzazione base pagina per normali utenti
        echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">CF</th>
            <th scope="col">Cognome</th>
            <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>';

        echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[CF]</th>";
        echo "<th scope=."."row".">". "$row[cognome] </th>";
        echo "<th scope=."."row".">". "$row[nome] </th></tr>";
    ?>
        <form action="logout.php">
          <button type="submit" id="logout_btn" name="logout_btn" class="btn btn-primary">Logout</button>
        </form>

    </center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>