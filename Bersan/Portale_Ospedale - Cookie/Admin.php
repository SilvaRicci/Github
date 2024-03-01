<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Benvenuto nella sezione AMMINISTRATORE</a>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Accesso
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Login.php">Login</a></li>
              <li><a class="dropdown-item" href="Registrazione.php">Registrazione</a></li>
            </ul>
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

  <!-- Modifica utente -->
  <div class="container border border-primary">
    <h2>Modifica Utente</h2>
    <form action="#" method="POST">
      <div class="mb-3">
        <label for="CodFisc" class="form-label">Codice Fiscale</label>
        <input type="text" class="form-control" id="CodFisc" name="CodFisc" required>
      </div>
      <div class="mb-3">
        <label for="NuovoNome" class="form-label">Nuovo Nome</label>
        <input type="text" class="form-control" id="NuovoNome" name="NuovoNome" required>
      </div>
      <button type="submit" class="btn btn-primary" name="ModificaUtente">Modifica Utente</button>
    </form>
    <?php
    include "Connessione.php";

    if (isset($_POST["ModificaUtente"])) {
      // Recupera i dati dal form
      $codiceFiscale = $_POST["CodFisc"];
      $nuovoNome = $_POST["NuovoNome"];

      // Esegui l'aggiornamento nel database
      $updateQuery = "UPDATE utenti SET Nome = '$nuovoNome' WHERE CodFisc = '$codiceFiscale'";
      $db_connection->query($updateQuery);
    }
    ?>

    <br>

    <!-- Elimina utente -->
    <div>
      <h2>Elimina Utente</h2>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="CodFisc" class="form-label">Codice Fiscale</label>
          <input type="text" class="form-control" id="CodFisc" name="CodFisc" required>
        </div>
        <button type="submit" class="btn btn-danger" name="EliminaUtente">Elimina Utente</button>
      </form>
      <?php
      include "Connessione.php";

      if (isset($_POST["EliminaUtente"])) {
        // Recupera il codice fiscale dall'utente
        $codiceFiscale = $_POST["CodFisc"];

        // Esegui l'eliminazione nel database
        $deleteQuery = "DELETE FROM utenti WHERE CodFisc = '$codiceFiscale'";
        $db_connection->query($deleteQuery);
      }
      ?>
    </div>
  </div>

  <br>

  <!-- Modifica visita -->
  <div class="container border border-primary">
    <h2>Modifica Visita</h2>
    <form action="#" method="POST">
      <div class="mb-3">
        <label for="IdVisita" class="form-label">ID Visita</label>
        <input type="text" class="form-control" id="IdVisita" name="IdVisita" required>
      </div>
      <div class="mb-3">
        <label for="NuovoNomeVisita" class="form-label">Nuovo Nome Visita</label>
        <input type="text" class="form-control" id="NuovoNomeVisita" name="NuovoNomeVisita" required>
      </div>
      <button type="submit" class="btn btn-primary" name="ModificaVisita">Modifica Visita</button>
    </form>
    <?php
    include "Connessione.php";

    if (isset($_POST["ModificaVisita"])) {
      // Recupera i dati dal form
      $idVisita = $_POST["IdVisita"];
      $nuovoTipologia = $_POST["NuovoNomeVisita"];

      // Esegui l'aggiornamento nel database
      $updateQuery = "UPDATE visita SET Tipologia = '$nuovoTipologia' WHERE Id_Visita = '$idVisita'";
      $db_connection->query($updateQuery);
    }
    ?>
    <br>

    <!-- Eliminia Visita -->
    <div>
      <h2>Elimina Visita</h2>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="IdVisita" class="form-label">ID Visita</label>
          <input type="text" class="form-control" id="IdVisita" name="IdVisita" required>
        </div>
        <button type="submit" class="btn btn-danger" name="EliminaVisita">Elimina Visita</button>
      </form>
      <?php
      include "Connessione.php";

      if (isset($_POST["EliminaVisita"])) {
        // Recupera l'ID Visita dal form
        $idVisita = $_POST["IdVisita"];

        // Esegui l'eliminazione nel database
        $deleteQuery = "DELETE FROM visita WHERE Id_Visita = '$idVisita'";
        $db_connection->query($deleteQuery);
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>