<?php

    session_start();

    $id=$_POST["id"];
    $tamanho=$_POST["tamanho"];
    $quant=$_POST["quant"];

    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $conexao = conexao ();

    $comando = selecionar_id ($id);
    $comando_estoque= selecionar_estoque($id);

    $resultado= mysqli_query($conexao, $comando);
    $retorno= mysqli_fetch_assoc($resultado);

    $titulo = $retorno["titulo"];
    $preco = $retorno["preco"];
    $imagem = $retorno["imagem"];

    $resultado = mysqli_query($conexao, $comando_estoque);
    $result_estoque = mysqli_fetch_assoc($resultado);

    $estoque = array();
    $estoque["tam_P"] = $result_estoque["tam_P"];
    $estoque["tam_M"] = $result_estoque["tam_M"];
    $estoque["tam_G"] = $result_estoque["tam_G"];
    $estoque["tam_GG"] = $result_estoque["tam_GG"];
    $estoque["tam_36"] = $result_estoque["tam_36"];
    $estoque["tam_38"] = $result_estoque["tam_38"];
    $estoque["tam_40"] = $result_estoque["tam_40"];
    $estoque["tam_42"] = $result_estoque["tam_42"];
    $estoque["tam_44"] = $result_estoque["tam_44"];
    $estoque["tam_46"] = $result_estoque["tam_46"];

    if($quant<=$estoque[$tamanho]){

    if(isset($_SESSION["carrinho"][$id])){
        echo "Você já tem esse produto no seu carrinho.";
    }else{
        $_SESSION["carrinho"][$id]["imagem"] = $imagem;
        $_SESSION["carrinho"][$id]["titulo"] = $titulo;
        $_SESSION["carrinho"][$id]["tamanho"] = $tamanho;
        $_SESSION["carrinho"][$id]["quant"] = $quant;
        $_SESSION["carrinho"][$id]["preco"] = $preco;
        header("Location: carrinho.php");
    }
}else{
    ?>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="templates/style/header.css">
    <link rel="stylesheet" href="templates/style/descr_erro.css">
    <link rel="stylesheet" href="templates/style/footer.css">
    <link rel="shortcut icon" href="templates/logo_topo.png">
    <title>Erro | Nosso Look</title>
</head>
<body>
    <div id="promo_cep">
        <p>Parcele Suas Compras Em Até 5X</p> 
        <p>Frete Gratis Nas Compras Acima de R$199,99</p>
        <p>Entregamos Para Todo o Brasil</p>
    </div>
    <div id="cabecalho">
        <div><img src="logo.jpg" alt="logo" id="logo"></div>
        <div>
            <form action="index.php" method="get">
                <input type="text" name="busca" id="busca" placeholder="Pesquisar...">
            </form>
        </div>
        <div id="opcoes">
            <?php
            //session_start();

            if(isset($_SESSION["nome_usuario"])){
                echo "<a href='carrinho.php'><ion-icon name='cart-outline' title='Carrinho' class='icons'></ion-icon></a>";
                echo "<a href='sair.php'><ion-icon name='person-circle-outline'  class='icons'></ion-icon></a>";
                echo "<a href='n_pedido.php'><ion-icon name='cube-outline' class='icons'></ion-icon></a>";
            }else{
                echo "<a href='entrar_cadastre-se.php'><ion-icon name='person-circle-outline'  class='icons'></ion-icon></a>";
            }

            ?>
            
        </div>
    </div>
    <div id="menu">
        <a href="index.php" class="opcoes_menu"><p>Home</p></a>
        <a href="categoria.php?id=1" class="opcoes_menu"><p>Blusas</p></a>
        <a href="categoria.php?id=2" class="opcoes_menu"><p>Vestidos</p></a>
        <a href="categoria.php?id=3" class="opcoes_menu"><p>Calças e Shorts</p></a>
        <a href="sobre.php" class="opcoes_menu"><p>Sobre nós</p></a>
    </div>



    <p class="texto">Não temos essa quantidade nesse determinado tamanho.</p>
    <p class="texto">Confira a disponibilidade do produto na sua descrição</p>
    <a href='descricao_produto.php?id_produto=<?=$id?>' id="voltpag">Voltar à descrição do produto</a>




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

    
<?php
}
?>


