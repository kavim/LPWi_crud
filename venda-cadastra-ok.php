<?php
                                        include_once 'classes/autoload.php';


                                        //Verifica se veio tudo preenchido do formulário
                                        if (   !Validate::isEmpty('idcliente')
                                            && !Validate::isEmpty('idproduto')
                                            && !Validate::isEmpty('quantidade')
                                            ) {

                                            $produtos = new ProdutoDao();

                                            $prod = $produtos->selectById($_POST['idproduto']);

                                           
                                                                                       
                                            if($_POST['quantidade'] > $prod->getEstoqueAtual()){
                                                echo "quantidade acima do limite";
                                                echo "<a href='/'>voltar<a>";
                                                exit;
                                            }

                                            $valorFinal = $prod->getvalorVenda() * $_POST['quantidade'];
                                            $atual = $prod->getEstoqueAtual() - $_POST['quantidade'];                                      

                                            $venda = new Venda();
                                            $venda->setDataVenda(date('H:i:s'));
                                            $venda->setValorFinal($valorFinal);
                                            $venda->setCliente($_POST['idcliente']);

                                            $vendaDao = new VendaDao();

                                            if($vendaDao->insert($venda)){
                                            
                                                $ultima = $vendaDao->ultima();

                                                if($vendaDao->vendaProdutos($ultima, $_POST['idproduto'])){                                                   
                                                        
                                                        if($produtos->updateQuantity($_POST['idproduto'], $atual)){
                                                            $msg =true;
                                                        }else{
                                                            echo "atualizar de erro;";
                                                        }
                                                    
                                                }else{
                                                    $msg =false;
                                                }

                                            }else{
                                                echo "erro ao cadastrar";
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
                        <h1 class="page-header">venda</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cadastro de venda
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <?php
                                        if($msg){
                                            echo "<h2 class='text-success'> Venda de <b>".$prod->getNome()."</b> Cadastrado!</h2>".
                                            "<br>".
                                            "<img src='upload/".$prod->getImagem()."' width='150'>";
                                            echo "<p> quantidade : ".$_POST['quantidade']."</p>";
                                            echo "<h1> total : R$".$venda->getValorFinal().",00</h1>";
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
