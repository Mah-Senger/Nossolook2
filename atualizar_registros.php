<?php

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$numeracao = $_POST["numeracao"];
$tam_P = $_POST["tam_P"];
$tam_M = $_POST["tam_M"];
$tam_G = $_POST["tam_G"];
$tam_GG = $_POST["tam_GG"];
$tam_36 = $_POST["tam_36"];
$tam_38 = $_POST["tam_38"];
$tam_40 = $_POST["tam_40"];
$tam_42 = $_POST["tam_42"];
$tam_44 = $_POST["tam_44"];
$tam_46 = $_POST["tam_46"];


if ($categoria == "Blusas"){
    $categoria = "1";
}elseif ($categoria == "Vestidos"){
    $categoria = "2";
}elseif ($categoria == "Calças/Shorts"){
    $categoria = "3";
}

if($numeracao == "P-GG"){
    $tam_36 = 0;
    $tam_38 = 0;
    $tam_40 = 0;
    $tam_42 = 0;
    $tam_44 = 0;
    $tam_46 = 0;
}elseif($numeracao == "36-46"){
    $tam_P = 0;
    $tam_M = 0;
    $tam_G = 0;
    $tam_GG = 0;
}

require_once "funcoes/conexao.php";
require_once "funcoes/funcoes_banco.php";

$conexao = conexao();
$comando_produto = editar_produto($titulo, $descricao, $preco, $categoria, $id);
$comando_estoque = editar_estoque_produto($tam_P, $tam_M, $tam_G, $tam_GG, $tam_36, $tam_38, $tam_40, $tam_42, $tam_44, $tam_46, $id);

$resultado_produto = mysqli_query($conexao, $comando_produto);
$resultado_estoque = mysqli_query($conexao, $comando_estoque);



if($resultado_estoque and $resultado_produto){
    header("Location: administrador.php");
}else{
    echo "A edição não ocorreu de forma satisfatória";
}




?>