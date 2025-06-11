<?php
include '../conexao/conector.php';

session_start();

$nome = $_POST['Inome'];
$email = $_POST['Iemail'];
$senha = $_POST['Isenha'];

// Verificar se o email já está cadastrado
$sql = "SELECT * FROM Usuario WHERE Email = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($result);


if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email já cadastrado!'); window.location.href='cadastro.php';</script>";
} else {
    // Inserir novo usuário
    $sqlInsert = "INSERT INTO Usuario (Nome, Email, Senha) VALUES (?, ?, ?)";
    $stmtInsert = mysqli_prepare($conexao, $sqlInsert);
    mysqli_stmt_bind_param($stmtInsert, "sss", $nome, $email, $senha);

    if (mysqli_stmt_execute($stmtInsert)) {
        header("Location: ../Frontend/MainPage.php");
        exit();
    } else {
        echo "<script>alert('Erro ao cadastrar!'); window.location.href='..Frontend/cadastro.php';</script>";
    }
}
$buscar = "SELECT id WHERE email = $email";
$resultado = $conexao->query($buscar);
$_SESSION['id'] = $resultado['id'];
?>
