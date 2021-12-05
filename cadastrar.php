<?php 
session_start();

if(!isset($_SESSION["usuario_admin"])){
    $texto="Você não tem permissão para acessar essa página.<br><a href='index.php'>Voltar</a>";
    require_once('templates/resultados.php');
}else{
    $titulo = "Cadastrar";
    $css = "cadastrar";
    require_once('templates/header_lite.php') ;
?>
     <div id="menu">
        <a href="index.php" class="opcoes_menu"><p>Home</p></a>
        <a href="categoria.php?id=1" class="opcoes_menu"><p>Blusas</p></a>
        <a href="categoria.php?id=2" class="opcoes_menu"><p>Vestidos</p></a>
        <a href="categoria.php?id=3" class="opcoes_menu"><p>Calças e Shorts</p></a>
        <a href="sobre.php" class="opcoes_menu"><p>Sobre nós</p></a>
    </div>
    
    <div id="tudo">
        <div id="quadro">
            <div id="cima">
                <h2>Alteração</h2>
                <div class="meio">
                <a href="cadastrar.php" class="none">Novo produto</a>
                <a href="administrador.php" class="none">Todos produtos</a>
                </div>
            </div>
            <div id="baixo">
            <h2>Relatórios</h2>
            <div class="meio">
            <a href="" class="none">Relatório 1</a>
            <a href="" class="none">Relatório 2</a>
            <a href="" class="none">Relatório 3</a>
            </div>
        </div>
        </div>
        <?php
            $estoque = array();
            $estoque["tam_P"] = "tam_P";
            $estoque["tam_M"] = "tam_M";
            $estoque["tam_G"] = "tam_G";
            $estoque["tam_GG"] = "tam_GG";
            $estoque["tam_36"] = "tam_36";
            $estoque["tam_38"] = "tam_38";
            $estoque["tam_40"] = "tam_40";
            $estoque["tam_42"] = "tam_42";
            $estoque["tam_44"] = "tam_44";
            $estoque["tam_46"] = "tam_46";
            
        ?>
        <div id="quest">
            <h1>Cadastrar novo produto</h1>
            <form action="resul_cadastrar_produto.php" method="POST" enctype="multipart/form-data">
                
            <div class="elementos_form">
                <label for="descricao"><p>Titulo do Produto:</p></label>
                <input id="descricao" type="text" class="input" name="titulo" placeholder="Ex: Saia jeans ..." required >
            </div>

            <div class="elementos_form">
                <label for="preco"><p>Preço:</p></label>
                <input id="preco" type="text" class="input" placeholder="Ex: 60,00" name="preco" required>
            </div>

            <div class="elementos_form">
                <label for="ficha"><p>Descrição do produto:</p></label>
                <textarea id="ficha" cols="50" rows="5" class="input" name="descricao"></textarea>
            </div>
            <div class="elementos_form">
                <h4 id="atencao">
                    Atenção: antes de colocar as quantidades disponíveis para cada tamanho no estoque, indique se os tamanhos irão do P ao GG 
                    ou do 36 ao 46, pois a seleção de forma inadequada acarretará na exclusão de certas quantidades indicadas no ato do cadastramento/edição do produto
                </h4>
            </div>
            <div class="elementos_form">
                <label for="numeracao">Intervalo de tamanho: </label><br>
                <select name="numeracao" id="numeracao" class="input">
                    <option value="P-GG">P-GG</option>
                    <option value="36-46">36-46</option>
                </select>
            </div>
            <?php 
                foreach ($estoque as $posicao => $valor_posicao){
                    echo "<div class='elementos_form'>";
                    echo "<label for='estoque'><h4>$posicao</h4></label>";
                    echo "<input id='estoque' type='number'class='input' name= '$posicao'><br>";
                    echo "</div>";
                }
            ?>
            <div class="elementos_form">
                <label for="categoria"><p>Categoria:</p></label>
            <select id="categoria" class="input" name="categoria" required>
                <option value="1">Blusas</option>
                <option value="2">Vestidos</option>
                <option value="3">Calças/shorts</option>
            </select>
            </div>

            <div class="elementos_form">
                <label for="imagem"><p>Imagem do produto</p></label>
                <input id="imagem" type="file" class="input" name="imagem" >
            </div>
            
            <br>
            <button type="submit" id="bot"><p>Enviar</p></button>
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
        <a href="sair_admin.php"><ion-icon name="exit-outline" class="sociais"></ion-icon></a>
    </div>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
<?php
}
?>