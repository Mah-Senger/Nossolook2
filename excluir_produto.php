<?php

$id = $_GET["id"];

require_once "funcoes/conexao.php";
require_once "funcoes/funcoes_banco.php";

$conexao = conexao();
$comando = deletar("$id");

$resultado = mysqli_query($conexao, $comando);

if($resultado){
    header('Location: administrador.php');
}else{
    echo "deu errado!";
}




?>