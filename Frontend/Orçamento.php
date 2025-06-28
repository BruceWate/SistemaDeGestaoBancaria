<?php
session_start();
require_once '../conexao/conector.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: Login.php");
    exit();
}
$usuario_id = $_SESSION['usuario_id'];

// Buscar saldo da carteira
$sqlCarteira = "SELECT id, SaldoActual FROM Carteira WHERE UsuarioId = ?";
$stmtCarteira = $conexao->prepare($sqlCarteira);
$stmtCarteira->bind_param("i", $usuario_id);
$stmtCarteira->execute();
$resultCarteira = $stmtCarteira->get_result();
$saldo = 0;
$carteira_id = null;
if ($rowCarteira = $resultCarteira->fetch_assoc()) {
    $saldo = $rowCarteira['SaldoActual'];
    $carteira_id = $rowCarteira['id'];
}
$stmtCarteira->close();

// Buscar total de gastos do mês atual
$sqlGastos = "SELECT SUM(valor) as total_gastos FROM gasto WHERE CarteiraId = ? AND MONTH(datacompra) = MONTH(CURDATE()) AND YEAR(datacompra) = YEAR(CURDATE())";
$stmtGastos = $conexao->prepare($sqlGastos);
$stmtGastos->bind_param("i", $carteira_id);
$stmtGastos->execute();
$resultGastos = $stmtGastos->get_result();
$total_gastos = 0;
if ($rowGastos = $resultGastos->fetch_assoc()) {
    $total_gastos = $rowGastos['total_gastos'] ?? 0;
}
$stmtGastos->close();

// Buscar todos os gastos da carteira
$sqlLista = "SELECT descricao, valor, datacompra, categoria FROM gasto WHERE CarteiraId = ? ORDER BY datacompra DESC";
$stmtLista = $conexao->prepare($sqlLista);
$stmtLista->bind_param("i", $carteira_id);
$stmtLista->execute();
$resultLista = $stmtLista->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Orçamento</title>
    <link rel="stylesheet" href="../folhasDeEstilo/main.css">
</head>
<body>
    <div class="container">
        <h2>Resumo do Orçamento</h2>
        <div class="orcamento">
            <p><strong>Saldo disponível:</strong> <span id="saldo"><?= htmlspecialchars($saldo) ?></span> MT</p>
        </div>
        <h2>Lista de Gastos</h2>
        <table>
            <thead>
                <tr>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultLista->num_rows > 0) {
                    while ($row = $resultLista->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['valor']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['datacompra']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum gasto registrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='MainPage.php'">Voltar</button>
    </div>
</body>
</html>
<?php
$stmtLista->close();
$conexao->close();
?>
