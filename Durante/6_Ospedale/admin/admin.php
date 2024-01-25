ciao

<?php
	
    include "../config/path.php";
    include $CONN_PATH;
    
    session_start();
    if(!isset($_SESSION['CF'])){
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
        $query = $queryVForID;
        break;
      }
      case 1:{
        $query = $queryVForCF;
        break;
      }
      case 2:{
        $query = $queryVForTipologia;
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


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Hub azienda viaggi</h1><br>      
      <form action="#" method="POST">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Logfsin</button><br><br>
      
</form>
        <a class="btn btn-primary" role="button"  href="action/login.php"> Login  </a> <br><br>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


<?php 
  if(isset($_POST["submit"])){
    searchUser();
  }
?>