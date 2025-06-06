<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ver Gastos</title>
    <link rel="stylesheet" href="../folhasDeEstilo/main.css">
</head>
<body>
    <div class="container">
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
                <!-- Os dados reais virão do backend (PHP/MySQL por exemplo) -->
                <tr>
                    <td>150</td>
                    <td>Supermercado</td>
                    <td>Alimentação</td>
                    <td>2025-06-01</td>
                </tr>
            </tbody>
        </table>
        <button onclick="window.location.href='MainPage.php'">Voltar</button>
    </div>
</body>
</html>
