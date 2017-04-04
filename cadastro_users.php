<?php

    if (isset($_GET["acao"]))
    {
        
        if ( $_GET["acao"] == "Cadastrar" )
        {
        
            include("conexao.php");

            if ($conexao)
            {

                /*$id = $_GET["campo_id"];*/
                $nome = $_GET["campo_nome"];
                $usuario = $_GET["campo_usuario"];
                $senha = $_GET["campo_senha"];
                $conf_senha = $_GET["campo_confsenha"];
                $tipo = $_GET["campo_tipo"];

                if ($senha == $conf_senha)

                {
                $query = "insert into usuarios (nome, usuario, senha, tipo) values (\"".$nome."\"  , \"".$usuario."\"  , \"".$senha."\", \"".$tipo."\");";

                $stmt = mysqli_prepare($conexao, $query);
                mysqli_execute($stmt);


                echo "<script>alert('Usuário cadastrado com sucesso!');</script>";

                //echo "SUCESSO NA CONEXÃO COM O BANCO DE DADOS";
                //echo $query; /*Mostra o conteúdo da variável query*/                

                mysqli_close($conexao);  
                }
                else{
                    echo "<script>alert('As senhas digitadas não conferem!');</script>";
                    mysqli_close($conexao);  
                }
            }
            else
            {
                echo "<script>alert('Ocorreu um erro inesperado!');</script>";
                //echo "FALHA NA CONEXÃO COM O BANCO DE DADOS";
            }
            
        }
        
    }

    /* SETANDO VALORES 0 PARA VARIÁVEIS NULAS*/

   /* if (!isset($_GET["campo_id"]))
    {
        $campo_id = 1;
    }
    else
    {
        $campo_id = $_GET["campo_id"];
    }*/
    
    if (!isset($_GET["campo_nome"]))
    {
        $campo_nome = "";
    }
    else
    {
        $campo_nome = $_GET["campo_nome"];
    }  
    
    if (!isset($_GET["campo_usuario"]))
    {
        $campo_usuario = "";
    }
    else
    {
        $campo_usuario = $_GET["campo_usuario"];
    }

    if (!isset($_GET["campo_senha"]))
    {
        $campo_senha = 0;
    }
    else
    {
        $campo_senha = $_GET["campo_senha"];
    }

    if (!isset($_GET["campo_confsenha"]))
    {
        $campo_confsenha = 0;
    }
    else
    {
        $campo_confsenha = $_GET["campo_confsenha"];
    }
    
?>

<!DOCTYPE html>
<html class="full" lang="pt-br">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Cadastro de Usuários | Curso Tech</title>

    <link rel="icon" href="img/favicon.png" />

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <link href="css/estilo.css" rel="stylesheet">

    <script type="text/javascript">
    function resetar_campos();
    {
        document.getElementByName('campo_nome').value='';
        document.getElementByName('campo_usuario').value='';
    }
    </script>

</head>

<body>

    <!-- Navigation -->

<?php include("menu_index.php"); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="formlogin" class="container">
                <h3 class="tituloform">Cadastre-se</h3>
                <p class="corwhite centralizartexto">Digite os dados do novo usuário e clique em Cadastrar:<br>Em caso de dúvidas, entre contato conosco através do link na parte superior da página.</p>
                <br>

       <div id="div_principal">
            
            <fieldset>
                
                <form id="form_cadastro_users" action="#" method="GET">
                    
                    <table>
                        
                        <!--<tr>
                            <td>
                                Id:
                            </td>
                            <td>
                                <input type="number" name="campo_id" value="<?php echo $campo_id ?>">
                            </td>
                        </tr>-->
                        
                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Nome:</p>
                            </td>
                            <td>
                                <input type="text" name="campo_nome" value="<?php  echo $campo_nome ?>" size="55" align="right" placeholder="Digite o nome do usuário" required="" class="txtarea" onfocus="this.value='';">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Usuário:</p>
                            </td>
                            <td>
                                <input type="text" name="campo_usuario" value="<?php echo $campo_usuario?>" size="55" align="right" placeholder="Digite o usuário" required="" class="txtarea" onfocus="this.value='';">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Senha:</p>
                            </td>
                            <td>
                                <input type="password" name="campo_senha" value="" size="55" align="right" placeholder="Digite a senha" required="" class="txtarea">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Conf. Senha:</p>
                            </td>
                            <td>
                                <input type="password" name="campo_confsenha" value="" size="55" align="right" placeholder="Digite a senha novamente" required="" class="txtarea">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Tipo:</p>
                            </td>
                            <td>
                                <select name="campo_tipo" class="txtarea">
                                    <option>Selecione</option>
                                    <option value ="admin">Administrador</option>
                                    <option value ="cad">Apenas Cadastro</option>
                                    <option value ="con">Apenas Consulta</option>
                                    <option value ="edi">Apenas Edição</option>
                                </select>
                            </td>
                        </tr>

                    </table>
                      
                                <input type="submit" value="Cadastrar" name="acao" class="btn btn-danger">  
                    
                </form>         
            </fieldset>
            
                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- /.container -->

    <?php include("footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
