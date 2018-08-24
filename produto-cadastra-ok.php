<?php

//coisas pra fazer aqui... mostrar oq foi cadastrado e um lisk pra lista de coisas caastradas
//vamo trabalha esse UX


include_once 'classes/autoload.php';


//Verifica se veio tudo preenchido do formulário
if (   !Validate::isEmpty('nome')
    && !Validate::isEmpty('fornecedor')
    && !Validate::isEmpty('valorCusto')
    && !Validate::isEmpty('valorVenda')
    && !Validate::isEmpty('estoqueAtual')

    ) {

//inicio
$nomeArquivo="";
if (isset($_FILES['imagem'])&& $_FILES['imagem']['name'] !=""){
  $nomeArquivo=$_FILES['imagem']['name'];


  $origem=$_FILES['imagem']['tmp_name'];
  $destino='upload/'.$_FILES['imagem']['name'];
  move_uploaded_file($origem, $destino);

}

    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setFornecedor($_POST['fornecedor']);
    $produto->setValorCusto($_POST['valorCusto']);
    $produto->setValorVenda($_POST['valorVenda']);
    $produto->setEstoqueAtual($_POST['estoqueAtual']);
    $produto->setImagem($nomeArquivo);

    $produtoDao = new ProdutoDao();
    if($produtoDao){
        if($produtoDao->insert($produto)){
            $msg = true;
        }else{
            $msg = false;
        }
    }else{
        echo "erro1";
    }
    
    
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
                        <h1 class="page-header">Produto</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cadastro de Produto
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php 
                                            if($msg){
                                                echo "<h2 class='text-success'> Produto Cadastrado! <b>".$produto->getNome()."</b> Cadastrado!</h2>".
                                                "<br>".
                                                "<img src='upload/".$produto->getImagem()."' width='150'>";
                                            }else{
                                                echo "<h2 class='text-danger'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                                                 erro ao cadastrar</h2>";
                                            }
                                        ?>
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
