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
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="../../../public/img/favicon-16x16.png" />
    <title>Pastone - Clientes</title>
    <?php include 'basiclinks.php' ?>
    <!-- DataTables CSS -->
    <link href="../../../public/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../../../public/css/dataTables/dataTables.responsive.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clientes</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Clientes
                        </div>
                        <div class="panel-body">
							<div class='row'>
								<div class='col-lg-12'>
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th>Numero</th>
													<th>Nome</th>
													<th>Telefone 1</th>
													<th>Telefone 2</th>
													<th>Telefone 3</th>
													<th>CEP</th>
													<th>Endereço</th>
													<th>Numero</th>
													<th>Complemento</th>
													<th>Referência</th>
													<th>Bairro</th>
													<th>Cidade</th>
													<th>Estado</th>
													<th>Situação</th>
													<th>Observação</th>
												</tr>
											</thead>
											<tbody>
												<?php

												imprimeClientes();

												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="cadastro-clientes.php">
                                        <button title="Adicionar" type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <?php include 'tablescripts.php'; ?>
</body>
</html>