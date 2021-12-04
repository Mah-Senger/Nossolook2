<?php



    $id=$_POST["id"];
    $tamanho=$_POST["tamanho"];
    $quant=$_POST["quant"];

    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $conexao = conexao ();

    $comando = selecionar_id ($id);
    $comando_estoque= selecionar_estoque($id);

    $resultado= mysqli_query($conexao, $comando);
    $retorno= mysqli_fetch_assoc($resultado);

    $titulo = $retorno["titulo"];
    $preco = $retorno["preco"];
    $imagem = $retorno["imagem"];

    $resultado = mysqli_query($conexao, $comando_estoque);
    $result_estoque = mysqli_fetch_assoc($resultado);

    $estoque = array();
    $estoque["tam_P"] = $result_estoque["tam_P"];
    $estoque["tam_M"] = $result_estoque["tam_M"];
    $estoque["tam_G"] = $result_estoque["tam_G"];
    $estoque["tam_GG"] = $result_estoque["tam_GG"];
    $estoque["tam_36"] = $result_estoque["tam_36"];
    $estoque["tam_38"] = $result_estoque["tam_38"];
    $estoque["tam_40"] = $result_estoque["tam_40"];
    $estoque["tam_42"] = $result_estoque["tam_42"];
    $estoque["tam_44"] = $result_estoque["tam_44"];
    $estoque["tam_46"] = $result_estoque["tam_46"];

    if($quant<=$estoque[$tamanho]){
        session_start();

    if(isset($_SESSION["carrinho"][$id])){
       $texto= "Você já tem esse produto no seu carrinho.<br><a href='descricao_produto.php?id_produto=$id'>Voltar à descrição do produto</a><br>Ou<br><br><a href='carrinho.php'>Ir ao carrinho</a>";
       require_once('templates/resultados.php'); 
    }else{
        $_SESSION["carrinho"][$id]["imagem"] = $imagem;
        $_SESSION["carrinho"][$id]["titulo"] = $titulo;
        $_SESSION["carrinho"][$id]["tamanho"] = $tamanho;
        $_SESSION["carrinho"][$id]["quant"] = $quant;
        $_SESSION["carrinho"][$id]["preco"] = $preco;
        header("Location: carrinho.php");
    }
}else{
    $texto= "Não temos essa quantidade nesse determinado tamanho.<br>Confira a disponibilidade do produto na sua descrição.<br><a href='descricao_produto.php?id_produto=$id'>Voltar à descrição do produto</a>";
    require_once('templates/resultados.php'); 
}
?>


