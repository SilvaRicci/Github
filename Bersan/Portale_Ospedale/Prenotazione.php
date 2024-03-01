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
                </ul>
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Benvenuto
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="AreaPersonale.php">Area Personale</a></li>
                        <li><a class="dropdown-item" href="Logout.php">Disconnetti</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <br>
    <div class="container border border-primary">
        <form action="#" method="POST">
            <div class="col">
                <div class="mb-3">
                    <select class="form-control" name="tipologia" id="tipologia">
                        <option value="0" selected>Seleziona</option>
                        <?php
                        include "Connessione.php";
                        $result = $db_connection->query("SELECT DISTINCT Id_Visita,Tipologia FROM visita");
                        $rows = $result->num_rows;
                        if ($rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row["Id_Visita"].'"> '.$row["Tipologia"].'</option>';
                               // echo $row["Id_Visita"];
                                
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="active" for="exampleInputTime">Codice Fiscale</label>
                <input type="text" class="form-control" id="CodFisc" name="CodFisc">
            </div>
            <div class="form-group">
                <label class="active" for="exampleInputTime">Giorno Visita</label>
                <input type="date" class="form-control" id="Giorno" name="Giorno">
            </div>
            <div class="form-group">
                <label class="active" for="timeStandard">Orario</label>
                <input class="form-control" id="Orario" name="Orario" type="time">
            </div>
            <center>
                <button type="submit" class="btn btn-primary" id="Inserisci" name="Inserisci">Inserisci</button>
            </center>
    </div>

    </form>
    </div>
    <?php
include "Connessione.php";

if (isset($_POST["Inserisci"])) {
    $codfisc = $_POST["CodFisc"];
    $Tipologia = $_POST["tipologia"];
    $giorno = $_POST["Giorno"];
    $orario = $_POST["Orario"];
    
    $inserimento = "INSERT INTO appuntamento (CodFisc, Id_Visita, Data, Orario) VALUES ('$codfisc', '$Tipologia', '$giorno', '$orario')";
    
    if ($db_connection->query($inserimento) === TRUE) {
        echo "Inserimento riuscito!";
    } else {
        echo "Errore durante l'inserimento: " . $db_connection->error;
    }
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>