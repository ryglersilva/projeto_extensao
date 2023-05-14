$( document ).ready(function() {      
	consultarNewuser();  
});
	function consultarNewuser() 
	{
		var oParametro = 
		{
			"action": "consultarNewuser"          
		};    
		$.ajax(
		{
			type: "POST",
			url: "../acoes/consultarNewuser.php", 
			data: oParametro,
			async: true,
			success: function(data) 
			{
			  var retorno = JSON.parse(data);
			  if (retorno.success == "true") 
			  {
			    const x = document.getElementById("notification_count");
			    if(x.style.display == "")
			    {
			      x.style.display = "block";
			      $("#notification_count").append(retorno.cont);
			      $("#notificationsBody").append(atob(retorno.tablenewuser)); 	
			    } else if (retorno.cont >= x.style.length || x.style.display == "none")
			    {
			    	//alert("Deu bom");
			      x.style.display = "block";
			      $("#notification_count").empty();
			      $("#notificationsBody").empty();
			      $("#notification_count").append(retorno.cont);
			      $("#notificationsBody").append(retorno.newuser);
			    } 
			  }else if(retorno.failure == "false")
			  {
			  	//alert("Não existe um novo user");
			  	$("#notification_count").empty();
			    $("#notificationsBody").empty();
			  	const x = document.getElementById("notification_count");
			    if(x.style.display == "block")
			    {
			    	x.style.display = "none";
			    }             	
			  }
			},
			error: function(xhr, status, error) 
			{
			  alert(xhr.responseText);
			},
			complete: function(xhr, status) {
			    // Ação a ser executada ao final da requisição (com sucesso ou falha)
			  }
		});
	}
	function abrirModal(funcionario) {
		$("#myModal").modal();
		$("#infonvuser").empty();
		$("#infonvuser").append(funcionario);
		var dados = funcionario;
		var posicao = dados.indexOf('<td>55555</td>');
		var inicio = dados.indexOf('>', posicao) + 1;
		var fim = dados.indexOf('</td>', inicio);
		var valor = dados.substring(inicio, fim);
		// Adiciona um evento de clique ao botão de download
		// Seleciona os botões pelos IDs
		var button1 = document.getElementById('pdf_ad');
		var button2 = document.getElementById('pdf_ecti');
		var button3 = document.getElementById('pdf_glpi');
		// Adiciona o evento de clique em cada um dos botões
		button1.addEventListener('click', function() {
		  downloadPDF(valor);
		});
		button2.addEventListener('click', function() {
		  downloadPDF(valor);
		});
		button3.addEventListener('click', function() {
		  downloadPDF(valor);
		});
	}
	function downloadPDF(matricula) {
	  // Cria um link para download do arquivo ZIP
	  var link = document.createElement("a");
	  link.href = "../acoes/baixar_pdf.php?matricula=" + matricula;
	  link.download = "pdfs.zip";
	  document.body.appendChild(link);
	  link.click();
	  document.body.removeChild(link);
	}    
    function criarUsuario(idButton) {
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
			url: "../acoes/statususer.php", 
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
			  	    text: 'Usuario adicionado com sucesso!',
			  	}).then(() => {
			  	  window.location.reload();
			  	  window.location.reload();
			  	  xhr.abort();
			  	});

			  	$("#myModal").modal("hide"); // esconde o modal			  		    
			  }
			},
			error: function(xhr, status, error) 
			{
			  alert(xhr.responseText);
			},
		});
	} else if(idButton === 'clickfalse'){	
		var oParametro = 
		{
			"action": "userfalse",
			"userrecusado": user	          
		};			      
		$.ajax(
		{
			type: "POST",
			url: "../acoes/statususer.php", 
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
			 		}).then(() => {
			 		  window.location.reload();
			 		  xhr.abort();
			 		});
			 		$("#myModal").modal("hide"); // esconde o modal			    
			  	}

			},
			error: function(xhr, status, error) 
			{
			  alert(xhr.responseText);
			}, 
		});
	}
}