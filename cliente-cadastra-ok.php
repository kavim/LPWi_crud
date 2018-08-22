<?php
include_once 'classes/autoload.php';

// Login::checkAuth();


//coisas para melhorar
    //ta tudo feito de uma forma "didatica" pero no mucho... ta no meio do caminho... da pra calistenizar melhor 
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
            
            //aqui testo se foi criado o ClienteDao com sucesso e logo se o insert retorno true
            if($clienteDao->insert($cliente)){
                $msg = true;

            }else{
                $msg = false;
            }
            
        }else{
            echo "erro1";
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
                        <h1 class="page-header animated fadeInUp">Usuário</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 animated fadeInUp">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cadastro de Usuário
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                
                                    <div class="col-lg-6">
                                        <?php 
                                            if($msg){
                                                echo "<h2 class='text-success'> Usuário <b>".$cliente->getNome()."</b> Cadastrado!</h2>";
                                            }else{
                                                echo "<p class='text-danger'>erro ao cadastrar</p>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
<?php 
include 'template/footer.php';
?>
                    
