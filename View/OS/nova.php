<?
	include_once("../Model/Cliente.php");
	$ClienteId = $_REQUEST['id_cliente_os'];
	if($ClienteId=='' || $ClienteId==null){
		AlertaMsg("Cliente não definido!");
	}

	$cliente = new Cliente();
	$dados = $cliente->getCliente($ClienteId);
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
?>
	<script>
	var cont = 2;
	$(function() {

		$("#OK_OS,#CANCEL_OS,#ADD_SERVICO").button();
		$("#OK_OS").click(function() { $("#nova_ordem_de_servico").submit(); });
		$("#CANCEL_OS").click(function() { go("./"); });
		
		$("#ADD_SERVICO").click(function() { 
			var tabela = '<div class="item_servico_div"><table class="item_servico_table"><tr><td style="width: 300px;">Serviço</td><td style="width: 30px;">Qtd</td><td style="width: 88px;">Valor (Un)</td></tr><tr><td><input type="text" name="OsServico'+cont+'" id="OsServico'+cont+'" class="text ui-widget-content ui-corner-all toupper" style="width: 300px;"/></td><td><input type="text" name="OsServicoQtd'+cont+'" id="OsServicoQtd'+cont+'" class="text ui-widget-content ui-corner-all toupper" style="width: 30px;" onkeypress="return somenteNumeros(event)"/></td><td>R$ <input type="text" name="OsServicoValor'+cont+'" id="OsServicoValor'+cont+'" class="text ui-widget-content ui-corner-all toupper money" style="width: 60px;" onblur="somarSubTotal()" onkeypress="return isEnter(event)"/></td></tr><tr></table></div>';
			$(".item_servico_list").append($(tabela));
			cont++;
			$("#servicos_cont").val(cont-1);
			
			return false;
		});
		
		$("body").click(function() { somarSubTotal();});
		
	});

	function isEnter(e){
		if(e.keyCode==13){
			$("#ADD_SERVICO").click();
			$("#OsServico"+(cont-1)).focus();
			return true;
		}
		return somenteNumerosPonto(e);
	}
	function somarSubTotal(){
		var subTotal = 0;
		$('.money').each(function(index) {
			var valor = $(this).val();
			if(valor!=''){
				valor = parseFloat(valor);
				var qtd = $("#OsServicoQtd"+(index+1)).val();
				subTotal+= (qtd*valor);		
			}
		});
		var desconto = $("#OsDesconto").val();
		var total = subTotal;
		if(subTotal!=0 && desconto!=''){
			total-=desconto;
		}
		$("#subTotalOs").html(subTotal.toFixed(2));
		$("#TotalOs").html(total.toFixed(2));
	}
	</script>
	<div id="page">
		<div class="container_16">
			<form id="nova_ordem_de_servico" name="nova_ordem_de_servico" method="POST" action="./?page=OS&action=cadastrar&id_cliente_os=<? echo $ClienteId; ?>">
			<div id="servicos_executados" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Serviços executados</div>
				<input type="text" id="servicos_cont" name="servicos_cont" hidden="hidden" value='1' style="display: none;"/>
				<div class="item_servico_list">
					<div class="item_servico_div">
						<table class="item_servico_table">
							<tr>
								<td style="width: 300px;">Serviço</td>
								<td style="width: 30px;">Qtd</td>
								<td style="width: 88px; text-align: center;">Valor (Un)</td>
							</tr>
							<tr>
								<td><input type="text" name="OsServico1" id="OsServico1" class="text ui-widget-content ui-corner-all toupper" style="width: 300px;"/></td>
								<td><input type="text" name="OsServicoQtd1" id="OsServicoQtd1" class="text ui-widget-content ui-corner-all toupper" style="width: 30px;" onkeypress="return somenteNumeros(event)"/></td>
								<td style="width: 88px; text-align: center;">R$ <input type="text" name="OsServicoValor1" id="OsServicoValor1" class="text ui-widget-content ui-corner-all toupper money " style="width: 60px;" onblur="somarSubTotal()" onkeypress="return isEnter(event);"/></td>
							</tr>
							<tr>
							
						</table>
					</div>
				</div>
				<div id="botao_add_servico" style="text-align: center; width: 100%; margin: 10px 0 10px 0;"><a href="#" id="ADD_SERVICO">Adicionar Serviço</a></div>
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
					<input type="text" name="OsVeiculo" id="OsVeiculo" class="text ui-widget-content ui-corner-all toupper" style="width: 98%"/><br>
					<table class="boxDialog">
						<tr>
							<td style="width: 143px;"><label>Placa</label></td>
							<td style="width: 143px;"><label>Cor</label></td>
							<td style="width: 143px;"><label>Ano/Modelo</label></td>
						<tr>
						<tr>
							<td><input type="text" name="OsVeiculoPlaca" id="OsVeiculoPlaca" class="text ui-widget-content ui-corner-all toupper" style="width: 95%"/></td>
							<td><input type="text" name="OsVeiculoCor" id="OsVeiculoCor" class="text ui-widget-content ui-corner-all toupper" style="width: 95%"/></td>
							<td><input type="text" name="OsVeiculoAnoModelo" id="OsVeiculoAnoModelo" class="text ui-widget-content ui-corner-all toupper" style="width: 100%"/></td>
						<tr>
					</table>					
				</div>
			</div>
			<? include_once("../Model/Funcionario.php"); ?>
			<div id="dados_funcionario" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Funcionário/Mecânico</div>
				<div class="em_aberto_item white" style="text-align: center">
				<? 	$cliente = new Funcionario();
					$result = $cliente->getListFuncionarioSelect();
					if($result){
						echo "<select name='funcionarioSelect' id='funcionarioSelect' style='border: 1px solid #A6C9E2;'>";
						echo "<option value='0'>--</option>";
						foreach ($result as $row) {
							echo "<option value='".$row['FuncionarioId']."'>".$row['FuncionarioNome']."</option>";
						}
						echo "</select>";
					}else{
						echo "<select name='funcionarioSelect' id='funcionarioSelect' style='border: 1px solid #A6C9E2;'>";
						echo "<option value='0'>Padrão</select>";
						echo "</select>";
					}
				?>
				</div>
			</div>
			<div id="dados_os" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Situação da ordem de serviço</div>
				<div class="em_aberto_item white" style="text-align: center">
				<select name="OsStatus" id="OsStatus" style="border: 1px solid #A6C9E2;">
					<option value="0">Aguardando Autorização</option>
					<option value="1">Autorizada</option>
					<option value="2">Concluída/Entregue</option>
				</select>
				</div>
			</div>
			<div id="dados_os" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Observações sobre OS</div>
				<div class="em_aberto_item white" style="text-align: center">
					<textarea id="OsObs" name="OsObs" style="border: 1px solid #A6C9E2; width: 100%; height: 50px;"></textarea>
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
							<td style="text-align: center;">R$ <span id="subTotalOs">0.00</span></td>
							<td style="text-align: center;"><input type="text" name="OsDesconto" id="OsDesconto" onkeypress="return somenteNumerosPonto(event)" class="text ui-widget-content ui-corner-all toupper" style="width: 80px; text-align: center;"/></td>
						</tr>
					</table>
					<table class="boxDialog" style="background-color: #ccc;">
						<tr>
							<td style="width: 440px; text-align: center;"><label>Total (com desconto)</label></td>
						</tr>
						<tr>
							<td style="text-align: center;">R$ <span id="TotalOs">0.00</span></td>
						</tr>
					</table>
					<table class="boxDialog" style="background-color: #ccc; margin-top: 10px;">
						<tr>
							<td style="width: 440px; height: 25px; text-align: center;">
								<label>Forma de pagamento:</label> 
								<select name="OsPagamento" id="OsPagamento" style="border: 1px solid #A6C9E2;">
									<option value="0">A Vista</option>
									<option value="1">A Prazo</option>
									<option value="2">Boleto</option>
									<option value="3">Outro</option>
								</select>
							</td>
						</tr>
					</table>
				</div></form>
			</div>
			<div class="clear"></div>
			<div id="botao_ok_cancela" class="grid_16">
				<a href="#" id="OK_OS">CADASTRAR OS</a> <a href="#" id="CANCEL_OS">CANCELAR</a>
			</div>
		</div>
	</div>