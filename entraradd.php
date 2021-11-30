<?php
session_start();
   
if(!isset($_SESSION["usuario_admin"])){
    ?>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="entraradd.css"> 
    <title>Entrar | Nosso Look</title>
    <link rel="shortcut icon" href="logo_topo2.png">
</head>
<body>
    <div id="cabecalho">
        <div><img src="logo.jpg" alt="logo" id="logo"></div>
        <div id="opcoes">
            <a href="carrinho.html"><ion-icon name="cart-outline" title="Carrinho" class="icons"></ion-icon></a>
            <a href="entrar_cadastre-se.html"><ion-icon name="person-circle-outline"  class="icons"></ion-icon></ion-icon></a>
            <a href="n_pedido.html"><ion-icon name="cube-outline" class="icons"></ion-icon></ion-icon></a>
        </div>
    </div>
    <div id="menu">
        <a href="index.php" class="opcoes_menu"><p>Home</p></a>
        <a href="blusas.html" class="opcoes_menu"><p>Blusas</p></a>
        <a href="vestidos.html" class="opcoes_menu"><p>Vestidos</p></a>
        <a href="calcas.html" class="opcoes_menu"><p>Calças e Shorts</p></a>
        <a href="sobre.html" class="opcoes_menu"><p>Sobre nós</p></a>
    </div>

    <div id="tudo">
           <div id="dentro">
            <h1>Entrar na administração</h1>
            <div id="form">
                <form action="resul_entraradd.php" method="post">
                    <div class="elem_form">
                        <label for="nome">Nome do administrador: </label>
                        <input id="nome" type="text" class="input" name="usuario_admin" required>
                    </div>
    
                    <div class="elem_form">
                        <label for="cod">Código: </label>
                        <input id="cod" type="password" class="input" name="senha_admin" required>
                    </div>
    
                    <div class="elem_form">
                        <button type="submit" id="bot">Entrar</button>
                    </div>
                </form>
            </div>
           </div>
    </div>




    <div id="rodape">
        <div>
        <p id="novidds">Fique por dentro das novidades!!</p>
        <form action="" method="" id="form">
            <input type="text" class="nome_email" placeholder="Nome">
            <input type="email" class="nome_email" placeholder="Email">
            <button type="submit" id="botao">Enviar</button>
        </form>
    </div>
    <div id="redessociais">
        <a href="https://www.facebook.com/"><ion-icon name="logo-facebook" class="sociais"></ion-icon></a>
        <a href="https://www.instagram.com/"><ion-icon name="logo-instagram" class="sociais"></ion-icon></a>
        <a href="https://twitter.com/"><ion-icon name="logo-twitter" class="sociais"></ion-icon></a>
        <a href=""><ion-icon name="logo-whatsapp" class="sociais"></ion-icon></a>
        <a href="entraradd.php"><ion-icon name="options" class="sociais"></ion-icon></a>
    </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>

<?php
}else{
    header("Location: administrador.php");
}
?>