<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina principale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="display-2">Prodotti</h1>

    <div class="container"><br>
        <div class="row">
            <?php
            include "Connessione.php";
            $result = $db_connection->query("SELECT Id_prodotto,Nome,Prezzo FROM prodotto");
            $rows = $result->num_rows;

            if ($rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo
                    '
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["Nome"] . '</h5>

                            <div class="input-group">
                                <span class="input-group-text">€</span>
                                <span class="input-group-text">' . $row["Prezzo"] . '</span>
                            </div>

                            <br>

                            <div class="input">     
                            <label for="quantita">Quantita</label>
                                <input type="number" class="form-control" id="quantita" name="quantita">
                            </div>

                            <br>
                            <input type="hidden" name="id" id="id" value=' . $row["Id_prodotto"] . ' readonly>
                            
                            <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Aggiungi al carrello</button>
                        </div>
                    </div>
                </div>
                ';
                }
            }
            ?>

            <button type="submit" class="btn btn-warning">Carrello</button> <?php 
            
            session_start();
            $_SESSION["Id_prodotto"];
            
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>