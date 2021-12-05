<?php

$usuario_admin=$_POST["usuario_admin"];
$senha_admin=$_POST["senha_admin"];

if (strlen(trim($usuario_admin)) == 0) {
    $texto = "Você deve inserir um nome válido.<br><a href='entraradd.php'>Voltar</a>";
    die(require_once('templates/resultados.php'));
    }
elseif (strlen(trim($senha_admin)) == 0) {
    $texto = "Você deve inserir uma senha válida.<br><a href='entraradd.php'>Voltar</a>";
    die(require_once('templates/resultados.php'));
    }

    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $conexao= conexao();
    $comando= selecionar_admin($usuario_admin);
    $resultado= mysqli_query($conexao, $comando);

    $retorno= mysqli_fetch_assoc($resultado);

    session_start();

    if(isset($retorno)){

        if($usuario_admin == $retorno["usuario"] and $senha_admin == $retorno["senha"]){
            $_SESSION["usuario_admin"]=$retorno["usuario"];
            $_SESSION["senha_admin"]=$retorno["senha"];
    
            header("Location: administrador.php");
        }else{
            $texto = "Usuário ou senha incorretos.<br><a href='entraradd.php'>Voltar</a>";
            require_once('templates/resultados.php');
        }

    }else{
        die ("Erro". mysqli_error($conexao));
    }

?>