<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once('../../controller/auth.php');
	
	$deny = array(2, 4);
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../functionsCliente.php';
    include_once '../functionsBairro.php';
    include_once '../functionsEstado.php';
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.css" rel="stylesheet">
    <title>Pastone - Clientes</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
    <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Clientes</h1>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Dados do Cliente
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <?php
                                        
                                        if(isset($_GET["id"])){
                                            
                                            $id = $_GET["id"];
                                            mostrarCliente($id);
                                                
                                        } else {
                                                
                                            echo "<form role='form' method='post' action='adicionaCliente.php'>
                                                <div class='form-group'>
                                                    <div class='row'>
                                                        <div class='col-lg-6'>
                                                            <label>Situação</label>
                                                            <label class='radio-inline'>
                                                                <input type='radio' name='ativo' id='optionsRadiosInline1' value='1' checked>Ativo
                                                            </label>
                                                            <label class='radio-inline'>
                                                                <input type='radio' name='ativo' id='optionsRadiosInline2' value='0'>Bloqueado
                                                            </label>
                                                        </div>
                                                        <div style='text-align: right;' class='col-lg-6'>
                                                            <label>Campos obrigatórios possuem (*)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Número</label>
                                                            <input class='form-control' name='id'  readonly='readonly'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-8'>
                                                        <div class='form-group'>
                                                            <label>Nome*</label>
                                                            <input required maxlength='50' class='form-control noEnterSubmit' name='nome'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Telefone 1*</label>
                                                            <input required maxlength='12' class='form-control only_numbers' name='telefone1'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Telefone 2</label>
                                                            <input maxlength='12' class='form-control only_numbers' name='telefone2'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Telefone 3</label>
                                                            <input maxlength='12' class='form-control only_numbers' name='telefone3'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-3'>
                                                        <div class='form-group'>
                                                            <label>CEP</label>
                                                            <input maxlength='8' id='cep' class='form-control only_numbers' name='cep'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-1 text-center'>
                                                        <button readonly='readonly' id='button_buscar_cep' type='button' class='custom-margin-top btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-10'>
                                                        <div class='form-group'>
                                                            <label>Endereço*</label>
                                                            <input maxlength='30' required class='form-control' name='endereco' id='endereco'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2'>
                                                        <div class='form-group'>
                                                            <label>Número*</label>
                                                            <input maxlength='8' required class='form-control' name='numero'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Complemento</label>
                                                            <input maxlength='40' class='form-control' name='complemento'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-8'>
                                                        <div class='form-group'>
                                                            <label>Ponto de Referência</label>
                                                            <input  maxlength='30' class='form-control' name='pontoReferencia'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Bairro*</label>
                                                            <select id='bairro' required oninvalid=\"this.setCustomValidity('Cadastre um bairro antes de cadastrar um cliente! Clique na opção Bairros, em seguida no botão Novo e cadastre um bairro')\" name='bairro' class='form-control'>";
                                                            
                                                            imprimeBairrosSelect(NULL);
                                                            
                                                            echo "</select>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Cidade*</label>
                                                            <input id='cidade' maxlength='20' value='Santos' required class='form-control' name='cidade'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Estado*</label>
                                                            <select id='estado' required name='estado' class='form-control'>";
                                                            
                                                            imprimeEstadosSelect(NULL);
                                                            
                                                        echo "</select>
                                                        </div>
                                                    </div>
                                                </div>
												<div class='row'>
													<div class='col-lg-12'>
														<div class='form-group'>
															<label>Observação</label>
															<textarea class='form-control' maxlength='255' rows='3' name='observacao'></textarea>
														</div>
													</div>
												</div>
                                                <div class='row text-center'>
                                                    <div class='col-lg-12'>
                                                        <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                                        <a href='clientes.php'>
                                                            <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>";
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <script src="../../../public/js/buscacep.js"></script>
	<script src="../../../public/js/onlyNumbers.js"></script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>
