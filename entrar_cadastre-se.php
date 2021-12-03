<?php 
    $titulo = "Entre ou cadastre-se";
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
        <form action="cadastre_se.php" method="">
            <button type="submit" id="botao2"><strong>Cadastre-se</strong></button>
        </form>
    </div>
</div>

<?php 
    require_once('templates/footer.php') 
?>