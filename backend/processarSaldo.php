<?php
session_start();
require_once '../conexao/conector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $valor = $_POST['valor'] ?? '';
    $fonte = $_POST['fonte'] ?? '';

    // Buscar o id da carteira do usuário
    $sqlCarteira = "SELECT id FROM Carteira WHERE UsuarioId = ?";
    $stmtCarteira = $conexao->prepare($sqlCarteira);
    $stmtCarteira->bind_param("i", $usuario_id);
    $stmtCarteira->execute();
    $resultCarteira = $stmtCarteira->get_result();

    if ($rowCarteira = $resultCarteira->fetch_assoc()) {
        $carteira_id = $rowCarteira['id'];

        // Atualiza o saldo da carteira
        $sqlUpdate = "UPDATE Carteira SET SaldoActual = SaldoActual + ? WHERE id = ?";
        $stmtUpdate = $conexao->prepare($sqlUpdate);
        $stmtUpdate->bind_param("di", $valor, $carteira_id);
        $stmtUpdate->execute();
        $stmtUpdate->close();
    }
    $stmtCarteira->close();
    $conexao->close();
}
header("Location: ../Frontend/Orçamento.php");
exit;
?>