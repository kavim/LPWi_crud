<?php
include_once 'classes/autoload.php';

// Login::checkAuth();


//coisas para melhorar
    //faz o sucesso com um JS ou algo assim e logo redireciona pra listagem de usuarios... assim fica mais dinamico
    //e tbm um "estilo" com uma msg de erro... ta contando q só vai dar certo 
    //nos detahes de cada exercicio besta é q nós melhoramos
//fim

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['nome']) && $_POST['nome'] != ""
        && isset($_POST['telefone']) && $_POST['telefone'] != ""
        && isset($_POST['saldo']) && $_POST['saldo'] != "" ){

            //teoricamente seguro 
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

            $cliente = new Cliente(null,$nome, $_POST['telefone'],$_POST['saldo']);

        if($cliente){
            

            //cliente DAO pelo oq parece é tipo uma "model para classe" entao temos q fazer um inicio nela em algum lugar
            $clienteDao = new ClienteDao();
            $clienteDao->insert($cliente);
            //aqui testo se foi criado o ClienteDao com sucesso e logo se o insert retorno true
            // if(){
                
            //     echo "foi";

            // }else{
            //     echo "erro2";
            // }
            
        }else{
            echo "erro1";
        }


    
}else{
    echo "falta coisa";
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Gerenciador</title>

        <!-- Bootstrap Core CSS -->
        <link href="www/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="www/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="www/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="www/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Trocar navegação</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Gerenciador</a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Cadastro Básicos<span class="fa arrow"></span></a>
                                    <?php include 'menu.php' ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Usuário</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cadastro de Usuário
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        Usuário Cadastrado!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /#wrapper -->

                    <!-- jQuery -->
                    <script src="www/vendor/jquery/jquery.min.js"></script>
                    <!-- Bootstrap Core JavaScript -->
                    <script src="www/vendor/bootstrap/js/bootstrap.min.js"></script>
                    <!-- Metis Menu Plugin JavaScript -->
                    <script src="www/vendor/metisMenu/metisMenu.min.js"></script>
                    <!-- Custom Theme JavaScript -->
                    <script src="www/dist/js/sb-admin-2.js"></script>

                    </body>

                    </html>
