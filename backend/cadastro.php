<?php
include '../conexao/conector.php';

$nome = $_POST['Inome'];
$email = $_POST['Iemail'];
$senha = $_POST['Isenha'];


$sql = "SELECT * FROM Usuario WHERE Email = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email já cadastrado!'); window.location.href='../Frontend/cadastro.php';</script>";
} else {
    $sqlInsert = "INSERT INTO Usuario (Nome, Email, Senha) VALUES (?, ?, ?)";
    $stmtInsert = mysqli_prepare($conexao, $sqlInsert);
    mysqli_stmt_bind_param($stmtInsert, "sss", $nome, $email, $senha);

    if (mysqli_stmt_execute($stmtInsert)) {
        session_start();
        $_SESSION['usuario_id'] = mysqli_insert_id($conexao);
        $usuario_id = $_SESSION['usuario_id'];

        // Cria a carteira para o novo usuário
        $sqlCarteira = "INSERT INTO Carteira (UsuarioId, SaldoActual) VALUES (?, 0)";
        $stmtCarteira = mysqli_prepare($conexao, $sqlCarteira);
        mysqli_stmt_bind_param($stmtCarteira, "i", $usuario_id);
        mysqli_stmt_execute($stmtCarteira);
        mysqli_stmt_close($stmtCarteira);

        header("Location: ../Frontend/MainPage.php");
        exit();
    } else {
        echo "<script>alert('Erro ao cadastrar!'); window.location.href='../Frontend/cadastro.php';</script>";
    }
}
?>
