<html>
<head>
    <style type="text/css">
            .navbar-nav li {
            font-size: 16px;
            padding-left: 0px;
            padding-right: 0px;
            }

            .btn_logout {
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
                width: 30%;
                font-size: 16px;
                margin-top: 0.6%;
                margin-left: 3%;
            }

            .btn-logout {
                color: #fff;
                background-color: #651dd4;
                border-color: #651dd4;
                width: 10%;
                height: 35px;
                color: white;
            }

            .btn-logout:hover {
                color: #fff;
                background-color: #351853;
                border-color: #351853;
                width: 10%;
                height: 35px;
                color: white;
            }

    </style>
</head>
<body>

   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><h1 class="inline"><a href="index.php"><img src="img/logo2.png" alt="Curso Tech" title="Curso Tech"></a></h1></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Cadastrar</a>
                    </li>
                    <li>
                        <a href="editar.php">Editar</a>
                    </li>
                    <li>
                        <a href="excluir.php">Excluir</a>
                    </li>
                    <li>
                        <a href="#">Consultar</a>
                    </li>
                </ul>
                <form method="GET">
                <input type="submit" name="acao" value="Logout" class="btn_logout btn-logout">
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</body>
</html>