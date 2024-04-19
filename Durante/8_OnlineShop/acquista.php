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


    <?php
        $id = $_GET['id'];

        if($id == -1){
            // acquisto tutto il carrello 
            echo "Acquista carrelo";
        }else{
            // acquista ora
            $quantita = $_GET['quantita'];
            acquista($id,$quantita);
            echo "Acquista prodotto con id".$id."e quantita".$quantita;

        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>