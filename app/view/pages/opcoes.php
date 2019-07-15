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
	
    include_once '../../model/DAO/configsDAO.php';
    include_once '../../controller/connectionFactory.php';
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
    <title>Pastone - Opções</title>
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
                    <h1 class="page-header">Opções de sistema</h1>
                </div>
            </div>
            <?php
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO    = new configsDAO($conn);
                $configs = $CDAO->buscarConfigs();
				
				$sim = '';
				$nao = '';
				
				if($configs->getNoveLinhasDepois()==1){
					
					$sim = 'checked';
					
				} else {
					
					$nao = 'checked';
				}
                
                echo "<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Exibição
                            </div>
                            <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <form role='form' method='post' action='alteraConfigs.php'>
                                            <div class='row'>
                                                <div class='col-lg-12'>
                                                    <div class='form-group'>
                                                        <label>Nome da Empresa</label>
                                                        <input maxlength='50' class='form-control' name='nomeCliente' value='".$configs->getNomeCliente()."'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-12'>
                                                    <div class='form-group'>
                                                        <label>Site da Empresa</label>
                                                        <input class='form-control' name='site'  value='".$configs->getSite()."' maxlength='100'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-12'>
                                                    <div class='form-group''>
                                                        <label>Facebook da Empresa</label>
                                                        <input class='form-control' name='facebook'  value='".$configs->getFacebook()."' maxlength='100'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-3'>
                                                    <div class='form-group'>
                                                        <label>Vias Balcão</label>
                                                        <input name='viasBalcao' class='form-control' type='number' value='".$configs->getViasBalcao()."' maxlength='2'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-3'>
                                                    <div class='form-group'>
                                                        <label>Vias Entrega</label>
                                                        <input name='viasEntrega' type='number' class='form-control' value='".$configs->getViasEntrega()."' maxlength='2'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-3'>
                                                    <div class='form-group'>
                                                        <label>Vias Mesa</label>
                                                        <input name='viasMesaSingle' type='number' class='form-control' value='".$configs->getViasMesaSingle()."' maxlength='2'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-3'>
                                                    <div class='form-group'>
                                                        <label>Vias Fechamento Mesa</label>
                                                        <input name='viasMesa' type='number' class='form-control' value='".$configs->getViasMesa()."' maxlength='2'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-6'>
                                                    <div class='form-group'>
                                                        <label>Número de Colunas</label>
                                                        <input name='numeroColunas' type='number' class='form-control' value='".$configs->getNumeroColunas()."' maxlength='4'>
                                                    </div>
                                                </div>
												<div class='col-lg-6'>
													<div class='form-group'>
														<div class='row'>
															<div class='col-lg-12'>
																<label>Nove Linhas Depois</label>
																<label class='radio-inline'>
																	<input type='radio' name='noveLinhasDepois' id='sim' value='1' ".$sim.">Sim
																</label>
																<label class='radio-inline'>
																	<input type='radio' name='noveLinhasDepois' id='nao' value='0' ".$nao.">Não
																</label>
															</div>
														</div>
													</div>
                                                </div>
                                            </div>
											<div class='row'>
                                                    <div class='col-lg-10'>
                                                        <div class='form-group'>
                                                            <label>Endereço*</label>
                                                            <input maxlength='30' required class='form-control' name='endereco' id='endereco'  value='".$configs->getEndereco()."'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2'>
                                                        <div class='form-group'>
                                                            <label>Número*</label>
                                                            <input maxlength='8' required class='form-control' name='numero'  value='".$configs->getNumero()."'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Bairro*</label>
                                                            <input id='bairro' maxlength='30'  value='".$configs->getBairro()."'required class='form-control' name='bairro'></select>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Cidade*</label>
                                                            <input id='cidade' maxlength='20'  value='".$configs->getCidade()."'required class='form-control' name='cidade'>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <div class='form-group'>
                                                            <label>Estado*</label>
                                                            <select id='estado' required name='estado' class='form-control'>";
															
															imprimeEstadosSelect($configs->getEstado());
															
															echo "</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class='row text-center'>
                                                <div class='col-lg-12'>
                                                    <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                                    <a href='index.php'>
                                                        <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Backups
                            </div>
                            <div class='panel-body'>
                                <div class='row text-center'>
                                    <div class='col-lg-12'>
                                        <button id='criar_backup' title='Cria um novo ponto de backup' type='button' class='btn btn-default btn-lg'>Criar backup</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Restauração de sistema
                            </div>
                            <div class='panel-body'>
                                <div class='row text-center'>
                                    <div class='col-lg-12'>
                                        <button id='restaurar_original' title='Restaurar configurações originais' type='button' class='btn btn-danger btn-lg'>Restaurar Sistema</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>";
            ?>
        </div>
    </div>
    <?php include 'basicscripts.php';?>
    <?php include 'tablescripts.php';?>
    <script>
        $(document).ready(function() {
            
            $("#restaurar_original").on("click", function(e) {
                
				swal.queue([{
					title: 'Tem certeza?',
					text: "Restaurar o sistema aparagá todos os dados inseridos até agora!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim, restaurar!',
					cancelButtonText: 'Cancelar!',
					showLoaderOnConfirm: true,
					preConfirm: () => {
						
						return fetch('restauraSistema.php')
							.then(response => swal.insertQueueStep({
							type: 'success',
							title: 'Base de dados restaurada'
						}))
							.catch(() => {
							swal.insertQueueStep({
								type: 'error',
								title: 'Não foi possível restaurar a base de dados'
							})
						})
						
/*						$.ajax({
							
							url: 'restauraSistema.php',
							type: 'POST',
							
							success: function(resposta) {
								
								window.location = 'index.php';
							},
						});*/
					}
				}]).then((result) => {
					
					window.location = 'index.php';
				})
            });
        });
    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>