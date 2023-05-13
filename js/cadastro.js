//Alertas dos imputs
const formspan = document.getElementById('input-group');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailregex = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}
function setSuccess(index){
    campos[index].style.border = '2px solid #00FF00';
    spans[index].style.display = 'none';
}
function nomeValido(elemento){
    if (campos[0].value.length < 3) {
        setError(0);       
    }else{
        setSuccess(0);
        return true;
    }
 }
function loginValido(){
    if (campos[1].value.length < 3) {
    setError(1);
}   else{
    setSuccess(1);
    return true;
    }
}
function emailtrue(){
    if(emailregex.test(campos[2].value)){
        setSuccess(2);
        return true;
    }else {
        setError(2);
    }
 }
function matriculaValida(){
    if(campos[3].value.length < 3){

        setError(3);
    }else {       
        setSuccess(3);
        return true;
    }
}
function senhaValida(){
    if(campos[4].value.length < 8){
        setError(4);
    }else {
        setSuccess(4);
        return true;
    }
}
function senhaConfirmada(){
    if(campos[4].value === campos[5].value && campos[5].value.length >= 8){
        setSuccess(5);
        return true;
    }else {
        setError(5);
    }
}
//Abrir modal
function useraddModal(){
    $("#useradd").modal();      
}
function edidadeModal(){
    $("#ecidade").modal();
}
function glpiModal(){
    $("#glpi").modal();
}
//UserAD checkbox alertas modal
function checkboxad(event) 
{
    //console.log('elemento AD', elemento);
    var botao = event.target;
       // Obtenha uma referência para o modal e para os elementos de input dentro do modal
    var modal = document.getElementById('useradd');
    var checkboxes = modal.querySelectorAll('input[type="checkbox"]');
    // Verifique se pelo menos um checkbox está marcado
    var temCheckboxMarcado = false;
    checkboxes.forEach(function(checkbox) 
    {
        if (checkbox.type === 'checkbox' && checkbox.checked) 
        {
            temCheckboxMarcado = true;
            return; // interrompe o loop assim que encontrar um checkbox marcado
        }
    });
    if (temCheckboxMarcado) 
    {   
        if(botao){
            //file userad
            const fileusead = $('#input-pdf-userad')[0].files[0];
            const filealert = document.getElementById('file_acsdom');
            //console.log(fileusead);
            if(fileusead === undefined)
            {
                filealert.style.color = "red";
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Adicione o arquivo das permissão em PDF AD!',               
                });     
            } else
            {
                if (fileusead.type === "application/pdf") {
                    filealert.style.color = "";
                    $("#useradd").modal("hide"); // esconde o modal
                    Swal.fire({
                        icon: 'success',
                        title: 'Bom Trabalho',
                        text: 'Permissão adicionado com sucesso!',    
                    });
                }else{
                    Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Formato de arquivo não permitido, adicione um arquivo em PDF!',
                    
                    });
                }        
            }
    }
    return true;
    } else 
    {
        if(botao){
            Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Adicione pelo menos uma permissão ao AD!',
        
            });
        }
        return false;
    }
}
//ecidade checkbox alertas modal
function checkboxecit(event) 
{
    var botao = event.target;
       // Obtenha uma referência para o modal e para os elementos de input dentro do modal
    var modal = document.getElementById('ecidade');
    var checkboxes = modal.querySelectorAll('input[type="checkbox"]');
    // Verifique se pelo menos um checkbox está marcado
    var temCheckboxMarcado = false;
    checkboxes.forEach(function(checkbox) 
    {
        if (checkbox.type === 'checkbox' && checkbox.checked) 
        {
            temCheckboxMarcado = true;
            return; // interrompe o loop assim que encontrar um checkbox marcado
        }
    });
    if (temCheckboxMarcado) 
    {
        if(botao){
            //file ecidade Arrecadação
            const fileecitacd = $('#input-pdf-ecit-arcd')[0].files[0];
            const filealert_acd = document.getElementById('file_arecadacao_ecit');
            if(fileecitacd === undefined)
            {
                
                filealert_acd.style.color = "red";
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Adicione o arquivo das permissão em PDF AD!',
                });    
            } else
            {
                if (fileecitacd.type === "application/pdf") {
                    filealert_acd.style.color = "";
                    $("#ecidade").modal("hide"); // esconde o modal
                    Swal.fire({
                        icon: 'success',
                        title: 'Bom Trabalho',
                        text: 'Permissão adicionado com sucesso!',    
                    });
                }else{
                    Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Formato de arquivo não permitido, adicione um arquivo em PDF!',
                    
                    });
                }        
            }
        
        }
        return true;
    } else 
    {   
        if(botao){
            Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Adicione pelo menos uma permissão ao E-dicade!',
        
            });
        }
        return false;
    }
} 
//GLPI checkbox alertas modal
function checkboxglpi(event) 
{
    var botao = event.target;
  
       // Obtenha uma referência para o modal e para os elementos de input dentro do modal
    var modal = document.getElementById('glpi');
    var checkboxes = modal.querySelectorAll('input[type="checkbox"]');

    // Verifique se pelo menos um checkbox está marcado
    var temCheckboxMarcado = false;

    checkboxes.forEach(function(checkbox) 
    {
        if (checkbox.type === 'checkbox' && checkbox.checked) 
        {
            temCheckboxMarcado = true;
            return; // interrompe o loop assim que encontrar um checkbox marcado
        }
    });

    if (temCheckboxMarcado) 
    {
        if (botao) {
            //console.log('Pelo menos um checkbox está marcado!');
            //file GLPI
            const fileglpi = $('#input-pdf-glpi')[0].files[0];
            const filealert_glpi = document.getElementById('file_acesso_glpi');
            if(fileglpi === undefined)
            {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Adicione o arquivo das permissão em PDF AD!',
                });    
                filealert_glpi.style.color = "red";
            } else
            {
                if (fileglpi.type === "application/pdf") {
                    filealert_glpi.style.color = "";
                    $("#glpi").modal("hide"); // esconde o modal
                    Swal.fire({
                        icon: 'success',
                        title: 'Bom Trabalho',
                        text: 'Permissão adicionado com sucesso!',    
                    });
                }else{
                    Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Formato de arquivo não permitido, adicione um arquivo em PDF!',
                    
                    });
                }  
            }
    }
        return true;
    } else 
    {
        if(botao){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Adicione pelo menos uma permissão ao GLPI!',
        
        });
    }
        return false;
    }
}
//Limpar o modal separado
function limparCheckbox(elemento) {
    var idDoBotao = elemento.id;
    //console.log(idDoBotao);  
    if(elemento === 'Não foi adicionado nem uma permição!'){
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: 'Adicione pelo menos uma permissão!'      
    });
    return false; 
    } 
    switch(idDoBotao)
    {
        //AD
        case "clearuser":
            var checkboxes = document.querySelectorAll('input[name="grupo11"]:checked, input[name="grupo12"]:checked');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
            var fileInputad = document.getElementById('input-pdf-userad');
            fileInputad.value = ''; // limpa o valor do input file

            break;
        //ecidade
        case "clearecitarcd":
            var checkboxes = document.querySelectorAll('input[name="grupo21"]:checked, input[name="grupo22"]:checked');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
            var fileInputarcd = document.getElementById('input-pdf-ecit-arcd');
            fileInputarcd.value = ''; // limpa o valor do input file
            break;

        //GLPI
        case "clearglpi":
            var checkboxes = document.querySelectorAll('input[name="grupo31"]:checked, input[name="grupo32"]:checked');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = false;
                }
                var fileInputglpi = document.getElementById('input-pdf-glpi');
                fileInputglpi.value = ''; // limpa o valor do input file
            break;
    }
}
//Validação geral  
function checkInputs(event) 
{
    
    event.preventDefault();
    var ret = new Array();
    var contArray = 0;
    if (nomeValido() === true) {
        ret['nome'] = campos[0].value;
        contArray++;    
    }
    if (loginValido() === true) {     
        ret['login'] = campos[1].value;
        contArray++;   
    }
    if (emailtrue() === true) {
        ret['email'] = campos[2].value;
        contArray++;
    }
    if (matriculaValida() === true) {
        ret['matricula'] = campos[3].value;
        contArray++;
    }
    if (senhaValida() === true && senhaConfirmada() === true) {
        ret['senha'] = campos[5].value;
        contArray++;
    }else{
        setError(5);
    }
    var checkboxes = document.querySelectorAll('input[name="grupo11"]');
    var checkboxInfo = {};
    var checkedCheckboxes = [];
    var uncheckedCheckboxes = [];
    for (var i = 0; i < checkboxes.length; i++) {
      var checkbox = checkboxes[i];
      var name = checkbox.id;
      var value = checkbox.value;
      var isChecked = checkbox.checked;

      if (isChecked) {
         checkedCheckboxes[name] = isChecked;
         checkedCheckboxes['test'] = isChecked;

      } else {
        uncheckedCheckboxes[name] = isChecked;
        uncheckedCheckboxes['test'] = isChecked;
      } 
    }
    //validação AD
    let retcheckead = checkboxad(true);
    //console.log(retcheckead);
    if(retcheckead === true){
        contArray++;
    }
    //validação checkbox E-cidade
    let retcheckecit = checkboxecit(true);
    if(retcheckecit === true){
        //alert("Entrou na valçidação E-cidade");
        contArray++;
    }
       //validação GLPI
    let retcheckglpi = checkboxglpi(true);
       //console.log(retcheckglpi);
    if(retcheckglpi === true){
        contArray++;

    }
        //radio masculino, femenino, outros
    var selectedValue = document.querySelector('input[name="gender"]:checked');
    if (selectedValue) {
        var selectedLabel = selectedValue.labels[0].innerText;
        ret['sexo'] = selectedLabel;
        contArray++;
    } else {
        Swal.fire({
          icon: 'warning',
          title: 'Oops...',
          text: 'Por favor, selecione um sexo!'
        });
    }
    if(contArray >= 7 )
    {
        ret['contArray'] = contArray;
        var valt = ret;
        ret =[]; 
        $( document ).ready(function() 
        {
          enviarDados(valt);              
        });
    } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Algo deu errado, Confira se todos os dados foram preenchidos corretamente!'
        });
        ret =[];
    }
}
function enviarDados(valt) 
{   
    var data_dados = new FormData();
    data_dados.append('action', 'addUser');
    data_dados.append('matricula', valt['matricula']);
    data_dados.append('nome', valt['nome']);
    data_dados.append('email', valt['email']);
    data_dados.append('login', valt['login']);
    data_dados.append('sexo', valt['sexo']);
    data_dados.append('senha', valt['senha']);
    $.ajax({
      url: '../acoes/cadastro.php',
      type: 'POST',
      data: data_dados,
      processData: false,
      contentType: false,
      success: function(data) {
        //console.log(typeof data);
        var retorno = JSON.parse(data);
        if (retorno.status == "success") {
            add_permissoes(retorno);   
        } else { 
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Erro ao adicionar usuário!'
          });
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $('#message').html('Erro ao enviar arquivo: ' + errorThrown);
      }
    });
}
    //data ecidade arecadacao
function add_permissoes(retorno)
{
    //AD
    var data_permissoes = new FormData();
    data_permissoes.append('action', 'pms_arcdcit');
    data_permissoes.append('matricula', retorno.matricula);
    var checkboxuserad = document.querySelectorAll('input[name="grupo11"]');
    var checkboxcuseradm = document.querySelectorAll('input[name="grupo12"]');
    if (checkboxuserad.length !== 0) 
    {
        for (var i = 0; i < checkboxuserad.length; i++) 
        {
            var checkboxad = checkboxuserad[i];
            if (checkboxad.checked) 
            {
                data_permissoes.append(checkboxad.id, checkboxad.checked);
            } else 
            {
                data_permissoes.append(checkboxad.id, checkboxad.checked);
            } 
        }
    }
    if (checkboxcuseradm.length !== 0) 
    {
        for (var i = 0; i < checkboxcuseradm.length; i++) 
        {
            var checkboxad_pms = checkboxcuseradm[i];
            if (checkboxad_pms) 
            {
                data_permissoes.append(checkboxad_pms.id, checkboxad_pms.checked); 

            } else 
            {
                data_permissoes.append(checkboxad_pms.id, checkboxad_pms.checked);
            } 
        }    
    }
    //Ecit
    var checkboxecit_cdt = document.querySelectorAll('input[name="grupo21"]');
    var checkboxecit_cst = document.querySelectorAll('input[name="grupo22"]');
    if (checkboxecit_cdt.length !== 0) 
    {
        for (var i = 0; i < checkboxecit_cdt.length; i++) 
        {
            var checkboxecit = checkboxecit_cdt[i];
            if (checkboxecit.checked) 
            {
                data_permissoes.append(checkboxecit.id, checkboxecit.checked);
            } else 
            {
                data_permissoes.append(checkboxecit.id, checkboxecit.checked);
            } 
        }
    }
    if (checkboxecit_cst.length !== 0) 
    {
        for (var i = 0; i < checkboxecit_cst.length; i++) 
        {
            var checkbox_ecit = checkboxecit_cst[i];
            if (checkbox_ecit) 
            {
                data_permissoes.append(checkbox_ecit.id, checkbox_ecit.checked);             
            } else 
            {
                data_permissoes.append(checkbox_ecit.id, checkbox_ecit.checked);
            } 
        }    
    }
    //Glpi
    var checkboxglpi_acs = document.querySelectorAll('input[name="grupo31"]');
    var checkboxglpi_pms = document.querySelectorAll('input[name="grupo32"]');
    if (checkboxglpi_acs.length !== 0) 
    {
        for (var i = 0; i < checkboxglpi_acs.length; i++) 
        {
            var checkboxglpi = checkboxglpi_acs[i];
            if (checkboxglpi.checked) 
            {
                data_permissoes.append(checkboxglpi.id, checkboxglpi.checked);
            } else 
            {
                data_permissoes.append(checkboxglpi.id, checkboxglpi.checked);
            } 
        }
    }
    if (checkboxglpi_pms.length !== 0) 
    {
        for (var i = 0; i < checkboxglpi_pms.length; i++) 
        {
            var checkbox_glpi = checkboxglpi_pms[i];
            if (checkbox_glpi) {
                data_permissoes.append(checkbox_glpi.id, checkbox_glpi.checked);             
            } else 
            {
                data_permissoes.append(checkbox_glpi.id, checkbox_glpi.checked);
            } 
        }    
    }
    //files
   const file_acsdom = $('#input-pdf-userad')[0].files[0];
      const file_arecadacao_ecit = $('#input-pdf-ecit-arcd')[0].files[0];
      const file_acesso_glpi = $('#input-pdf-glpi')[0].files[0];
      if (file_acsdom)
      {
          data_permissoes.append('pdf_ad', $('#input-pdf-userad')[0].files[0]);
      } else 
      {
          data_permissoes.append('pdf_ad', '');
      }
      if (file_arecadacao_ecit) 
      {
          data_permissoes.append('pdf_ecit', $('#input-pdf-ecit-arcd')[0].files[0]);
      } else 
      {
          data_permissoes.append('pdf_ecit', '');
      }
      if (file_acesso_glpi) 
      {
          data_permissoes.append('pdf_gli', $('#input-pdf-glpi')[0].files[0]);
      } else 
      {
          data_permissoes.append('pdf_gli', '');
      }
    $.ajax({
        url: '../acoes/cadastro.php',
        type: 'POST',
        data: data_permissoes,
        processData: false,
        contentType: false,
        success: function(data) 
        {   
          // console.log('valor de data: ', data.status);
            var retorno = JSON.parse(data);
            if (retorno.status == "success") 
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Bom Trabalho',
                    text: 'Solicitação de novo usuário enviado com sucesso!',
                }).then((result) => {
                    if (result.isConfirmed)
                     {
                        location.reload();
                        xhr.abort();
                    }
                });
            } else 
            {                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Erro ao adicionar usuário!' 
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            $('#message').html('Erro ao enviar arquivo: ' + errorThrown);
        }
    });
}










     

        

      

