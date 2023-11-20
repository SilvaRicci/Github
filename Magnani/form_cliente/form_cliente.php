<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input in php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        .sfondo {
            background-color: #AFCBFF;
        }

        .container {
            width: 700px;
            margin-top: 100px;
            margin-bottom: 50px;
            padding: 20px;
            background-color: #0E1C36;
            border-radius: 10px;
            color: white;
        }

        .container button {
            border: none;
            border-radius: 5px;
            margin-top: 30px;
            background-color: white;
            padding: 6px;
            width: 60px;
        }

        .container button:hover {
            background-color: #AFCBFF;
        }

        .div-tabella {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>

<body class="sfondo">
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="codice_fiscale" name="codice_fiscale" placeholder="Codice fiscale">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <input type="date" class="form-control" id="data_nascita" name="data_nascita" placeholder="Data di nascita">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="residenza" name="residenza" placeholder="Indirizzo residenza">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="citta" name="citta" placeholder="Città">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="regione" name="regione" placeholder="Regione">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="ripeti_password" name="ripeti_password" placeholder="Ripeti password">
                </div>
            </div>

            <div>
                <center>
                    <button id="invia" name="invia" type="submit">Invia</button>
                </center>
            </div>


            <?php
            include "connessione.php";



            if (isset($_POST["invia"])) {
                $codice_fiscale = $_POST["codice_fiscale"];
                $cognome = $_POST["cognome"];
                $nome = $_POST["nome"];
                
                $data_nascita = $_POST["data_nascita"];
                $residenza = $_POST["residenza"];
                $citta = $_POST["citta"];

                $provincia = $_POST["provincia"];
                $regione = $_POST["regione"];

                $password = $_POST["password"];
                $ripeti_password = $_POST["ripeti password"];

                //echo "Dati inseriti";

                if($classe == 0){
                    echo"Errore, classe non inserita";
                }
                if($classe != 0){
                    
                    $sql = "INSERT INTO studenti_10_11_2023 (nome, cognome, classe, sezione, indirizzo) VALUES ('$nome', '$cognome', '$classe', '$sezione', '$indirizzo')";
                    $db_connection->query($sql);
                    //qualsiasi sia l'operazione sql deve essere lanciata, quindi $db_connection->...

                }

                

                $db_connection->close();
            }
            ?>
        </div>
    </form>


</body>

</html>