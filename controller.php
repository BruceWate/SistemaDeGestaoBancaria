<?php
session_start();
require_once "conector.php";  // inclui $conexao (mysqli)

// Recebe dados do formulário
$usuario = $_POST['Iemal'] ?? '';
$senha    = $_POST['Isenha']    ?? '';

// Validação mínima (não deixe campos vazios)
if (empty($usuario) || empty($senha)) {
    header("Location: login.php?erro=" . urlencode("Preencha todos os campos."));
    exit();
}

// Prepara e executa a consulta buscando por Email
$sql  = "SELECT id, Nome, Email, Senha FROM Usuario WHERE Email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou exatamente 1 registro
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // Verifica a senha (hash armazenado em Senha)
    if (password_verify($senha, $user['Senha'])) {
        // Autenticação bem-sucedida: armazena dados na sessão
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['Nome'];
        $_SESSION['usuario_email'] = $user['Email'];
        
        // Redireciona para área restrita/painel
        header("Location: painel.php");
        exit();
    } else {
        // senha incorreta
        header("Location: login.php?erro=" . urlencode("Senha incorreta."));
        exit();
    }

} else {
    // usuário não encontrado
    header("Location: login.php?erro=" . urlencode("Usuário não encontrado."));
    exit();
}

// Fecha conexão (opcional; será fechada no fim do script)
$conexao->close();
?>
