<?php
    function conexao (){
        $conexao = mysqli_connect("localhost", "root", "", "nossolook");
        if(!$conexao){
            die ("A conexão não foi realizada de forma satisfatória. Verifique se há algum erro e tente novamente.");
        }
        return $conexao;
    }
?>