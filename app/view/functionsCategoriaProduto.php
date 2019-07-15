<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/categoriaProdutoDAO.php';
    
    function imprimeCategoriasProdutos(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO              = new categoriaProdutoDAO($conn);
        $categoriasProduto = $CDAO->listarCategoriasProduto();
        
        $output = "";
        
        if(isset($categoriasProduto)){
            
            $cont = 0;
            
            foreach($categoriasProduto as $c) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                
                $output .= "<tr class='$class'>
                            <td><a href='cadastro-categorias.php?id=".$c->getId()."'>".$c->getId()."</a></td>
                            <td>".$c->getNome()."</td>
                            <td>".$c->getDescricao()."</td>
                            <td class='center'>".($c->getAtivo()==1?"Ativo":"Bloqueado")."</td>
                        </tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function imprimeCategoriasProdutoSelect($select){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO              = new categoriaProdutoDAO($conn);
        $categoriasProduto = $CDAO->listarCategoriasProduto();
        
        $output = "";
        
        if(isset($categoriasProduto)){
            
            foreach($categoriasProduto as $c) {
                
                $output .= "<option value='".$c->getId()."' ";
                
                if($c->getId()==$select){
                    $output .= "selected='selected'";
                }
                
                $output .= " >".$c->getNome()."</option>";
            }
        }
        
        echo $output;
    }
    
    function mostrarCategoriaProduto($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO             = new CategoriaProdutoDAO($conn);
        $categoriaProduto = $CDAO->buscarCategoriaProduto($id);
        
        $ativo   = '';
        $inativo = '';
        
        if($categoriaProduto->getAtivo()==1){
            
            $ativo = 'checked';
            
        } else {
            
            $inativo = 'checked';
        }
        
        echo "
            <form role='form' method='post' action='atualizaCategoriaProduto.php'>
                <div class='form-group'>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <label>Situação</label>
                            <label class='radio-inline'>
                                <input type='radio' ".$ativo." name='ativo' id='optionsRadiosInline1' value='1' checked>Ativo
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' ".$inativo." name='ativo' id='optionsRadiosInline2' value='0'>Bloqueado
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
                            <input class='form-control' name='id' value='".$categoriaProduto->getId()."'  readonly='readonly'>
                        </div>
                    </div>
                    <div class='col-lg-8'>
                        <div class='form-group'>
                            <label>Nome*</label>
                            <input maxlength='50' required class='form-control' name='nome' value='".$categoriaProduto->getNome()."'>
                        </div>
                    </div>
                    <div class='col-lg-12'>
                        <div class='form-group'>
                            <label>Descrição*</label>
                            <input required maxlength='200' class='form-control' name='descricao' value='".$categoriaProduto->getDescricao()."'>
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