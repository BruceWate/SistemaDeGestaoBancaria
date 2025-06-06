<?php
include '../conexao/conector.php';

$email = $_POST['Iemail'];
$senha = $_POST['Isenha'];

$sql = "SELECT * FROM Usuario WHERE Email = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $usuario = mysqli_fetch_assoc($result);

    if ($usuario['Senha'] === $senha) {
        header("Location: ../Frontend/MainPage.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta!'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado!'); window.location.href='login.php';</script>";
}
?>
