<div class="container_16" style="text-align: center;">
	<div class="prefix_2 grid_12">
		<div class="ui-widget-content ui-corner-all descAction">
			<div class="title ui-widget-header ui-corner-all">Resultado - Pesquisar cliente</div>
			<div class="list_itens" style="padding: 10px;">
				<table style="width: 100%">
					<tr>
					<td><b>Legenda</b></td>
					</tr>
					<tr>
					<td class="tdBordaCenter width12"><img src="images/icones/nova_os.png" border="0" /><br>Nova OS</td>
					<td class="tdBordaCenter width12"><img src="images/icones/ver_os.png" border="0" /><br>Ver Todas OS</td>
					<td class="tdBordaCenter width12"><img src="images/icones/ver_cliente.png" border="0" /><br>Ver Cliente</td>
					<td class="tdBordaCenter width12"><img src="images/icones/editar.png" border="0" /><br>Editar Cliente</td>
					</tr>
				</table>
				<div class="item_list_itens">
				<table style="width: 100%">
					<? 
						if(isset($_REQUEST['ClienteNome_pesq'])){
							if($_REQUEST['ClienteNome_pesq']!=null || $_REQUEST['ClienteNome_pesq']!=''){
								include_once("../Model/Cliente.php");
								$cliente_nome = $_REQUEST['ClienteNome_pesq'];
								$cliente = new Cliente();
								$dados = $cliente->getClienteNomeAll($cliente_nome);
							}
						}
						if(isset($_REQUEST['ClienteCpf_pesq'])){
							if($_REQUEST['ClienteCpf_pesq']!=null || $_REQUEST['ClienteCpf_pesq']!=''){
								include_once("../Model/Cliente.php");
								$cliente_cpf = $_REQUEST['ClienteCpf_pesq'];
								$cliente = new Cliente();
								$dados = $cliente->getClienteCpfOrCnpj($cliente_cpf);
							}
						}
						else{
							return AlertaMsg("Você deve digitar pelo menos um campo de busca!");
						}
						if(isset($dados) && count($dados)>0){
						foreach($dados as $row){
					?>
					<tr>
					<td class="tdBorda" style="width: 50%">
						<b><? echo $row['ClienteNome']; ?></b>
						<br><?
						$CTp = $row['ClienteTipo'];
						$CCC = $row['ClienteCpfOrCnpj'];
						if($CTp == 0 && !empty($CCC)){
							echo '<b>CPF</b>: '.$CCC[0].$CCC[1].$CCC[2].'.'.$CCC[3].$CCC[4].$CCC[5].'.'.$CCC[6].$CCC[7].$CCC[8].'-'.$CCC[9].$CCC[10].'<br>';
						}
						elseif($CTp == 1 && !empty($CCC)){
							echo '<b>CNPJ</b>: '.$CCC[0].$CCC[1].'.'.$CCC[2].$CCC[3].$CCC[4].'.'.$CCC[5].$CCC[6].$CCC[7].'/'.$CCC[8].$CCC[9].$CCC[10].$CCC[11].'-'.$CCC[12].$CCC[13].'<br>';
						}else{
							echo '<br>';
						}
						$ClienteObs = $row['ClienteObs'];
						if(!empty($ClienteObs)){
							echo "<b>Obs.</b>: ".$ClienteObs;
						}else{
							echo '<br>';
						}
						$ClienteId = $row['ClienteId'];
						?>
						
					</td>
						<td class="tdBordaCenter"><a href="./?page=OS&action=nova&id_cliente_os=<? echo $ClienteId; ?>"><img src="images/icones/nova_os.png" border="0" /></a></td>
						<td class="tdBordaCenter"><a href="./?page=OS&action=ver_todas&id_cliente_os=<? echo $ClienteId; ?>"><img src="images/icones/ver_os.png" border="0" /></a></td>
						<td class="tdBordaCenter"><a href="./?page=Cliente&action=ver&ClienteId=<? echo $ClienteId; ?>"><img src="images/icones/ver_cliente.png" border="0" /></a></td>
						<td class="tdBordaCenter"><a href="./?page=Cliente&action=editar&ClienteId=<? echo $ClienteId; ?>"><img src="images/icones/editar.png" border="0" /></a></td>
					</tr>
					<? }}
					else{
						echo '<tr><td style="text-align: center"><b>Nenhum cliente encontrado !</b></td></tr>';
					}?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>