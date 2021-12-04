<?php 
    $titulo = "Finalizar pedido";
    $css = "Finalizar_pedido";
    require_once('templates/header.php') 
?>

    <div id="tudo">
        <div>
            <div id="desc_prods">
            <div class="prod_preco">
                <h2>Descrição dos Produtos</h2>
                <h2>Preços</h2>
            </div>
            <div class="prod_preco">
                <p>Moletom Panda (2)</p>
                <p>R$179,80</p>
            </div>
            <div class="prod_preco">
                <p>Blusa Cetim poá</p>
                <p>R$59,90</p>
            </div>
            <div class="prod_preco">
                <p>Calça jeans</p>
                <p>R$99,90</p>
            </div>
            <div class="prod_preco">
                <p>Vestido godê</p>
                <p>R$170,00</p>
            </div>
        </div>
        <div class="endentr_cupomdesc">
            <h2>Dados do usuário: </h2>
            <p>Nome: <?=$_SESSION["nome_usuario"]?></p>
            <p>Email: <?=$_SESSION["email_usuario"]?></p>
            <p>CPF: <?=$_SESSION["cpf_usuario"]?></p>
            <p>Endereço: <?=$_SESSION["endereco_usuario_rua"]?>, <?=$_SESSION["endereco_usuario_num"]?>. <?=$_SESSION["endereco_usuario_cidade"]?>.</p>
            <p>CEP: <?=$_SESSION["endereco_usuario_cep"]?></p>
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
                <form action="obg_pela_pref.html" method="">
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
