<?php
    session_start();

    $_SESSION['username'] = "banano";

    if(isset($_SESSION['username'])){
        header("Location: login.php");
      }