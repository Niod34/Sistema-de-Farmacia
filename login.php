<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logi.css">
    <title>Login</title>
</head>

<body>

    <div class="login">
        <form action="cadastrohtml.php" method="POST">
            <header>
                <h1>Login</h1>
            </header>
            <div class="input-box">
                <input type="text" placeholder="Nome de Usuário" required minlength="3" aria-label="Nome de Usuário">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Senha" required minlength="8" maxlength="16" aria-label="Senha">
            </div>

            <div class="manter"> 
                <label> <input type="checkbox" class="btn2"> Lembrar-Me</label>
                <button type="button" class="btn1" onclick="document.querySelector('.login form').reset();">Limpar</button> 
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</body>

</html>
