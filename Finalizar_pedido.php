<?php 
    $titulo = "Finalizar pedido";
    $css = "Finalizar_pedido";
    require_once('templates/header.php'); 
?>

    <div id="tudo">
        <div>
            <div id="desc_prods">
            <div class="prod_preco">
                <h2>Descrição dos Produtos</h2>
                <h2>Preços</h2>
            </div>
            <?php
                if(isset($_SESSION["carrinho"])){
        
                foreach($_SESSION["carrinho"] as $key => $value){
                    $preco_total= $value["preco"] * $value["quant"];
            ?>
            <div class="prod_preco">
                <p><?=$value["titulo"]?> (<?=$value["quant"]?>)</p>
                <p>R$ <?=$preco_total?></p>
            </div>
            <?php } }?>
        </div>
        <div class="endentr_cupomdesc">
            <h2>Dados do usuário: </h2>
            <h3>Nome: </h3><p><?=$_SESSION["nome_usuario"]?></p><br>
            <h3>Email: </h3><p><?=$_SESSION["email_usuario"]?></p><br>
            <h3>Endereço: </h3><p><?=$_SESSION["endereco_usuario_rua"]?>, <?=$_SESSION["endereco_usuario_num"]?>. <?=$_SESSION["endereco_usuario_cidade"]?>.</p><br>
            <h3>CEP: </h3><p><?=$_SESSION["endereco_usuario_cep"]?></p><br>
        </div>
        <div class="endentr_cupomdesc">
            <h2>Possui Cupom de Desconto??</h2>
            <form action="" method="">
                <input type="text">
                <button type="submit" id="aplicar"><strong>Aplicar</strong</button>
            </form>
        </div>
    </div>
        <div>
            <div id="form_pag">
                <h2>Forma de Pagamento</h2>
                <form action="processar_compra.php" method="post">
                    <input type="hidden" name="confirmacao" value="sim">
                    <input type="radio" id="boleto" name="formpag" required>
                    <label for="boleto">Boleto Bancário</label>
                    <br>
                    <br>
                    <input type="radio" id="cardeb" name="formpag">
                    <label for="cardeb">Cartão de Débito</label>
                    <br>
                    <input type="text" placeholder="Número do Cartão:">
                    <br>
                    <input type="date" placeholder="Data de Validade:">
                    <br>
                    <input type="text" placeholder="Código de Segurança:">
                    <br>
                    <br>
                    <input type="radio" id="carcred" name="formpag">
                    <label for="carcred">Cartão de Crédito</label>
                    <br>
                    <input type="text" placeholder="Número do Cartão:">
                    <br>
                    <input type="date" placeholder="Data de Validade:">
                    <br>
                    <input type="text" placeholder="Código de Segurança:">
                    <br>
                    <select>
                        <option>1X de R$509,60</option>
                        <option>2X de R$254,80</option>
                        <option>3X de R$169,67</option>
                        <option>4X de R$127,40</option>
                        <option>5X de R$101,92</option>
                    </select>
                    <br>
                    <button type="submit" id="finalizar_botao"><strong>Finalizar Compra...</strong></button>
                </form>
            </div>
        </div>
    </div>

<?php 
    require_once('templates/footer.php'); 
?>