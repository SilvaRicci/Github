<?php
//faccio partire la sessione, se esiste già porto l'utente a welcome.php (per riloggarsi deve prima fare il logout)
session_start();
if(isset($_SESSION['username'])){
    header("Location: welcome.php");
}
include "connessione.php";


//INSERITO ULTERIORE UTENTE usr: test psw: test

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" id="login" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Bootstrap JS bundle (popper.js and bootstrap.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
    if(isset($_POST["login"])){

        //per evitare sql injection
        $username = $db_connection->real_escape_string(stripslashes($_POST["username"]));
        $password = $db_connection->real_escape_string(stripslashes($_POST["password"]));

        //selezione solo l'hash della password dal db
        $query = "SELECT password FROM utente WHERE username='$username'";

        $result = $db_connection->query($query);
        $rows = $result->num_rows;
  
        //se esiste un utente allora
        if($rows > 0){

            $row = $result->fetch_assoc();
            $hashPsw = $row['password'];

            //uso della funzione per verificare che $password (in chiaro) sia uguale all'hash della password nel database ($hashPsw)
            if(password_verify($password,$hashPsw)){
                //login verificato con successo
                echo "Utente loggato con successo! Trasferimento in corso...";

                //prima session (mantiene l'accesso per l'utente)
                $_SESSION['username']=$username;

                //seconda session (per admin)
                $time = date('Y-m-d H:i:s');
                //array di utenti con sessione attiva
                $_SESSION['onlineUsers'] = array();
                $_SESSION['onlineUsers'][] = array(
                    'username'=>$username,
                    'time' => $time
                    );

                //riporta alla pagine welcome.php
                header("Location: welcome.php");

                //errori in caso utente o password siano errati (uguali per non dare la possibilità ad hacker di capire quali delle due siano sbagliati)
            }else{
                echo "Utente non trovato o password errata!";
            }
        }else{
            echo "Utente non trovato o password errata!";
        }

    }

?>