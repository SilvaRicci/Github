<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione utente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-sm my-5">

        <div class="row align-items-center my-5">
            
            <form method="post">

                <!--user-->
                <div class="form-group my-3">
                <label for="user">Indirizzo email</label>
                <input type="text" class="form-control" name="user" id="user">
                </div>
            
                
                <!--Password-->
                <div class="form-group my-3">
                <label for="password">Password </label>
                <input type="password" class="form-control" name="password" id="password">
                </div>
                <input type="submit" value="invia" name="invia" id="invia" class="btn btn-primary my-3">
            
                </form>
     </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include("connessione.php");
 if(isset($_POST["invia"]))
 {
    $user = $_POST["user"];
    $password = $_POST["password"];
    
    $result = mysqli_query($db_connection, "SELECT * FROM utente WHERE username='$user'");
     if($result) {
            //Se non trovo alcun risultato, significa che è un nuovo utente e può essere accettata 
            //la registrazione
            if(mysqli_num_rows($result)==0) {
                //Cifro la password con il metodo password_hash
                //primo parametro la password inserita nel form
                //secondo parametro quello indicato per il metodo di cifratura (utilizza bcrypt per cifrare)
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $result = mysqli_query($db_connection, "INSERT INTO utente(username,password) 
                VALUES ('$user','$hash')");
                
                if($result) {
                    echo "<p>Successo: Registrazione avvenuta con successo</p>";
                } else {
                    echo "<p>Errore: ".mysqli_error($db_connection)."</p>";
                }
            } else {
                echo "<p>Errore: Utente gia' registrato!</p>";
            }
        } else {
            echo "<p>Errore: ".mysqli_error($db_connection)."</p>";
        }

      }
    
    ?>