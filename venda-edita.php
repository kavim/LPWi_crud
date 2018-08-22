<?php
include_once 'classes/autoload.php';


//Verifica se veio tudo preenchido do formulário
if (isset($_GET['idvenda']) && $_GET['idvenda'] != "") {

    $venda = new Venda();
    $venda->setIdvenda($_GET['idvenda']);

    $vendaDao = new VendaDao();
    $vendaData = $vendaDao->selectById($venda);

    $clienteDao = new ClienteDao();
    $clientes = $clienteDao->select();

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
                                <ul class="nav nav-second-level">
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
                        <h1 class="page-header">venda</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Editar venda
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="venda-edita-ok.php" method="POST" enctype="multipart/form-data">

                                            <input type="hidden" name="idvenda" value="<?php echo $vendaData->getIdvenda(); ?>" >
                                            <div class="form-group">
                                                <label>dta</label>
                                                <input class="form-control" value="<?php echo $vendaData->getData(); ?>" placeholder="venda" name="data" required="true">
                                            </div>

                                             <div class="form-group">
                                                <label>valor final</label>
                                                <input class="form-control" value="<?php echo $vendaData->getValorFinal(); ?>"placeholder="Descrição" name="valorFilal" required="true">
                                            </div>



                                             <div class="form-group">
                                                <label>cliente</label>
                                                <select name="idcliente">
                                                    <?php foreach($clientes as $cliente) : ?>
                                                        <option value="<?php echo $cliente->getIdcliente(); ?>"><?php echo $cliente->getCliente(); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-default">Salvar</button>

                                        </form>
                                    </div>

                                </div>
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
