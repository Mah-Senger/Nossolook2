<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];

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
            $_SESSION["cpf_usuario"] = $retorno["cpf"];
            $_SESSION["endereco_usuario_rua"] = $endereco_separado["0"];
            $_SESSION["endereco_usuario_num"] = $endereco_separado["1"];
            $_SESSION["endereco_usuario_cidade"] = $endereco_separado["2"];
            $_SESSION["endereco_usuario_cep"] = $endereco_separado["3"];
            $_SESSION["senha_usuario"] = $senha;
            header('Location: index.php');
        }else{
            echo("email e/ou senha incorretos!");
        }
    }else{
        echo("email e/ou senha incorretos!");
    }



?>