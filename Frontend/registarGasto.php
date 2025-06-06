<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registrar Gasto</title>
    <link rel="stylesheet" href="../folhasDeEstilo/main.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Gasto</h2>
        <form action="registarGasto.php" method="post" class="formulario">
            <input type="number" name="valor" placeholder="Valor" required>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <select name="categoria" required>
                <option value="" disabled selected>Categoria</option>
                <option value="Alimentação">Alimentação</option>
                <option value="Transporte">Transporte</option>
                <option value="Lazer">Lazer</option>
                <option value="Educação">Educação</option>
                <option value="Outros">Outros</option>
            </select>
            <input type="date" name="data" required>
            <div class="botoes">
                <input type="submit" value="Salvar">
                <button onclick="window.location.href='MainPage.php'" type="button">Voltar</button>
            </div>
        </form>
    </div>
</body>
</html>
