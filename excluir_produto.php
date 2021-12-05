<?php
 session_start();
 if(!isset($_SESSION["usuario_admin"])){
 $texto="Você não tem acesso para acessar essa página.<br><a href='index.php'>Voltar</a>";
 require_once('templates/resultados.php');
 }else{
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

 }


?>