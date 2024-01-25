<?php
	
    include "../config/path.php";
    include $CONN_PATH;
    
    session_start();
    if(!isset($_SESSION['username'])){
      header("Location: $LOGIN_PATH");
    }
  

	function searchUser(){

    include "../config/path.php";
    include $CONN_PATH;
    
    $data = $_POST['inputData'];
    $type = $_POST['type'];

    $data = "DRMD5345JFJH3446";
    $type = 0;
    
    switch($type){
      case 0:{
        $query = "SELECT * FROM utente WHERE CF = '$data'";
        break;
      }
      case 1:{
        $query = "SELECT * FROM utente WHERE cognome = '$data'";
        break;
      }
      case 2:{
        $query = "SELECT * FROM utente WHERE nome = '$data'";
        break;
      }
    }

    $resultSearch = $db_connection->query($query);

    printTable($resultSearch);

    $resultSearch->close();
    $db_connection->close();

  }
  function searchVisita(){
    	
    include "../config/path.php";
    include $CONN_PATH;
    
    $data = $_POST['inputData'];
    $type = $_POST['type'];
    
    switch($type){
      case 0:{
        $query = "SELECT * FROM utente WHERE id = '$data'";
        break;
      }
      case 1:{
        $query = "SELECT * FROM utente WHERE CF_utente = '$data'";
        break;
      }
      case 2:{
        $query = "SELECT * FROM utente WHERE tipologia = '$data'";
        break;
      }
    }
    
    $resultSearch = $db_connection->query($query);
    
    printTable($resultSearch);

    $resultSearch->close();
    $db_connection->close();

  }

  function printTable($data){

    $rows = $data->num_rows;

    if($rows<=0){
      echo "Temporaneo, nessun risultato trovato";
      return;
    }

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
        $row = $data->fetch_assoc();
    //while($row = $data->fetch_assoc()){

      echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[CF]</th>";
        echo "<th scope=."."row".">". "$row[cognome] </th>";
        echo "<th scope=."."row".">". "$row[nome] </th>";
        echo "<th scope=."."row".">". "$row[indirizzo] </th>";
        echo "<th scope=."."row".">". "$row[comune] </th>";
        echo "<th scope=."."row".">". "$row[CAP] </th>";
        echo "<th scope=."."row".">". "$row[provincia] </th>";
        echo "<th scope=."."row".">". "$row[dataNascita] </th>";
        echo "<th scope=."."row".">". "$row[genere] </th>";
        echo "<th scope=."."row".">". "$row[password] </th>";
        echo "<th> <form action='deleteUser.php'> <button type='submit' id='deleteUser_btn' name='deleteUser_btn' value='$row[CF]' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button> </form> </th> </tr>";
    //}

  }

  


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

      while($row = $resultAdmin->fetch_assoc()){
        echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[CF]</th>";
        echo "<th scope=."."row".">". "$row[cognome] </th>";
        echo "<th scope=."."row".">". "$row[nome] </th>";
        echo "<th scope=."."row".">". "$row[indirizzo] </th>";
        echo "<th scope=."."row".">". "$row[comune] </th>";
        echo "<th scope=."."row".">". "$row[CAP] </th>";
        echo "<th scope=."."row".">". "$row[provincia] </th>";
        echo "<th scope=."."row".">". "$row[dataNascita] </th>";
        echo "<th scope=."."row".">". "$row[genere] </th>";
        echo "<th scope=."."row".">". "$row[password] </th>";
        echo "<th> <form action='deleteUser.php'> <button type='submit' id='deleteUser_btn' name='deleteUser_btn' value='$row[CF]' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button> </form> </th> </tr>";
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

  <!-- Inizio navbar -->
  <nav class="navbar navbar-dark navbar-expand-lg bg-danger">
    
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

      <div class="row">
        <ul class="navbar-nav mr-auto">
        
        <!-- 1# button -> Torna a home.php -->
        <li class="nav-item active nav-underline px-5 pt-3">
            <a class="nav-link active nav-underline" href="<?php echo"$ADMIN_PATH"?>">Home <span class="sr-only"></span></a>
          </li>

        <!-- 2# button -> Vai a index.php -->
          <li class="nav-item px-5 pt-3">
            <a class="nav-link" href="<?php echo"$AUTENTI_PATH"?>">Utenti <span class="sr-only"></span></a>
          </li>

          <!-- Torna a home.php -->
          <a class="navbar-brand px-5" href="<?php echo"$ADMIN_PATH"?>">
            <img src="<?php echo"$ALOGO_PATH"?>" alt="Logo" width="50" height="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- 3# button -> Vai a visite.php -->
          <li class="nav-item px-5 pt-3">
            <a class="nav-link" href="<?php echo"$AVISITE_PATH"?>">Visite</a>
          </li>
          
          <!-- 4# button -> Vai a profilo.php/logout.php -->
          <li class="nav-item dropdown px-5 pt-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profilo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo"$APROFILE_PATH"?>">Visualizza</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo"$LOGOUT_PATH"?>">Logout</a></li>
              
            </ul>
          </li>       
        </ul>

      </div>
    </div>
  </nav>
  <!-- Fine navbar -->

  <?php 
    if(isset($_POST["submit"])){
      searchUser();
    }
  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


