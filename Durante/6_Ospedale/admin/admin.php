ciao

<?php
	
    include "../config/path.php";
    include $CONN_PATH;
    
    session_start();
    if(!isset($_SESSION['CF'])){
      header("Location: $LOGIN_PATH");
    }
    
    //query per ricerca persona

    $queryForCF = "SELECT * FROM utente WHERE 'CF' = '$CF'";
    $queryForCognome = "SELECT * FROM utente WHERE 'cognome' = '$cognome'";
    $queryForNome = "SELECT * FROM utente WHERE 'nome' = '$nome'";
    
    //indirizzo,comune,cap,provincia,range data nascita, genere


    //query per ricerca visita

    $queryForID = "SELECT * FROM utente WHERE 'id' = '$id'";
    $queryForCF = "SELECT * FROM utente WHERE 'CF_utente' = '$CF'";
    $queryForTipologia = "SELECT * FROM utente WHERE 'tipologia' = '$tipologia'";


	function searchUser($data,$type){
    	
    include "../config/path.php";
    include $CONN_PATH;
    	
    	
      
    	$resultSearch = $db_connection->query();
    
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

<?php 
  if(isset($_POST['submit'])){

  }
?>