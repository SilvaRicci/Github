<?php
    session_start();
    include "connessione.php";
    include "src.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione</title>
    <link rel="stylesheet" href="src/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
        <!-- DA CAMBIARE PLACEHOLDER.PNG ATTUALMENTE -->
        <img src="https://mivatek.global/wp-content/uploads/2021/07/placeholder.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form>
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <input type="email" id="email" class="fadeIn second" name="email" placeholder="E-mail@mail.com">
        <input type="text" id="nome" class="fadeIn third" name="nome" placeholder="Nome">
        <input type="text" id="cognome" class="fadeIn third" name="cognome" placeholder="Cognome">
        <input type="date" id="dataNascita" class="fadeIn third" name="dataNascita" placeholder="01/01/2000">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="********">
        <input type="submit" class="fadeIn fourth my-3" value="Login">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
        <a class="underlineHover text-black" href="forgotPassword.php">Password dimentica?</a>
        </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>


