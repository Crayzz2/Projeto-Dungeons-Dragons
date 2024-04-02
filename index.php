<?php 
    include 'curls.php';
    session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicio.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <title>D&D SHEETS</title>
</head>
<body>
    <header class="cabecalho">
        <a href="index.php"><img src="img/logo.png" alt="logo" class="img-logo"></a>
        <a class="btn-sair" href="controllerPage.php?sair=true">LOGOUT</a>
    </header>
    <main class="conteudo">
        <aside class="barra-lateral">
            <nav class="links-barra">
            <span class="componentes-barra" id="monsters"><h2>Monsters</h2></span>
                        <div id="monstersDiv">
                            <?php
                                if(empty($_SESSION)){
                                    $arrayRandMonster = [];
                                    while(count($arrayRandMonster)<10){
                                        $randMonster = rand(0, 333);
                                        array_push($arrayRandMonster, $randMonster);
                                        $arrayRandMonster = array_unique($arrayRandMonster);
                                    }
                                    for ($i=0; $i<10; $i++){
                                        echo '
                                            <form method="POST" action="curls.php" class="formMonster">
                                                <input hidden name="monsterData" value="'.$monsters->results[$arrayRandMonster[$i]]->index.'">
                                                <input type="submit" class="componentes-barra monster" value="'.$monsters->results[$arrayRandMonster[$i]]->name.'">
                                            </form>';
                                    
                                    }echo '<a id="btn-sem-login" href="login.php"><strong>Login to see all monsters</strong></a>';                                         
                                }else{
                                for ($i=0; $i<$monsters->count; $i++){
                                    echo '
                                        <form method="POST" action="curls.php" class="formMonster">
                                            <input hidden name="monsterData" value="'.$monsters->results[$i]->index.'">
                                            <input type="submit" class="componentes-barra monster" value="'.$monsters->results[$i]->name.'">
                                        </form>';
                                }}
                            ?>
                        </div>
                        
            </nav>
        </aside>
        <section class="respostas">
            <div id="testeDiv"></div>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>
</html>