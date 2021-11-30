<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="pagina_inicial.css">
    <link rel="shortcut icon" href="logo_topo2.png">
    <title>Home | Nosso Look</title>
</head>
<body>
    <div id="promo_cep">
        <p>Parcele Suas Compras Em Até 5X</p> 
        <p>Frete Gratis Nas Compras Acima de R$199,99</p>
        <p>Entregamos Para Todo o Brasil</p>
    </div>
    <div id="cabecalho">
        <div><img src="logo.jpg" alt="logo" id="logo"></div>
        <div id="opcoes">
            <?php
            session_start();

            if(isset($_SESSION["nome_usuario"])){
                echo "<a href='carrinho.html'><ion-icon name='cart-outline' title='Carrinho' class='icons'></ion-icon></a>";
                echo "<a href='sair.php'><ion-icon name='person-circle-outline'  class='icons'></ion-icon></a>";
                echo "<a href='n_pedido.html'><ion-icon name='cube-outline' class='icons'></ion-icon></a>";
            }else{
                echo "<a href='entrar_cadastre-se.html'><ion-icon name='person-circle-outline'  class='icons'></ion-icon></a>";
            }

            ?>
            
        </div>
    </div>
    <div id="menu">
        <a href="index.php" class="opcoes_menu"><p>Home</p></a>
        <a href="categoria.php?id=1" class="opcoes_menu"><p>Blusas</p></a>
        <a href="categoria.php?id=2" class="opcoes_menu"><p>Vestidos</p></a>
        <a href="categoria.php?id=3" class="opcoes_menu"><p>Calças e Shorts</p></a>
        <a href="sobre.html" class="opcoes_menu"><p>Sobre nós</p></a>
    </div>



    <div id="promo"><a href="pag_blusa2.html"><img src="roupas/promocao.jpg" alt="promoção tops" id="promo_tops"></a></div>
    <div id="produtos">
    <?php

        require_once  "funcoes/conexao.php" ;
        require_once  "funcoes/funcoes_banco.php" ;

        $conexao = conexao ();
        $comando = selecionar_tudo ();
        $resultado= mysqli_query($conexao, $comando);


        while($retorno= mysqli_fetch_assoc($resultado)){
    ?>
        <div class="prod">
            <img src="roupas/shorts1.jpg" alt="Shorts 1" class="imagens_prod">
            <p class="descricao"><?=$retorno["titulo"];?></p>
            <p class="preco"><?php echo "R$ " . $retorno["preco"];?></p>
            <a href="" class="linkcomprar"><p class="comprar">Comprar</p></a>
        </div>
    </div>
    <?php
    }
    ?>
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
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
