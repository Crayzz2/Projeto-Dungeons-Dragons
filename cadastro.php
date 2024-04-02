<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/cadastro.css">
        <title>D&D SHEETS</title>
    </head>
    <body>
        <header class="cabecalho">
            <img src="img/logo.png" alt="logo" class="img-logo">
        </header>
        <main class="container">
            <form class="login" method="POST" action="controllerPage.php">
                <h1 class="t-login">WELCOME TO D&D SHEETS</h1>
                <input type="text" class="i-login" name="username" placeholder="User" required>
                <input type="email" class="i-login" name="email" placeholder="E-mail" required>
                <input type="password" class="i-login" name="password" placeholder="Password" required>
                <input type="password" class="i-login" name="password" placeholder="Confirm password" required>
                <input type="submit" class="i-login" id="btn-submit" name="save" value="R E G I S T E R">
                <div class="area-links">
                    <a href="login.php" class="links-login">Already have an account ?</a>
                </div>
            </form>
        </main>
    </body>
</html>