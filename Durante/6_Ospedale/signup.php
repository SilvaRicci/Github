

<!doctype html>
    <html lang="en">
    <?php
        session_start();
        if(isset($_SESSION['id'])){
            header("Location: home.php");
        }
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Durante</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style = "background-color:white">
        <center><br><br><h1>Registrazione utente</h1><br>       
        
    <div class="container col-md-9">

    <form action="#" method="POST">

        <div class="form-group col-md-3"><br>
            <label for="codiceFiscale">Codice fiscale</label>
            <input type="text" class="form-control" id="codiceFiscale" name="codiceFiscale" placeholder="Codice fiscale">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="cognome">Cognome</label>
            <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="indirizzo">Indirizzo</label>
            <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Indirizzo">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="comune">Comune</label>
            <input type="text" class="form-control" id="comune" name="comune" placeholder="Comune">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="cap">CAP</label>
            <input type="text" class="form-control" id="cap" name="cap" placeholder="CAP">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="dataNascita">Data nascita</label>
            <input type="date" class="form-control" id="dataNascita" name="dataNascita" placeholder="Data Nascita">
        </div>
        <div class="form-group col-md-3"><br>
            <label for="genere">Genere</label>
            <select id="genere" name="genere" class="form-control">
                <option selected value="-1">Scegli il genere</option>;
                <option value="Uomo">Uomo</option>;
                <option value="Donna">Donna</option>;
                <option value="Donna">Donna</option>;
                <option value="Donna">Donna</option>;
            </select>
        </div>
        <div class="form-group col-md-3"><br>
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        

        <br><br>

        <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Registrati</button><br><br>
        <p>Gia' registrato? <a href="login.php">Login</a></p>
        <br>
        
    </form>

    </div>
    <?php
        include "connessione.php";
        if(isset($_POST["submit_btn"])){
            
            $nome = $_POST["nome"]; 
            $cognome = $_POST["cognome"];
            $password = password_hash($db_connection->real_escape_string(stripslashes($_POST["password"])),PASSWORD_DEFAULT);
            $username = $_POST["username"];
            $tipologia = $_POST["tipologia"];




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
            if($password==""){
            $isOk=false;
            echo "Password non inserita <br />";
            }
            if($username==""){
                $isOk=false;
                echo "Username non inserito <br />";
            }
            if($tipologia=="-1"){
                $isOk=false;
                echo "Tipologia non inserita <br />";
            }

            if($isOk){
                $ok=$db_connection->query("INSERT INTO utenti (nome,cognome,password,username,tipologia) VALUES ('$nome','$cognome','$password','$username','$tipologia')");
                
                echo "Inserimento dei dati nella tabella: 100% completato.";
                
                header("Location: login.php");
            }
            
            $db_connection->close();        
                                                                             
        }
        ?>
    </center>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>