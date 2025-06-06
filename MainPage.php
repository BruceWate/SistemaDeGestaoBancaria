<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="folhasDeEstilo/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="topo">
        <h1>Gerenciador de Gastos</h1>
        <p>Controle seu dinheiro de forma simples e eficiente.</p>
    </header>

    <main class="painel">


        <div class="card" onclick="location.href='adicionaSaldo.php'">
<i class="fas fa-wallet icon"></i>
    <h2>Adicionar Saldo</h2>
    <p>Insira dinheiro na sua carteira virtual.</p>
    </div>

        <div class="card" onclick="location.href='registarGasto.php'">
            <i class="fas fa-plus-circle icon"></i>
            <h2>Registrar Gasto</h2>
            <p>Adicione novos gastos com valor, descrição e categoria.</p>
        </div>

        <div class="card" onclick="location.href='verGasto.php'">
            <i class="fas fa-list icon"></i>
            <h2>Ver Gastos</h2>
            <p>Consulte a lista completa dos seus gastos.</p>
        </div>

        <div class="card" onclick="location.href='Orçamento.php'">
            <i class="fas fa-chart-line icon"></i>
            <h2>Ver Orçamento</h2>
            <p>Acompanhe o total de gastos e saldo mensal.</p>
        </div>


    </main>
</body>
</html>
