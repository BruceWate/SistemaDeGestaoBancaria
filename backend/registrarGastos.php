<?php
session_start();
require_once '../conexao/conector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $valor = $_POST['valor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $data = $_POST['data'] ?? '';
    $categoria = $_POST['categoria'] ?? '';

    // Buscar o id da carteira do usuário
    $sqlCarteira = "SELECT id, SaldoActual FROM Carteira WHERE UsuarioId = ?";
    $stmtCarteira = $conexao->prepare($sqlCarteira);
    $stmtCarteira->bind_param("i", $usuario_id);
    $stmtCarteira->execute();
    $resultCarteira = $stmtCarteira->get_result();

    if ($rowCarteira = $resultCarteira->fetch_assoc()) {
        $carteira_id = $rowCarteira['id'];
        $saldo_atual = $rowCarteira['SaldoActual'];

        if ($valor > 0 && $saldo_atual >= $valor) {
            // Registrar gasto
            $sql = $conexao->prepare("INSERT INTO gasto (CarteiraId, descricao, valor, datacompra, categoria) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("isdss", $carteira_id, $descricao, $valor, $data, $categoria);

            if ($sql->execute()) {
                // Descontar do saldo
                $sqlUpdate = $conexao->prepare("UPDATE Carteira SET SaldoActual = SaldoActual - ? WHERE id = ?");
                $sqlUpdate->bind_param("di", $valor, $carteira_id);
                $sqlUpdate->execute();
                $sqlUpdate->close();
            }
            $sql->close();
        } else {
            echo "<script>alert('Saldo insuficiente!'); window.location.href = '../Frontend/registarGasto.php';</script>";
            exit;
        }
    }
    $stmtCarteira->close();
    $conexao->close();
}
echo "<script>window.location.href = '../Frontend/Orçamento.php';</script>";
exit;
?>


