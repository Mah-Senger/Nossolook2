<?php 
    $titulo = "Home";
    $css = "n_pedido";
    require_once('templates/header.php') 
?>


    <div>
        <h1>Informe o Número do Seu Pedido</h1>
        <form action="acomp_pedido.php" method="post">
            <input type="text" id="tit_ped" name="num" placeholder="Nº:" required>
            <br>
            <button type="submit" id="botao_num">Acompanhar Pedido</button>
        </form>
    </div>



    <?php 
    require_once('templates/footer.php') 
?>
