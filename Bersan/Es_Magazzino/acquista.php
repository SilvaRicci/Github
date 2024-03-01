<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container mt-5">
  <form method="POST" action="#">
    
    <div class="form-group">
      <label for="nomeProdotto">Nome prodotto</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il nome del prodotto">
    </div>
    <div class="form-group">
      <label for="categoria">Categoria</label>
      <select class="form-select" aria-label="categoria" name="cat">
          <option value="0" selected>Seleziona una categoria</option>
          <?php
            include "Connessione.php";
            $result = $db_connection->query("SELECT DISTINCT Categoria FROM prodotti");
            $rows=$result->num_rows;
            if($rows>0)
            {
                while($row = $result->fetch_assoc())
                { /* prende prova_id con il suo valore e prova_nome con il suo valore(riga per riga) e poi li stampa, creando un array associativo */
                    echo "<option value='$row[Categoria]'>$row[Categoria]</option>";
                }          
            }
          ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" id="invio" name="invio">Invio</button>
  </form>
</div>
<?php
                include "Connessione.php";
                $empty = 0;
                if(isset($_POST["invio"])){
                    
                    if($_POST["nome"]!="" and $_POST["cat"]!="")
                    {
                        $nome = $_POST["nome"];
                        $cat = $_POST["cat"];
                        $result = $db_connection->query("SELECT * FROM prodotti");
                        $rows=$result->num_rows;
                        
                        

                        if($rows>0){
                            while($row = $result->fetch_assoc()){ 
                                if("$row[Categoria]"== $cat and "$row[Nome]"== $nome)
                                {
                                  echo "<table class='table table-striped'>
                                  <thead>
                                  <tr>
                                  <th scope='col'>Id</th>
                                  <th scope='col'>Nome Prodotto</th>
                                  <th scope='col'>Descrizione</th>
                                  <th scope='col'>Numero Pezzi</th>
                                  <th scope='col'>Categoria</th>
                                  <th scope='col'>Prezzo</th>
                                  </tr>";
                                  echo "<tr>
                                  <td>$row[Id]</td>
                                  <td>$row[Nome]</td>
                                  <td>$row[Descrizione]</td>
                                  <td>$row[NPezzi]</td>
                                  <td>$row[Categoria]</td>
                                  <td>$row[Prezzo]</td>
                                  </tr>";
                                $empty++;
                                }
                            }
                            if($empty==0) echo "Il Prodotto cercato non è presente.";
                        }
                    }
                    else
                    {
                        echo "Inserire dei parametri nella ricerca.";
                    }
                }
            ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>