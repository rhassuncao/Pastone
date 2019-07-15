<?php
    
    function telefoneApenasNumeros($telefone){
        
        $telefone = str_replace("-","",$telefone); 
        $telefone = str_replace("(","",$telefone); 
        $telefone = str_replace(")","",$telefone);
        $telefone = str_replace(" ","",$telefone);
        
        return $telefone;
    }
    
    function valorMoedaVirgula($valor){
        
        return number_format($valor, 2, ',', '.');
    }
    
    function valorMoedaPonto($valor){
        
        return str_replace(",", ".", $valor);
    }
    
    function cepMask($cep){
        
        if(strlen($cep)==8){
            
            $cep = substr($cep, 0, 5)."-".substr($cep, 5, 3);
        }
        
        return $cep;
    }
    
    function telefoneMask($val){
        
        $mask='';
        
        switch (strlen($val)) {
            case 8:
                $mask = '#### - ####';
                break;
            case 9:
                $mask = '##### - ####';
                break;
            case 10:
                $mask = '(##) #### - ####';
                break;
            case 11:
                $mask = '(##) ##### - ####';
                break;
            default:
                $mask = '############';
        }
        
        $maskared = '';
        $k = 0;
        
        for($i = 0; $i<=strlen($mask)-1; $i++){
            
            if($mask[$i] == '#'){
                
                if(isset($val[$k])){
                    
                    $maskared .= $val[$k++];
                }
                    
            }
            else
            {
                if(isset($mask[$i])){
                    
                    $maskared .= $mask[$i];
                }    
            }
        }
        return $maskared;
    }
    
?>