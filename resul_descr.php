<?php

    session_start();

    $id=$_POST["id"];
    $tamanho=$_POST["tamanho"];
    $quant=$_POST["quant"];

    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $conexao = conexao ();

    $comando = selecionar_id ($id);
    $resultado= mysqli_query($conexao, $comando);
    $retorno= mysqli_fetch_assoc($resultado);

    $titulo = $retorno["titulo"];
    $preco = $retorno["preco"];
    $imagem = $retorno["imagem"];

    if(isset($_SESSION["carrinho"][$id])){
        if($_SESSION["carrinho"][$id]["tamanho"] != $tamanho){
            echo "Você não pode adicionar o mesmo produto com dois (ou mais) tamanhos diferentes";
        }else{
            $_SESSION["carrinho"][$id]["quant"] += $quant;
            header("Location: carrinho.php");
        }
    }else{
        $_SESSION["carrinho"][$id]["imagem"] = $imagem;
        $_SESSION["carrinho"][$id]["titulo"] = $titulo;
        $_SESSION["carrinho"][$id]["tamanho"] = $tamanho;
        $_SESSION["carrinho"][$id]["quant"] = $quant;
        $_SESSION["carrinho"][$id]["preco"] = $preco;
        header("Location: carrinho.php");
    }

?>