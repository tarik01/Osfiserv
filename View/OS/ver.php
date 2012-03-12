<?
	include_once("../Model/OS.php");
	include_once("../Model/Cliente.php");
	include_once("../Model/Funcionario.php");
	$OsId = $_REQUEST['OsId'];
	$os = new OS();
	$dados = $os->getOS($OsId);
	if(count($dados)>0){
		foreach($dados as $row){
			$OsClienteId = $row['OsClienteId'];
			$OsVeiculo = $row['OsVeiculo'];
			$OsVeiculoPlaca = $row['OsVeiculoPlaca'];
			$OsVeiculoCor = $row['OsVeiculoCor'];
			$OsVeiculoAnoModelo = $row['OsVeiculoAnoModelo'];
			$OsSubTotal = $row['OsSubTotal'];
			$OsDesconto = $row['OsDesconto'];
			$OsTotal = $row['OsTotal'];
			$OsPagamento = $row['OsPagamento'];
			$OsStatus = $row['OsStatus'];
			$OsObs = $row['OsObs'];
			$OsFuncionarioServicoId = $row['OsFuncionarioServicoId'];
			//$OsFuncionarioCadastroId = 
		}
	}else{
		return Alerta();
	}
	
	$dados = null;
	$OsServico = $os->getServicos($OsId);
	$os = null;
	
	if($OsFuncionarioServicoId!=0 && (!empty($OsFuncionarioServicoId))){
		$funcionario = new Funcionario();
		$dados = $funcionario->getFuncionario($OsFuncionarioServicoId);
		if(count($dados)>0){
			foreach($dados as $row){
				$FuncionarioNome = $row['FuncionarioNome'];
			}
		}else{
			return Alerta();
		}
	
		$funcionario = null;
		$dados = null;
	}
	
	$cliente = new Cliente();
	$dados = $cliente->getCliente($OsClienteId);
	if(count($dados)>0){
		foreach($dados as $row){
			$ClienteNome = $row['ClienteNome'];
			$ClienteObs = $row['ClienteObs'];
			if(!empty($ClienteObs)){
				$ClienteObs = "<b>Obs.</b>: ".$ClienteObs;
			}
			$CTp = $row['ClienteTipo'];
			$CCC = $row['ClienteCpfOrCnpj'];
			if($CTp == 0 && !empty($CCC)){
				$ClienteCpfOrCnpj = '<label>CPF</label>: '.$CCC[0].$CCC[1].$CCC[2].'.'.$CCC[3].$CCC[4].$CCC[5].'.'.$CCC[6].$CCC[7].$CCC[8].'-'.$CCC[9].$CCC[10].'<br>';
			}
			elseif($CTp == 1 && !empty($CCC)){
				$ClienteCpfOrCnpj = '<label>CNPJ</label>: '.$CCC[0].$CCC[1].'.'.$CCC[2].$CCC[3].$CCC[4].'.'.$CCC[5].$CCC[6].$CCC[7].'/'.$CCC[8].$CCC[9].$CCC[10].$CCC[11].'-'.$CCC[12].$CCC[13].'<br>';
			}else{
				$ClienteCpfOrCnpj = '';
			}
			
		}
	}else{
		return Alerta();
	}
	$cliente = null;
	$dados = null;

?>
<script>
	var cont = 2;
	$(function() {

		$("#IMPRIMIR_OS,#EDITAR_OS,#FECHAR_OS,#COMPROVANTE_OS").button();
		$("#OK_OS").click(function() { $("#nova_ordem_de_servico").submit(); });
		$("#CANCEL_OS").click(function() { go("./"); });
		$("#IMPRIMIR_OS").click(function() { 
			go("../Util/gerarOS.php?OsId=<? echo $OsId; ?>");
				return false;
		});
		$("#FECHAR_OS").click(function() {
			$(".os_f").click();
			$("#numero_os_fechar").val("<? echo $OsId; ?>");
		});
	});

	</script>
	<div id="page">
	<br>
		<div class="container_16">
			<div id="botao_ok_cancela" class="grid_16"">
					<a href="#" id="IMPRIMIR_OS">IMPRIMIR ORDEM DE SERVIÇO</a> <a href="#" id="COMPROVANTE_OS">IMPRIMIR COMPROVANTE/ENTREGA</a> <a href="#" id="EDITAR_OS">EDITAR OS</a> <? if($OsStatus!=2 && $OsStatus!=3) { echo '<a href="#" id="FECHAR_OS">FECHAR OS</a>'; } ?>
			</div>
			<div id="servicos_executados_ver" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Serviços executados</div>
				<div class="item_servico_list">
					<? foreach($OsServico as $row) { ?>
					<div class="item_servico_div">
						<table class="item_servico_table">
							<tr>
								<td style="width: 300px;"><b>Serviço</b></td>
								<td style="width: 30px;"><b>Qtd</b></td>
								<td style="width: 88px; text-align: center;"><b>Valor (Un)</b></td>
							</tr>
							<tr>
								<td><? echo $row['ServicoNome']; ?></td>
								<td><? echo $row['ServicoQtd']; ?></td>
								<td style="width: 88px; text-align: center;"><? echo number_format($row['ServicoValor'], 2, '.', ''); ?></td>
							</tr>
							<tr>
							
						</table>
					</div>
					<? } ?>
				</div>
				
			</div>
			<div id="dados_cliente" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Informações do cliente</div>
				<div class="em_aberto_item white">
				<label>Nome do cliente</label>: <? echo $ClienteNome; ?><br>
				<? echo $ClienteCpfOrCnpj; ?>
				<? echo $ClienteObs; ?>			
				</div>
			</div>
			<div id="dados_veiculo" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Informações do veículo</div>
				<div class="em_aberto_item white">
					<label>Veículo</label><br>
					<? echo $OsVeiculo; ?><br>
					<table class="boxDialog">
						<tr>
							<td style="width: 143px;"><label>Placa</label></td>
							<td style="width: 143px;"><label>Cor</label></td>
							<td style="width: 143px;"><label>Ano/Modelo</label></td>
						<tr>
						<tr>
							<td><? echo $OsVeiculoPlaca[0].$OsVeiculoPlaca[1].$OsVeiculoPlaca[2].'-'.$OsVeiculoPlaca[3].$OsVeiculoPlaca[4].$OsVeiculoPlaca[5].$OsVeiculoPlaca[6]; ?></td>
							<td><? echo $OsVeiculoCor; ?></td>
							<td><? if($OsVeiculoAnoModelo!='')	echo $OsVeiculoAnoModelo['0'].$OsVeiculoAnoModelo['1'].$OsVeiculoAnoModelo['2'].$OsVeiculoAnoModelo['3'].'/'.$OsVeiculoAnoModelo['4'].$OsVeiculoAnoModelo['5'].$OsVeiculoAnoModelo['6'].$OsVeiculoAnoModelo['7']; else echo '--'; ?></td>
						<tr>
					</table>					
				</div>
			</div>
			<div id="dados_funcionario" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Funcionário/Mecânico</div>
				<div class="em_aberto_item white" style="text-align: center">
					<? if(isset($FuncionarioNome)) echo $FuncionarioNome; else echo '--'; ?>
				</div>
			</div>
			<div id="dados_os" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Situação da ordem de serviço</div>
				<div class="em_aberto_item white" style="text-align: center">
				<? 
					switch($OsStatus){
						case 0:
							echo "Aguardando Autorização";
							break;
						case 1:
							echo "Autorizada";
							break;
						case 2:
							echo "Concluída/Entregue";
							break;
						case 3:
							echo "Cancelada";
							break;
						case 4:
							echo "Não Autorizada";
							break;
					}
				?>
				</div>
			</div>
			<div id="dados_os" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Observações sobre OS</div>
				<div class="em_aberto_item white" style="text-align: center">
					<textarea id="OsObs" name="OsObs" readonly="readonly" style="border: 0px solid #A6C9E2; width: 100%; height: 50px; resize: none;"><? echo $OsObs; ?></textarea>
				</div>
			</div>
			<div id="dados_pagamento" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Informações de pagamento</div>
				<div class="em_aberto_item white">
					<table class="boxDialog">
						<tr>
							<td style="width: 220px; text-align: center;"><label>SubTotal</label></td>
							<td style="width: 220px; text-align: center;"><label>Desconto (R$)</label></td>
						</tr>
						<tr>
							<td style="text-align: center;">R$ <? echo number_format($OsSubTotal, 2, '.', ''); ?></span></td>
							<td style="text-align: center;">R$ <? 
							if($OsDesconto!=null && $OsDesconto!=''){
								echo number_format($OsDesconto, 2, '.', '');
							}else{
								echo '0.00';
							}
							?></td>
						</tr>
					</table>
					<table class="boxDialog" style="background-color: #ccc;">
						<tr>
							<td style="width: 440px; text-align: center;"><label>Total (com desconto)</label></td>
						</tr>
						<tr>
							<td style="text-align: center;">R$ <span id="TotalOs"><? echo number_format($OsTotal, 2, '.', ''); ?></span></td>
						</tr>
					</table>
					<table class="boxDialog" style="background-color: #ccc; margin-top: 10px;">
						<tr>
							<td style="width: 440px; height: 25px; text-align: center;">
								<label>Forma de pagamento:</label> 
								<? 
									switch($OsPagamento){
										case 0:
											echo "A Vista";
											break;
										case 1:
											echo "A Prazo";
											break;
										case 2:
											echo "Boleto";
											break;
										case 3:
											echo "Outro";
											break;
									}
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="clear"></div>
			<div style="height: 10px;"></div>
		</div>
	</div>