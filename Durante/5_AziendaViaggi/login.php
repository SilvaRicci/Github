
<!doctype html>
<html lang="en">
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
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
  <div class="form-group col-md-6"><br>
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div><br><br>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Login</button>
</form>
</div>

<?php
include "connessione.php";

    if (isset($_POST["submit_btn"])) {
        echo "1";
        $username = $db_connection->real_escape_string(stripslashes($_POST["username"]));
        $password = $db_connection->real_escape_string(stripslashes($_POST["password"]));
        $password = $_POST["password"];
        echo "2";
        $result = $db_connection->query("SELECT * FROM utenti WHERE username='$username'");
        $rows = $result->num_rows;
        echo $rows;
        if($rows > 0){
            echo "4";
            $row = $result->fetch_assoc();
            $psw = $row['password'];
            echo "5";
            if (password_verify($password, $psw)) {
                echo "Utente loggato con successo! Trasferimento in corso...";
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $psw;
            }else{
                echo "Password incorretta";
            }        
        }else{
            echo "Utente non trovato ";
        }
    $db_connection->close();
    }
?>
</center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>