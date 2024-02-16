
<?php
    include "../config/path.php";
    session_start();
    if(isset($_SESSION['CF'])){
        header("Location: $HOME_PATH");
    }
    if(isset($_SESSION['username'])){
      header("Location: $ADMIN_PATH");
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
              //$HOME_PATH = $HOME_PATH+"";

              if($_POST["ricordami"]){
                itsCookieTime($CF,$password);
              }

              echo '<script>  window.location.href = "'.$HOME_PATH.'"; </script>';
              
            }else{
                echo "Password incorretta";
            }        
          }else{
            echo "Utente non trovato";
            loginAdmin();
          }
        $db_connection->close();
    }

    function loginAdmin(){
      
      include "../config/path.php";
      include $CONN_PATH;

      $CF = $db_connection->real_escape_string(stripslashes($_POST["CF"]));
      $password = $db_connection->real_escape_string(stripslashes($_POST["password"]));

      $resultAdmin = $db_connection->query("SELECT * FROM amministratore WHERE username='$CF'");
      $rowsAdmin = $resultAdmin->num_rows;

      if($rowsAdmin > 0){

        $rowAdmin = $resultAdmin->fetch_assoc();

        if("$password" == "$rowAdmin[password]"){ //dopo inserire hash password

          //echo("<script type='text/javascript'> var OTP = prompt('"."Inserisci la tua OTP"."');</script>");
          //$OTP = "<script type='text/javascript'> document.writeln(OTP);  </script>";


          //if("$OTP" == "$rowAdmin[OTP]"){
            
            echo "Amministratore loggato con successo! Trasferimento in corso...";

            session_start();
  
            $_SESSION['username'] = $CF;
            //$ADMIN_PATH = $ADMIN_PATH+"";

            if($_POST["ricordami"]){
              itsCookieTime($CF,$password);
            }

            echo '<script>  window.location.href = "'.$ADMIN_PATH.'"; </script>';
          //}
        }
      }
    }

    function itsCookieTime($CF, $psw){
      $cookie_name = "codiceFiscale";
      $cookie_value = $CF;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 86400 = 1 day
      $cookie_name = "password";
      $cookie_value = $psw;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 86400 = 1 day
    }
  

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
    <center><br><br><h1>Login</h1><br>       
    
<div class="container">
<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6"><br>

      <label for="CF">Codice Fiscale</label>
      <input type="text" class="form-control" id="CF" name="CF" placeholder="Codice Fiscale" value="<?php echo $_COOKIE["codiceFiscale"]; ?>">
    </div>
  <div class="form-group col-md-6"><br>
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $_COOKIE["password"]; ?>">
    </div><br><br>
  </div>
  
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="ricordami" name="ricordami">
    <label class="form-check-label" for="ricordami">Ricordami</label>
  </div>

  <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Login</button><br><br>
  <p>Non sei registrato? <a href="signup.php">Registrati</a></p><br>
</form>
</div>
</center>



<?php

    if(isset($_POST["submit_btn"])){  
      login();
    }
?>




    <script>
      
      <

if (person != null) {
  document.getElementById("demo").innerHTML =
  "Hello " + person + "! How are you today?";
}
    
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>