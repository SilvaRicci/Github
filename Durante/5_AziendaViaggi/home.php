<!doctype html>

<?php
    session_start();
    if(!isset($_SESSION['id'])){
      header("Location: login.php");
    }
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
            include "connessione.php";  

            $id_utente = $_SESSION['id'];
            
            $result = $db_connection->query("SELECT * FROM utenti WHERE id_utente = '$id_utente'");                      
            $rows = $result->num_rows;                                                                                                                         
            $row = $result->fetch_assoc();   

            if("$row[tipologia]"=="persona")
                echo "<h3> Caro"." $row[username]"." in questo sito potrai prenotare i tuoi migliori viaggi!</h3>";
            if("$row[tipologia]"=="organizzazione")
                echo "<h3> Caro"." $row[username]"." in questo sito potrai prenotare i migliori viaggi per la tua organizzazione!</h3>";
            if("$row[tipologia]"=="admin")
                echo "<h3> Caro"." $row[username]".". Gestisci il sito. </h3>";
        ?>
        <div class="container ml-5">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Username</th>
        </tr>
    </thead>
    <tbody>
  <?php                                  
        echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[nome]</th>";
        echo "<th scope=."."row".">". "$row[cognome] </th>";
        echo "<th scope=."."row".">". "$row[username] </th></tr>";
    ?>

    </center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>