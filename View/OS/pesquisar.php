<?
	$opcao = '';
	if(isset($_POST['numero_os']) && $_POST['numero_os']!=''){
		echo '<script> go("./?page=OS&action=ver&OsId='.$_POST['numero_os'].'"); </script>';
	}
	elseif(isset($_POST['pos_cliente_id']) && $_POST['pos_cliente_id']>0){
		include_once("../Model/OS.php");
		$os = new OS();
		$ClienteId = $_POST['pos_cliente_id'];
		$dados = $os->getOSbyCliente($ClienteId);
		
		include_once("../Model/Cliente.php");
		$cliente = new Cliente();
		$cliente_dados = $cliente->getCliente($ClienteId);
		
		$opcao = 1;
	}
	elseif(isset($_POST['placa_carro']) && $_POST['placa_carro']!=''){
		include_once("../Model/OS.php");
		$os = new OS();
		$OsVeiculoPlaca = str_replace('-','',$_POST['placa_carro']);
		$dados = $os->getOSbyVeiculoPlaca($OsVeiculoPlaca);
		
		$opcao = 2;
	}
	else{
		return AlertaMsg("Você deve digitar pelo menos um campo de busca!");
	}
	
?>

<div class="container_16" style="text-align: center;">
	<div class="prefix_2 grid_12">
		<div class="ui-widget-content ui-corner-all descAction">
			<div class="title ui-widget-header ui-corner-all">Resultado - Pesquisar ordem de serviço</div>
			<div class="list_itens" style="padding: 10px;">
				<div class="item_list_itens">
				<table style="width: 100%">
					<? 
						if(isset($dados) && count($dados)>0 && $opcao==1){
							if(isset($cliente_dados) && count($cliente_dados)>0){
								echo '<tr><td><b>Cliente:</b> '.$cliente_dados[0]['ClienteNome'].'<br><br></td></tr>';
								
								foreach($dados as $row){
							?>
							<tr>
							<td class="tdBorda" style="width: 50%">
								<b>OS N°</b>: <? echo $row['OsId']; ?><br>
								<b>Veículo</b>: <? echo $row['OsVeiculo']; ?>
								<b>Cor</b>: <? echo $row['OsVeiculoCor']; if($row['OsVeiculoPlaca']!=null) echo ' <b>Placa</b>: '.$row['OsVeiculoPlaca']; ?><br>
								<b>Valor Total</b>: R$ <? echo number_format($row['OsTotal'], 2, '.', ''); ?>
							</td>
								<td class="tdBordaCenter"><a href="./?page=OS&action=ver&OsId=<? echo $row['OsId']; ?>"><img src="images/icones/ver_os_un.png" border="0" /></a><br>Ver OS</td>
								<td class="tdBordaCenter"><a href="./?page=OS&action=editar&OsId=<? echo $row['OsId']; ?>"><img src="images/icones/editar_os.png" border="0" /></a><br>Editar OS</td>
							</tr>
							<? }}
						}
						elseif(isset($dados) && count($dados)>0 && $opcao==2){
							foreach($dados as $row){
								include_once("../Model/Cliente.php");
								$cliente = new Cliente();
								$cliente_dados = $cliente->getCliente($row['OsClienteId']);
								$ClienteNome = $cliente_dados[0]['ClienteNome'];
							?>
							<tr>
							<td class="tdBorda" style="width: 50%">
								<b>OS N°</b>: <? echo $row['OsId']; ?><br>
								<b>Cliente</b>: <? echo $ClienteNome; ?><br>
								<b>Veículo</b>: <? echo $row['OsVeiculo']; ?>
								<b>Cor</b>: <? echo $row['OsVeiculoCor']; if($row['OsVeiculoPlaca']!=null) echo ' <b>Placa</b>: '.$row['OsVeiculoPlaca']; ?><br>
								<b>Valor Total</b>: R$ <? echo number_format($row['OsTotal'], 2, '.', ''); ?>
							</td>
								<td class="tdBordaCenter"><a href="./?page=OS&action=ver&OsId=<? echo $row['OsId']; ?>"><img src="images/icones/ver_os_un.png" border="0" /></a><br>Ver OS</td>
								<td class="tdBordaCenter"><a href="./?page=OS&action=editar&OsId=<? echo $row['OsId']; ?>"><img src="images/icones/editar_os.png" border="0" /></a><br>Editar OS</td>
							</tr>
							<?}
						}
						else{
						echo '<tr><td style="text-align: center"><b>Nenhum registro encontrado!</b></td></tr>';
						}?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>