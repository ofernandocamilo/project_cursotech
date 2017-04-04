<?php
    header('Content-Type: text/html; charset=UTF-8');

    function validar(){
        session_start();

        if(isset($_SESSION["logado"]))
        {

            if ( $_SESSION["logado"] == "OK")
            {
                return true;
            }
            else
            {
                header("Location:index.php");
                //echo "<script>alert('Usuário não logado!');</script>";
            }

        }

        else

        {
            header("Location:index.php");
            //echo "<script>alert('Usuário não logado!');</script>";
        }

    
    }
?>

<?php include("logout.php");?>

<?php

    //if ( (isset($_GET["campo_id"])) && (isset($_GET["campo_nome"])) && (isset($_GET["campo_quantidade"])) )

    validar();

    if (isset($_GET["acao"]))
    {
        
        if ( $_GET["acao"] == "Cadastrar" )
        {
        
            include("conexao.php");

            if ($conexao)
            {

                /*$id = $_GET["campo_id"];*/
                $nome = $_GET["campo_nome"];
                $matricula = $_GET["campo_matricula"];
                $op_curso = $_GET["campo_opcurso"];

                $query = "insert into alunos (nome, matricula, curso) values (\"".$nome."\"  , ".$matricula.", \"".$op_curso."\");";

                $stmt = mysqli_prepare($conexao, $query);
                mysqli_execute($stmt);


                echo "<script>alert('Aluno cadastrado com sucesso!');</script>";


                //echo "SUCESSO NA CONEXÃO COM O BANCO DE DADOS";
                //echo $query; /*Mostra o conteúdo da variável query*/                

                mysqli_close($conexao);
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
    
    if (!isset($_GET["campo_matricula"]))
    {
        $campo_quantidade = 0;
    }
    else
    {
        $campo_quantidade = $_GET["campo_matricula"];
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

    <title>Cadastro de Alunos | Curso Tech</title>

    <link rel="icon" href="img/favicon.png" />

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <link href="css/estilo.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    
<?php 
            include("conexao.php");
            
            if ($conexao)
            {
                $usuario = $_SESSION["Usuario"];
                $senha = $_SESSION["Usuario_Senha"];

                $query = "SELECT * from usuarios WHERE usuario = '$usuario' AND senha = '$senha'"; 
                // * traz todos os campos do banco

                $resultado = mysqli_query($conexao, $query);

                if($array = mysqli_fetch_array($resultado))
                {
                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome']; //$array pra trazer um dado direto do banco
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                }
               else
               {

                 echo "Usuário/Senha incorretos ou inexistentes!";
               }
        }
?>

<?php
    if ($array['tipo'] == "admin"){

                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome'];
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                    include("menu.php");         

    }
    elseif ($array['tipo'] == "cad") {
                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome'];
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                    include("menu_cad.php");  
    }
 ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="formlogin" class="container">

                    <div id="infologin" style="display:none;">
                <!--Olá usuário: <?php echo $_SESSION["Usuario"]; ?>-->
                <!--Sua senha é: <?php echo $_SESSION["Usuario_Senha"]; ?>-->
                <!--<h4>Olá <?php echo $_SESSION["Usuario_Nome"];?>,</h4>-->
                <!--Seu nível é: <?php echo $_SESSION["Usuario_Tipo"]; ?>-->

                    </div>
                    
                <h3 class="tituloform">Cadastro de Alunos</h3>
                <br>

       <div id="div_principal">

            <fieldset>
                
                <form action="#" method="GET">
                    
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
                                <input type="text" name="campo_nome" value="<?php  echo $campo_nome ?>" size="55" align="right" placeholder="Digite o nome do aluno" required="" class="txtarea">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Matrícula:</p>
                            </td>
                            <td>
                                <input type="number" name="campo_matricula" value="<?php echo $campo_matricula?>" size="55" align="right" placeholder="Digite a matrícula" required="" class="txtarea">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p  class="corwhite inline nomesform">Curso:</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            &nbsp;
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <input type="radio" name="campo_opcurso" value="Técnico em Informática"> 
                            </td>

                            <td>
                                <p class="corwhite inline nomesform">Técnico em Informática</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="radio" name="campo_opcurso" value="Técnico em Redes de Computadores"> 
                            </td>

                            <td>
                                <p class="corwhite inline nomesform">Técnico em Redes de Computadores</p>
                            </td>
                        </tr>
                        
                    <!--<tr>
                            <td>
                                <input type="submit" value="Cadastrar" name="acao" class="btn btn-danger">
                            </td>
                        </tr>-->
            
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
