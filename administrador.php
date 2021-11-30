<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="administrador.css"> 
    <title>Dashboard | Nosso Look</title>
    <link rel="shortcut icon" href="logo_topo2.png">
</head>
<body>
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
    
    <div id="tudo">
    <div id="quadro">
        <div id="cima">
            <h2>Alteração</h2>
            <div class="meio">
            <a href="cadastrar.php" class="none"><p>Novo produto</p></a>
            <a href="" class="none"><p>Todos produtos</p></a>
            </div>
        </div>
        <div id="baixo">
        <h2>Relatórios</h2>
        <div class="meio">
        <a href="" class="none"><p>Relatório 1</p></a>
        <a href="" class="none"><p>Relatório 2</p></a>
        <a href="" class="none"><p>Relatório 3</p></a>
        </div>
    </div>
    </div>
    <div id="conteudo">
    <h1>Produtos cadastrados</h1>
    <div id="lista">
        <ul class="lista">
            <div class="produto"><li><h3>Produto</h3></li></div>
            <div class="quant"><li><h3>Estoque</h3></li></div>
            <div class="preço"><li><h3>Preço</h3></li></div>
            <div class="editar"><li><h3>Editar</h3></li></div>
        </ul>
        <?php
            require_once "funcoes/conexao.php";
            require_once "funcoes/funcoes_banco.php";

            $conexao = conexao();
            $comando = selecionar_tudo();
            
            $retorno = mysqli_query($conexao, $comando);
            while($resultado = mysqli_fetch_assoc($retorno)){
                $id = $resultado["id"];
                $comando_estoque = selecionar_estoque($id);
                $retorno_estoque = mysqli_query($conexao, $comando_estoque);
                $result_estoque = mysqli_fetch_assoc($retorno_estoque);

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

                $soma_estoque = 0;
                foreach ($estoque as $posicao => $valor_posicao){
                    $soma_estoque += $valor_posicao;
                }

        ?>
        <ul class="lista">
        <div class="produto"> <li><div class="lado"><img src='roupas\<?=$resultado["imagem"]?>' alt="<?=$resultado["titulo"]?>">
            <h3><a href="pag_produto.php?id=<?=$resultado["id"]?>" class="cor"><?=$resultado["titulo"]?></a></h3></div></li></div>
            <div class="quant"><li class="quantidade"><?=$soma_estoque?></li></div>
            <div class="preço"><li><?=$resultado["preco"]?></li></div>
            <div class="editar"><li><a href="editar.php?id=<?=$id?>" class="botaos">Editar</a></li></div>
            <div class="remover"><li><a href="excluir_produto.php?id=<?=$id?>" class="botaos">Remover</a></li></div>
         </ul>
         <?php } ?>
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
        <a href="sair_admin.php"><ion-icon name="options" class="sociais"></ion-icon></a>
    </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>