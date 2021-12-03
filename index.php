<?php 
    $titulo = "Home";
    $css = "pagina_inicial";
    require_once('templates/header.php') 
?>

    <div id="promo"><a href="pag_blusa2.html"><img src="roupas/promocao.jpg" alt="promoção tops" id="promo_tops"></a></div>
    <?php

        require_once  "funcoes/conexao.php" ;
        require_once  "funcoes/funcoes_banco.php" ;

        $conexao = conexao ();

        if(isset($_GET["busca"])){
            $busca = $_GET["busca"];
            echo "<p id='procurando_por'>Procurando por: $busca</p>";
            $comando = busca($busca);
        }else{
            echo "<p id='procurando_por'>Todos os produtos: </p>";
            $comando = selecionar_tudo ();
        }
        $resultado= mysqli_query($conexao, $comando);

        echo "<div id='produtos'>";
        
        while($retorno= mysqli_fetch_assoc($resultado)){
            $id= $retorno["id"];
    ?>
        <div class="prod">
            <img src="roupas/<?=$retorno["imagem"];?>" alt="<?=$retorno["titulo"];?>" class="imagens_prod">
            <p class="descricao"><?=$retorno["titulo"];?></p>
            <p class="preco"><?php echo "R$ " . $retorno["preco"];?></p>
            <a href="descricao_produto.php?id_produto=<?=$id?>" class="linkcomprar"><p class="comprar">Comprar</p></a>
        </div>
    <?php
    }
    ?>
    </div>


