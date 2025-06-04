<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="folhasDeEstilo/login.css">
    <title>Document</title>
</head>
<body>
    <div id="conteiner-login">
        <img id="bigUser" src="Icons/user.png" alt="BigUser">
        <form action="Login.php" method="post">
            <div 
            id="cont-mail">
            <img id="login1" src="Icons/userSmall.png" alt="log"><input type="email" name="email"  id="usuario" placeholder="Email"> 
            </div>

            <div 
            id="cont-senha"> <img id="senha" src="Icons/senha.png" alt="senha"><input type="password" name="senha" id="Isenha" placeholder="Senha">
            </div>

            <div id="cont-enviar">
                <input id="enviar" type="submit" value="Login">
                <input id="cadastro" type="button" value="Cadastro">
            </div>
        </form>
    </div>
</body>
</html>