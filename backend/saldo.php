<?php
require_once '../conexao/conector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'] ?? '';
    $fonte = $_POST['fonte'] ?? '';

    session_start();
    $colunaSaldo =("SELECT saldoactual FROM carteira");
    $result = $conexao->query($colunaSaldo);
    $_SESSION['resultado'] = $result;
    

    $sql = $conexao->prepare("insert into carteira (saldoactual,descricao) values(?,?)");
    $sql->bind_param("ds", $valor, $fonte);

    if ($sql->execute()) {
        echo "<script>alert('Valor adicionado com sucesso');</script>";
        echo "<script>window.location.href = '../Frontend/Orçamento.php';</script>";
    } else {
        echo "Erro ao inserir: " . $sql->error;
    }
    $sql->close();
    $conexao->close();
}

