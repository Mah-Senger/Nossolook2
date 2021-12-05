<?php 
    $titulo = "Cadastre-se";
    $css = "cadastre_se";
    require_once('templates/header.php') 
?>

    <div id="cads">
    <form action="resul_cadastre_se.php" method="post">
        <input type="text" placeholder="Seu Nome Completo:*" name="nome" required class="campo_form">
        <br>
        <input type="email" placeholder="Email:*" name="email" required class="campo_form">
        <br>
        <?php
        //<input type="text" data-ls-module="charCounter" maxlength="11" placeholder="CPF:*" name="cpf" required class="campo_form2">
        //<br>
        ?>
        <label for="data" class="datanasc_sexo">Data de Nascimento:*</label>
        <input type="date" id="data" name="data_nascimento" required class="campo_form3">
        <br>
        <label class="datanasc_sexo">Sexo:</Sexo:></label>
        <input type="radio" id="sexof" name="sexo" value="F">
        <label for="sexof" class="sexo_opc">Feminino</label>
        <input type="radio" id="sexom" name="sexo" value="M">
        <label for="sexom" class="sexo_opc">Masculino</label>
        <br>
        <input type="text" placeholder="Número de telefone" name="telefone" data-ls-module="charCounter" maxlength="12" class="campo_form2">
        <br>
        <label class="datanasc_sexo">Endereço: </label>
        <br>
        <input type="text" placeholder="Rua: Lorem Ipsum" name="end_rua" required class="campo_form">
        <br>
        <input type="text" placeholder="Nº: 000" name="end_num" required class="campo_form">
        <br><p class="atencao_end">Atenção: Insira apenas números nesse campo.</p>
        <br>
        <input type="text" placeholder="Cidade-Estado" name="end_cidade" required class="campo_form">
        <br>
        <input type="text" placeholder="CEP: " name="end_cep" required class="campo_form">
        <br><p class="atencao_end">Atenção: Insira apenas números nesse campo.</p>
        <br>
        <input type="password" placeholder="Informe uma senha*" name="senha" class="campo_form" required>
        <br>
        <p class="atencao_end">Atenção: Insira apenas números nesse campo, com no mínimo 8 dígitos.</p>
        <input type="password" placeholder="Confirme sua senha*" name="conf_senha" class="campo_form" required>
        <br>
        <input type="checkbox" id="termos"required>
        <label for="termos">LI, COMPREENDI E CONCORDO COM AS CONDIÇÕES GERAIS*</label>
        <br>
        <button type="submit" id="botao_cads">Cadastrar</button>
    </form>
</div>

<?php 
    require_once('templates/footer.php') 
?>