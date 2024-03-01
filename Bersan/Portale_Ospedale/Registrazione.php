<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Portale Visite Mediche</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="HomePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Prenotazione.php">Prenotazione</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accesso
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Login.php">Login</a></li>
                            <li><a class="dropdown-item" href="Registrazione.php">Registrazione</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Form registrazione -->
    <div class="container border border-primary">
        <form action="#" method="POST">
            <div>
                <div class="form-group">
                    <label for="exampleInputText">Codice Fiscale</label>
                    <input type="text" class="form-control" id="Codfiscale" name="Codfiscale">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cognome</label>
                    <input type="text" class="form-control" id="Cognome" name="Cognome">
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber">Nome</label>
                    <input type="text" data-bs-input class="form-control" id="Nome" name="Nome">
                </div>
                <div class="form-group">
                    <label for="exampleInputTelephone">Indirizzo di residenza</label>
                    <input type="text" class="form-control" id="Indirizzo" name="Indirizzo">
                </div>
                <div class="form-group">
                    <label class="active" for="exampleInputTime">Comune di residenza</label>
                    <input type="text" class="form-control" id="Comune" name="Comune">
                </div>
                <div class="form-group">
                    <label class="active" for="exampleInputTime">Provincia di residenza</label>
                    <input type="text" class="form-control" id="Provincia" name="Provincia">
                </div>
                <div class="form-group">
                    <label class="active" for="exampleInputTime">Password</label>
                    <input type="password" class="form-control" id="Password" name="Password">
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary" id="Invio" name="Invio">Invio</button>
            </center>
        </form>
    </div>
    <?php
    
    include "Connessione.php"; //connessione al database    
    if (isset($_POST["Invio"])) { 

        $cf = $_POST["Codfiscale"];
        $cognome = $_POST["Cognome"];
        $nome = $_POST["Nome"];
        $indirizzo = $_POST["Indirizzo"];
        $comune = $_POST["Comune"];
        $provincia = $_POST["Provincia"];
        $password = password_hash($_POST["Password"], PASSWORD_DEFAULT);
        $inserimento = "INSERT INTO utenti (CodFisc,Cognome,Nome,Indirizzo,Comune,Provincia,Password) VALUES ('$cf','$cognome','$nome','$indirizzo','$comune','$provincia','$password')";
        $db_connection->query($inserimento);
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>