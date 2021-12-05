<?php
    
    require_once  "funcoes/conexao.php" ;
    require_once  "funcoes/funcoes_banco.php" ;

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];
    $sexo = $_POST["sexo"];
    $telefone = $_POST["telefone"];
    $end_rua = $_POST["end_rua"];
    $end_num = $_POST["end_num"];
    $end_cidade = $_POST["end_cidade"];
    $end_cep = $_POST["end_cep"];
    $senha = $_POST["senha"];
    $conf_senha = $_POST["conf_senha"];

    if (strlen(trim($nome)) == 0) {
        $texto = "Você deve inserir um nome válido.<br><a href='cadastre_se.php'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }
    elseif (strlen(trim($email)) == 0) {
        $texto = "Você deve inserir um email válido.<br><a href='cadastre_se.php'>Voltar</a>";
        die(require_once('templates/resultados.php'));
        }
        elseif (strlen(trim($data_nascimento)) == 0) {
            $texto = "Você deve inserir uma data de nascimento válida.<br><a href='cadastre_se.php'>Voltar</a>";
            die(require_once('templates/resultados.php'));
            }
            elseif (strlen(trim($sexo)) == 0) {
                $texto = "Você deve inserir um sexo válido.<br><a href='cadastre_se.php'>Voltar</a>";
                die(require_once('templates/resultados.php'));
                }
                elseif (strlen(trim($telefone)) == 0) {
                    $texto = "Você deve inserir um telefone válido.<br><a href='cadastre_se.php'>Voltar</a>";
                    die(require_once('templates/resultados.php'));
                    }
                    elseif (strlen(trim($end_rua)) == 0) {
                        $texto = "Você deve inserir uma rua válida.<br><a href='cadastre_se.php'>Voltar</a>";
                        die(require_once('templates/resultados.php'));
                        }
                        elseif (strlen(trim($end_num)) == 0) {
                            $texto = "Você deve inserir um número de casa válido.<br><a href='cadastre_se.php'>Voltar</a>";
                            die(require_once('templates/resultados.php'));
                            }
                            elseif (strlen(trim($end_cidade)) == 0) {
                                $texto = "Você deve inserir uma cidade válida.<br><a href='cadastre_se.php'>Voltar</a>";
                                die(require_once('templates/resultados.php'));
                                }
                                elseif (strlen(trim($end_cep)) == 0) {
                                    $texto = "Você deve inserir um CEP válido.<br><a href='cadastre_se.php'>Voltar</a>";
                                    die(require_once('templates/resultados.php'));
                                    }
                                    elseif (strlen(trim($end_cep)) != 8) {
                                        $texto = "Você deve inserir um CEP válido, com 8 dígitos.<br><a href='cadastre_se.php'>Voltar</a>";
                                        die(require_once('templates/resultados.php'));
                                        }
                                    elseif (strlen(trim($senha)) == 0) {
                                        $texto = "Você deve inserir uma senha válida.<br><a href='cadastre_se.php'>Voltar</a>";
                                        die(require_once('templates/resultados.php'));
                                        }
                                        elseif (strlen(trim($senha))<8 ){
                                            $texto = "Você deve inserir uma senha válida, entre 8 e 20 dígitos.<br><a href='cadastre_se.php'>Voltar</a>";
                                            die(require_once('templates/resultados.php'));
                                            }
                                            elseif (strlen(trim($senha))>20 ){
                                                $texto = "Você deve inserir uma senha válida, entre 8 e 20 dígitos.<br><a href='cadastre_se.php'>Voltar</a>";
                                                die(require_once('templates/resultados.php'));
                                                }
                                        elseif (strlen(trim($conf_senha)) == 0) {
                                            $texto = "Você deve confirmar sua senha.<br><a href='cadastre_se.php'>Voltar</a>";
                                            die(require_once('templates/resultados.php'));
                                            }
        $input['email'] =
            filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if ($input['email'] == FALSE) {
                $texto = "Você deve inserir um e-mail válido.<br><a href='cadastre_se.php'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
        $input['telefone'] =
            filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT);
            if ($input['telefone'] == FALSE) {
                $texto = "Você deve inserir um número de telefone válido.<br><a href='cadastre_se.php'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['end_num'] =
            filter_input(INPUT_POST, 'end_num', FILTER_VALIDATE_INT);
            if ($input['end_num'] == FALSE) {
                $texto = "Você deve inserir um número de casa válido.<br><a href='cadastre_se.php'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }
         $input['end_cep'] =
            filter_input(INPUT_POST, 'end_cep', FILTER_VALIDATE_INT);
            if ($input['end_cep'] == FALSE) {
                $texto = "Você deve inserir um CEP válido.<br><a href='cadastre_se.php'>Voltar</a>";
                die(require_once('templates/resultados.php'));
         }

         if($senha != $conf_senha){
            $texto = "A confirmação da sua senha não está correta.<br><a href='cadastre_se.php'>Voltar</a>";
            die(require_once('templates/resultados.php'));
         }
                                    

    $conexao = conexao();
    $comando_email = login_usuario_email($email);
    $resultado_email = mysqli_query($conexao, $comando_email);

    $retorno = mysqli_fetch_assoc($resultado_email); 

    if(!isset($retorno)){

        $array = array($end_rua, $end_num, $end_cidade, $end_cep);
        $endereco = implode("&", $array);

        $comando = inserir_usuario ($nome, $email, $data_nascimento, $sexo, $telefone, $endereco, $senha);
        $resultado = mysqli_query($conexao, $comando);


        if($resultado == true ){
            $texto = "Seja bem-vindo!<br><a href='index.php'>Voltar a Página Inicial</a>";
            require_once('templates/resultados.php'); 
        }else{
            die ("Erro ao inserir no banco". mysqli_error($conexao));
            echo "<a href='index.php' id='voltpag'>Voltar a Página Inicial</a>";
        }
    }else{
        $texto = "Esse email já está cadastrado nesse sistema. <br>Tente <a href='entrar_cadastre-se.php'>Entrar numa conta já existente</a> ou <a href='cadastre_se.php'>crie uma nova conta</a> com um email diferente";
        require_once('templates/resultados.php'); 
    }
 
?>