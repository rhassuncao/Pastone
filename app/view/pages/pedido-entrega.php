<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once('../../controller/auth.php');
	
	$deny = array(4);
	
	if(!isset($_GET['id'])){
		$deny[] = 2;
	}
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../functionsPedidoEntrega.php';
    include_once '../functionsBairro.php';
    include_once '../functionsFuncionario.php';
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
    <title>Pastone - Pedido Entrega</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Pedido - Entrega</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        
                        if(isset($_GET["id"])){
                            
                            $id = $_GET["id"];
                            mostrarPedidoEntrega($id);
                            
                        } else {
                            
                            echo "<div class='panel panel-default'>
                                <div class='panel-heading'>
                                    Dados do Cliente
                                </div>
                                <div class='panel-body'>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='row'>
                                                <div class='col-lg-3'>
                                                    <div class='form-group'>
                                                        <label>Telefone</label>
                                                        <input id='telefoneBuscar' class='form-control only_numbers' name='telefone' maxlength='12' type='text'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-1 text-center custom-margin-top'>
                                                    <button type='button' id='buscar_telefone' name='buscar_telefone' class='btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <label>Situação</label>
														<label class='radio-inline'>
															<input type='radio' name='status' id='pendente' value='1' checked>Pendente
														</label>
														<label class='radio-inline'>
															<input type='radio' name='status' id='entregue' value='2'>Entregue
														</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style='margin-bottom: 12px;' class='row'>
                                                <div class='col-lg-4'>
                                                    <button type='button' id='copiar_cliente' class='btn  btn-success btn-block'>Copiar Dados</button>
                                                </div>
                                                <div class='col-lg-8'>
                                                    <input class='form-control' id='resumo_cliente'  readonly='readonly'>
                                                </div>
                                            </div>
											<div class='row'>
                                                <div class='col-lg-6'>
                                                    <label>Situação</label>
                                                    <label class='radio-inline'>
                                                        <input type='radio' name='ativo' id='ativo' value='1' checked>Ativo
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input type='radio' name='ativo' id='inativo' value='2'>Bloqueado
                                                    </label>
                                                </div>
												<div class='col-lg-6 text-right'>
													<label>Campos obrigatórios possuem (*)</label>
												</div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Número</label>
                                                        <input class='form-control' name='id' id='id'  readonly='readonly'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-8'>
                                                    <div class='form-group'>
                                                        <label>Nome*</label>
                                                        <input readonly='readonly' required maxlength='50' class='form-control' name='nome' id='nome'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Telefone 1*</label>
                                                        <input readonly='readonly' required class='form-control only_numbers' name='telefone1' id='telefone1'  maxlength='12' type='text'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Telefone 2</label>
                                                        <input readonly='readonly' required class='form-control only_numbers' name='telefone2' id='telefone2'  maxlength='12' type='text'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Telefone 3</label>
                                                        <input readonly='readonly' required class='form-control only_numbers' name='telefone3' id='telefone3'  maxlength='12' type='text'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-3'>
                                                    <div class='form-group'>
                                                        <label>CEP</label>
                                                        <input readonly='readonly' class='form-control only_numbers' name='cep' id='cep' maxlength='8' type='text'>
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
                                                        <input readonly='readonly' maxlength='30' required class='form-control' name='endereco' id='endereco'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-2'>
                                                    <div class='form-group'>
                                                        <label>Número*</label>
                                                        <input readonly='readonly' maxlength='8' required class='form-control' name='numero' id='numero'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Complemento</label>
                                                        <input readonly='readonly' maxlength='40' class='form-control' name='complemento' id='complemento'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-8'>
                                                    <div class='form-group'>
                                                        <label>Ponto de Referência</label>
                                                        <input readonly='readonly' maxlength='30' class='form-control' name='pontoReferencia' id='pontoReferencia'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Bairro*</label>
                                                        <select required disabled oninvalid='this.setCustomValidity('Cadastre um bairro antes de cadastrar um produto! Clique na opção Bairros, em seguida no botão Novo e cadastre um bairro')' name='bairro' class='form-control' id='bairro'>";
                                                        
                                                        imprimeBairrosSelect(NULL);
                                                        
                                                        echo "</select>
                                                    </div>
                                                </div>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Cidade*</label>
                                                        <input readonly='readonly' maxlength='20' required id='cidade' class='form-control' name='cidade'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Estado*</label>
                                                        <select disabled required name='estado' class='form-control' id='estado'>";
                                                        
                                                        imprimeEstadosSelect(NULL);
                                                        
                                                        echo "</select>
                                                    </div>
                                                </div>
                                            </div>
											<div class='row'>
												<div class='col-lg-12'>
													<div class='form-group'>
														<label>Observação</label>
														<textarea disabled class='form-control' maxlength='255' rows='3' id='observacao' name='observacao'></textarea>
													</div>
												</div>
											</div>
                                            <div class='row text-center'>
                                                <div class='col-lg-12'>
                                                    <button disabled id='salvar_cliente' type='button' class='btn btn-success btn-circle btn-lg' title='Salvar'><i class='fa fa-save'></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    Dados da entrega
                                </div>
                                <div class='panel-body'>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='row'>
                                                <div class='col-lg-6'>
                                                    <div class='form-group'>
                                                        <label>Taxa de Entrega</label>
                                                        <input readonly='readonly' name='taxaEntrega' id='taxaEntrega' value='0,00' class='form-control'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-6'>
                                                    <div class='form-group'>
                                                        <label>Entregador*</label>
                                                        <select id='entregador' class='form-control'>";
                                                            
                                                        imprimeEntregadoresSelect(NULL);
                                                            
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
                                    Pedido
                                </div>
                                <div class='panel-body'>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div id='listas'>
                                                <!-- aqui sao inseridos os pedidos-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row text-center'>
                                        <div class='col-lg-12'>
                                            <button title='Adicionar Item' id='add_field' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-plus'></i></button>
                                            <button title='Adicionar item meio a meio' id='add_field_meio' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-pie-chart'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    Dados de pagamento
                                </div>
                                <div class='panel-body'>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='row'>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Total</label>
                                                        <input id='total' readonly='readonly' value='0,00' class='form-control'>
                                                    </div>
                                                </div>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Forma de pagamento</label>
                                                        <select id='forma_pagamento' class='form-control'>
                                                            <option value='1'>Dinheiro</option>
                                                            <option value='2'>Cartão Crédito</option>
                                                            <option value='3'>Cartão Débito</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-lg-4'>
                                                    <div class='form-group'>
                                                        <label>Troco para</label>
                                                        <input type='number' step='0.01' id='troco' class='form-control'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row text-center'>
                                                <div class='col-lg-12'>
                                                    <button type='button' id='fechar_pedido' class='btn btn-success btn-circle btn-lg' title='Salvar e Imprimir'><i class='fa fa-save'></i></button>
                                                    <a href='pedidos-entrega.php'>
                                                        <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <!--forca o carregamento do js toda vez que o arquivo tiver um tamanho diferente-->
    <!--evita o cache-->
    <script src="../../../public/js/pedido.js?v=?<?=filesize('../../../public/js/pedido.js')?>"></script>
    <script src="../../../public/js/buscacep.js"></script>
    <script src="../../../public/js/money.js?v=?<?=filesize('../../../public/js/pedido.js')?>"></script>
    <script>
        $(document).ready(function() {
            
            if($('#entregador').has('option').length == 0 ){
                
                swal({
                    title: 'Não há entregadores ativos!',
                    text: 'Não é possível fazer um novo Pedido Entrega sem que haja pelo menos 1 entregador cadastrado. Cadastre um novo entregados na página de funcionários, desbloqueie um entregador ou ainda altere a função de algum funcionário para entregador.',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ver funcionários',
                    closeOnConfirm: false
                    
                }).then((result) => {
                    if (result.value)
                        window.location = "funcionarios.php";
                        
                })
            }
            
			function busca_telefone(){
				
				$('#listas').empty();
				contadorItens = 0;
				
				if($('#telefoneBuscar').val()==''){
					
					swal({
						title: 'Telefone Vazio!',
						html: $('<div>')
						.addClass('some-class')
						.text('Preencha um telefone'),
						animation: false,
						customClass: 'animated tada'
					})
					
					$('#id').val('');
					$('#nome').val('');
					$('#telefone1').val('');
					$('#telefone2').val(''); 
					$('#telefone3').val(''); 
					$('#cep').val(''); 
					$('#endereco').val(''); 
					$('#numero').val(''); 
					$('#complemento').val(''); 
					$('#pontoReferencia').val(''); 
					$('#bairro').val(1); 
					$('#cidade').val(''); 
					$('#estado').val('SP'); 
					$("input[name=ativo][value=1]").prop('checked', true);
					$('#taxaEntrega').val('0');
					$('#resumo_cliente').val('');
					$('#observacao').val('');
					calculaTotal();
					
				} else {
					
					$.ajax({
						
						url: 'ajaxBuscarTelefone.php',
						data: {
							telefone: $('#telefoneBuscar').val()
						},
						type: 'POST',
						
						success: function(resposta) {
							
							if(resposta.status==false){
								
								swal(
									'Cliente não encontrado!',
									'Cadastre o cliente!',
									'error'
								)
								
								$('#id').val('');
								$('#nome').val('');
								$('#telefone1').val($('#telefoneBuscar').val());
								$('#telefone2').val(''); 
								$('#telefone3').val(''); 
								$('#cep').val(''); 
								$('#endereco').val(''); 
								$('#numero').val(''); 
								$('#complemento').val(''); 
								$('#pontoReferencia').val(''); 
								$('#bairro').val(1); 
								$('#cidade').val(''); 
								$('#estado').val(1); 
								$("input[name=ativo][value=1]").prop('checked', true);
								$('#taxaEntrega').val('0');
								$('#resumo_cliente').val('');
								$('#observacao').val('');
								calculaTotal();
								
							} else {
								
								swal({
									position: 'center',
									type: 'success',
									title: 'Cliente Encontrado!',
									showConfirmButton: false,
									timer: 1500
								})
								
								$('#id').val(resposta.id);
								$('#nome').val(resposta.nome);
								$('#telefone1').val(resposta.telefone1);
								$('#telefone2').val(resposta.telefone2); 
								$('#telefone3').val(resposta.telefone3); 
								$('#cep').val(resposta.cep); 
								$('#endereco').val(resposta.endereco); 
								$('#numero').val(resposta.numero); 
								$('#complemento').val(resposta.complemento); 
								$('#pontoReferencia').val(resposta.ponto_referencia); 
								$('#bairro').val(resposta.bairro); 
								$('#cidade').val(resposta.cidade); 
								$('#estado').val(resposta.estado); 
								$("input[name=ativo][value="+resposta.ativo+"]").prop('checked', true);
								$('#observacao').val(resposta.observacao); 
								
								var texto = "Olá, " + 
									$('#nome').val() + 
									". " + 
									"Seu endereço é " + 
									$('#endereco').val() + 
									" nº " +
									$('#numero').val() +
									" - ";
								
								if($('#complemento').val() != ''){
									texto = texto + $('#complemento').val() +
										" - ";
								}
								
								if($('#pontoReferencia').val() != ''){
									texto = texto + 
										'Referência: ' +
										$('#pontoReferencia').val() +
										" - ";
								}
								
								texto =  texto +
									$('#bairro').find(":selected").text() +
									', ' +
									$('#cidade').val() +
									'/' +
									$('#estado').find(":selected").text() +    
									'?';
								
								$('#resumo_cliente').val(texto);
								
								$.ajax({
									
									url: 'buscaTaxa.php',
									data: {
										bairro: resposta.bairro
									},
									type: 'POST',
									
									success: function(taxa) {
										
										$('#taxaEntrega').val(formatReal(taxa));
										calculaTotal();
									},
								});
							}
							
							$("#nome").attr("readonly", false);
							$("#telefone1").attr("readonly", false);
							$("#telefone2").attr("readonly", false);
							$("#telefone3").attr("readonly", false);
							$("#cep").attr("readonly", false);
							$("#endereco").attr("readonly", false);
							$("#numero").attr("readonly", false);
							$("#complemento").attr("readonly", false);
							$("#pontoReferencia").attr("readonly", false);
							$("#bairro").attr("disabled", false);
							$("#cidade").attr("readonly", false);
							$("#estado").attr("disabled", false);
							$("#observacao").attr("disabled", false);
							$("#salvar_cliente").attr("disabled", false);
						},
					});    
				}
			}
            
            $('#buscar_telefone').click(function() {
                
               busca_telefone();
            });
			
			$('#telefoneBuscar').keypress(function(e){
				
				if ( e.which === 13 ){
					
					busca_telefone();
				};
			});
            
            $('#salvar_cliente').click(function() {
                
                var id = $('#id').val();
                var nome = $('#nome').val();
                var telefone1 = $('#telefone1').val();
                var telefone2 = $('#telefone2').val(); 
                var telefone3 = $('#telefone3').val(); 
                var cep = $('#cep').val(); 
                var endereco = $('#endereco').val(); 
                var numero = $('#numero').val(); 
                var complemento = $('#complemento').val(); 
                var pontoReferencia = $('#pontoReferencia').val(); 
                var bairro = $('#bairro').val(); 
                var cidade = $('#cidade').val(); 
                var estado = $('#estado').val(); 
                var ativo = $('input[name=ativo]:checked').val();
				var observacao = $('#observacao').val(); 
                
				if($('#nome').val()== '' || $('#telefone1').val()== '' || $('#endereco').val() == '' || $('#numero').val()== '' ||  $('#cidade').val() == ''){
					
					swal(
						'Campo obrigatório em branco!',
						'Um ou mais dos campos obrigatórios encontre-se em branco. Preencha todos os campos obrigatórios para continuar.',
						'warning'
					)
					
				} else {
					
					if(id==''){
						
						$.ajax({
							
							url: 'adicionaCliente.php',
							data: {
								nome: nome,
								telefone1: telefone1,
								telefone2: telefone2,
								telefone3: telefone3,
								cep: cep,
								endereco:endereco,
								numero: numero,
								complemento: complemento,
								pontoReferencia: pontoReferencia,
								bairro: bairro,
								cidade: cidade,
								estado: estado,
								ativo: ativo,
								flag: "OK",
								observacao: observacao
							},
							type: 'POST',
							
							success: function(resposta) {
								
								$('#id').val(resposta);
							},
						});
						
					} else {
						
						$.ajax({
							
							url: 'atualizaCliente.php',
							data: {
								id: id,
								nome: nome,
								telefone1: telefone1,
								telefone2: telefone2,
								telefone3: telefone3,
								cep: cep,
								endereco: endereco,
								numero: numero,
								complemento: complemento,
								pontoReferencia: pontoReferencia,
								bairro: bairro,
								cidade: cidade,
								ativo: ativo,
								estado: estado,
								observacao: observacao
							},
							type: 'POST',
							
							success: function(resposta) {
								
							},
						});
					}
					
					$.ajax({
						
						url: 'buscaTaxa.php',
						data: {
							bairro: bairro
						},
						type: 'POST',
						
						success: function(taxa) {
							
							$('#taxaEntrega').val(formatReal(taxa));
							calculaTotal();
						},
					});
					
					swal({
						position: 'center',
						type: 'success',
						title: 'Cliente Salvo, prossiga com o pedido!',
						showConfirmButton: false,
						timer: 1500
					})
				}
            });
            
            $("#fechar_pedido").on("click", function(e) {
                
				if(contadorItens <= 0 || !pedidoTemItem()){
                    
                    swal({
                        title: 'Nenhum item selecionado!',
                        html: $('<div>')
                        .addClass('some-class')
                        .text('Adicione itens ao pedido.'),
                        animation: false,
                        customClass: 'animated tada'
                    })
                    
                } else {
                    
                    //previne double clicks
                    $(this).off(e);
                    
                    $.ajax({
                        
                        url: 'ajaxCriaPedido.php',
                        data: {
                            recebidoPor: <?php echo $_SESSION['SESS_MEMBER_ID']; ?>,
                            formaPagamentoId: document.getElementById("forma_pagamento").value,
                        },
                        type: 'POST',
                        
                        success: function(pedidoId) {
                            
                            //impede que apareca troco negativo
                            if(document.getElementById('troco').value==0 || document.getElementById('troco').value == ""){
                                
                                var troco = 0;
                                
                            } else {
                               
                                var troco = getMoney(document.getElementById('troco').value) - getMoney(document.getElementById('total').value);
                            }
							
							var val;
							
							if (document.getElementById('entregue').checked) {
								
								val = 2;
								
							} else {
								
								val = 1;
							}
                            
                            //Cria o pedido Entrega
                            $.ajax({
                                
                                url: 'ajaxCriaPedidoEntrega.php',
                                data: {
                                    pedidoId: pedidoId,
                                    clienteId: $('#id').val(),
                                    entregadorId: $('#entregador').val(),
                                    troco: troco,
									statusPedidoId: val,
                                },
                                type: 'POST',
								async:false,
                                
                                success: function(pedidoEntregaId) {
                                    
                                    insereItensPedido(pedidoId);
                                    imprimePedidoEntrega(pedidoEntregaId);
                                },
                            }); 
                        }
                    });
                } 
            });
            
            $("#entregar_pedido").on("click", function(e) {
                
                swal({
                    title: 'O entregador está correto?',
                    text: "Após entregar o pedido não será possivel alterar o entregador!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, entregar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
                    if (result.value) {
                        
                        //previne double clicks
                        $(this).off(e);
                        
                        var pedidoEntregaId<?php 
                        
                        if(isset($_GET["id"])){
                            
                            echo " = ".$_GET["id"];
							
                        } else {
							
                            echo ";";
							
                        } ?> 
                        
                        $.ajax({
                            
                            url: 'mudaEntregadorPedidoEntrega.php',
                            data: {
                                entregadorId: $('#entregador').val(),
                                pedidoEntregaId: pedidoEntregaId,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
                                
                                $.ajax({
                                    
                                    url: 'mudaStatusPedidoEntrega.php',
                                    data: {
                                        pedidoEntregaId: pedidoEntregaId,
                                    },
                                    type: 'POST',
                                    
                                    success: function(resposta) {
                                        
                                        $.ajax({
                                            
                                            url: 'setTimeEntregueEntrega.php',
                                            data: {
                                                pedidoEntregaId: pedidoEntregaId,
                                            },
                                            type: 'POST',
                                            
                                            success: function(resposta) {
                                                
                                                window.location = "pedidos-entrega.php";
                                            },
                                        });
                                    },
                                });
                            },
                        });
                    }
                })
            });
            
            function imprimePedidoEntrega(pedidoEntregaId){
                
                w = window.open('printEntrega.php?pedidoEntregaId=' + pedidoEntregaId);
                w.print();
                window.location = 'pedidos-entrega.php';
            }
            
            $(".imprimir_pedido").on("click", function(e) {
                
                //previne double clicks
                $(this).off(e);
                
                imprimePedidoEntrega(this.id);
            });
            
            $(".cancelar_pedido").on("click", function(e) {
                
                swal({
                    title: 'Tem certeza?',
                    text: "Apagar o pedido apagará todos os itens do pedido!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, apagar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
                    if (result.value) {
                        
                        //previne double clicks
                        $(this).off(e);
						
						var pedidoEntregaId = this.id;
						
                        $.ajax({
                            
                            url: 'cancelaPedidoEntrega.php',
                            data: {
                                pedidoEntregaId: this.id,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
								
								$.ajax({
									
									url: 'setTimeEntregueEntrega.php',
									data: {
										pedidoEntregaId: pedidoEntregaId,
									},
									type: 'POST',
									
									success: function(resposta) {
										
										window.location = "pedidos-entrega.php";
									},
								});
                            },
                        });
                    }
                })
            });
            
            $('#copiar_cliente').click(function() {
                
                var copyText = document.getElementById('resumo_cliente');
                copyText.select();
                document.execCommand("Copy");
            });
        }); 
    </script>
	<script src="../../../public/js/onlyNumbers.js"></script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>