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
    <form action="#" method="POST">
        <div class="container">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="cognome" placeholder="Cognome">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" id="classe" placeholder="Classe">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="sezione" placeholder="Sezione">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="indirizzo" placeholder="Indirizzo">
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
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $classe = $_POST["classe"];
                $sezione = $_POST["sezione"];
                $indirizzo = $_POST["indirizzo"];

                $sql = "INSERT INTO studenti_10_11_2023 (nome, cognome, classe, sezione, indirizzo) VALUES ('$nome', '$cognome', '$classe', '$sezione', '$indirizzo')";

                $db_connection -> query("sql");


            }
            ?>
        </div>
    </form>


</body>

</html>