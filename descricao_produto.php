<?php 
    $titulo = "Produtos";
    $css = "descricao_produto";
    require_once('templates/header.php') 
?>
<?php

    $id= $_GET["id_produto"];

    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $conexao = conexao ();

    $comando = selecionar_id ($id);
    $comando_estoque= selecionar_estoque($id);

    $resultado= mysqli_query($conexao, $comando);
    $retorno= mysqli_fetch_assoc($resultado);

    $titulo = $retorno["titulo"];
    $descricao = $retorno["descricao"];
    $preco = $retorno["preco"];
    $categoria = $retorno["categoria"];
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


?>
<div id="produto">
        <div><img src='roupas\<?=$retorno["imagem"]?>' alt="<?=$retorno["titulo"]?>"  id="img">
        </div>
        <div id="descricao">
            <p id="nome_do_prod"><?=$retorno["titulo"];?></p>


            <div id="opc">
            <div id="forms">
            <form action="resul_descr.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">

                <label for="tm" class="tm_cor">Tamanho:</label>
                <select id="tm">

                <?php

                foreach ($estoque as $posicao => $valor_posicao){
                    if($valor_posicao != 0){
                        echo "<option>$posicao</option>";
                }	
                }
                ?>
                </select>
                <br>
                <br>
                <label for="quant" class="tm_cor">Quantidade:</label>
                <select  id="quant">
                    <?php
                   $quant=0;

                   foreach ($estoque as $posicao => $valor_posicao){
                    if($valor_posicao != 0){
                        $quant = $quant + $valor_posicao;
                }	
            }
            for($i=1; $i<=$quant; $i++){
                echo "<option>$i</option>";
            }
                   ?>
                </select>
                </div>

                <div id="precos" class="precos">
                <p id="preco_atual"><?php echo "R$ " . $retorno["preco"];?></p>
                <button type="submit" class="linkcomprar"><p class="comprar">Comprar</p></button>
            </form>
        
        
            <form action="" method="" id="cep">
                <label for="cep">CEP:</label>
                <input type="text" placeholder="Ex: 00000000" id="infcep" data-ls-module="charCounter" maxlength="8">
                <br>
                <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" id="nao_sei_cep">Não sei meu CEP </a>
            </form>
            </div>
    </div>
    </div>
    </div>
    <div id="disp">
        <p id="titdisp"><strong>Disponibilidade</strong></p>
        <p class="textdesc">
            <?php
            if($estoque["tam_P"]==0 and $estoque["tam_M"]==0 and $estoque["tam_G"]==0 and $estoque["tam_GG"]==0){
                echo "Tamanho 36: ". $estoque['tam_36'];
                echo "<br>";
                echo "Tamanho 38: ". $estoque['tam_38'];
                echo "<br>";
                echo "Tamanho 40: ". $estoque['tam_40'];
                echo "<br>";
                echo "Tamanho 42: ". $estoque['tam_42'];
                echo "<br>";
                echo "Tamanho 44: ". $estoque['tam_44'];
                echo "<br>";
                echo "Tamanho 46: ". $estoque['tam_46'];
            }else{
                echo "Tamanho P: ". $estoque['tam_P'];
                echo "<br>";
                echo "Tamanho M: ". $estoque['tam_M'];
                echo "<br>";
                echo "Tamanho G: ". $estoque['tam_G'];
                echo "<br>";
                echo "Tamanho GG: ". $estoque['tam_GG'];
            }
                ?></p>
    </div>
    <div id="desc">
        <p id="titdesc"><strong>Descrição</strong></p>
        <p class="textdesc"><?=$retorno["descricao"];?></p>
    </div>
    <div id="avali">
    <?php
       if(isset($_SESSION["nome_usuario"])){
    ?>
        <p id="avaliacao"><strong>Escreva sua avaliação:</strong></p>
        <form action="avaliar.php?id_produto=<?=$id?>" method="POST">
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