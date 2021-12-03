<?php 
    $titulo = "Entrar";
    $css = "entrar_cadastre-se";
    require_once('templates/header.php') 
?>

    <div id="pag">
    <div id="entrar">
        <p class="title">Entrar</p>
        <form action="processar_login_usuario.php" method="POST">
            <input type="email" placeholder="Email:*" id="email" name="email" required>
            <br>
            <input type="password" placeholder="Senha:*" id="senha" name="senha" required>
            <br>
            <button id="botao1" type="submit"><strong>Entrar</strong></button>
        </form>
    </div>
    <div id="cadastre">
        <p id="title2">Ainda não tem conta conosco?</p>
        <form action="cadastre_se.html" method="">
            <button type="submit" id="botao2"><strong>Cadastre-se</strong></button>
        </form>
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