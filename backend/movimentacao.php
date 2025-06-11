<?php
    session_start();
    if(isset($_SESSION['id'])){
        echo "Bem-vindo, ".$_SESSION['id'];
    }else{
        echo "Voce nao esta logado1!";
    }
?>