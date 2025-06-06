<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Saldo</title>
    <link rel="stylesheet" href="../folhasDeEstilo/adicionaSaldo.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Saldo</h1>
        <form action="processarSaldo.php" method="post" class="form-saldo">
            <label for="valor">Valor a adicionar (MZN):</label>
            <input type="number" name="valor" id="valor" placeholder="Ex: 1000" step="0.01" required>

            <label for="fonte">Fonte do saldo:</label>
            <input type="text" name="fonte" id="fonte" placeholder="Ex: Salário, Empréstimo..." required>

            <input type="submit" value="Adicionar">
        </form>
        <a href="MainPage.php" class="voltar">← Voltar à Página Principal</a>
    </div>
</body>
</html>
