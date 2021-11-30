<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="editar.css"> 
    <title>Edição | Nosso Look</title>
    <link rel="shortcut icon" href="logo_topo2.png">
</head>
<body>
    <div id="cabecalho">
        <div><img src="logo.jpg" alt="logo" id="logo"></div>
        <div id="opcoes">
            <a href="carrinho.html"><ion-icon name="cart-outline" title="Carrinho" class="icons"></ion-icon></a>
            <a href="entrar_cadastre-se.html"><ion-icon name="person-circle-outline"  class="icons"></ion-icon></ion-icon></a>
            <a href="n_pedido.html"><ion-icon name="cube-outline" class="icons"></ion-icon></ion-icon></a>
        </div>
    </div>
    <div id="menu">
        <a href="pagina_inicial.html" class="opcoes_menu"><p>Home</p></a>
        <a href="blusas.html" class="opcoes_menu"><p>Blusas</p></a>
        <a href="vestidos.html" class="opcoes_menu"><p>Vestidos</p></a>
        <a href="calcas.html" class="opcoes_menu"><p>Calças e Shorts</p></a>
        <a href="sobre.html" class="opcoes_menu"><p>Sobre nós</p></a>
    </div>

    <div id="conteudo">
        <div id="quadro">
            <div id="cima">
                <h2>Alteração</h2>
                <div class="meio">
                <a href="cadastrar.php" class="none"><p>Novo produto</p></a>
                <a href="administrador.php" class="none"><p>Todos produtos</p></a>
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
            <?php
                $id = $_GET["id"];

                require_once "funcoes/conexao.php";
                require_once "funcoes/funcoes_banco.php";

                $conexao = conexao();
                $comando = selecionar_id($id);
                $comando_estoque = selecionar_estoque($id);

                $retorno = mysqli_query($conexao, $comando);
                $result = mysqli_fetch_assoc($retorno);

                $titulo = $result["titulo"];
                $descricao = $result["descricao"];
                $preco = $result["preco"];
                $categoria = $result["categoria"];
                $imagem = $result["imagem"];

                $retorno = mysqli_query($conexao, $comando_estoque);
                $result_estoque = mysqli_fetch_assoc($retorno);

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

            ?>
            <img src="roupas/<?=$imagem?>" id="img">
     <div id="edicao"> 
    <h1>Editar produto</h1>
    <br>
     <form action="atualizar_registros.php" method="POST">
        <input type="hidden" name="id" value="<?=$id?>">
         <div class="elemento_form">
            <label for="nome"><h4>Titulo: </h4></label>
            <input id="nome" name="titulo" type="text" class="input" value="<?=$titulo?>">
         </div>
         <div class="elemento_form">
            <label for="descricao"><h4>Descrição: </h4></label>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="input"><?=$descricao?></textarea>
         </div>
         <div class="elemento_form">
            <label for="preco"><h4>Preço:</h4></label>
            <input id="preco" name="preco" type="text" value="<?=$preco?>" class="input">
         </div>
         <div class="elemento_form">
         <h4 id="atencao">
            Atenção: antes de colocar as quantidades disponíveis para cada tamanho no estoque, indique se os tamanhos irão do P ao GG 
            ou do 36 ao 46, pois a seleção de forma inadequada acarretará na exclusão de certas quantidades indicadas no ato do cadastramento/edição do produto
        </h4>
         </div>
         <div class="elemento_form">
         <label for="numeracao">Intervalo de tamanho: </label><br>
        <select name="numeracao" id="numeracao" class="input">
            <option value="P-GG">P-GG</option>
            <option value="36-46">36-46</option>
        </select>
         </div>
        <?php 
        foreach ($estoque as $posicao => $valor_posicao){
            echo "<div class='elemento_form'>";
            echo "<label for='estoque'><h4>$posicao</h4></label>";
            echo "<input id='estoque' type='number'class='input' name= '$posicao' value='$valor_posicao'><br>";
            echo "</div>";
        }
        ?>
         <div class="elemento_form">
            <label for="categoria"><h4>Categoria:</h4></label>
            <select id="categoria" class="input" name="categoria">
                <option>Blusas</option>
                <option>Vestidos</option>
                <option>Calças/Shorts</option>
            </select>
         </div>
         <div class="elemento-form">
            <button type="submit"><p id="bot">Atualizar</p></button>
         </div>
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
        <a href="administrador.html"><ion-icon name="options" class="sociais"></ion-icon></a>
    </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>