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

    validar();

    if (isset($_GET["acao"]))
    {
        
        if ( $_GET["acao"] == "Alterar" )
        {
            
            include("conexao.php");
            
            if ($conexao)
            {
            
                $id = $_GET["campo_id"];
                $nome = $_GET["campo_nome"];
                $matricula = $_GET["campo_matricula"];
                $op_curso = $_GET["campo_opcurso"];
              
                $query = "update alunos  set nome = '".$nome."' , matricula = ".$matricula.", curso = '".$op_curso."'  where id_ = ".$id." ;"; //nome, matricula, id_ são os nomes dos campos no banco sql
                
                $stmt = mysqli_prepare($conexao, $query);
                mysqli_execute($stmt);
            
                mysqli_close($conexao);

                echo "<script>alert('Registro alterado com sucesso!');</script>";
                
            }
        }
        
        if ( $_GET["acao"] == "Excluir" )
        {
            
            include("conexao.php");

            if ($conexao)
            {
            
               $id = $_GET["campo_id"];
              
                $query = "delete from alunos where id_ = ".$id." ;";
                
                $stmt = mysqli_prepare($conexao, $query);
                mysqli_execute($stmt);
                
                mysqli_close($conexao);

                echo "<script>alert('Registro excluído com sucesso!');</script>";
            }
        }
        
        if ( $_GET["acao"] == "C" )
        {
        
            include("conexao.php");

            if ($conexao)
            {

                $id = $_GET["campo_id"];
                $nome = $_GET["campo_nome"];
                $quantidade = $_GET["campo_quantidade"];

                //$query = "insert into Produto values ( "'$id' , '".$nome."'  , '$quantidade'" );";
                $query = "insert into Produto values ( ".$id." , \"".$nome."\"  , ".$quantidade."  );";

                $stmt = mysqli_prepare($conexao, $query);
                mysqli_execute($stmt);

                mysqli_close($conexao);
            }
            
        }
        
    }

?>

<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consulta de Alunos | Curso Tech</title>

    <link rel="icon" href="img/favicon.png" />

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <link href="css/estilo.css" rel="stylesheet">

    <style type="text/css">

        body{
            color:#222222;
        }

        #formlogin {
            width: 100%;
            height: auto;
            background-color: white;
            border-radius: 20px;
        }

        .tituloform {
            color: #737373;
            font-weight: 300;
            font-size: 30px;
            text-align: center;
        }

        .txtarea {
            width: 95%;
            height: 40px;
            display: inline;
            font-size: 16px;
            line-height: 1.42857;
            color: #222222;
            background-color: #FFF;
            background-image: none;
            border: 1px solid #CCC;
            border-radius: 4px;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075);
            padding: 6px 12px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 5px;
        }

        #tabela{
            background-color:white;
        }

        .bgbranco{
            background-color: white;
            border-radius: 20px;
            padding-top: 15px;
        }

        .btn {
            display: inline-block;
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
            width: 95%;
            margin-top: 5%;
            margin-right: 9.8%;
            /*margin-left: 9.8%;*/
            font-size: 16px;
            margin: auto;
            display: block;
            margin-left: 18px;
            color:#969696;
            margin-top: -10px;
        }

        .btn:hover {
            color: #fff;
            background-color: #651dd4;
            margin-top: -10px;
        }

        .corcinza{
            color: #737373;
            padding: 0;
            margin: 0;
            margin-left: 10px;
        }

        h3{
            margin-top:20px;
            margin-bottom:0;
        }

    </style>


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
    elseif ($array['tipo'] == "con") {
                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome'];
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                    include("menu_con.php");  
    }
 ?>


    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="formlogin" class="container-fluid">

                    <div id="infologin" style="display:none;">
                Olá usuário: <?php echo $_SESSION["Usuario"]; ?> <br>
                Sua senha é: <?php echo $_SESSION["Usuario_Senha"]; ?><br>
                Seu nome é: <?php echo $_SESSION["Usuario_Nome"]; ?><br>
                Seu nível é: <?php echo $_SESSION["Usuario_Tipo"]; ?>
                    </div>

                <h3 class="tituloform">Consultar Alunos</h3>
                <br>

       <div id="div_principal">
            
          <fieldset class="bgbranco"> 
                                        
                <?php

                    //if (isset($_GET["acao"]))
                    //{

                       //if ( $_GET["acao"] == "LISTAR" )
                        //{

                            include("conexao.php");
                            
                            if ($conexao)
                            {

                                $query = "select * from alunos;";

                                $resultado = mysqli_query($conexao, $query);

                                ?>
                
                                    <!--<table>

                                        <tr class="linha">
                                            <td>
                                                <p>Id:</p>
                                            </td>

                                            <td>
                                                <p>Nome:</p>
                                            </td>

                                             <td>
                                                <p>Matrícula:</p>
                                            </td>
                                            
                                            <td>
                                                <p>Curso:</p>
                                            </td>
                                        </tr>

                                    </table>-->


                                    <?php

                                    $ind = 0;
                                    while($row = mysqli_fetch_row($resultado))
                                    {

                                    ?>

                                    <form action="#">
                                        <table>
                                        <tr>
                                            <td>
                                                <p class="corcinza">Código:</p>
                                            </td>

                                            <td>
                                                <p class="corcinza">Nome:</p>
                                            </td>

                                             <td>
                                                <p class="corcinza">Matrícula:</p>
                                            </td>
                                            
                                            <td>
                                                <p class="corcinza">Curso:</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="number" value="<?php echo $row[0];  ?>" name="campo_id" class="txtarea" readonly="yes">
                                            </td>

                                            <td>   
                                                <input type="text" value="<?php echo $row[1];  ?>" name="campo_nome" class="txtarea">
                                            </td>

                                            <td>
                                                <input type="number" value="<?php echo $row[2];  ?>" name="campo_matricula" class="txtarea">
                                            </td>

                                            <td>
                                                <input type="text" value="<?php echo $row[3];  ?>" name="campo_opcurso" class="txtarea">
                                            </td>
                                            
                                            <td>
                                                <input type="submit" value="Alterar" name="acao" class="btn">
                                            </td>
                                            
                                            <td>
                                                <input type="submit" value="Excluir" name="acao" class="btn">   
                                            </td>
                                        </tr>
                                        </table>
                                    </form>



                                    <?php
                                        
                                        $ind++;
                                    
                                    }

                                    ?>

                                    <br>

                                    <!--<form action="#"> 

                                        <table>
                                        <tr>
                                            <td>

                                                <input type="number" value="0" name="campo_id">
                                            </td>

                                            <td>    
                                                <input type="text" value="0" name="campo_nome" >
                                            </td>

                                            <td>
                                                <input type="number" value="0" name="campo_quantidade" >
                                            </td>
                                            
                                            <td>
                                                <input type="submit" value="C" name="acao">
                                            </td>

                                        </tr>

                                    </table>
                                    
                                </form>-->

                                <?php

                            }
                       // }
                    //}
                ?>
                
            </fieldset>
            
                    </div>

                </div>
            </div>
        <!-- /.row -->
        </div>
    </div>

    <!-- /.container -->

    <?php include("footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
