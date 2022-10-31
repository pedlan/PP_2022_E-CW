$(document).ready(function(){

});


$("#formulario-colmeia").validate(
	{
		rules:{
			nomeAbelha:{
				required:true	   
			},
			colmeiaApiario:{
				required:true   
			},
            condicaoColmeia:{
				required:true
            }				
		}, 
		
		messages:{
			nomeAbelha:{
				required:"Campo obrigatório!"
			},
			colmeiaApiario:{
				required:"Campo obrigatório!"
			},
			condicaoColmeia:{
				required:"Campo obrigatório!"
			}		   
		}
	}
);