<?php
session_start();
include "connessione.php";
include "src.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "style.html"; ?>
    <title>Admin</title>
    <link rel="stylesheet" href="src/css/base.css">
    <link rel="stylesheet" href="src/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "navbar.html"; ?>
    <h3> Aggiungi un prodotto </h3>

    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="#">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Nome</span>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome prodotto" aria-label="Nome" aria-describedby="addon-wrapping">
                    </div>
                    <div class="mb-3">
                        <label for="descrizione" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="descrizione" name="descrizione" rows="3"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">€</span>
                        <span class="input-group-text">0.00</span>
                        <input type="text" class="form-control" name="pvu" id="pvu" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                    <div class="mb-3">
                        <label for="immagine" class="form-label">Immagine</label>
                        <input class="form-control" type="file" id="immagine" name="immagine">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['addToCart_btn'])) {
        $id = $_POST["id"];
        $quantita = $_POST['quantita'];

        if ($quantita <= 0) {
            alert("Quantità non valida!");
        } else {
            $magazzino = aggiungiAlCarrello($id, $quantita);
            if ($magazzino == 1) {
                alert("Prodotto aggiunto con successo al carrello!");
            } else {
                alert("Impossibile aggiungere al carrello. Quantità in magazzino: " . $magazzino);
            }
        }
    }

    if (isset($_POST['buyNow_btn'])) {
        $id = $_POST["id"];
        $quantita = $_POST['quantita'];

        if ($quantita <= 0) {
            alert("Quantità non valida!");
        } else {
            echo '<script>  window.location.href = "acquista.php?id=' . $id . '&quantita=' . $quantita . '"; </script>';
        }
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <?php include "footer.html"; ?>
</body>

</html>