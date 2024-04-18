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
    <title>E-commerce</title>
    <?php include "style.html"; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include "navbar.html"; ?>

    <?php if(isset($_SESSION['carrello'])): ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Prodotto</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Quantità</th>
                    <th scope="col">Totale</th>
                    <th scope="col">Rimuovi</th>
                </tr>
            </thead>
            <tbody>

        <?php
            $carrello = $_SESSION['carrello'];

            foreach($carrello as $item):

                $result = $db_connection->query("SELECT `nome_prodotto`,`pvu_prodotto` FROM `prodotto` WHERE `id_prodotto` = '".$item['id']."'");            
                $rows = $result->num_rows;  

                if($rows > 0):  
                    $row = $result->fetch_assoc();
        ?>
<!-- https://bootsnipp.com/snippets/e3q3a -->
                <tr>
                <td><?php echo $row['nome_prodotto']; ?></td>  
                <td><?php echo $row['pvu_prodotto']; ?></td>                                       
                <td><?php echo $item['quantita']; ?></td>
                <td><?php echo $item['quantita'] * $row['pvu_prodotto']; ?> € </td>   
                <td> <a href="deleteItem.php?id=<?php echo $item['id']; ?>"> Rimuovi </a> </td>
                <tr>   

            <?php endif; ?>
        <?php endforeach; ?>

            </tbody>
        </table>
    <?php endif; ?>

    <p> <a href="clearCart.php" class="btn btn-danger">Svuota il carrello</a> </p>
    <p> <a href="acquista.php?id=-1" class="btn btn-primary">Acquista</a> </p> <!-- id = -1 -> TUTTO IL CARRELLO -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <?php include "footer.html"; ?>

</body>
</html>

