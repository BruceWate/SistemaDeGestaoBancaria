<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="folhasDeEstilo/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div id="conteiner-login">
        <img id="bigUser" src="Icons/user.png" alt="BigUser">
        <form action="Cadastro.php" method="post">
            <!-- Nome Completo -->
            <div id="cont-nome">
                <img id="nomeIcon" src="Icons/userSmall.png" alt="nome">
                <input type="text" name="Inome" id="Inome" placeholder="Nome Completo" required>
            </div>
            
            <!-- Email -->
            <div id="cont-mail">
                <img id="login1" src="Icons/email.png" alt="email">
                <input type="email" name="Iemail" id="Iemail" placeholder="Email" required>
            </div>

            <!-- Senha -->
            <div id="cont-senha">
                <img id="senha" src="Icons/senha.png" alt="senha">
                <input type="password" name="Isenha" id="Isenha" placeholder="Senha" required>
            </div>


            <!-- Botões -->
            <div id="cont-enviar">
                <input id="enviar" type="submit" value="Cadastrar">
                <input id="cancelar" type="reset" value="Voltar" onclick="window.location.href='login.php'">
            </div>
        </form>
    </div>
</body>
</html>