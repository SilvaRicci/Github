<?php
    session_start();
    include "connessione.php";
    include "src.php";

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
      }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-image: url('src/img/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
    <title>E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar fonte: https://mdbootstrap.com/how-to/bootstrap/navbar-transparent/ -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Brand</a>

            <!-- Toggle button -->
            <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Offerte speciali</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Affari del giorno</a>
                </li>
            </ul>
            <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
            <!-- Collapsible wrapper2 -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="carrello.php">
                        <img src="src/img/cart.png" alt="Carrello" height="40px" width="50px">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="logout.php">
                        <img src="src/img/account.png" alt="Account" height="45px" width="45px">
                    </a>
                </li>
            </ul>
            <!-- Left links -->
            </div>
            <!-- Collapsible wrapper2 -->
        </nav>
        <!-- Navbar -->

    <?php 
    
        $query = "SELECT prodotto.id_prodotto,nome_prodotto,pvu_prodotto,img FROM prodotto LEFT JOIN immagini ON immagini.id_prodotto=prodotto.id_prodotto";
        //$query = "SELECT id_prodotto,nome_prodotto,pvu_prodotto FROM prodotto";

        $result = $db_connection->query($query);                      
        $rows = $result->num_rows;  
           
        ?>

    <div class="container">
        <div class="row py-3">
            <?php foreach($result as $item):?>
                <div class="col-3">
                        <form action="#" method="POST">
                            <div class="card border-primary mb-3 text-center" style="width: 19rem;height: 575px;">
                                <img src="<?php echo $item['img']; ?>" class="card-img-top" alt="<?php echo $item['nome_prodotto']; ?> bello/a" style="width: 275px;height: 300px"> <!-- DA RIVEDERE LA LARGHEZZA E ALTEZZA DELLE IMMAGINI-->
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['nome_prodotto']; ?></h5>

                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-text">Quantità</span>
                                        <input type="number" class="form-control" id="quantita" name="quantita">
                                    </div>

                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-text">€</span>
                                        <span class="input-group-text"><?php echo $item['pvu_prodotto']; ?></span>
                                    </div>

                                    <input type="hidden" name="id" id="id" value='<?php echo $item['id_prodotto']; ?>' readonly>

                                    <br>

                                    <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Aggiungi al carrello</button>
                                </div>
                            </div><br>
                        </form>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php

    if(isset($_POST['submit_btn'])){
        $id = $_POST["id"];
        $quantita = $_POST['quantita'];

        if($quantita<0){
            echo "Inserisci la quantità.";
        }else{
            aggiungiAlCarrello($id,$quantita);
        }
    }

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>