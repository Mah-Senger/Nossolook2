<?php
    $titulo = "Entrar na administração";
    $css = "entraradd";
    require_once('templates/header.php');


    if(!isset($_SESSION["usuario_admin"])){
?>

    <div id="tudo">
           <div id="dentro">
            <h1>Entrar na administração</h1>
            <div id="form">
                <form action="resul_entraradd.php" method="post">
                    <div class="elem_form">
                        <label for="nome">Nome do administrador: </label>
                        <input id="nome" type="text" class="input" name="usuario_admin" required>
                    </div>
    
                    <div class="elem_form">
                        <label for="cod">Código: </label>
                        <input id="cod" type="password" class="input" name="senha_admin" required>
                    </div>
    
                    <div class="elem_form">
                        <button type="submit" id="bot">Entrar</button>
                    </div>
                </form>
            </div>
           </div>
    </div> 
<?php
 require_once('templates/footer.php');
}else{
    header("Location: administrador.php");
}

?>