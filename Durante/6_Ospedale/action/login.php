
<!doctype html>
<html lang="en">

<?php
    include "../config/path.php";
    session_start();
    if(isset($_SESSION['id'])){
        header("Location: $HOME_PATH");
    }
?>

<?php

  //definizione metodo login
    function login(){
      include "../config/path.php";
      include $CONN_PATH;

      $CF = $db_connection->real_escape_string(stripslashes($_POST["CF"]));
      $password = $db_connection->real_escape_string(stripslashes($_POST["password"]));

      $result = $db_connection->query("SELECT * FROM utente WHERE CF='$CF'");
      $rows = $result->num_rows;

      if($rows > 0){

          $row = $result->fetch_assoc();
          $psw = $row['password'];

          if(password_verify($password,$psw)) {

              echo "Utente loggato con successo! Trasferimento in corso...";
              
              session_start();
              
              $_SESSION['CF'] = $row['CF'];

              $HOME_PATH = $HOME_PATH+"";//evitare avvertimento void to string

              header("Location: $HOME_PATH");
              
            }else{
                echo "Password incorretta";
            }        
          }else{
            echo "Utente non trovato";

          $resultAdmin = $db_connection->query("SELECT * FROM amministratore WHERE username='$CF'");
          $rowsAdmin = $resultAdmin->num_rows;
          $rowAdmin = $resultAdmin->fetch_assoc();

          if($password = "$rowAdmin[password]"){ //dopo inserire hash password
            //POPUP PER CODICE OTP

            $ADMIN_PATH = $ADMIN_PATH+"";//evitare errore void

            header("Location $ADMIN_PATH");
          }


        }
        $db_connection->close();
    }
  

?>


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Login</h1><br>       
    
<div class="container">
<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6"><br>
      <label for="CF">Codice Fiscale</label>
      <input type="text" class="form-control" id="CF" name="CF" placeholder="Codice Fiscale">
    </div>
  <div class="form-group col-md-6"><br>
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div><br><br>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Login</button><br><br>
  <p>Non sei registrato? <a href="signup.php">Registrati</a></p><br>
</form>
</div>

<?php

    if (isset($_POST["submit_btn"])) {
      login();
    }
?>


</center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>