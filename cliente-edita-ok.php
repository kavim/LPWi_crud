<?php
include_once 'classes/autoload.php';

// vamos tentar calistenizar mais ainda...... acho q deu uma boa reduzida

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['nome']) && $_POST['nome'] != ""
        && isset($_POST['telefone']) && $_POST['telefone'] != ""
        && isset($_POST['saldo']) && $_POST['saldo'] != ""
        && isset($_POST['idcliente']) && $_POST['idcliente'] != ""
        ) {

        $cliente='';
        $clienteDao = new ClienteDao();


        if($cliente = new Cliente($_POST['idcliente'],$_POST['nome'], $_POST['telefone'],$_POST['saldo'])){
                
                if($clienteDao->update($cliente))
                {
                    $msg = true;
                }else{
                    $msg = false;
                }
                
        }else{
            echo "nao foi";
        }


   
}else{
    echo "falta coisa";
}

include 'template/head.php';
include 'template/nav.php';

?>

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
                                Editar Usuário
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        Usuário Editado!
                                    </div>
                                </div>
                            </div>
                        </div>

<?php 
include 'template/footer.php';
?>