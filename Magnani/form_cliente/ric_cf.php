<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ricerca per cf</title>
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
            min-width: 700px;
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

        .text-vis {
            font-size: 40px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            margin-bottom: 100px;
            text-align: center;
        }
    </style>

</head>

<body class="sfondo">
<form action="#" method="POST">    
    <div class="container">
        <div class="text-vis">
            Ricerca per CF
        </div>


        <div class=" w-25">
            <input type="text" class="form-control" id="ric_cf" name="ric_cf" placeholder="Codice fiscale da cercare">
        </div>

        <div class="mb-5">
            <button id="invia" name="invia" type="submit">Invia</button>
        </div>

        <div class="">
            <table class="table table-hover table-bordered rounded mb-0">
                <tr>
                    <th scope='row'>CF</th>
                    <td>Cognome</td>
                    <td>Nome</td>
                    <td>Data di nascita</td>
                    <td>Residenza</td>
                    <td>Città</td>
                    <td>Provincia</td>
                    <td>Regione</td>
                </tr>


                <?php
                include "connessione.php";

                if (isset($_POST["invia"])){
                    $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023");
                    $rows = $result->num_rows;

                    $ric_cf = $_POST["ric_cf"];

                    echo "cf: " . $ric_cf;

                    if ($rows > 0) {
                        //se ci sono righe $result $row è true e i valori della riga vanno dentro $row, altrimenti false e non fa il while
                        while ($row = $result->fetch_assoc()) {
                            
                            if ("$row[codice_fiscale]" == "$ric_cf") {
                                echo "<tr>
                                    <td><a href='visualizzazione_singolo.php?cfval=$row[codice_fiscale]' target='blank'>$row[codice_fiscale]</a></td>
                                    <td>$row[cognome]</td>
                                    <td>$row[nome]</td>

                                    <td>$row[data_nascita]</td>
                                    <td>$row[residenza]</td>
                                    <td>$row[citta]</td>

                                    <td>$row[provincia]</td>
                                    <td>$row[regione]</td>
                                ";
                            }

                        }
                    }
                    $result->close();
                    $db_connection->close();
                }



                ?>
            </table>
        </div>
    </div>
</form>
</body>

</html>