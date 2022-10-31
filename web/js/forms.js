$(document).ready(function(){
	$('#cpf').mask("#000.000.000-00", {reverse: true});		
	$('#telefone').mask('#0', {reverse: true});
});

$("#form").validate(
	{
		rules:{
			nome:{
				required:true	   
			},
			telefone:{
				required:true   
			},
			CPF:{
				required:true   
			},
            email:{
				required:true
            },
            senha: {
                required:true
            }				
		}, 
		messages:{
			nome:{
				required:"Campo obrigatório"
			},
			telefone:{
				required:"Campo obrigatório"
			},
			CPF:{
				required:"Campo obrigatório"
			},
            email: {
                required:"Campo obrigatório"
            },
            senha: {
                required:"Campo obrigatório"
            }					   
		}
	}
);