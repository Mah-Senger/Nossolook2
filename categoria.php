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
    
<?php 
    require_once('templates/footer.php') 
?>


