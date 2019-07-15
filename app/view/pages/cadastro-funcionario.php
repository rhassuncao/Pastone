<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once '../../controller/auth.php';
	
	$deny = array(2, 3, 4);
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../functionsFuncionario.php';
    include_once '../functionsCategoriaFuncionario.php';
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
    <title>Pastone - Funcionários</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Funcionário</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        
                        if(isset($_GET["id"])){
                            
                            $id = $_GET["id"];
                            mostrarFuncionario($id);
                            
                        } else {
                            
                            echo "<form role='form' method='post' action='adicionaFuncionario.php'>
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
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Identificação
                                    </div>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='row'>
                                                    <div class='col-lg-2'>
                                                        <div class='form-group'>
                                                            <label>ID</label>
                                                            <input name='id' class='form-control'  readonly='readonly'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <div class='form-group'>
                                                            <label>Nome*</label>
                                                            <input maxlength='50' required name='nome' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Função*</label>
                                                            <select required name='categoriaFuncionario' class='form-control'> ";
                                                                
                                                            imprimeCategoriasFuncionarioSelect(NULL);
                                                                
                                                            echo "</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Dados de Contato
                                    </div>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Telefone 1*</label>
                                                            <input maxlength='12' required name='telefone1' class='form-control only_numbers'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Telefone 2</label>
                                                            <input maxlength='12' name='telefone2' class='form-control only_numbers'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Telefone 3</label>
                                                            <input maxlength='12' name='telefone3' class='form-control only_numbers'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Dados de Enredeço
                                    </div>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='row'>
                                                    <div class='col-lg-3'>
                                                        <div class='form-group'>
                                                            <label>CEP</label>
                                                            <input id='cep' maxlength='8' name='cep' class='form-control only_numbers'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-1 custom-margin-top text-center'>
                                                        <button readonly='readonly' id='button_buscar_cep' type='button' class='btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-10'>
                                                        <div class='form-group'>
                                                            <label>Endereço*</label>
                                                            <input id='endereco' maxlength='30' required name='endereco' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2'>
                                                        <div class='form-group'>
                                                            <label>Número*</label>
                                                            <input maxlength='8' required name='numero' class='form-control'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Complemento</label>
                                                            <input maxlength='40' name='complemento' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-8'>
                                                        <div class='form-group'>
                                                            <label>Ponto de Referência</label>
                                                            <input maxlength='50' name='pontoReferencia' class='form-control'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Bairro*</label>
                                                            <input id='bairro_field' maxlength='20' required name='bairro' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Cidade*</label>
                                                            <input id='cidade' maxlength='20' value='Santos' required name='cidade' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Estado*</label>
                                                            <select id='estado' required name='estado' class='form-control'>";
                                                                
                                                            imprimeEstadosSelect(25);
                                                                    
                                                            echo "</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Documentos
                                    </div>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='row'>
                                                    <div class='col-lg-3'>
                                                        <div class='form-group'>
                                                            <label>RG - Apenas números</label>
                                                            <input maxlength='10' name='rg' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-3'>
                                                        <div class='form-group'>
                                                            <label>CPF  - Apenas números</label>
                                                            <input maxlength='12' name='cpf' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-3'>
                                                        <div class='form-group'>
                                                            <label>Data Nascimento</label>
                                                            <input name='dataNascimento' value='2000-01-01' type='date' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-3'>
                                                        <div class='form-group'>
                                                            <label>CTPS - Apenas números</label>
                                                            <input maxlength='20' name='ctps' class='form-control'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Rendimentos
                                    </div>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Salário</label>
                                                            <input maxlength='8' type='number' step='0.01' name='salario' value='0' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Vale Transporte</label>
                                                            <input maxlength='6' type='number' step='0.01' name='valeTransporte' value='0' class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Vale Refeição</label>
                                                            <input maxlength='6' type='number' step='0.01' name='valeRefeicao' value='0' class='form-control'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Dados do Sistema
                                    </div>
                                    <div class='panel-body'>
                                        <div class='row'>
                                            <div class='col-lg-6'>
                                                <div class='form-group'>
                                                    <label>Email</label>
                                                    <input type='email' maxlength='30' name='email' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='col-lg-6'>
                                                <div class='form-group'>
                                                    <label>Senha</label>
                                                    <input maxlength='20' name='senha' type='password' class='form-control'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row text-center'>
                                            <div class='col-lg-12'>
                                                <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                                <a href='funcionarios.php'>
                                                    <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php';?>
    <script src="../../../public/js/buscacep.js"></script>
	<script src="../../../public/js/onlyNumbers.js"></script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>