$(document).ready(function() {
    
    function limpa_formulário_cep() {
        
        $("#endereco").val("");
        $("#cidade").val("");
        $('#estado').val(1);
        $("#bairro").val(1);
        $("#bairro_field").val("");
    }
	
	$('#cep').keypress(function(e){
		
		if ( e.which === 13 ){
			
			buscar_cep_function();
		};
	});
	
	function buscar_cep_function(){
		
		var cep = $("#cep").val().replace(/\D/g, '');
		
		if (cep != "") {
			
			var validacep = /^[0-9]{8}$/;
			
			if(validacep.test(cep)) {
				
				$("#endereco").val("...");
				$("#cidade").val("...");
				$("#bairro_field").val("...");
				
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
					
					if (!("erro" in dados)) {
						
						$("#endereco").val(dados.logradouro);
						$("#cidade").val(dados.localidade);
						$("#estado").val($('#estado option').filter(function () { return $(this).html() == dados.uf; }).val());
						$("#bairro_field").val(dados.bairro);
						
						if(!$('#bairro option').filter(function () { return $(this).html() == dados.bairro; }).val() && document.getElementById("bairro_field") == null){
							
							swal(
								'Preencha o bairro manualmente!',
								'A pesquisa pelo CEP foi um sucesso, porém o bairro encontrado não corresponde à nenhum bairro cadastrado. Cadastre o novo bairro ou verifique a ortografia dos bairros cadastrados (diferencia letras maiúsculas e minúsculas). Bairro encontrado: ' + dados.bairro,
								
								'warning'
							)
							
						} else {
							
							$("#bairro").val($('#bairro option').filter(function () { return $(this).html() == dados.bairro; }).val());
							
							swal({
								position: 'center',
								type: 'success',
								title: 'CEP encontrado!',
								showConfirmButton: false,
								timer: 1500
							})
						}
					}
					else {
						
						limpa_formulário_cep();
						swal(
							'CEP não encontrado!',
							'Digite os dados manualmente ou tente novamente!',
							'error'
						)
					}
				});
			}
			else {
				
				limpa_formulário_cep();
				
				swal(
					'Formato de CEP inválido!',
					'Confirme o valor digitado para o CEP',
					'error'
				)
			}
		}
		else {
			
			limpa_formulário_cep();
			
			swal(
				'Campo CEP em branco!',
				'Digite algum valor de CEP para realizar a busca',
				'error'
			)
		}
	}
    
    $("#button_buscar_cep").click(function() {
        
    	buscar_cep_function();
    });
});