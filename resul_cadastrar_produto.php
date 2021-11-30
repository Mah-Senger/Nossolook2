<?php

$titulo=$_POST["titulo"];
$preco=$_POST["preco"];
$descricao=$_POST["descricao"];
$categoria=$_POST["categoria"];
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
}else if($categoria == "Vestidos/saias"){
    $categoria = "2";
}else if($categoria == "Calças/shorts"){
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

if($_FILES['imagem']['size'] == 0){
    $imagem = "sem_foto.png";
}else{
    $extensao = strtolower(end(explode( ".", $_FILES['imagem']["name"])));//pega a extensao do arquivo
    $imagem = md5(time()) . "." . $extensao; //define o nome do arquivo
    move_uploaded_file($_FILES['imagem']['tmp_name'], "roupas/" . $imagem); //efetua o upload
}

require_once  "funcoes/conexao.php" ;
require_once  "funcoes/funcoes_banco.php" ;

$conexao = conexao();
$comando = inserir_produto($titulo, $preco, $descricao, $imagem, $categoria);
$resultado = mysqli_query($conexao, $comando);

if($resultado == true ){
    $id = mysqli_insert_id($conexao);
    $comando_estoque = inserir_estoque($id, $tam_P, $tam_M, $tam_G, $tam_GG, $tam_36, $tam_38, $tam_40, $tam_42, $tam_44, $tam_46);
    $resultado_estoque = mysqli_query($conexao, $comando_estoque);

    if($resultado_estoque){
        header("Location: administrador.php");
    }else{
        die ("Erro ao inserir no banco". mysqli_error($conexao));
    }
}else{
    die ("Erro ao inserir no banco". mysqli_error($conexao));
}


?>