<?php
    
    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

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

    $conexao = conexao();
    $comando_email = login_usuario_email($email);
    $resultado_email = mysqli_query($conexao, $comando_email);

    $retorno = mysqli_fetch_assoc($resultado_email); 

    if(!isset($retorno)){

        $array = array($end_rua, $end_num, $end_cidade, $end_cep);
        $endereco = implode("&", $array);

        $comando = inserir_usuario ($nome, $email, $cpf, $data_nascimento, $sexo, $telefone, $endereco, $senha);
        $resultado = mysqli_query($conexao, $comando);


        if($resultado == true ){
            $texto = "Seja bem-vindo!<br><a href='index.php'>Voltar a Página Inicial</a>";
            require_once('templates/resultados.php'); 
        }else{
            die ("Erro ao inserir no banco". mysqli_error($conexao));
            echo "<a href='index.php' id='voltpag'>Voltar a Página Inicial</a>";
        }
    }else{
        $texto = "Esse email já está cadastrado nesse sistema. <br>Tente <a href='entrar_cadastre-se.php'>Entrar numa conta já existente</a> ou <a href='cadastre-se.php'>crie uma nova conta</a> com um email diferente";
        require_once('templates/resultados.php'); 
    }
 
?>