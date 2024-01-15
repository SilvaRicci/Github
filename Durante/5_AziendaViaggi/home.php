<!doctype html>

<?php
    include "connessione.php"; 
    session_start();
    if(!isset($_SESSION['id'])){
      header("Location: login.php");
    }
?>

<?php
  function adminPanel(){
      include "connessione.php"; 
      $resultAdmin = $db_connection->query("SELECT * FROM utenti");                      
      $rowsAdmin = $resultAdmin->num_rows;

      echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Password</th>
            <th scope="col">Username</th>
            <th scope="col">Tipologia</th>
            <th scope="col">T</th> 
            </tr>
        </thead>
        <tbody>';

      while($rowAdmin = $resultAdmin->fetch_assoc()){
        echo "<tr> <th scope=."."row"."class="."secondary".">". "$rowAdmin[id_utente]</th>";
        echo "<th scope=."."row".">". "$rowAdmin[nome] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[cognome] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[password] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[username] </th>";
        echo "<th scope=."."row".">". "$rowAdmin[tipologia] </th>";
        echo "<th> <form action='deleteUser.php'> <button type='submit' id='deleteUser_btn' name='deleteUser_btn' value='$rowAdmin[id_utente]' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button> </form> </th> </tr>";
      }
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
            //recupero id utente con conseguente record dal database
            $id_utente = $_SESSION['id'];
            
            $result = $db_connection->query("SELECT * FROM utenti WHERE id_utente = '$id_utente'");                      
            $rows = $result->num_rows;                                                                                                                         
            $row = $result->fetch_assoc();   
            //vari title a seconda della tipologia e dell'username
            if("$row[tipologia]"=="persona")
                echo "<h3> Caro"." $row[username]"." in questo sito potrai prenotare i tuoi migliori viaggi!</h3>";
            if("$row[tipologia]"=="organizzazione")
                echo "<h3> Caro"." $row[username]"." in questo sito potrai prenotare i migliori viaggi per la tua organizzazione!</h3>";
            if("$row[tipologia]"=="admin")
                echo "<h3> Caro"." $row[username]".". Gestisci il sito. </h3>";
        ?>
        <div class="container ml-5">
    
  <?php       
        if("$row[tipologia]"=="persona" || "$row[tipologia]"=="organizzazione"){
          //visualizzazione base pagina per normali utenti
          echo '<table class="table">
          <thead>
              <tr>
              <th scope="col">Nome</th>
              <th scope="col">Cognome</th>
              <th scope="col">Username</th>
              </tr>
          </thead>
          <tbody>';

          echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[nome]</th>";
          echo "<th scope=."."row".">". "$row[cognome] </th>";
          echo "<th scope=."."row".">". "$row[username] </th></tr>";

        }elseif("$row[tipologia]"=="admin"){
            //apertura pannello di controllo dell'admin
            adminPanel();
        }
    ?>
        <form action="logout.php">
          <button type="submit" id="logout_btn" name="logout_btn" class="btn btn-primary">Logout</button>
        </form>

    </center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>