$(document).ready(function(){
	$('#cpf').mask("#000.000.000-00", {reverse: true});		
	$('#rg').mask('#0', {reverse: true});
    $('#dataContratacao').mask('#00/00/0000', {reverse: true});
    $('#idade').mask('#0', {reverse: true});
});


$("#formulario-funcionario").validate(
	{
		rules:{
			nome:{
				required:true	   
			},
			cpf:{
				required:true   
			},
            rg:{
				required:true
            },
			idade:{
				required:true   
			},
            sexo: {
                required:true
            },
            posto: {
                required: true
            },
            horario: {
                required: true
            },
            dataContratacao: {
                required: true
            }				
		}, 
		
		messages:{
			nome:{
				required:"Campo obrigatório!"
			},
			cpf:{
				required:"Campo obrigatório!"
			},
			rg:{
				required:"Campo obrigatório!"
			},
            idade: {
                required:"Campo obrigatório!"
            },
            sexo: {
                required:"Campo obrigatório!"
            },
            posto: {
                required:"Campo obrigatório!"
            },
            horario: {
                required:"Campo obrigatório!"
            },
            dataContratacao: {
                required:"Campo obrigatório!"
            }					   
		}
	}
);