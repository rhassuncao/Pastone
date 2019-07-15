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
	
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/configsDAO.php';
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pastone - Sobre</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sobre</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados do Sistema
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Cliente: 
                                                    <?php
                                                        
                                                        $cf   = new connectionFactory();
                                                        $conn = $cf->getConnection();
                                                        
                                                        $confDAO = new configsDAO($conn);
                                                        $configs = $confDAO->buscarConfigs();
                                                        
                                                        echo $configs->getNomeCliente();
                                                        
                                                    ?>
                                                </label><br>
                                                <label>Data de aquisicao:  
                                                    <?php
                                                    
                                                    echo $configs->getAquisicao();
                                                    
                                                    ?>
                                                </label><br>
                                                <label>Data de expiração:  
                                                    <?php
                                                    
                                                    echo $configs->getExpiracao();
                                                    
                                                    ?>
                                                </label><br>
                                                <label>Desenvolvido por Link Santos Tecnologia</label>
                                                <a href="https://www.facebook.com/Link-Santos-139627246648825/?ref=br_rs" target="_blank"><i class="fa fa-facebook-square fa-fw"></i></a>
                                                <a href="http://www.linksantos.com" target="_blank"><i class="fa fa-edge fa-fw"></i></a><br> 
                                                <i class="fa fa-envelope fa-fw"></i><label>contato@linksantos.com</label><br> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Log de Atualizações
                        </div>
                        <div class="panel-body">
                        <?php
						
							/*   						****Sugestões****
                                                        ****IMPORTANT**** 
                                                        ****HARD****
                                                        ****EASY****
                            <li><p></p></li>
							1234 em MD5
							81dc9bdb52d04dc20036dbd8313ed055
							*/
							
						?>
							<div class='customBordered'>
								<h4>Versão 1.0.2.7 - Correções - Lançamento 03/02/2018 23:11</h4>
								<ul>
									<li><p>Adicionado possibilidade de alteração de script de whatsapp com persistência em banco de dados</p></li>
									<li><p>Corrigido título da página Opções</p></li>
									<li><p>Adicionado Limitação de tamanho nos campos de opções</p></li>
									<li><p>Habilitado opção de restaurar sistema</p></li>
									<li><p>Adicionado loader e mensagme de confirmação na restauração de sistema</p></li>
									<li><p>Script resetado na restauração do sistema</p></li>
									<li><p>Adicionado Buscar por CEP apertando Enter</p></li>
									<li><p>Colocado campo observação antes do botão salvar no pedido entrega</p></li>
									<li><p>Retirado numero do pedido da lateral do pedido entrega, balcao e mesa</p></li>
									<li><p>Adicionado limitação de entrada para apenas números nos campos numéricos da página de opções</p></li>
									<li><p>Alterado Nove Linhas depois para Radio Button</p></li>
									<li><p>Corrigidos erros referentes aa forma de pagamento dos pedidos mesa</p></li>
									<li><p>Corrigido erro que lançava os pedidos cancelados como entregues</p></li>
									<li><p>Aumentado Espaço de complemento de 20 para 40 caracteres em funcionarios e clientes</p></li>
									<li><p></p></li>
								</ul>
							</div>

							<div class='customBordered'>
								<h4>Versão 1.0.2.6 - Correções - Lançamento 03/02/2018 23:11</h4>
								<ul>
									<li><p>Restringido ações de motoboy no relatório de entregas para apenas visualização de seu perfil, sem possibilidade de zerar suas entregas</p></li>
									<li><p>Adicionado informações de contato na tela de contagem de dias para expirar e da tela de aviso de expiração</p></li>
									<li><p>Entregador proibido de fazer pedidos entrega</p></li>
									<li><p>Retirado data de impressão e alterado posição do logo pastone no relatório de vendas para caber em um única página</p></li>
									<li><p>Corrigido mensagem de erro no preenchimento de bairro pela busca de cep</p></li>
									<li><p>Corrigido erro de passagem de variáveis</p></li>
									<li><p>Bloqueado acesso de usuários bloqueados</p></li>
									<li><p>Adicionado links nos textos do manual</p></li>
									<li><p>Adicionado campo observação ao cadastro de funcionário</p></li>
									<li><p>Adicionado função que guarda a hora do cancelamento de todos os tipos de pedido</p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.2.5 - Correções - Lançamento 03/02/2018 23:11</h4>
								<ul>
									<li><p>Adicionado data search sem mascara nas tabelas de funcionários e clientes</p></li>
									<li><p>Formatados todos os textos das descrições do manual</p></li>
									<li><p>Adicionado borda nas descrições do manual</p></li>
									<li><p>Centralizado botão buscar CEP do cadastro e edição de clientes</p></li>
									<li><p>Adicionado borda a mensagem padrão do relatório de entregas</p></li>
									<li><p>Centralizados botões de buscar CEP e buscar telefone da vista de pedidos entrega</p></li>
									<li><p>Alterado link de cancelar em cadastro de categoria de produtos para a pagina de categoria de produtos</p></li>
									<li><p>Adicionado integração com API do google maps</p></li>
									<li><p>Corrigida falha na recuperação de estados</p></li>
									<li><p>Corrigida falha na recuperação de bairros</p></li>
									<li><p>Adicionado bordas em volta das atualizações de cada versão na página sobre</p></li>
									<li><p>Adicionado bloqueio a digitação de caracteres não numéricos nos campos de telefone dos cadastros e edição de funcionário e cliente</p>
									</li>
									<li><p>Retirado os textos "Apenas números" dos campos bloqueados</p></li>
									<li><p>Reduzida carga do site com fonts</p></li>
									<li><p>Adicionado gif loader ao mapa</p></li>
									<li><p>Adicionado gif loader aos vídeos do manual</p></li>
									<li><p>Corrigidas bordas superiores de botões para mobile</p></li>
									<li><p>Retirado estilos inline de itens de pedido</p></li>
									<li><p>Alterado tamanho e tipo de fonte da div de erro de login</p></li>
									<li><p>Margens dos vídeos do manual ajustadas para mobile</p></li>
									<li><p>Retirado testo "Apenas números" do pedido entrega</p></li>
									<li><p>Adicionado possibilidade de criar o pedido mesa como entregue</p></li>
									<li><p>Adicionado possibilidade de criar o pedido entrega como entregue</p></li>
									<li><p>Adicionado enter como atalho para busca de telefone de cliente no pedido entrega</p></li>
									<li><p>Corrigiro erro no carregamente de categoria de funcionário</p></li>
									<li><p>Adicionado bordas as mensagens de "Não existem entregadores cadastrados" e "Não existem entregadores ativos"</p></li>
									<li><p>Adicionado Bloqueio para o lançamento de vendas com pedidos pendentes</p></li>
									<li><p>Corrigida visualização da data de apuração do relatório de vendas quando não existem pedidos a serem apurados</p></li>
									<li><p>Adicionado nível de acesso as variáveis de sessão </p></li>
									<li><p>Bloqueio de login após a data de expiração</p></li>
									<li><p>Adicionado requisição de senha diariamente</p></li>
									<li><p>Adicionado níveis de usuário para motoboy</p></li>
									<li><p>alterado Banco de dados para comportar o endereço do estabelecimento a ser utilizado no google maps</p></li>
									<li><p>Adiciona níveis de acesso para todos os tipos de usuário</p></li>
									<li><p>Adicionado bloqueio para a adição ou alteração de clientes no pedido entrega caso haja algum campo obrigatório não preenchido</p></li>
									<li><p>Adicionado novo bloqueio para impredimento de pedidos sem itens em todos os tipos de pedidos</p></li>
									<li><p>Nos pedidos meia, alterado a palavra "meia" para "parte"</p></li>
									<li><p>Adicionado trava para a adição de pedido balcão sem o nome do cliente</p></li>
									<li><p>Adicionado aviso no login a partir de 30 dias antes da licença expirar</p></li>
									<li><p>Corrigida falha que sempre alterava a senha do funcionário quando havia edição dos dados</p></li>
									<li><p>Corrigido o tamanho da coluna do botão buscar cep da vista de pedidos entrega</p></li>
									<li><p>Substituida a palavra motobooy por entregador em todos o sistema</p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.2.4 - Correções - Lançamento 08/02/2018 15:56</h4>
								<ul>
									<li><p>Alterado valores para valor moeda na vista de pedido entrega</p></li>
									<li><p>Alterado tipo e posicionamento dos botões remanescentes na vista do pedido entrega</p></li>
									<li><p>Adicionado estilo moeda aos valores da vista do pedido balcão</p></li>
									<li><p>Adicionado estilo moeda aos valores da vista do pedido mesa</p></li>
									<li><p>Retirado traço do botão voltar do relatório de vendas</p></li>
									<li><p>Adicionado Bordar a mensagem de mesa vazia</p></li>
									<li><p>Retirado traço do botão voltar da pagina pedidos mesa</p></li>
									<li><p>Adicionado Títulos "Pedido" e "Informações" aos panéis de pedido mesa</p></li>
									<li><p>Adicionado borda a hora do pedido mesa</p></li>
									<li><p>Adicionado cores aos painéis dos pedidos mesa</p></li>
									<li><p>Adicionado botão entregar aos painéis dos pedidos mesa</p></li>
									<li><p>Adicionados pedidos cancelados aos painéis dos pedidos mesa</p></li>
									<li><p>Retirado traço do botão "Ver" dos painéis de pedido mesa</p></li>
									<li><p>Adicionado Horário de fim quando o pedido mesa é entregue</p></li>
									<li><p>Adicionado Opções de inmpressão configuráveis</p></li>
									<li><p>Adicionado opções de cliente configuráveis</p></li>
									<li><p>Imagem da tela inicial otimizada para internet</p></li>
									<li><p>Imagem do favicon otimizada para internet</p></li>
									<li><p>Adicionado transparencia ao favicon</p></li>
									<li><p>Corrigido numero de vias mesa</p></li>
									<li><p>Adicionado opção para restaurar as configurações originais</p></li>
									<li><p>Adicionado segurança contra SQL injections na barra de endereço</p></li>
									<li><p>Adicionado registro de data e hora de aquisição e expiração</p></li>
									<li><p>Adicionado data de impressão no relatório de vendas</p></li>
									<li><p>Ajustes na tabela do relatório vendas</p></li>
									<li><p>Adicionado período de apuração no relatório de vendas</p></li>
									<li><p>Adicionado nome do cliente no relatório de vendas</p></li>
									<li><p>Adicionado logo Pastone WEB ao relatório de vendas</p></li>
									<li><p>Adicionado preenchimento de bairro na busca de CEP para cadastro e edição de funcionário</p></li>
									<li><p>Adicionado trava de caracteres não númericos para o campo CEP do cadastro e edição de funcionários</p></li>
									<li><p>Links de facebook e site escondidos em pequenas resoluções na barra superior para melhor visualização dos conteúdos</p></li>
								</ul>
							</div>
							<div class='customBordered'>
								<h4>Versão 1.0.2.3 - Correções - Lançamento 02/02/2018 22:00</h4>
								<ul>
									<li><p>Adicionado instruções em texto na página manual</p></li>
									<li><p>Adicionado restrição para apenas números no campo de telefone buscar do pedido entrega</p></li>
									<li><p>Adicionado restrição para apenas números no campo de telefone1 telefone2 e telefone3 do cadastro de cliente do pedido entrega</p></li>
									<li><p>Adicionado restrição para apenas números no campo cep do cadastro de cliente do pedido entrega</p></li>
									<li><p>Adicionado "º" ao copiar dados do cliente no pedido entrega</p></li>
									<li><p>Adicionado estado ao copiar dados do cliente no pedido entrega</p></li>
									<li><p>Adicionado Bairro ao copiar dados do cliente no pedido entrega</p></li>
									<li><p>Adicionado "Referencia: " à referência do copiar dados do cliente no pedido entrega</p></li>
									<li><p>Adicionado a hora do pedido na tabela de pedidos entrega</p></li>
									<li><p>Adicionado a hora do pedido na tabela de pedidos Balcão</p></li>
									<li><p>Adicionado a hora de cada pedido mesa</p></li>
									<li><p>Removidos os botões na impressão do relatório de vendas</p></li>
									<li><p>Alterado Relatório de vendas para O valor geral aparecer por ultimo</p></li>
									<li><p>Na página listar funcionários alterado o nome do campo "Celular" para "Telefone 3"</p></li>
									<li><p>Alterados telefones 2 e 3 para não obrigatórios ta edição de dados de funcionário</p></li>
									<li><p>Adicionada legenda "Imprimir A4" no botão imprimir da página de Relatório de Vendas</p></li>
									<li><p>Altedado botão salvar cliente do pedido entrega para botão de imagem</p></li>
									<li><p>Alinhado Botão salvar cliente do pedido entrega</p></li>
									<li><p>Adicionado bloqueio para que não seja possível fazer um Pedido Entrega sem que haja um entregador ativo</p></li>
									<li><p>Alterado Banco de dados para salvar estado</p></li>
									<li><p>Atualizadas funções do banco de dados para estado</p></li>
									<li><p>Adicionado Função de escolha de estado para cadastro e edição de funcionários</p></li>
									<li><p>Adicionado vista do estado como sigla na tabela da página listar funcionários</p></li>
									<li><p>Adicionado Função de escolha de estado para cadastro e edição de clientes</p></li>
									<li><p>Adicionado vista do estado como sigla na tabela da página listar clientes</p></li>
									<li><p>Adicionado Estado na impressão do pedido Entrega</p></li>
									<li><p>Adicionado Função de escolha de estado para cadastro e edição de clientes no pedido entraga</p></li>
									<li><p>Adicionado Estado ao painel do relatório de entregas</p></li>
									<li><p>Adicionado "º" ao número do painel de pedido entrega no relatório de pedido entrega</p></li>
									<li><p>Adicionado rótulos as informações do painel de pedidos entrega do relatório de entregas</p></li>
									<li><p>Adicionado borda a cada item dos painéis de pedido entrega do relatório de entregas</p></li>
									<li><p>Retirados estilos de borda inline</p></li>
									<li><p>Adicionado título "Pedido" em negrito antes dos pedidos no painel de pedido entrega do relatório de entregas</p></li>
									<li><p>Adicionado título "Cliente" em negrito antes dos dados do cliente no painel de pedido entrega do relatório de entregas</p></li>
									<li><p>Adicionado borda aos dados do cliente no painel de pedido entrega do relatório de entregas</p></li>
									<li><p>Modificado banco de dados para armazenar configurações de cliente</p></li>
									<li><p>Modificado banco de dados para armazenar configurações de impressão</p></li>
									<li><p>Configurado site para abrir em uma nova guia</p></li>
									<li><p>Removidas informações de impressão e de cliente salvas em arquivos de configuração</p></li>
									<li><p>Relatório de vendas mostra apenas pedidos entregues</p></li>
									<li><p>Retirados os botões "Detalhes" da impressão do relatório de vendas</p></li>
									<li><p>Adicionado Estatísticas de pedidos na tela inicial</p></li>
									<li><p>Alterado Botão Buscar CEP para cadastro e edição de clientes para botão de imagem</p></li>
									<li><p>Alterado Botão Buscar CEP para cadastro e edição de funcionário para botão de imagem</p></li>
									<li><p>Adicionado busca por cep para cadastro de funcionários</p></li>
									<li><p>Retirados estilos de margin inline</p></li>
								</ul>
							</div>
							<div class='customBordered'>
								<h4>Versão 1.0.2.2 - Correções - Lançamento 27/01/2018 18:30</h4>
								<ul>
									<li><p>Centralizados todos os botões do pedido mesa</p></li>
									<li><p>Adicionado pedido meio a meio para todos os tipos de pedido</p></li>
									<li><p>Correção do favicon em todas as páginas que estavam com erro</p></li>
									<li><p>Adicionado legenda em todos os botões</p></li>
									<li><p>Todos os botões centralizados</p></li>
									<li><p>Adequação de todos os "ver pedido" ao novo formato de uma linha</p></li>
									<li><p>Colocação de borda em cada item de todos os "Ver pedidos"</p></li>
									<li><p>Alteração de todos os botões para botão de imagem</p></li>
									<li><p>Alterada a forma de inclusão no código para aumento de perfromance</p></li>
									<li><p>Alterações estéticas da codificação</p></li>
									<li><p>Alterada linguagem de exibição para pt-br</p></li>
									<li><p>Revisada importações de scripts do relatório de vendas</p></li>
									<li><p>Adicionado Meta informações e favicon a todas as telas de impressão</p></li>
									<li><p>Removida redundância de importação de favicon</p></li>
									<li><p>Unificado a utilização da função de tratamento de string para moeda em todos os arquivos.</p></li>
									<li><p>Retirados estilos de tabela inline</p></li>
									<li><p>Criado cadastro de suporte ticket</p></li>
									<li><p>Adicionada impressão completa da observação em todos os pedidos</p></li>
									<li><p>Criado arquivo para unificar todas as funções de impressão</p></li>
									<li><p>Adicionado manual em vídeo</p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.2.1 - Correções - Lançamento 23/01/2018 19:08</h4>
								<ul>
									<li><p>Botões de salvar e cancelar do pedido entrega centralizados</p></li>
									<li><p>Alterado o botão de buscar telefone do pedido cliente para botão de imagem</p></li>
									<li><p>Adicionado Legenda "Buscar" ao botão buscar do pedido entrega</p></li>
									<li><p>Alterado Espaçamento do campo de telefone buscar para col-3</p></li>
									<li><p>Alterada posição do botão buscar de telefone cliente do pedido entrega para lateral do campo buscar</p></li>
									<li><p>Alterado tamanho do campo CEP do pedido cliente para col-2</p></li>
									<li><p>Alterado posição do botão buscar cep para ao lado do campo</p></li>
									<li><p>Alterado botão de buscar cep para botão de imagem</p></li>
									<li><p>Alterada imagem da tela de login</p></li>
									<li><p>Criada tela de login responsiva para celular</p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.2.0 - Correções - Lançamento 20/01/2018 13:50</h4>
								<ul>
									<li><p>Corrigido travamento de botões que nao permitia usar o mesmo botão 2x <b>10/01/2018 17:22</b></p></li>
									<li><p>Adicionado a hora em que o pedido foi feito na impressao do pedido entrega <b>10/01/2018 17:25</b></p></li>
									<li><p>Adicionado a hora em que o pedido foi feito na impressao do pedido mesa <b>10/01/2018 17:28</b></p></li>
									<li><p>Adicionado a hora em que o pedido foi feito na impressao do pedido balcão <b>10/01/2018 17:32</b></p></li>
									<li><p>Adicionado script de busca por cep no cadastro de clientes <b>18/01/2018 00:24</b></p></li>
									<li><p>Adicionado site da empresa na pagina sobre <b>18/01/2018 00:32</b></p></li>
									<li><p>Adicionado email de contato da empresa na pagina sobre <b>18/01/2018 00:45</b></p></li>
									<li><p>Adicionado formato moeda aos valores da tela de pedido entrega <b>18/01/2018 13:14</b></p></li>
									<li><p>Adicionado formato moeda aos valores da tela de pedido mesa <b>18/01/2018 13:25</b></p></li>
									<li><p>Adicionado formato moeda aos valores da tela de pedido balcão <b>18/01/2018 13:31</b></p></li>
									<li><p>Configurado salvamento do horário de entrega do pedido entrega <b>18/01/2018 14:20</b></p></li>
									<li><p>Configurado salvamento do horário de entrega do pedido balcão <b>18/01/2018 14:27</b></p></li>
									<li><p>Alteração da cor da barra do topo <b>18/01/2018 18:23</b></p></li>
									<li><p>Alteração da cor dos links do topo <b>18/01/2018 18:45</b></p></li>
									<li><p>Alteração da cor dos icones do topo <b>18/01/2018 18:51</b></p>
									</li>
									<li><p>Alteração to tamanho dos icones do topo <b>18/01/2018 19:17</b></p></li>
									<li><p>Alteração do tamanho dos icones da sidebar <b>18/01/2018 19:50</b></p></li>
									<li><p>Açteração dos dados dos itens de um pedido para caber em uma única linha <b>18/01/2018 20:26</b></p></li>
									<li><p>Alterado a posição do botão de remover item de pedido para a lateral <b>18/01/2018 23:12</b></p></li>
									<li><p>Alteração do botão de remover item de pedido para botão de imagem <b>18/01/2018 23:26</b></p></li>
									<li><p>Alteração do botão de adicionar item de pedido para botão de imagem em todos os tipos de pedido <b>19/01/2018 00:00</b></p></li>
									<li><p>Alterado resolução de visualização como desktop minima de 1200px para 980px <b>19/01/2018 00:27</b></p></li>
									<li><p>Alterada frase "Os campos com (*) são de preenchimento obrigatório" para "Campos obrigatórios possuem (*)" para evitar quebra de linha em resoluções menores <b>19/01/2018 00:30</b></p></li>
									<li><p>Campos obrigatórios possuem (*)" alinhado para a direita em todas as aparições <b>19/01/2018 00:40</b></p></li>
									<li><p>Alteração de todos os botões Cancelar por botões de imagem em x <b>19/01/2018 21:33</b></p></li>
									<li><p>Alteração de todos os botões Salvar por botões de imagem salvar <b>19/01/2018 21:51</b></p></li>
									<li><p>Alteração de todos os botões Novo por botões de imagem plus <b>19/01/2018 22:30</b></p></li>
									<li><p>Alteração dos botões do relatório de vendas por botões de imagem <b>19/01/2018 23:45</b></p></li>
									<li><p>Alterado o alinhamento dos botões do relatório de vendas para centralizado <b>19/01/2018 23:52</b></p></li>
									<li>Adicionado botão voltar no relatório de vendas<p> <b>20/01/2018 00:04</b></p></li>
									<li><p>Adicionado legendas para os botões do relatório de vendas <b>20/01/2018 23:52</b></p></li>
									<li><p>Adicionado Legenda em todos os botões Salvar <b>20/01/2018 00:25</b></p></li>
									<li><p>Adicionado Legenda Adicionar em todos os botões "Novo" <b>20/01/2018 00:27</b></p></li>
									<li><p>Adicionado Legenda "Cancelar" para os botões de imagem Cancelar <b>20/01/2018 00:30</b></p></li>
									<li><p>Adicionado Legenda "Remover Item" para os botões de remover item de todos os pedidos <b>20/01/2018 00:33</b></p></li>
									<li><p>Adicionado Legenda "Adicionar Item" para os botões de Adicionar item de todos os pedidos <b>20/01/2018 00:36</b></p></li>
									<li><p>Alterado os botões "Salvar e Imprimir de todos os pedidos para botões de imagem <b>20/01/2018 00:39</b></p></li>
									<li><p>Adicionado Legenda "Salvar e imprimir" para os botões de Salvar e Imprimir de todos os pedidos <b>20/01/2018 00:42</b></p></li>
									<li><p>Adicinado botão de imagem para o botão "Zerar Entregas" do relatório de entregas <b>20/01/2018 23:45</b></p></li>
									<li><p>Adicionado legenda "Zerar Entregas" ao botão Zerar Entregas <b>20/01/2018 23:48</b></p></li>
									<li><p>Centralizado Botão Zerar Entregas <b>20/01/2018 23:50</b></p></li>
									<li><p>Alterado campo total do relatório de entregas para ocupar a tela inteira <b>20/01/2018 00:52</b></p></li>
									<li><p>Alterado o botão "Novo pedido" da tela de pedidos balcão para botão de imagem <b>20/01/2018 01:01</b></p></li>
									<li><p>Adicionada a legenda "Adicionar" ao botão Novo Pedido da tela de pedido Balcão <b>20/01/2018 :01:07</b></p></li>
									<li><p>Alterado o botão "Novo pedido" da tela de pedidos entrega para botão de imagem <b>20/01/2018 01:15</b></p></li>
									<li><p>Adicionada a legenda "Adicionar" ao botão Novo Pedido da tela de pedido Entrega <b>20/01/2018 01:23</b></p></li>
									<li><p>Alterado alinhamento dos botões da tela de pedidos mesa para centralizado <b>20/01/2018 01:26</b></p></li>
									<li><p>Alterado botão zerar mesa para botão de imagem <b>20/01/2018 01:29</b></p></li>
									<li><p>Adicionado legenda "Zerar mesa" ao botão zerar mesas <b>20/01/2018 01:31</b></p></li>
									<li><p>Alterado botão imprimir mesa para botão de imagem <b>20/01/2018 01:33</b></p></li>
									<li><p>Adicionado legenda "Imprimir" ao botão imprimir mesa <b>20/01/2018 01:35</b></p></li>
									<li><p>Alterado botão "Novo Pedido" mesa para botão de imagem <b>20/01/2018 01:37</b></p></li>
									<li><p>Adicionado legenda "Adicionar" ao botão Novo Pedido mesas <b>20/01/2018 01:39</b></p></li>
									<li><p>Alterado botão Ver dos painéis que representam os pedidos mesa para botão de imagem <b>20/01/2018 01:43</b></p></li>
									<li><p>Adicionado Legenda "Ver" aos botões ver dos pedidos mesa <b>20/01/2018 01:45</b></p></li>
									<li><p>Alterado botão Cancelar dos painéis que representam os pedidos mesa para botão de imagem <b>20/01/2018 01:47</b></p></li>
									<li><p>Adicionado Legenda "Cancelar" aos botões Cancelar dos pedidos mesa <b>20/01/2018 01:49</b></p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.0.5 - Correções - Lançamento 08/01/2018 05:55</h4>
								<ul>
									<li><p>Colocado o complemento na impressão do pedido entrega <b>08/01/2018 01:24</b></p></li>
									<li><p>Configurado o comprimento maximo do campo observacao para 255 caracteres <b>08/01/2018 03:00</b></p></li>
									<li><p>Aumentado o numero de caracteres impressos nas observacoes para 255 <b>08/01/2018 03:00</b></p></li>
									<li><p>configurado o comprimento maximo de todos os campos de cliente do pedido entrega novo<b>08/01/2018 03:00</b></p></li>
									<li><p>configurada a impressão de 2 vias para cada pedido <b>08/01/2018 03:00</b></p></li>
									<li><p>retirado espaço extra no final das impressões <b>08/01/2018 03:00</b></p></li>
									<li><p>Criados arquivos de configuracao de impressao <b>08/01/2018 03:45</b></p></li>
									<li><p>Criados arquivos de configuracao de cliente multisistemas <b>08/01/2018 03:53</b></p></li>
									<li><p>Implementado numero de vias flexivel <b>08/01/2018 04:02</b></p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.0.4 - Correções - Lançamento 07/01/2017 18:55</h4>
								<ul>
									<li><p>Alterado o formato de saída de impressão do pedido entrega de txt para html <b>07/01/2018 17:24</b></p></li>
									<li><p>Alterado o formato de saída de impressão do pedido mesa de txt para html <b>07/01/2018 17:34</b></p></li>
									<li><p>Alterado o formato de saída de impressão do pedido balca de txt para html <b>07/01/2018 17:52</b></p></li>
									<li><p>Movido o log de atualizações para a página sobre <b>07/01/2018 17:24</b></p></li>
									<li><p>Corrigido erro que nao permitia visualizar pedidos de mesas <b>07/01/2018 18:52</b></p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.0.3 - Correções - Lançamento 06/01/2018 00:24</h4>
								<ul>
									<li><p>Alterado Botão de copiar resumo do cliente no pedido entrega <b>04/01/2018 22:52</b></p></li>
									<li><p>Acrescentado botão "imprimir fechamento" no relatório de vendas <b>05/01/2018 04:27</b></p></li>
									<li><p>Corrigido cabeçalha do relatório de vendas <b>05/01/2018 04:27</b></p></li>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.0.2 - Correções - Lançamento 04/01/2018 18:52</h4>
								<ul>
									<li><p>Criado relatório de entregas <b>03/01/2018 16:38</b></p></li>
									<li><p>Retirado o cabeçalho do pedido balcão <b>04/01/2018 02:19</b></p></li>
									<li><p>Retirado o ascento da palavra "Balcão" da impressão do pedido balcão <b>04/01/201802:20</b></p>
									<li><p>Retirado o cabeçalho do pedido entrega <b>04/01/2018 02:21</b></p></li>
									<li><p>Retirado o caractere especial º do nº do pedido entrega <b>04/01/2018 02:22</b></p></li>
									<li><p>Retirado o cabeçalho do fechamento de mesa <b>04/01/2018 02:27</b></p></li>
									<li><p>Acrescentado a palavra "Fechamento" ao lado do número da mesa no fechamento da mesa <b>04/01/2018 02:28</b></p></li>
									<li><p>Retirado o cabeçalho do pedido mesa <b>04/01/2018 02:31</b></p>
									<li><p>Alterado o nome do botão "Cancelar" para "Cancelar Pedido" na vizualização do pedido balcão <b>04/01/2018 02:35</b></p>
									<li><p>Alterado o nome do botão "Cancelar" para "Cancelar Pedido" na vizualização do pedido entrega <b>04/01/2018 02:35</b></p>
									<li><p>Criado um script na página index cujas frases podem ser copiadas ao clique de um botão <b>04/01/2018 04:25</b></p> 
									<li><p>Criados botões para alterar a forma de pagamento dos pedidos da mesas quando estas são zeradas <b>04/01/2018 14:50</b></p>
									<li><p>Acrescentado relatório de entregas <b>04/01/2018 17:41</b></p>
									<li><p>Configurado valores de relatorio para estilo moeda <b>04/01/2018 17:48</b></p>
									<li><p>Criado botão "Copiar Cliente" no pedido entrega que gera um alert com um texto de script com os dados do  cliente <b>04/01/2018 18:42</b></p>
								</ul>
							</div>
							
							<div class='customBordered'>
								<h4>Versão 1.0.0.1 - Correções - Lançamento 03/01/2018 02:57</h4>
								<ul>
									<li><p>Adicionado impressão em 3 vias para todos os pedidos <b>30/12/2017 01:38</b></p></li>
									<li><p>Corrigido retorno do botão cancelar da edição de bairros <b>30/12/2017 01:41</b></p></li>
									<li><p>Alterado formato de impressão de pedidos balcão: Maior espaço para o nome do produto e observação em outra linha <b>30/12/2017 01:54</b></p></li>
									<li><p>Acrescentado tipo de pedido balcão ao lado do número <b>30/12/2017 02:02</b></p></li>
									<li><p>Acrescentado linha em branco em itens de pedido balcão <b>30/12/2017 02:07</b></p></li>
									<li><p>Adicionado Forma de pagamento à impressão do pedido Balcão <b>30/12/2017 02:16</b></p></li>
									<li><p>Alterado formato de impressão de pedidos entrega: Maior espaço para o nome do produto e observação em outra linha <b>30/12/2017 02:20</b></p></li>
									<li><p>Acrescentado tipo de pedido entrega ao lado do número <b>30/12/2017 02:24</b></p></li>
									<li><p>Acrescentado linha em branco em itens de pedido entrega <b>30/12/2017 02:25</b></p></li>
									<li><p>Acrescentado tipo de pedido mesa ao lado do número <b>30/12/2017 02:27</b></p></li>
									<li><p>Acrescentado linha em branco em itens de fechar mesa <b>30/12/2017 02:30</b></p></li>
									<li><p>Alterado formato de impressão de fechar mesa: Maior espaço para o nome do produto e observação em outra linha <b>30/12/2017 02:33</b></p></li>
									<li><p>Acrescentado linha em branco em itens de pedido mesa <b>30/12/2017 02:37</b></p></li>
									<li><p>Alterado formato de impressão de pedido mesa: Maior espaço para o nome do produto e observação em outra linha <b>30/12/2017 02:40</b></p></li>
									<li><p>Retirado traço " - " sobrando na visualização do endereço dos pedidos entrega quando o cliente não possuia um complemento cadastrado <b>30/12/2017 13:23</b></p></li>
									<li><p>Aumentado o espaço para impressão do bairro no valor da taxa de entrega no pedido entrega <b>02/01/2018 14:42</b></p></li>
									<li><p>Acrescentado relatório de valores de venda para todos os tipos de venda e todas as formas de pagamento <b>02/01/2018 19:02</b></p></li>
									<li><p>Acrescentado gráfico de donut das vendas por tipo de pagamento <b>02/01/2018 19:10</b></p></li>
									<li><p>Acrescentado gráfico de donut das vendas por tipo de venda <b>02/01/2018 19:17</b></p></li>
									<li><p>Acrescentada função de realizar lançamento no relatório de vendas <b>02/01/2018 19:17</b></p></li>
									<li><p>Retirados os pedidos cancelados do relatório de vendas <b>02/01/2018 19:50</b></p></li>
								</ul>
							</div>
							<?php
								/*
														****Forgotten****
								-remover style='margin-top: 10px;' no index.php
								-refazer o loader de clientes
								-Fazer observação sobre o erro quando abre a primeira vez, de popup
								-visualização das datatables no mobile estão ruins - https://datatables.net/extensions/rowreorder/examples/initialisation/responsive.html
								-tabela do relatório de vendas não responsivo para mobile
								-arrumar as informações da página sobre
								-Buscar um favicon mais autentico e moderno
								-ainda permite criação de um pedido se for adicionado um item mas nao for selecionado nem um produto nem uma categoria (ver pedidos.js alterar a função de ver se ten item para verificar no lugar de ver se o campo observação é null
								-alterar a visualização da lista dos pedidos entrega e balcão para painel
								-Nos pedidos meio a meio, melhorar a descrição da observação, colocando por exemplo, quantas partes são
								-o que um cliente bloqueado não pode fazer?
								-Otimizar DAOS - alguns fazer coisas muito parecidas
								-Otimizar pedidos - ao invez de fazer varios ajax para pedir produtos, preços e categorias, puxar uma única vez e salvar em uma tabela local
								-colocar um relatorio de cancelamento 
								-adicionar suporte a multiplas formas de pagamento em um único pedido
								-remover todos os scync:false dos ajax, pois esta deprecated (primises?)
								-criar entrutura para backups pelo usuário
								-verificar a possibilidade de nao tem que criar um connection factory toda vez que precisar de uma conexão
								-escrever um log dos erros
								-***May have injection***
								-alterar o for do total de itens do pedido.js - Não lembro porquê
								-pequisar datatables stylesheets  
								-fechar os pedidos apos imprimir TRY 1
								-as inves da dar echo nas funções, retornar uma string e dar echo no chamador
								*/
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
</body>
</html>