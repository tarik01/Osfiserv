$(document).ready(function(){
	$("#ver_os").dialog({
			modal: true,
			draggable: false,
			autoOpen: true,
			width: "450px", 
			buttons: {
				"Ver OS": function(){
					go("./?page=OS&action=ver&OsId=<? echo $OsId; ?>");
					
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