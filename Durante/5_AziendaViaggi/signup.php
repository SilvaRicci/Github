

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

        <div class="form-group col-md-3"><br>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="cognome">Cognome</label>
            <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="cittaNascita">Citt&agrave; di Nascita</label>
            <input type="text" class="form-control" id="cittaNascita" name="cittaNascita" placeholder="Citt&agrave; di Nascita">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="cittaResidenza">Citt&agrave; di Residenza</label>
            <input type="text" class="form-control" id="cittaResidenza" name="cittaResidenza" placeholder="Citt&agrave; di Residenza">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="via">Via</label>
            <input type="text" class="form-control" id="via" name="via" placeholder="Via">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="civico">Civico</label>
            <input type="number" class="form-control" id="civico" name="civico" placeholder="Civico">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="cap">CAP</label>
            <input type="text" class="form-control" id="cap" name="cap" placeholder="CAP">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="codiceFiscale">Codice Fiscale</label>
            <input type="text" class="form-control" id="codiceFiscale" name="codiceFiscale" placeholder="Codice Fiscale">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        Nome: <input type="text" name="nome"><br>
        Cognome: <input type="text" name="cognome"><br> Data di Nascita <input type="date" name="nascita"><br>
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