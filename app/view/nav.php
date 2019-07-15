<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/configsDAO.php';
    
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
		<a class="navbar-brand" href="index.php"><div class='tipografia-pastone-small'>Pastone<span>WEB</span></div></a>
    </div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
	<ul class="nav navbar-nav navbar-left navbar-top-links hidden-xs">
        <li><a href="<?php 
            
            $cf   = new connectionFactory();
            $conn = $cf->getConnection();
            
            $confDAO = new configsDAO($conn);
            $configs = $confDAO->buscarConfigs();
            
            echo $configs->getSite();
            
            ?>" target="_blank"><i class="fa fa-edge fa-fw"></i>Website</a></li>
        <li><a href="
            <?php 
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $confDAO = new configsDAO($conn);
                $configs = $confDAO->buscarConfigs();
               
                echo $configs->getFacebook();
                
            ?>
            " target="_blank"><i class="fa fa-facebook-square fa-fw"></i>Facebook</a></li>
    </ul>
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> 
                <?php 
                    
                    $temp = explode(" ",$_SESSION['SESS_FULL_NAME']);
                    
                    if(count($temp)==1){
                        
                        echo $temp[0];   
                        
                    } else {
                        
                        echo $temp[0]." ".$temp[count($temp)-1];
                    }
                    
                ?> 
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="cadastro-funcionario.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"><i class="fa fa-user fa-fw"></i> Dados de Usuário</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.php?logout=sair"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-home fa-fw"></i>Início</a>
                </li>
                <li>
                    <a href="clientes.php"><i class="fa fa-users fa-fw"></i>Clientes</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i>Pedidos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="pedidos-entrega.php"><i class="fa fa-truck fa-fw"></i>Entrega</a>
                        </li>
                        <li>
                            <a href="pedidos-mesa.php"><i class="fa fa-table fa-fw"></i>Mesa</a>
                        </li>
                        <li>
                            <a href="pedidos-balcao.php"><i class="fa fa-square fa-fw"></i>Balcão</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="produtos.php"><i class="fa fa-cutlery fa-fw"></i>Produtos</a>
                </li>
                <li>
                    <a href="funcionarios.php"><i class="fa fa-male fa-fw"></i>Funcionários</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="relatorio-entregas.php"><i class="fa fa-motorcycle fa-fw"></i>Entregas</a>
                        </li>
                        
                        <li>
                            <a href="relatorio-vendas.php"><i class="fa fa-shopping-cart fa-fw"></i>Vendas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="mesas.php"><i class="fa fa-table fa-fw"></i>Mesas</a>
                </li>
                <li>
                    <a href="bairros.php"><i class="fa fa-building fa-fw"></i>Bairros</a>
                </li>
                <li>
                    <a href="categoriasProduto.php"><i class="fa fa-tasks fa-fw"></i>Categorias de Produtos</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog fa-fw"></i>Sistema<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="manual.php"><i class="fa fa-graduation-cap fa-fw"></i>Manual</a>
                        </li>
                        <li>
                            <a href="suporte.php"><i class="fa fa-support fa-fw"></i>Suporte</a>
                        </li>
                        <li>
                            <a href="opcoes.php"><i class="fa fa-database fa-fw"></i>Opções</a>
                        </li>
                        <li>
                            <a href="sobre.php"><i class="fa fa-info-circle fa-fw"></i>Sobre</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>