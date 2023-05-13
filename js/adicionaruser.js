function criarUsuario(idButton) {
	//console.log(idButton);
	// Obtenha os valores da tabela "infonvuser"	
	var dadosuser = document.querySelector("#infonvuser");
	var conteudo = dadosuser.innerHTML;
	const arrayDados = conteudo.split(/<\/?td>/g);
	const user = arrayDados.filter(item => item.trim());
	if(idButton === 'clicktrue'){
		var oParametro = 
		{
			"action": "usertrue",
			"useraceito": user	          
		};	
		$.ajax(
		{
			type: "POST",
			url: "../form/form_cadastro.php", 
			data: oParametro,
			async: true,
			success: function(data) 
			{
			  var retorno = JSON.parse(data);
			
				if (retorno.status == "success") 
			  	{
			  		Swal.fire({
			  		    icon: 'success',
			  		    title: 'Bom Trabalho',
			  		    text: 'Usuario rejeitado com sucesso!',
			  		}).then((result) => {
			  		    if (result.isConfirmed)
			  		     {
			  		        location.reload();
			  		        xhr.abort();

			  		    }
			  		});			    
			  }
			},
			error: function(xhr, status, error) 
			{
			  alert(xhr.responseText);
			},
		});
	} else if(idButton === 'clickfalse'){
		alert('User não aceito');
		var oParametro = 
		{
			"action": "userflase",
			"userrecusado": user	          
		};	      
		$.ajax(
		{
			type: "POST",
			url: "../form/form_cadastro.php", 
			data: oParametro,
			async: true,
			success: function(data) 
			{
			  var retorno = JSON.parse(data);
			  if (retorno.status == "failure") 
			  {
			  	Swal.fire({
			  	    icon: 'success',
			  	    title: 'Bom Trabalho',
			  	    text: 'Usuario rejeitado com sucesso!',
			  	}).then((result) => {
			  	    if (result.isConfirmed)
			  	     {
			  	        location.reload();
			  	        xhr.abort();
			  	    }
			  	});  
			  }
			},
			error: function(xhr, status, error) 
			{
			  alert(xhr.responseText);
			}, 
		});
	}
}