	var ClienteIdAjax;
	$(document).ready(function(){
		$(".ver_os").hover(function(e){
			$("#ver_os_txt").offset({left:$(this).offset().left-45, top:$(this).offset().top}); $("#ver_os_txt").css("visibility","visible"); 
		}, function(){$("#ver_os_txt").css("visibility","hidden");});
		
		$("body").click(function(){ $("#menu_funcionarios,#menu_clientes,#menu_os").slideUp('slow');});
		$("#hover-clientes").click(function(){ $("#menu_funcionarios,#menu_os").slideUp('slow'); $("#menu_clientes").show(); return false; });
		$("#hover-funcionarios").click(function(){ $("#menu_clientes,#menu_os").slideUp('slow'); $("#menu_funcionarios").show(); return false; });
		$("#hover-os").click(function(){ $("#menu_funcionarios,#menu_clientes").slideUp('slow'); $("#menu_os").show(); return false; });		
		
		$("#OsVeiculoPlaca").mask("aaa-9999");
		$("#OsVeiculoAnoModelo").mask("9999/9999");
		
		
		/*Abrir dialogs*/
		$( ".clientes_c" ).click(function() {
			$( "#cadastrar_cliente" ).dialog( "open" );
			/*$("#sexo").selectbox();*/
			$("#pessoa").buttonset();
			$("#cpf").mask("999.999.999-99");
			$("#cnpj").mask("99.999.999/9999-99");
			$("#telefone,#celular").mask("(99) 9999-9999");
			$("#nascimento").mask("99/99/9999");
			$("#cep").mask("99999-999");
			
			
			return false;
		});
		$( ".funcionarios_c" ).click(function() {
			$( "#cadastrar_funcionario" ).dialog( "open" );
			$("#cpf_func").mask("999.999.999-99");
			$("#nascimento_func").mask("99/99/9999");
			$("#telefone_func,#celular_func").mask("(99) 9999-9999");
			return false;
		});
		$( ".sair_a" ).click(function() {
			$( "#sair_dialog" ).dialog( "open" );
			return false;
		});
		$( ".configuracoes_a" ).click(function() {
			$( "#configuracoes" ).dialog( "open" );
			$("#configuracoes_accord").accordion();
			return false;
		});
		$( ".clientes_p" ).click(function() {
			$( "#pclientes" ).dialog( "open" );
			return false;
		});
		$( ".funcionarios_p" ).click(function() {
			$( "#pfuncionarios" ).dialog( "open" );
			return false;
		});
		$( ".os_p" ).click(function() {
			$( "#pos" ).dialog( "open" );
			$("#placa_carro").mask("aaa-9999");
			return false;
		});
		$( ".os_f" ).click(function() {
			$( "#fechar_os" ).dialog( "open" );
			return false;
		});
		$( ".os_n" ).click(function() {
			$( "#nova_os" ).dialog( "open" );
			return false;
		});
		
		/*Dialog - cadastrar cliente*/
		$("#cadastrar_cliente").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "450px", 
			buttons: {
				"Cadastrar": function(){
					$("#cad_cliente_form").submit();
				},
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$("#cliente_nome").val("");
				$("#nascimento").val("");
				$("#cpf").val("");
				$("#rg").val("");
				$("#endereco").val("");
				$("#numero").val("");
				$("#complemento").val("");
				$("#cep").val("");
				$("#telefone").val("");
				$("#celular").val("");
				$("#obs_fis").val("");
				
				$("#cliente_nome_jur").val("");
				$("#cnpj").val("");
				$("#endereco_jur").val("");
				$("#numero_jur").val("");
				$("#complemento_jur").val("");
				$("#cep_jur").val("");
				$("#telefone_jur").val("");
				$("#celular_jur").val("");
				$("#obs_jur").val("");

			} 
		});
		
		/*Dialog - cadastrar funcionário*/
		$("#cadastrar_funcionario").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "450px", 
			buttons: {
				"Cadastrar": function(){
					$("#cad_funcionario_form").submit();
				},
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				
			} 
		});
		
		/*Dialog - configuracoes*/
		$("#configuracoes").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "450px", 
			buttons: {
				"Sair": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				
			} 
		});
		
		/*Dialog - pesquisar cliente*/
		$("#pclientes").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "250px", 
			buttons: {
				"Pesquisar": function(){
					$("#pclientes_form").submit();
				}
			},
			close: function() {
				$("#nome").val("");
				$("#cpf").val("");
			} 
		});
		
		/*Dialog - pesquisar funcionarios*/
		$("#pfuncionarios").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "250px", 
			buttons: {
				"Pesquisar": function(){
					go('teste.html')
				}
			},
			close: function() {
				$("#nome").val("");
				$("#cpf").val("");
			} 
		});
		
		/*Dialog - pesquisar ordem de serviço*/
		$("#pos").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "400px", 
			buttons: {
				"Pesquisar": function(){
					$("#pos_form").submit();
				}
			}
		});
		
		/*Dialog - fechar ordem de serviço*/
		$("#fechar_os").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "220px", 
			buttons: {
				"OK": function(){
					$("#fechar_os_form").submit();
				},
				"Cancelar": function() {
					$("#numero_os_fechar").val('');
					$( this ).dialog( "close" );
				}
			}
		});
		
		
		/*Dialog - sair sistema*/
		$("#sair_dialog").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "450px", 
			buttons: {
				"Sim": function(){
					go('logoff.html')
				},
				"Não": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				
			} 
		});
		
		/*Dialog - nova ordem de serviço*/
		$("#nova_os").dialog({
			modal: true,
			draggable: false,
			autoOpen: false,
			width: "450px", 
			buttons: {
				"OK": function(){
					$("#nova_os_form").submit()
				},
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$("#nome_cliente_os").val("");
			} 
		});
		$("#juridica").click(function(){
			$("#pessoa_fisica").addClass("hide"); 
			$("#pessoa_juridica").removeClass("hide"); 
			$("#telefone_jur,#celular_jur").mask("(99) 9999-9999");
			$("#cep_jur").mask("99999-999"); $("#pessoa_select").html('Jurídica');
		});
		$("#fisica").click(function(){
			$("#pessoa_juridica").addClass("hide");
			$("#pessoa_fisica").removeClass("hide");
			$("#pessoa_select").html('Física');
		});
		
		/* UTIL */
		$("#alerta").dialog({
			modal: true,
			draggable: false,
			autoOpen: true,
			width: "450px", 
			buttons: {
				"OK": function(){
					history.go(-1);
				}
			},
			close: function() {
				history.go(-1);
			}
		});
		
		$("#alerta2").dialog({
			modal: true,
			draggable: false,
			autoOpen: true,
			width: "450px", 
			buttons: {
				"OK": function(){
					go("./");
				}
			},
			close: function() {
				go("./");
			}
		});
		
		/*AutoComplete Clientes*/
		$('#nome_cliente_os').simpleAutoComplete('../Util/ajax.php',{
		autoCompleteClassName: 'autocomplete',
		selectedClassName: 'sel',
		attrCallBack: 'rel',
		identifier: 'cliente'
	    },clienteIdCallback);
		
		$('#pos_cliente_nome').simpleAutoComplete('../Util/ajax.php',{
		autoCompleteClassName: 'autocomplete',
		selectedClassName: 'sel',
		attrCallBack: 'rel',
		identifier: 'cliente'
	    },clienteIdCallback2);
		

		
	});	
	function clienteIdCallback( par )
	{
	    $("#id_cliente_os").val( par[0] );
		ClienteIdAjax = par[0];
	}
	function clienteIdCallback2( par )
	{
		$("#pos_cliente_id").val( par[0] );
		ClienteIdAjax = par[0];
	}

	function go(url){
		window.location = "./"+url;
	}
	function somenteNumeros(e){
		var tecla=(window.event)?event.keyCode:e.which;   
		if((tecla>47 && tecla<58)) return true;
		else{
			if (tecla==8 || tecla==0) return true;
		else  return false;
		}
	}
	function somenteNumerosPonto(e){
		if(e.charCode==46 || e.keyCode==46) return true;
		var tecla=(window.event)?event.keyCode:e.which;   
		if((tecla>47 && tecla<58)) return true;
		else{
			if (tecla==8 || tecla==0) return true;
		else  return false;
		}
	}
	function somenteLetras(e){
		var tecla=(window.event)?event.keyCode:e.which;   
		if((tecla>47 && tecla<58)) return false;
		else{
			return true;
		}
	}
