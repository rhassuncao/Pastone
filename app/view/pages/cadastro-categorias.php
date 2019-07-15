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
	
    include_once '../functionsCategoriaProduto.php';
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pastone - Nova Categoria</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Categoria de Produtos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados da categoria
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                        
                                        if(isset($_GET["id"])){
                                            
                                            $id = $_GET["id"];
                                            mostrarCategoriaProduto($id);
                                            
                                        } else {
                                            
                                            echo "<form role='form' method='post' action='adicionaCategoria.php'>
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
                                                            <label>ID</label>
                                                            <input class='form-control'  readonly='readonly'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-8'>
                                                        <div class='form-group'>
                                                            <label>Nome*</label>
                                                            <input maxlength='50' required class='form-control' name='nome'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-12'>
                                                        <div class='form-group'>
                                                            <label>Descrição*</label>
                                                            <input required maxlength='200' class='form-control' name='descricao'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row text-center'>
                                                    <div class='col-lg-12'>
                                                        <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                                        <a href='categoriasProduto.php'>
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
</body>
</html>