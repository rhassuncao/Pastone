<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once '../../controller/auth.php';
	
	$deny = array();
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pastone - Manual</title>
    <!-- Responsible video css -->
    <link href="../../../public/css/video.css" rel="stylesheet">
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manual</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Introdução
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/enMhR29JxMA?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="textp customBordered">
                                    	<p>Bem vindo ao manual do Pastone WEB. Aqui você encontrará tutorias que auxiliam o usuário a aprender todas as funções disponíveis no sistema. Assita os vídeos em sequência para aprender todas as funções. Bons estudos!</p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Login e Logout
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/bGRXcvD_lo4?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
								<div class="col-lg-6">
                                    <div class="customBordered">
										<label>Login</label>
										<ol>
											<li>Abra a tela de login do programa</li>
											<li>Digite seu nome de usuário</li>
											<li>Digite sua senha</li>
											<li>Clique no botão entrar</li>
										</ol>
										<label>Logout</label>
										<ol>
											<li>No canto direito da barra superior, clique no nome do usuário logado</li>
											<li>Selecione a opção logout</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tela inicial
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/Ko2zkIfaGzw?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<p class="textp">A <a target='_blank' href='index.php'>Tela Inicial</a> é composta de 3 partes principal: A barra superior, o menu lateral e a área de conteúdo.</p>
										<label>Barra superior</label>
										<p class="textp">Contém alguns atalhos e opções do usuário logado</p>
										<label>Menu Lateral</label>
										<p class="textp">Contém as opções do sistema</p>
										<label>Área de conteúdo</label>
										<p class="textp">Área que mostra os conteúdos da opção selecionada</p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sobre
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/L8Pzi_6YL-Y?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
                                    	<p class="textp">Para ter acesso as informações do sistema basta clicar na opção <a target='_blank' href='sobre.php'>Sobre</a> do menu lateral</p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adicionar e editar funcionários
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/5kWj6sZvKmY?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Funcionário</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='funcionarios.php'>Funcionários</a></li>
											<li>Na <a target='_blank' href='funcionarios.php'>tela de listagem de funcionário</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='cadastro-funcionario.php'>tela de cadastro de funcionário</a> digite os dados do funcionário</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
										<label>Editar dados de funcionário</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='funcionarios.php'>Funcionário</a></li>
											<li>Na <a target='_blank' href='funcionarios.php'>tela de listagem de funcionário</a> clique sobre o Id do funcionário que se deseja editar</li>
											<li>Na tela de cadastro de funcionário edite os dados desejados</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adicionar e editar categorias
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/-foyEvvg3dc?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Categoria</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='categoriasProduto.php'>Categorias de produtos</a></li>
											<li>Na <a target='_blank' href='categoriasProduto.php'>tela de listagem de Categorias de produtos</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='cadastro-categorias.php'>tela de cadastro de Categorias de produtos</a> digite os dados da Categoria de Produto</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
										<label>Editar dados de Categoria de Produto</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='categoriasProduto.php'>Categoria de Produto</a></li>
											<li>Na <a target='_blank' href='categoriasProduto.php'>tela de listagem de Categoria de Produto</a> clique sobre o Id da Categoria de Produto que se deseja editar</li>
											<li>Na tela de cadastro de Categoria de Produto edite os dados desejados</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adicionar e editar produtos
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/vVqwBTUwVdY?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Produto</label>
										<p class="textp">Antes de cadastrar um produto certifique-se de ter uma categoria cadastrada na opção <a target='_blank' href='categoriasProduto.php'>Categorias</a></p>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='produtos.php'>Produtos</a></li>
											<li>Na <a target='_blank' href='produtos.php'>tela de listagem de Produtos</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='cadastro-produto.php'>tela de cadastro de Produtos</a> digite os dados do Produto</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
										<label>Editar dados de Produto</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='produtos.php'>Produtos</a></li>
											<li>Na tela de listagem de Produto clique sobre o Id do Produto que se deseja editar</li>
											<li>Na tela de cadastro de Produto edite os dados desejados</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adicionar e editar mesas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/aq45AU2HVIU?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Mesa</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='mesas.php'>Mesas</a></li>
											<li>Na <a target='_blank' href='mesas.php'>tela de listagem de Mesas</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='cadastro-mesa.php'>tela de cadastro de Mesas</a> digite os dados do Mesa</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
										<label>Editar dados de Mesa</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='mesas.php'>Mesas</a></li>
											<li>Na <a target='_blank' href='mesas.php'>tela de listagem de Mesas</a> clique sobre o Id do Mesa que se deseja editar</li>
											<li>Na tela de cadastro de Mesa edite os dados desejados</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adicionar e editar bairros
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/OWyf9tpMaqg?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Bairro</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='bairros.php'>Bairros</a></li>
											<li>Na <a target='_blank' href='bairros.php'>tela de listagem de Bairros</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='cadastro-bairro.php'>tela de cadastro de Bairros</a> digite os dados do Bairro</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
										<label>Editar dados de Bairro</label>
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='bairros.php'>Bairros</a></li>
											<li>Na <a target='_blank' href='bairros.php'>tela de listagem de Bairros</a> clique sobre o Id do Bairro que se deseja editar</li>
											<li>Na tela de cadastro de Bairro edite os dados desejados</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pedido Balcão
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/SzH-i1yjoFg?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Pedido Balcão</label>
										<ol>
											<li>No menu lateral selecione a opção Pedidos e em seguida a opção <a target='_blank' href='pedidos-balcao.php'>Balcão</a></li>
											<li>Na <a target='_blank' href='pedidos-balcao.php'>tela de listagem de Pedidos Balcão</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='pedido-balcao.php'>tela de cadastro de Pedido Balcão</a> digite o nome do cliente</li>
											<li>Adicione itens ao pedido</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Adicione a forma de pagamento</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pedido Mesa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/OYd5hqPvtj4?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Pedido Mesa</label>
										<ol>
											<li>No menu lateral selecione a opção Pedidos e em seguida a opção <a target='_blank' href='pedidos-mesa.php'>Mesa</a></li>
											<li>Na tela de listagem Mesas selecione a aba da mesa desejada</li>
											<li>Clique no botão Adicionar</li>
											<li>Adicione itens ao pedido</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pedido Entrega
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/c_24HXk4N7k?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<label>Adicionar Pedido Entrega</label>
										<p class="textp">Antes de cadastrar um pedido de entrega certifique-se que haja pelo menos um entregador cadastrado na aba <a target='_blank' href='funcionarios.php'>Funcionários</a> assim como pelo menos um bairro na aba <a target='_blank' href='bairros.php'>Bairros</a></p>
										<ol>
											<li>No menu lateral selecione a opção Pedidos e em seguida a opção <a target='_blank' href='pedidos-entrega.php'>Entrega</a></li>
											<li>Na <a target='_blank' href='pedidos-entrega.php'>tela de listagem de Pedidos Entrega</a> clique no botão Adicionar</li>
											<li>Na <a target='_blank' href='pedido-entrega.php'>tela de cadastro de Pedido Entrega</a> busque o telefone do cliente</li>
											<ol>
												<li type="I">Caso o cliente ja este cadastrado prossiga com o pedido</li>
												<li type="I">Cado contrário cadastre o cliente</li>
												<ol>
													<li type="A">Digite os dados co cliente</li>
													<li type="A">Clique no botão Salvar</li>
												</ol>
											</ol>
											<li>Selecione o entregador</li>
											<li>Adicione itens ao pedido</li>
											<li>Selecione a forma de pagamento</li>
											<li>Caso seja necessário adicione informações sobre o troco</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver e alterar clientes
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/_fpUHdWjr8o?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<ol>
											<li>No menu lateral selecione a opção <a target='_blank' href='clientes.php'>Clientes</a></li>
											<li>Na <a target='_blank' href='clientes.php'>tela de listagem de Clientes</a> clique sobre o Id do Cliente que se deseja editar</li>
											<li>Na tela de cadastro de Cliente edite os dados desejados</li>
											<li>Confirme que todos os campos obrigatórios foram preenchidos</li>
											<li>Clique no botão Salvar</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Busca de clientes já cadastrados
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/Ux3xoP1AdR4?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
                                    	<p class="textp">OS clientes cadastrados ficam disponíveis e para os próximos pedidos Entrega, basca buscar o número do cliente na hora de fazer o pedido</p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Relatório de entregas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/PjT4fct-snM?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<ol>
											<li>No menu lateral seleciona a opção Relatórios e em seguida, clique em <a target='_blank' href='relatorio-entregas.php'>Entregas</a></li>
											<li>Para zerar as entregas de um entregador</li>
										</ol>
										<label>Zerar Entregas</label>
										<ol>
											<li>Selecione a aba do entregador desejado</li>
											<li>Click no botão zerar entregas</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Relatório de vendas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/S609abkM4Ts?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<ol>
											<li>No menu lateral selecione a opção Relatórios e em seguida selecione a opção <a target='_blank' href='relatorio-vendas.php'>Vendas</a></li>
										</ol>
										<label>Lançar vendas</label>
										<ol>
											<li>Click no botão Lançar</li>
										</ol>
										<label>Imprimir Relatório</label>
										<ol>
											<li>clique no botão Imprimir</li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contato e suporte
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/CgHz0T-xTqY?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<ol>
											<li>No menu lateral selecione a opção sistema e em seguida clique no botão <a target='_blank' href='sobre.php'>Sobre</a></li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manual
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/Qcwv9ePr1c4?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
										<ol>
											<li>No menu lateral selecione a opção sistema e em seguida clique no botão <a target='_blank' href='manual.php'>Manual</a></li>
										</ol>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Considerações finais
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="video-container loader-div">
                                        <iframe class="video" src="https://www.youtube.com/embed/eXyNaAZ0ISk?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-6">
									<div class="customBordered">
                                    	<p class="textp">Se você assistiu todos os vídeos e chegou até aqui significa que consegue operar o sistema plenamente. Parabéns e bons negócios!</p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php';?>
</body>
</html>