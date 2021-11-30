<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="descricao_produto.css"> 
    <title>Calças | Nosso Look</title>
    <link rel="shortcut icon" href="logo_topo.jpeg">
</head>
<body>
    <div id="promo_cep">
        <p>Parcele Suas Compras Em Até 5X</p> 
        <p>Frete Gratis Nas Compras Acima de R$199,99</p>
        <p>Entregamos Para Todo o Brasil</p>
    </div>
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
    <div id="produto">
        <div><img src="roupas/calca2.jpeg"  id="img">
        </div>
        <div id="descricao">
            <p id="nome_do_prod">Calça Jeans</p>
            <div id="opc">
            <div id="forms">
            <form action="" method="">
                <label for="tm" class="tm_cor">Tamanho:</label>
                <select id="tm">
                    <option>36</option>
                    <option>38</option>
                    <option>40</option>
                    <option>42</option>
                    <option>44</option>
                    <option>46</option>
                </select>
                <br>
                <br>
                <label for="quant" class="tm_cor">Quantidade:</label>
                <select  id="quant">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </form>
        </div>
        <div id="precos" class="precos">
            <p id="preco_atual">R$ 99,90</p>
            <?php
                if(isset($_SESSION["nome_usuario"])){
                    echo "<a href='carrinho.html' class='linkcomprar'><p class='comprar'>Comprar</p></a>";
                }else{
                    echo "<a href='entrar_cadastre-se.html' class='linkcomprar'><p class='comprar'>Comprar</p></a>";
                }
            ?>
            <form action="" method="" id="cep">
                <label for="cep">CEP:</label>
                <?php
                if(isset($_SESSION["endereco_usuario_cep"])){
                    echo "<input type='text' placeholder='Ex: 00000000' value='" . $_SESSION["endereco_usuario_cep"] . "'id='infcep' data-ls-module='charCounter' maxlength='8'>";
                }else{
                    echo "<input type='text' placeholder='Ex: 00000000' id='infcep' data-ls-module='charCounter' maxlength='8'>";
                }
                ?>
                <br>
                <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" id="nao_sei_cep">Não sei meu CEP </a>
            </form>
        </div>
    </div>
    </div>
    </div>
    <div id="desc">
        <p id="titdesc"><strong>Descrição</strong></p>
        <p class="textdesc">Calça Jeans feminina com barra dobrada.</p>
        <p class="textdesc">Calça Jeans feminina modelo justo e cintura alta, com acabamento e costura no tom.</p>
    </div>


    <div id="avali">
    <?php
       if(isset($_SESSION["nome_usuario"])){
    ?>
        <p id="avaliacao"><strong>Escreva sua avaliação:</strong></p>
        <form action="avaliar.php?id_produto=6" method="POST">
            <textarea cols="40" rows="5" class="ava" placeholder="Avaliação:" name="avaliacao"></textarea>
            <br>
            <input type="text" placeholder="Seu Nome:" class="ava"  value="<?=$_SESSION['nome_usuario']?>">
            <br>
            <button type="submit" id="botao" class="botao_ava">Enviar</button>
        </form>

        <?php 
        }else{
            echo "<h2 id='titulo_avaliacao'>Avaliações</h2>";
        }
        ?>

        <?php
            $id_produto = $_GET["id_produto"];

            require_once "funcoes/conexao.php";
            require_once "funcoes/funcoes_banco.php";

            $conexao = conexao();
            $comando = selecionar_avaliacao($id_produto);

            $retorno = mysqli_query($conexao, $comando);
            while($resultado = mysqli_fetch_assoc($retorno)){
                $id_usuario = $resultado["id_usuario"];
                
                $comando_usuario = selecionar_usuario_avaliacao($id_usuario);
                $retorno_usuario = mysqli_query($conexao, $comando_usuario);
                $resultado_usuario = mysqli_fetch_assoc($retorno_usuario);
                ?>
                <div id="avaliacoes">
                    <div>
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    <div>
                        <h2><?=$resultado_usuario["nome"];?></h2>
                        <p><?=$resultado["avaliacao"];?></p>
                    </div>
                </div>
            <?php } ?>
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
