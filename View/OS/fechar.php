<?
if($_POST){
	if(isset($_POST['numero_os']) && $_POST['numero_os']!='' && $_POST['numero_os']!=null){
		if(isset($_POST['status_os']) && $_POST['status_os']!='' && $_POST['status_os']!=null){
			include_once("../Model/OS.php");
			$os = new OS();
			$OsId = $_POST['numero_os'];
			$OsStatus = $_POST['status_os'];
			$verificador = $os->fecharOS($OsId,$OsStatus);
			
			if($verificador){?>
				<script>
				$(function() {
					$("#fechar_os_resultado").dialog({
						modal: true,
						draggable: false,
						autoOpen: true,
						width: "450px", 
						buttons: {
							"OK": function(){
								go("./?page=OS&action=ver&OsId=<? echo $OsId; ?>");
							}
						},
						close: function() {
							go("./?page=OS&action=ver&OsId=<? echo $OsId; ?>");
						} 
					});
				});
				</script>
				<div id="fechar_os_resultado" title="Mensagem" class="hide">
					Ordem de serviço fechada com sucesso!
				</div>
				<?
			}else{
				AlertaMsg("Erro ao fechar OS, contate o administrador!");
			}
		}else{
				AlertaMsg("Situação da OS não preenchida!");
			}
	}else{
		AlertaMsg("Ordem de serviço não selecionada!");
	}
}
?>