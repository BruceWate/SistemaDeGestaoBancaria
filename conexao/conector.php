<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$host = "localhost";
$user = "root";
$pass = "12345678";
$dbname = "gestaodefundos";
$port = 3306;

$conexao = mysqli_connect($host, $user, $pass, $dbname, $port);
/*
if (mysqli_connect_errno()) {
    echo "Conexao MySQL Falhou: " . mysqli_connect_errno();
    exit();
} else {
    echo "Conexao de PHP com MySQL feito com sucesso
            usando: " . mysqli_get_host_info($conexao);
}
*/