<?php

// Funções do banco de dados - PRODUTO
function inserir(){
    $comando= "INSERT INTO produto (titulo, preco, descricao, imagem, categoria) values ('$titulo', '$preco', '$descricao', '$imagem', '$categoria')";
    return $comando;
}

function editar_produto($titulo, $descricao, $preco, $categoria, $id){
    $comando = "UPDATE produto SET titulo = '$titulo', descricao = '$descricao', preco = '$preco', categoria = '$categoria' WHERE id = '$id'";
    return $comando;
}

function deletar($id){
    $comando = "DELETE FROM produto WHERE id = $id";
    return $comando;
}

function selecionar_tudo(){
    $comando = "SELECT * FROM produto";
    return $comando;
}

function selecionar_id($id){
    $comando = "SELECT * FROM produto WHERE id = $id";
    return $comando;
}

function busca(){

}


// Funções do banco de dados - ESTOQUE 
function editar_estoque_produto($tam_P, $tam_M, $tam_G, $tam_GG, $tam_36, $tam_38, $tam_40, $tam_42, $tam_44, $tam_46, $id){
    $comando_estoque = "UPDATE estoque SET  tam_P= '$tam_P', tam_M = '$tam_M', tam_G = '$tam_G', tam_GG = '$tam_GG', tam_36= '$tam_36', tam_38 = '$tam_38', tam_40 = '$tam_40', tam_42 = '$tam_42', tam_44 = '$tam_44', tam_46 = '$tam_46' WHERE id_produto = '$id'";
    return $comando_estoque;
}

function selecionar_estoque($id){
    $comando = "SELECT * FROM estoque WHERE id_produto = $id";
    return $comando;
}

function inserir_estoque($id, $tam_P, $tam_M, $tam_G, $tam_GG, $tam_36, $tam_38, $tam_40, $tam_42, $tam_44, $tam_46){
    $comando = "INSERT INTO estoque (id_produto, tam_P, tam_M, tam_G, tam_GG, tam_36, tam_38, tam_40, tam_42, tam_44, tam_46) values ('$id', '$tam_P', '$tam_M', '$tam_G', '$tam_GG', '$tam_36', '$tam_38', '$tam_40', '$tam_42', '$tam_44', '$tam_46')";
    return $comando;
}


// Funções do banco de dados - CATEGORIA
function selecionar_categorias($id){
    $comando = "SELECT * FROM produto WHERE categoria = $id";
    return $comando;
}


// Funções do banco de dados - AVALIAÇÃO
function avaliar($id_usuario, $id_produto, $avaliacao){
    $comando = "INSERT INTO avaliacao (id_usuario, id_produto, avaliacao) values ('$id_usuario', '$id_produto', '$avaliacao')";
    return $comando;
}

function selecionar_avaliacao($id_produto){
    $comando = "SELECT * FROM avaliacao WHERE id_produto = $id_produto";
    return $comando;
}

function selecionar_usuario_avaliacao($id_usuario){
    $comando = "SELECT * FROM usuario WHERE id = $id_usuario";
    return $comando;
}


//Funções do banco de dados - USUARIO
function inserir_usuario($nome, $email, $cpf, $data_nascimento, $sexo, $telefone, $endereco, $senha){
    $comando= "INSERT INTO usuario(nome,email,cpf,data_nascimento,sexo,telefone,endereco,senha) values ('$nome','$email','$cpf','$data_nascimento','$sexo','$telefone','$endereco','$senha')";
    return $comando;
}

function login_usuario_email($email){
    $comando= "SELECT * FROM usuario WHERE email = '$email' ";
    return $comando;
}

//Funções do banco de dados - ADMINISTRADOR
function selecionar_admin($usuario_admin){
    $comando = "SELECT * FROM administrador WHERE usuario = '$usuario_admin'";
    return $comando;
}


?>
