<?php
include_once 'classes/autoload.php';


$produtoDao = new ProdutoDao();
$lista = $produtoDao->select();



include 'template/head.php';
include 'template/nav.php';
?>


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
                           <button type="button" onclick="window.location='produto-lista.php'"class="btn btn-outline btn-primary">Pesquisar</button>
                           <button type="button" onclick="window.location='produto-cadastra.php'" class="btn btn-outline btn-primary">Novo</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>fornecedor</th>
                                            <th>valor Custo</th>
                                            <th>valor venda</th>
                                            <th>estoque quantity</th>
                                            <th>IMG</th>
                                            <th>acoes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($lista as $produto): ?>
                                        <tr>
                                            <td><?php echo $produto->getIdproduto(); ?></td>
                                            <td><?php echo $produto->getNome(); ?></td>
                                            <td><?php echo $produto->getFornecedor(); ?></td>
                                            <td><?php echo $produto->getValorCusto(); ?></td>
                                            <td><?php echo $produto->getValorVenda(); ?></td>
                                            <td><?php echo $produto->getEstoqueAtual(); ?></td>
                                            <td><img src="upload/<?php echo $produto->getImagem(); ?>" width="50" height="50"/></td>
                                            
                                        </tr>
                                       <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
include 'template/footer.php';
?>