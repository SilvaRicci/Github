<!doctype html>
<html lang="en">

<?php
if (count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
?>

<?php
  include "Connessione.php";
  if (isset($_POST["login"])) {
    $empty = 0;
    if ($_POST["Codfiscale"] != null) {
      if ($_POST["Password"] != null) {
        $CF = $_POST["Codfiscale"];
        $password = $_POST["Password"];
        $CF = $db_connection->real_escape_string(stripslashes($CF));
        $password = $db_connection->real_escape_string(stripslashes($password));
        $find = false;
        $inserimento = "SELECT * FROM utenti WHERE CodFisc = '$CF'";
        $dati = $db_connection->query($inserimento);


        if ($dati->num_rows == 1) {
          $row = $dati->fetch_assoc();
          $pwDB = $row['Password'];
          if (password_verify($password, $pwDB)) {
            $find = true;
            $nome = $row['Nome'];

            //$ricorda = isset($_POST['ricorda']) ? true : false;

            // Controllo checkbox
            if (isset($_POST['ricorda'])) {
              setcookie("Codfiscale", $CF, time() + (86400), "/");
              setcookie("Password", $password, time() + (86400), "/");
            } else {
              setcookie("Codfiscale", "", time() - 86400, "/");
              setcookie("Password", "", time() - 86400, "/");
            }
          }

          // Login check
        }
        if ($find) {
          session_start();
          $_SESSION['CodFisc'] = $CF;
          $_SESSION['Password'] = $password;

          if ($nome == "Admin") {
            header("Location: Admin.php");
          } else {
            header("Location: Prenotazione.php");
          }
        }
      } else {
        echo "Riempire tutti i campi.";
      }
    } else {
      echo "Riempire tutti i campi.";
    }
  }
  ?>
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
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <div class="container border border-primary">
    <form action="#" method="POST">
      <div>
        <div class="form-group">
          <label for="exampleInputText">Codice Fiscale</label>
          <input type="text" class="form-control" id="Codfiscale" name="Codfiscale" <?php if (isset($_COOKIE["Codfiscale"])) {
                                                                                      echo 'value="' . $_COOKIE["Codfiscale"] . '"';
                                                                                    } ?>>
        </div>
        <div class="form-group">
          <label class="active" for="exampleInputTime">Password</label>
          <input type="password" class="form-control" id="Password" name="Password" <?php if (isset($_COOKIE["Password"])) {
                                                                                      echo 'value="' . $_COOKIE["Password"] . '"';
                                                                                    } ?>>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="form2Example31" name="ricorda" <?php if (isset($_COOKIE["Password"]) && isset($_COOKIE["Codfiscale"])) {
                                                                                      echo 'checked';
                                                                                    } ?> />
            <label class="form-check-label" for="form2Example31"> Ricordami </label>
          </div>

        </div>
        <center>
          <button type="submit" class="btn btn-primary" id="Login" name="login">Login</button>
        </center>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>