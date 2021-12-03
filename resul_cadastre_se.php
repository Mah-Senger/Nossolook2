<?php 
    $titulo = "Cadastre-se";
    $css = "resul_cadastre_se";
    require_once('templates/header.php');

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    $sexo = $_POST["sexo"];
    $telefone = $_POST["telefone"];
    $end_rua = $_POST["end_rua"];
    $end_num = $_POST["end_num"];
    $end_cidade = $_POST["end_cidade"];
    $end_cep = $_POST["end_cep"];
    $senha = $_POST["senha"];
    $conf_senha = $_POST["conf_senha"];

    $array = array($end_rua, $end_num, $end_cidade, $end_cep);
    $endereco = implode("&", $array);

    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $conexao = conexao ();
    $comando = inserir_usuario ($nome, $email, $cpf, $data_nascimento, $sexo, $telefone, $endereco, $senha);
    $resultado = mysqli_query($conexao, $comando);


    if($resultado == true ){
        echo "<h1>Seja bem-vindo!</h1><br>";
    }else{
        die ("Erro ao inserir no banco". mysqli_error($conexao));
    }
    ?>

    <a href="index.php" id="voltpag">Voltar a Página Inicial</a>

<?php 
    require_once('templates/footer.php') 
?>