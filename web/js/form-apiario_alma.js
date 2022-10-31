$(document).ready(function(){

});


$("#formulario-apiario").validate(
	{
		rules:{
			nomeApiario:{
				required:true	   
			},
			colmeiaApiario:{
				required:true   
			},
            colmeiaLocalizacao:{
				required:true
            },
            produtividadeApiario:{
                required:true
            },
            condicaoApiario: {
                required:true
            }				
		}, 
		
		messages:{
			nomeApiario:{
				required:"Campo obrigatório!"
			},
			colmeiaApiario:{
				required:"Campo obrigatório!"
			},
			colmeiaLocalizacao:{
				required:"Campo obrigatório!"
			},
            produtividadeApiario: {
                required:"Campo obrigatório!"
            },
            condicaoApiario: {
                required:"Campo obrigatório!"
            }		   
		}
	}
);