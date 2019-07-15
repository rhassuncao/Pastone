<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../../model/DAO/categoriaProdutoDAO.php';
    include_once '../functionsCategoriaProduto.php';
    
    function imprimeProdutosSelectCategoria($categoriaId, $select){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO     = new produtoDAO($conn);
        $produtos = $CDAO->listarProdutosCategoria($categoriaId);
        
        $output = "";
        
        if(isset($produtos)){
            
            foreach($produtos as $p) {
                
                $output .= "<option value='".$p->getId()."' ";
                
                if($p->getId()==$select){
                    $output .= "selected='selected'";
                }
                
                $output .= " >".$p->getNome()."</option>";
            }
        }
        
        return $output;
    }
    
    function imprimeProdutos(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO     = new produtoDAO($conn);
        $produtos = $CDAO->listarProdutos();
        
        $output = "";
        
        if(isset($produtos)){
            
            $cont = 0;
            
            foreach($produtos as $p) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                $output .= "<tr class='$class'>
                        <td><a href='cadastro-produto.php?id=".$p->getId()."'>".$p->getId()."</a></td>
                        <td>".$p->getNome()."</td>
                        <td>".$p->getDescricao()."</td>
                        <td>".str_replace(".",",",$p->getPreco())."</td>";
                    
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO             = new categoriaProdutoDAO($conn);
                $categoriaProduto = $CDAO->buscarCategoriaProduto($p->getCategoria());
                
                $output .= "<td><a href='cadastro-categorias.php?id=".$categoriaProduto->getId()."'>".$categoriaProduto->getNome()."</a></td>" ;
                            
                $output .= "<td  class='center'>".($p->getAtivo()==1?"Ativo":"Bloqueado")."</td>
                    </tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function mostrarProduto($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO    = new produtoDAO($conn);
        $produto = $CDAO->buscarProduto($id);
        
        $ativo   = '';
        $inativo = '';
        
        if($produto->getAtivo()==1){
            
            $ativo = 'checked';
            
        } else {
            
            $inativo = 'checked';
        }
        
        echo "
            <form role='form' method='post' action='atualizaProduto.php'>
                <div class='row'>
                    <div  class='col-lg-6'>
                        <div class='form-group'>
                            <label>Situação</label>
                            <label class='radio-inline'>
                                <input type='radio' name='ativo' id='optionsRadiosInline1' value='1' ".$ativo.">Ativo
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' name='ativo' id='optionsRadiosInline2' value='0' ".$inativo.">Bloqueado
                            </label>
                        </div>
                    </div>
                    <div style='text-align: right;' class='col-lg-6'>
                        <label>Campos obrigatórios possuem (*)</label>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-4'>
                        <div class='form-group'>
                            <label>ID</label>
                            <input class='form-control' name='id' value='".$produto->getId()."' readonly='readonly'>
                        </div>
                    </div>
                    <div class='col-lg-8'>
                        <div class='form-group'>
                            <label>Nome*</label>
                            <input class='form-control' maxlength='50' required name='nome' value='".$produto->getNome()."'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'>
                            <label>Descrição*</label>
                            <textarea class='form-control' maxlength='255' required rows='3' name='descricao'>".$produto->getDescricao()."</textarea>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-2'>
                        <div class='form-group'>
                            <label>Valor*</label>
                            <input class='form-control' required type='number' min='0' step='0.01' name='preco' value='".$produto->getPreco()."'>
                        </div>
                    </div>
                <div class='col-lg-10'>
                    <div class='form-group'>
                        <label>Categoria*</label>
                        <select required oninvalid=\"this.setCustomValidity('Cadastre uma categoria antes de cadastrar um produto! Clique na opção Categorias de Produto, em seguida no botão Novo e cadastre uma categoria')\" name='categoria' class='form-control'> ";
                        
                        imprimeCategoriasProdutoSelect($produto->getCategoria());
                        
                        echo " </select>
                    </div>
                </div>
            </div>
            <div class='row text-center'>
                <div class='col-lg-12'>    
                    <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                    <a href='produtos.php'>
                        <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                    </a>
                </div>
            </div>
        </form>";
    }
    
?>