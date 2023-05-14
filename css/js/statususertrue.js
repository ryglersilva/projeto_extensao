$( document ).ready(function() {      
	statususer();  
});	
	function statususer() 
	{
		var oParametro = 
		{
			"action": "statususer"          
		};			      
		$.ajax(
		{
			type: "POST",
			url: "../acoes/consulta.php", 
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
			      //$("#notificationsBody").append(atob(retorno.tablenewuser));
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
	}