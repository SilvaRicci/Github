

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Durante</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style = "background-color:white">
        <center><br><br><h1>Registrazione Cliente</h1><br>       
        
    <div class="container col-md-3">

    <form action="registra.php " method="post">

        Nome: <input type="text" name="nome"><br>
        Cognome: <input type="text" name="cognome"><br> Data di Nascita cinput type="date" name="nascita"><br>
        Citt&agrave; di Nascita: <input type="text" name="cittanascita"><br>
        Citt&agrave; di Residenza: <input type="text" name="citta"><br>
        Via: <input type="text" name="via"><br>
        Civico: <input type="number" name="civico"><br>
        CAP: <input type="text" name="cap"><br>
        Codice Fiscale <input type="text" name="cf"><br>
        Telefono: <input type="text" name="telefono"><br>
        Username: <input type="text" name="username"><br>
        Email: <input type="text" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Registra">
        
    </form>

    </div>
    <?php
        include "connessione.php";  
        if(isset($_POST["submit_btn"])){
            
            $codiceFiscale = $_POST["codiceFiscale"];
            $cognome = $_POST["cognome"];
            $nome = $_POST["nome"];
            $dataNascita = $_POST["dataNascita"];

            $isOk=true;
            
            if($cognome==""){
            $isOk=false;
            echo "Cognome non inserito <br />";
            }
            if($nome==""){
            $isOk=false;
            echo "Nome non inserito <br />";
            }
            if($dataNascita==""){
            $isOk=false;
            echo "Data di nascita non inserita <br />";
            }

            if($isOk){
            $ok=$db_connection->query("INSERT INTO utente (CodFisc,Nome,Cognome,AnnoDiNascita) VALUES ('$codiceFiscale','$nome','$cognome','$dataNascita')");
            if($ok==TRUE){
                echo "Inserimento dei dati nella tabella: 100% completato.";
            }else{
                die("Errore: " . $db_connection->connect_error);  
            }
            $db_connection->close();        
            }                                                                     
        }
        ?>
    </center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>