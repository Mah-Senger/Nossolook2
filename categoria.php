<?php 
    $titulo = "Categorias";
    $css = "pagina_inicial";
    require_once('templates/header.php') 
?>

    <div id="produtos">
    <?php

        $id = $_GET["id"];

        require_once "funcoes/conexao.php";
        require_once "funcoes/funcoes_banco.php";

        $conexao = conexao();
        $comando = selecionar_categorias($id);
        $resultado = mysqli_query($conexao, $comando);


        while($retorno = mysqli_fetch_assoc($resultado)){
        ?>
            <div class="prod">
                <img src="roupas/<?=$retorno["imagem"];?>" alt="<?=$retorno["titulo"];?>" class="imagens_prod">
                <p class="descricao"><?=$retorno["titulo"];?></p>
                <p class="preco">R$ <?=$retorno["preco"];?></p>
                <a href="descricao_produto.php?id_produto=<?=$retorno["id"];?>" class="linkcomprar"><p class="comprar">Comprar</p></a>
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


