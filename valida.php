<?php 
    if (isset($_GET["acao"]))
    {
        
        if ( $_GET["acao"] == "Entrar" )
        {
            
            include("conexao.php");
            
            if ($conexao)
            {
                $usuario = $_GET["campo_usuario"];
                $senha = $_GET["campo_senha"];
              
                //$query = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

                $query = "SELECT * from usuarios WHERE usuario = '$usuario' AND senha = '$senha'"; 
                // * traz todos os campos do banco

                $resultado = mysqli_query($conexao, $query);

                if($array = mysqli_fetch_array($resultado))
                {
                  session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array[nome]; //$array[campo_no_banco] pra trazer um dado direto do banco
                  $_SESSION["Usuario_Tipo"] = $array[tipo];

                  header("Location:cadastro.php");

                }
               else
               {
                 echo "<script>alert('Usuário/Senha incorretos ou inexistentes!');</script>";
                  //echo "Usuário/Senha incorretos ou inexistentes!";
                 //header("Location:index.php");
               }
        }
      }
    }
?>

<?php
    if ($array['tipo'] == "admin"){

                  session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array[nome];
                  $_SESSION["Usuario_Tipo"] = $array[tipo];

                  header("Location:cadastro.php");              

    }
    elseif ($array['tipo'] == "cad"){
                  
                  session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array[nome];
                  $_SESSION["Usuario_Tipo"] = $array[tipo];

                  header("Location:cadastro.php");              

    }
    elseif ($array['tipo'] == "con"){
                  
                  session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array[nome];
                  $_SESSION["Usuario_Tipo"] = $array[tipo];

                  header("Location:listar.php");              

    }
    elseif ($array['tipo'] == "edi"){
                  
                  session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array[nome];
                  $_SESSION["Usuario_Tipo"] = $array[tipo];

                  header("Location:editar.php");              

    }
 ?>


<?php
    if (isset($_GET["acao"]))
    {
      if ($_GET["acao"] == "Cadastre-se")
      {
        header("Location:cadastro_users.php");
      }
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

    <title>Login | Curso Tech</title>

    <link rel="icon" href="img/favicon.png" />

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <link href="css/estilo.css" rel="stylesheet">

    <style type="text/css">
        
        .btn {
    display: inline;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 10px;
    width: 30%;
    margin-top: 5%;
    margin-right: 9.8%;
    margin-left: 9.8%;
    font-size: 16px;
    margin: auto;
    display: block;
    margin-top: 40px;
        }

        .posicaobtn{
    display: block;
    margin: auto;
    margin-top: 5%;
        }

        .nomesform {
    font-size: 18px;
    padding-left: 10px;
}

    p a{
        color:white;
        font-weight: bold;
    }

    p a:hover{
        color:white;
        font-weight: bold;
        text-decoration: none;
    }
    
    </style>


</head>

<body>



    <!-- Navigation -->

<?php include("menu_index.php"); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="formlogin" class="container">
                <h3 class="tituloform">Bem-vindo(a)!</h3>
                <p class="corwhite centralizartexto">Entre com seu usuário e senha para logar no sistema:<br>Em caso de dúvidas, entre contato conosco através do link na parte superior da página.</p>
                <p class="corwhite centralizartexto">Ainda não possui um cadastro? <a href="cadastro_users.php">Cadastrar-se!</a></p>
                <br>
                    <form name="Login" action="valida.php" method="GET" id="form">

                        <p class="corwhite inline nomesform">Usuário:</p>
                        <input type="text" name="campo_usuario" value="" size="55" align="right" placeholder="Digite seu Usuário" required="" class="txtarea"/><br>

                        <p class="corwhite inline nomesform">Senha:</p>    
                        <input type="password" name="campo_senha" value="" size="55" align="right" title="Senha" required="" placeholder="Digite sua senha" class="txtarea"/>                                    

                            <!--<input type="submit" value="Cadastre-se" name="acao" class="btn btn-danger posicaobtn">-->
                            <input type="submit" value="Entrar" name="acao" class="btn btn-danger posicaobtn">

                    </form>
                    <!--<div id="user_incorreto">INFO AQUI</div>-->
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
