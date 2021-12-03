<?php 
    $titulo = "Acompanhar";
    $css = "acom_pedido";
    require_once('templates/header.php') 
?>

    <div id="tudo">
    <div id="esquerda">
        <div class="acomp">
            <ion-icon name="checkmark-circle-outline" class="ent"></ion-icon>
            <p class="tit_ent">Pedido Realizado</p>
        </div>
        <div class="acomp">
            <ion-icon name="checkmark-circle-outline" class="ent"></ion-icon>
            <p class="tit_ent">Pagamento Confirmado</p>
        </div>
        <div class="acomp">
            <ion-icon name="checkmark-circle-outline" class="ent"></ion-icon>
            <p class="tit_ent">Pedido Embalado</p>
        </div>
        <div class="acomp">
            <ion-icon name="ellipse-outline" class="ent"></ion-icon>
            <p class="tit_ent">Pedido enviado</p>
        </div>
        <div class="acomp">
            <ion-icon name="ellipse-outline" class="ent"></ion-icon>
            <p class="tit_ent">Pedido Entregue</p>
        </div>

    </div>
    <div id="direita">
        <div class="acomp2">
            <img src="roupas/blusa3.jpeg" alt="moletom" class="img">
            <h4>Blusa moletom feminina manga longa</h4>
            <p>R$179,80</p>
        </div>
        <div class="acomp2">
            <img src="roupas/blusa4.jpeg" alt="blusa poá" class="img">
            <h4>Blusa cetim poá</h4>
            <p>R$59,99</p>
        </div>
        <div class="acomp2">
            <img src="roupas/calca2.jpeg" alt="calca jeans" class="img">
            <h4>Calça jeans</h4>
            <p>R$99,90</p>
        </div>
        <div class="acomp2">
            <img src="roupas/vestido3.jpeg" alt="moletom" class="img">
            <h4>Vestido godê</h4>
            <p>R$170,00</p>
        </div>
        <div class="acomp2" id="subtotal">
            <h4>Subtotal</h4>
            <h4>R$509,60</h4>
        </div>
        <div class="acomp2">
            <h4>Custo de frete</h4>
            <h4>Grátis</h4>
        </div>
        <div class="acomp2">
            <h4>Total</h4>
            <h4>R$509,60</h4>
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
        <a href="entraradd.html"><ion-icon name="options" class="sociais"></ion-icon></a>
    </div>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>