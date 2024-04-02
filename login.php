<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>D&D SHEETS</title>
    </head>
    <body>
        <header class="cabecalho">
            <a href="index.php"><img src="img/logo.png" alt="logo" class="img-logo"></a>
        </header>
        <main class="container">
            <form class="login" method="POST" action="controllerPage.php">
                <h1 class="t-login">WELCOME TO D&D SHEETS</h1>
                <input type="text" class="i-login" name="username" placeholder="User">
                <input type="password" class="i-login" name="password" placeholder="Password">
                <?php
                    if(isset($_GET['wrongPassword'])){
                        echo '<br>User or password incorrect.';
                    }
                ?>
                <br>
                <input type="submit" class="i-login" id="btn-submit" name="login" value="S E N D">
                <div class="area-links">
                    <a href="cadastro.php" class="links-login">Create Account</a>
                </div>
            </form>
        </main>
    </body>
</html>