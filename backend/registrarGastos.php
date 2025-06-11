<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../conexao/conector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $data = $_POST['data'] ?? '';
    $categoria = $_POST['categoria'] ?? '';

    $sql = $conexao->prepare("insert into gasto (descricao,valor,datacompra,categoria) values(?,?,?,?)");
    $sql->bind_param("sdss", $descricao, $valor, $data,$categoria);

    if ($sql->execute()) {
        echo "Registrado com sucesso!";
    } else {
        echo "Erro ao inserir: " . $sql->error;
    }
    $sql->close();
    $conexao->close();
}
echo "<script>window.location.href = '../Frontend/verGasto.php';</script>";
exit;
?>


