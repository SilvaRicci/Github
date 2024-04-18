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
    <title>Homepage</title>
    <link rel="stylesheet" href="src/css/base.css">
    <link rel="stylesheet" href="src/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "navbar.html"; ?>

    <?php

    $query = "SELECT * FROM utente WHERE username_user='".$_SESSION['username']."'";
    
    $result = $db_connection->query($query);
    $rows = $result->num_rows;
    $row = $result->fetch_assoc();

    ?>

    <div class="container">
        <div class="row py-3">
                <div class="col-md-12">
                        <div class="card-sl">
                            <div class="card-heading">
                                <?php echo $row['username_user']; ?>
                            </div>
                            <a class="card-button" type="submit" id="logout" name="logout" href="logout.php">Logout</a>
                        </div>
                </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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