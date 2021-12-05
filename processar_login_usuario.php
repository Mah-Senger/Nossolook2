<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (strlen(trim($email)) == 0) {
        $texto = "Você deve inserir um e-mail válido.<br><a href='entrar_cadastre-se.php'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }
    elseif (strlen(trim($senha)) == 0) {
        $texto = "Você deve inserir uma senha válida.<br><a href='entrar_cadastre-se.php'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }

    require_once "funcoes/conexao.php";
    require_once "funcoes/funcoes_banco.php";

    $conexao = conexao();
    $comando = login_usuario_email($email);
    $resultado = mysqli_query($conexao, $comando);

    $retorno = mysqli_fetch_assoc($resultado); 

    session_start();

    if(isset($retorno)){
        if($retorno["senha"] == $senha){
            $endereco_separado = explode("&", $retorno["endereco"]);

            $_SESSION["id_usuario"] = $retorno["id"];
            $_SESSION["nome_usuario"] = $retorno["nome"];
            $_SESSION["email_usuario"] = $email;
            $_SESSION["data_nasc_usuario"] = $retorno["data_nascimento"];
            $_SESSION["sexo_usuario"] = $retorno["sexo"];
            $_SESSION["endereco_usuario_rua"] = $endereco_separado["0"];
            $_SESSION["endereco_usuario_num"] = $endereco_separado["1"];
            $_SESSION["endereco_usuario_cidade"] = $endereco_separado["2"];
            $_SESSION["endereco_usuario_cep"] = $endereco_separado["3"];
            $_SESSION["senha_usuario"] = $senha;

            header('Location: index.php');
        }else{

            $texto="email e/ou senha incorretos!<br><a href='entrar_cadastre-se.php'>Voltar</a>";
            require_once('templates/resultados.php');
        }
    }else{
        $texto="email e/ou senha incorretos!<br><a href='entrar_cadastre-se.php'>Voltar</a>";
        require_once('templates/resultados.php');
    }



?>