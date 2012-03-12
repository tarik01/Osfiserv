$(document).ready(function(){
	$("#ver_cliente").dialog({
			modal: true,
			draggable: false,
			autoOpen: true,
			width: "450px", 
			buttons: {
				"Nova OS": function(){
					go("./?page=OS&action=nova&id_cliente_os=<? echo $clienteId; ?>");
					
				},
				"Voltar": function(){
					go("./");
				}
			},
			close: function() {
				go("./");
			}
		});
});	