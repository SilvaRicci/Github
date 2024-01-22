ciao

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