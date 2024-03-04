<?php

    function aggiungiAlCarrello($id,$quantita){

            

        if(!isset($_SESSION['carrello'])){
            $_SESSION['carrello'][] = array();
        }

        if(isset($_SESSION['carrello'][$id])){
            $_SESSION['carrello'][$id]['quantita']=$_SESSION['carrello'][$id]['quantita']+$quantita;
        }else{
            $item = array(
                'id' => $id,
                'quantita' => $quantita
            );
            $_SESSION['carrello'][$id] = $item;
        }
    }