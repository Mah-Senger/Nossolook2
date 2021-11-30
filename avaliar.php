<?php
session_start();

$id_usuario = $_SESSION["id_usuario"];
$id_produto = $_GET["id_produto"];
$avaliacao = $_POST["avaliacao"];

require_once "funcoes/conexao.php";
require_once "funcoes/funcoes_banco.php";

$conexao = conexao();
$comando = avaliar($id_usuario, $id_produto, $avaliacao);

$resultado = mysqli_query($conexao, $comando);

if($resultado){
    header('Location: descr_cal2.php?id_produto=6');
}else{
    echo "deu errado!";
}




?>