<?php 
 session_start();
 if(!isset($_SESSION["usuario_admin"])){
 $texto="Você não tem acesso para acessar essa página.<br><a href='index.php'>Voltar</a>";
 require_once('templates/resultados.php');
 }else{
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

if (strlen(trim($titulo)) == 0) {
    $texto = "Você deve inserir um nome válido ao produto.<br><a href='editar.php?id=$id'>Voltar</a>";
    die(require_once('templates/resultados.php'));
    }
elseif (strlen(trim($preco)) == 0) {
    $texto = "Você deve inserir um preço válido.<br><a href='editar.php?id=$id'>Voltar</a>";
    die(require_once('templates/resultados.php'));
    }
 elseif (strlen(trim($descricao)) == 0) {
    $texto = "Você deve inserir uma descricao válida.<br><a href='editar.php?id=$id'>Voltar</a>";
    die(require_once('templates/resultados.php'));
    }

if($numeracao == "P-GG"){
    $tam_36 = 0;
    $tam_38 = 0;
    $tam_40 = 0;
    $tam_42 = 0;
    $tam_44 = 0;
    $tam_46 = 0;
    
    if (strlen(trim($tam_P)) == 0) {
        die($texto = "Você deve inserir um valor ao tamanho P.<br><a href='editar.php?id=$id'>Voltar</a>");
        die(require_once('templates/resultados.php'));
        }
    elseif (strlen(trim($tam_M)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho M.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }
    elseif (strlen(trim($tam_G)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho G.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
            }
    elseif (strlen(trim($tam_GG)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho GG.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
            }

            /*$input['tam_p'] =
            filter_input(INPUT_POST, 'tam_p', FILTER_VALIDATE_INT);
            if ($input['tam_p'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_m'] =
            filter_input(INPUT_POST, 'tam_m', FILTER_VALIDATE_INT);
            if ($input['tam_m'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_g'] =
            filter_input(INPUT_POST, 'tam_g', FILTER_VALIDATE_INT);
            if ($input['tam_g'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_gg'] =
            filter_input(INPUT_POST, 'tam_gg', FILTER_VALIDATE_INT);
            if ($input['tam_gg'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }*/

}elseif($numeracao == "36-46"){
    $tam_P = 0;
    $tam_M = 0;
    $tam_G = 0;
    $tam_GG = 0;
    
    if (strlen(trim($tam_36)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho 36.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }
    elseif (strlen(trim($tam_38)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho 38.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }
    elseif (strlen(trim($tam_40)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho 40.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
            }
    elseif (strlen(trim($tam_42)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho 42.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
    }
    elseif (strlen(trim($tam_44)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho 44.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
    }
    elseif (strlen(trim($tam_46)) == 0) {
        $texto = "Você deve inserir um valor ao tamanho 46.<br><a href='editar.php?id=$id'>Voltar</a>";
        die(require_once('templates/resultados.php'));
    }

    /*$input['tam_36'] =
            filter_input(INPUT_POST, 'tam_36', FILTER_VALIDATE_INT);
            if ($input['tam_36'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_38'] =
            filter_input(INPUT_POST, 'tam_38', FILTER_VALIDATE_INT);
            if ($input['tam_38'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_40'] =
            filter_input(INPUT_POST, 'tam_40', FILTER_VALIDATE_INT);
            if ($input['tam_40'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_42'] =
            filter_input(INPUT_POST, 'tam_42', FILTER_VALIDATE_INT);
            if ($input['tam_42'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_44'] =
            filter_input(INPUT_POST, 'tam_44', FILTER_VALIDATE_INT);
            if ($input['tam_44'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['tam_46'] =
            filter_input(INPUT_POST, 'tam_46', FILTER_VALIDATE_INT);
            if ($input['tam_46'] == FALSE) {
                $texto = "Você deve inserir um número válido no estoque.<br><a href='editar.php?id=$id'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }*/
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

 }


?>