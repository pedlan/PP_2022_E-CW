$("#formulario").validate(
	{
		rules:{
			emailDestinatario:{
				required:true,
				email: true			   
			},
			assunto:{
				required:true
			},
			mensagem:{
				required:true			   
			}			
		}, 
		messages:{
			emailDestinatario:{
				required:"Campo obrigatório",
				email:"Favor informar um email válido"
			},
			assunto:{
				required:"Campo obrigatório"
				
			},
			mensagem:{
				required:"Campo obrigatório"
			}			
		}
	}
);