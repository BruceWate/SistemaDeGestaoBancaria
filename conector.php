<?php
    mysqli_report(MYSQLI_REPORT_ERROR);

    $host = "localhost";
    $user = "root";
    $pass = "Familiaguiamba1";
    $dbname = "GestaoDeFundos";
    $port = 3306;

    $conexao = mysqli_connect($host, $user, $pass, $dbname, $port);

    if ($conexao -> connect_errno) {
        echo "Conexao MySQL Falhou: " .$mysqli -> connect_error;
        exit();
    }else{
            echo "Conexao de PHP com MySQL feito com sucesso
            usando: ", $conexao->host_info;
    }
?>