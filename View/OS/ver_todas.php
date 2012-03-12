<div class="container_16" style="text-align: center;">
	<div class="prefix_2 grid_12">
		<div class="ui-widget-content ui-corner-all descAction">
			<div class="title ui-widget-header ui-corner-all">Resultado - Pesquisar ordem de serviço por cliente</div>
			<div class="list_itens" style="padding: 10px;">
				
				<table style="width: 100%">
					<? if(isset($_REQUEST['id_cliente_os'])){
							if($_REQUEST['id_cliente_os']!=null || $_REQUEST['id_cliente_os']!=''){
								include_once("../Model/Cliente.php");
								$OsClienteId = $_REQUEST['id_cliente_os'];
								$cliente = new Cliente();
								$dados = $cliente->getCliente($OsClienteId);
							}
						}
						else{
							return AlertaMsg("Você deve escolher o cliente que deseja mostrar as OS!");
						}
						if(isset($dados) && count($dados)>0){
							foreach($dados as $row){
					?>
					<tr>
					<td><b>Cliente</b>: <? echo $row['ClienteNome']; ?></td>
					</tr>
					<? }} ?>
				</table>
				<div class="item_list_itens">
				<table style="width: 100%">
					<? 
						if(isset($_REQUEST['id_cliente_os'])){
							if($_REQUEST['id_cliente_os']!=null || $_REQUEST['id_cliente_os']!=''){
								include_once("../Model/OS.php");
								$OsClienteId = $_REQUEST['id_cliente_os'];
								$os = new OS();
								$dados = $os->getOSbyCliente($OsClienteId);
							}
						}
						else{
							return AlertaMsg("Você deve escolher o cliente que deseja mostrar as OS!");
						}
						if(isset($dados) && count($dados)>0){
						foreach($dados as $row){
					?>
					<tr>
					<td class="tdBorda" style="width: 50%">
						<b>Veículo</b>: <? echo $row['OsVeiculo']; ?>
						<br><?
							echo '<b>Cor</b>: '.$row['OsVeiculoCor'].'<br>';
						if($row['OsVeiculoPlaca']!=null && $row['OsVeiculoPlaca']!=''){
							echo '<b>Placa: </b>'.$row['OsVeiculoPlaca']['0'].$row['OsVeiculoPlaca']['1'].$row['OsVeiculoPlaca']['2'].'-'.$row['OsVeiculoPlaca']['3'].$row['OsVeiculoPlaca']['4'].$row['OsVeiculoPlaca']['5'].$row['OsVeiculoPlaca']['6'].' ';
						}?>
						
					</td>
						<td class="tdBordaCenter"><a href="./?page=OS&action=ver&OsId=<? echo $row['OsId']; ?>"><img src="images/icones/ver_os_un.png" border="0" /></a><br>Ver OS</td>
						<td class="tdBordaCenter"><a href="./?page=OS&action=editar&OsId=<? echo $row['OsId']; ?>"><img src="images/icones/editar_os.png" border="0" /></a><br>Editar OS</td>
					</tr>
					<? }}
					else{
						echo '<tr><td style="text-align: center"><b>Nenhum ordem de serviço encontrada !</b></td></tr>';
					}?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>