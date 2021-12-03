<?php 
    $titulo = "Carrinho";
    $css = "carrinho";
    require_once('templates/header.php') 
?>

        <div id="conteudo">
         <h1>Meu carrinho</h1>
         <div id="tudo">
         <div id="lista">
             <ul class="lista">
                 <div class="produto"><li><h3>Produto</h3></li></div>
                 <div class="quant"><li><h3>Quantidade</h3></li></div>
                 <div class="remover"><li><h3>Remover</h3></li></div>
                 <li><h3>Preço</h3></li>
             </ul>

            <?php

            if(isset($_SESSION["carrinho"])){
                    
             foreach($_SESSION["carrinho"] as $key => $value){
                 $preco_total= $value["preco"]*$value["quant"];
                 ?>
             
             <ul class="lista">
                <div class="produto"> <li><div class="lado"><img src='roupas\<?=$value["imagem"]?>' alt="<?=$value["titulo"]?>">
                <div id="moletom"><h3><?=$value["titulo"]?></h3>
                <p>Tamanho:<?=$value["tamanho"]?></p></div></li></div>
                <div class="quant" ><li class="quantidade" class="li"><?=$value["quant"]?></li></div>
                <div class="remover"><li class="li"><div ><a href="deletar_carrinho.php?id=<?=$key?>"><ion-icon name="trash-outline" class="iconslixo"></ion-icon></a></div></li></div>
                <li class="li">R$<?=$preco_total?></li>
             </ul>
             <?php
             }
             echo "</div>";
         ?>
         <div>
         <div id="frete">
            <h2 id="tit_cep">Frete:</h2>
            <div id="cep3">
                <ion-icon name="ellipse" class="cep" id="cep_prim"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="ellipse" class="cep"></ion-icon>
                <ion-icon name="eye-off-outline" id="cep2"></ion-icon>
             </div>
             <p id="altcep">Alterar CEP</p>
            </div>
         <div id="resumo">
             <div id="cima">
                 <h2 id="h2">Resumo do pedido</h2>
                 
                 <?php
                 $compra_final=0;
                 foreach($_SESSION["carrinho"] as $key => $value){
                    $preco_total= $value["preco"]*$value["quant"];
                    $compra_final= $compra_final + $preco_total;
                    ?>
                 <div class="somar">
                 <p><?=$value["titulo"]?> (<?=$value["quant"]?>)</p>
                 <p>R$<?=$preco_total?></p>
                 </div>
                 <?php
                   }
                      /*<div class="somar">
                                <p>Frete</p>
                                if($compra_final>199.99){
                         echo "<p>Grátis</p>";
                         echo "</div>"
                    }else{
                        echo "<p>$frete</p>";
                        echo "</div>"
                    }*/

                    ?>
                            
                    
             </div>
             <div id="baixo">
             <div class="somar">
                 <h3>Total</h3>
                 <p>R$<?=$compra_final?></p>
             </div>

             <div id="finalizar"><a href="Finalizar_pedido.html" id="nao"><p>Finalizar pedido</p></a></div>
             <div class="continuar"><a href="index.php" id="none"><p>Continuar comprando</p></a></div>
             </div>
         </div>
         </div>
     </div>
    </div>

<?php
}else{
    ?>
             <ul class="lista">
                
             </ul>
         </div>
         <div>
         <div id="frete">
            <h2 id="tit_cep">Frete:</h2>
            <div id="cep3">
         
             </div>
             <br>
            </div>
         <div id="resumo">
             <div id="cima">
                 <h2 id="h2">Resumo do pedido</h2>
                 <div class="somar">
                 
             </div>
             <div id="baixo">
             <div id="finalizar"><a href="Finalizar_pedido.html" id="nao"><p>Finalizar pedido</p></a></div>
             <div class="continuar"><a href="pagina_inicial.html" id="none"><p>Continuar comprando</p></a></div>
             </div>
         </div>
         </div>
     </div>
    </div>
    
    <?php
}
?>
<?php 
    require_once('templates/footer.php') 
?>