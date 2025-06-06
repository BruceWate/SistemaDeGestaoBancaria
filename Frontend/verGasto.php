<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Ver Gastos</title>
    <link rel="stylesheet" href="../folhasDeEstilo/main.css">
</head>

<body>
    <?php
    require_once '../conexao/conector.php';

    $sql = "select descricao,valor,datacompra,categoria from gasto";
    $result = $conexao->query($sql);

    echo "<div class='container'>";
    echo "<h2>Lista de Gastos</h2>";
    echo "<table>";
    echo "<thead>
                <tr>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Data</th>
                </tr>
            </thead>";
    echo "<tbody>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['valor']) . "</td>";
            echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
            echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
            echo "<td>" . htmlspecialchars($row['datacompra']) . "</td>";
            echo "</tr>";
        }
    }
    echo "</tbody>";
    echo "</table>";

    $result->close();
    $conexao->close();
    ?>
    <button onclick="window.location.href='MainPage.php'">Voltar</button>
    </div>
</body>

</html>