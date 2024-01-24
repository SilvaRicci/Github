<?php
       //query per ricerca persona

       $queryUForCF = "SELECT * FROM utente WHERE 'CF' = '$CF'";
       $queryUForCognome = "SELECT * FROM utente WHERE 'cognome' = '$cognome'";
       $queryUForNome = "SELECT * FROM utente WHERE 'nome' = '$nome'";
       
       //indirizzo,comune,cap,provincia,range data nascita, genere
   
   
       //query per ricerca visita
   
       $queryVForID = "SELECT * FROM utente WHERE 'id' = '$id'";
       $queryVForCF = "SELECT * FROM utente WHERE 'CF_utente' = '$CF'";
       $queryVForTipologia = "SELECT * FROM utente WHERE 'tipologia' = '$tipologia'";
   