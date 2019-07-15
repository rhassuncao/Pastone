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
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pastone - Novo Ticket Suporte</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Ticket Suporte</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados do Problema
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role='form' method='post' action='adicionaSuporte.php'>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Funcionário</label>
                                                    <input class='form-control' name='funcionarioId'  readonly='readonly' value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Descrição*</label>
                                                    <textarea maxlength='255' name='descricao' required class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row text-center'>
                                            <div class='col-lg-12'>
                                                <button type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                                <a href="suporte.php">
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
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
</body>
</html>