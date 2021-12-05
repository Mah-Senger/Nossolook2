<?php
$titulo = "Minha conta";
$css = "conta_usuario";
require_once('templates/header.php');

if(!isset($_SESSION["nome_usuario"])){
    $texto="Você precisa estar logado para acessar os dados da sua conta.<br><a href='entrar_cadastre-se.php'>Entrar ou Cadastrar</a>";
    echo "<br>";
    echo "<br>";
    echo "<div id='div_erro'>";
    echo "<h2 id='erro'>$texto</h2>";
    echo "</div>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    require_once('templates/footer.php');
}else{
    $nome = $_SESSION["nome_usuario"]; 
    $email = $_SESSION["email_usuario"]; 
    $data_nasc = $_SESSION["data_nasc_usuario"]; 
    if($_SESSION["sexo_usuario"] == "F"){
        $sexo = "Feminino";
    }else{
        $sexo = "Masculino";
    }
    $rua = $_SESSION["endereco_usuario_rua"]; 
    $numero_casa = $_SESSION["endereco_usuario_num"]; 
    $cidade = $_SESSION["endereco_usuario_cidade"];
    $CEP = $_SESSION["endereco_usuario_cep"];
    $senha = $_SESSION["senha_usuario"];

    $data_formatada = date('d/m/Y', strtotime($data_nasc));

    ?>
    <div id="centralizar_conteudo">
        <div id="conteudo">
            <h1 id="titulo">Minha conta</h1>
            <div class="div_info">
                <h3>Nome: </h3>
                <p><?=$nome?></p>
            </div>
            <div class="div_info">
                <h3>Data de Nascimento: </h3>
                <p><?=$data_formatada?></p>
            </div>
            <div class="div_info">
                <h3>Sexo: </h3>
                <p><?=$sexo?></p>
            </div>
            <div class="div_info">
                <h3>Email: </h3>
                <p><?=$email?></p>
            </div>
            <div class="div_info">
                <h3>Endereço: </h3>
                <p><?=$rua?>, <?=$numero_casa?>. <?=$cidade?></p>
            </div>
            <div class="div_info">
                <h3>CEP: </h3>
                <p><?=$CEP?></p>
            </div>
            <div class="div_info">
                <h3>Senha: </h3>
                <p><?=$senha?></p>
            </div>
            <div id="botao_sair"><a href="sair.php" class="texto_botao">Sair da Minha Conta</a><br></div>
        </div>
    </div>

<?php
}
    require_once('templates/footer.php'); 
?>