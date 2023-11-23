<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ricerca per città, provincia, regione</title>
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
                Ricerca per Città, Provincia, Regione
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="citta" name="citta" placeholder="Città">
                </div>
                <!--Provincia-->
                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="provincia">
                        <option value="0" selected disabled>Seleziona provincia</option>
                        <?php
                        include "connessione.php";
                        $pro = $db_connection->query("SELECT DISTINCT provincia FROM clienti_20_11_2023");
                        $rows_pro = $pro->num_rows;

                        if ($rows_pro > 0) {
                            while ($row_pro = $pro->fetch_assoc()) {
                                echo "<option value='$row_pro[provincia]'>$row_pro[provincia]</option>";
                            }
                        }
                        $pro->close();
                        ?>
                    </select>

                </div>
                <!--Regione-->
                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="regione">
                        <option value="0" selected disabled>Seleziona regione</option>
                        <?php
                        include "connessione.php";
                        $reg = $db_connection->query("SELECT DISTINCT regione FROM clienti_20_11_2023");
                        $rows_reg = $reg->num_rows;

                        if ($rows_reg > 0) {
                            while ($row_reg = $reg->fetch_assoc()) {
                                echo "<option value='$row_reg[regione]'>$row_reg[regione]</option>";
                            }
                        }
                        $reg->close();
                        ?>
                    </select>

                </div>
            </div>


            <div class="mb-5">
                <center>
                    <button id="invia" name="invia" type="submit">Invia</button>
                </center>
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

                    if (isset($_POST["invia"])) {


                        $citta = $_POST["citta"];
                        $provincia = $_POST["provincia"];
                        $regione = $_POST["regione"];

                        echo "---Città: " . $citta;
                        echo "---Provincia: " . $provincia;
                        echo "---Regione: " . $regione;

                        $tfcitta = true;
                        $tfprovincia = true;
                        $tfregione = true;

                        if ($regione == 0) {
                            $tfregione = false;
                        }
                        if ($provincia == 0) {
                            $tfprovincia = false;
                        }
                        if ($citta == "") {
                            $tfcitta = false;
                        }


                        // errore
                        if (!$tfcitta && !$tfprovincia && !$tfregione) {
                            echo "Inserire almeno un dato";
                        }


                        // tutte inserite
                        if ($tfcitta && $tfprovincia && $tfregione) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (citta='$citta' && provincia='$provincia' && regione='$regione')");
                            $rows = $result->num_rows;
                        }


                        // solo 2 inserite
                        if ($tfcitta && $tfprovincia) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (citta='$citta' && provincia='$provincia')");
                            $rows = $result->num_rows;
                        }

                        if ($tfcitta && $tfregione) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (citta='$citta' && regione='$regione')");
                            $rows = $result->num_rows;
                        }

                        if ($tfregione && $tfprovincia) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (regione='$regione' && provincia='$provincia')");
                            $rows = $result->num_rows;
                        }


                        // solo 1 inserita
                        if ($tfcitta) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (citta='$citta')");
                            $rows = $result->num_rows;
                        }

                        if ($tfprovincia) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (provincia='$provincia')");
                            $rows = $result->num_rows;
                        }

                        if ($tfregione) {
                            $result = $db_connection->query("SELECT codice_fiscale, cognome, nome, data_nascita, residenza, citta, provincia, regione, password, ripeti_password FROM clienti_20_11_2023 WHERE (regione='$regione')");
                            $rows = $result->num_rows;
                        }





                        if ($rows > 0) {
                            while ($row = $result->fetch_assoc()) {
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
                        }else{
                            echo "Errore";
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