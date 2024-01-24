ciao

<?php
	
    include "../config/path.php";
    include $CONN_PATH;
    
    session_start();
    if(!isset($_SESSION['CF'])){
      header("Location: $LOGIN_PATH");
    }
    
    //query per ricerca persona

    $queryUForCF = "SELECT * FROM utente WHERE 'CF' = '$CF'";
    $queryUForCognome = "SELECT * FROM utente WHERE 'cognome' = '$cognome'";
    $queryUForNome = "SELECT * FROM utente WHERE 'nome' = '$nome'";
    
    //indirizzo,comune,cap,provincia,range data nascita, genere


    //query per ricerca visita

    $queryVForID = "SELECT * FROM utente WHERE 'id' = '$id'";
    $queryVForCF = "SELECT * FROM utente WHERE 'CF_utente' = '$CF'";
    $queryVForTipologia = "SELECT * FROM utente WHERE 'tipologia' = '$tipologia'";


	function searchUser(){
    	
    include "../config/path.php";
    include $CONN_PATH;
    
    $data = $_POST['inputData'];
    $type = $_POST['type'];

    $query = "";
    
    switch($type){
      case 0:{
        $query = $queryUForCF;
        break;
      }
      case 1:{
        $query = $queryUForCognome;
        break;
      }
      case 2:{
        $query = $queryUForNome;
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

    $query = "";
    
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
    $rows = $data->num_rows();

    if($rows<0){
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

    while($row = $data->fetch_assoc()){
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

<?php 
  if(isset($_POST['submit'])){

  }
?>