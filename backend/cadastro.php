<?php
include '../conexao/conector.php';

$nome = $_POST['Inome'];
$email = $_POST['Iemail'];
$senha = $_POST['Isenha'];

// Verificar se o email já está cadastrado
$sql = "SELECT * FROM Usuario WHERE Email = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email já cadastrado!'); window.location.href='cadastro.php';</script>";
} else {
    // Gerar um novo ID (poderia ser AUTO_INCREMENT, mas usaremos max + 1)
    $sqlId = "SELECT MAX(id) AS max_id FROM Usuario";
    $resultId = mysqli_query($conexao, $sqlId);
    $rowId = mysqli_fetch_assoc($resultId);
    $novoId = $rowId['max_id'] + 1;

    // Inserir novo usuário
    $sqlInsert = "INSERT INTO Usuario (id, Nome, Email, Senha) VALUES (?, ?, ?, ?)";
    $stmtInsert = mysqli_prepare($conexao, $sqlInsert);
    mysqli_stmt_bind_param($stmtInsert, "isss", $novoId, $nome, $email, $senha);

    if (mysqli_stmt_execute($stmtInsert)) {
        header("Location: ../Frontend/MainPage.php");
        exit();
    } else {
        echo "<script>alert('Erro ao cadastrar!'); window.location.href='..Frontend/cadastro.php';</script>";
    }
}
?>
