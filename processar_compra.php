<?php

require_once  "funcoes/conexao.php" ;
require_once  "funcoes/funcoes_banco.php" ;

session_start();

if(!isset($_POST["confirmacao"])){
    $texto = "Você não tem permissão para esta etapa ainda. <a href='carrinho.php'>Volte ao carrinho</a> para continuar a partir de lá!";
    require_once("templates/resultados.php");
}else{

    foreach($_SESSION["carrinho"] as $key => $value){
        $conexao = conexao ();
        $comando = selecionar_estoque($key);

        $resultado= mysqli_query($conexao, $comando);
        $retorno= mysqli_fetch_assoc($resultado);

        $quantidade = $value["quant"];

        $tamanho = $value["tamanho"];

        $quantidade_banco = $retorno["$tamanho"];

        $nova_quantidade = $quantidade_banco - $quantidade;
        
        $comando_estoque = editar_estoque_compra($tamanho, $nova_quantidade, $key);

        $resultado= mysqli_query($conexao, $comando_estoque);

        if($resultado){
            unset($_SESSION["carrinho"][$key]);
        }else{
            $erro = 1;
        }
    }

    if(isset($erro)){
        $texto = "Infelizmente houve um erro ao efetuar sua compra. <br><a href='index.php'>Voltar a página inicial?</a>";
        require_once("templates/resultados.php");
    }else{
        $texto = "Sua compra foi efetuada com sucesso! <br><a href='index.php'>Voltar a página inicial?</a>";
        require_once("templates/resultados.php");
    }

}

?>