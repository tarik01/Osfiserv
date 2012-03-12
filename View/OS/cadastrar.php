<?
if($_POST){
	$OsClienteId = isset($_GET['id_cliente_os']) ? $OsClienteId = $_GET['id_cliente_os'] : $OsClienteId = 0;
	if($OsClienteId == 0){
		return AlertaMsg("Erro: Cliente não válido");
	}else{
	
		$OsServicoQtd_cont = $_POST['servicos_cont'];
		if(empty($OsServicoQtd_cont) || $OsServicoQtd_cont==null || $OsServicoQtd_cont<=0){
			return AlertaMsg("Erro: Quantidade de serviços não identificada, contate o administrador!");
		}
		
		$OsVeiculo = $_POST['OsVeiculo'];
		if(empty($OsVeiculo)){
			return AlertaMsg("Veículo deve ser preenchido!");
		}
		
		$OsVeiculoCor = $_POST['OsVeiculoCor'];
		if(empty($OsVeiculo)){
			return AlertaMsg("Cor do veículo deve ser preenchido!");
		}
		
		$OsVeiculoPlaca = $_POST['OsVeiculoPlaca'];
		$OsVeiculoAnoModelo = $_POST['OsVeiculoAnoModelo'];
		$OsDesconto = $_POST['OsDesconto'];
		$OsPagamento = $_POST['OsPagamento'];
		$OsStatus = $_POST['OsStatus'];
		$OsObs = $_POST['OsObs'];
		$OsFuncionarioServicoId = $_POST['funcionarioSelect'];;
		$OsFuncionarioCadastroId = 1;
		$OsSubTotal = 0;
		$OsTotal = 0;
		$OsServicos = array();
		
		for($i=1; $i<=$OsServicoQtd_cont; $i++){
			$Servico = $_POST['OsServico'.$i];
			$OsServicoQtd  = $_POST['OsServicoQtd'.$i];
			$OsServicoValor  = $_POST['OsServicoValor'.$i];
			if($Servico!='' && $OsServicoQtd!='' && $OsServicoValor!=''){
				$OsServicos[$i]['ServicoNome'] = strtoupper($Servico);
				$OsServicos[$i]['ServicoQtd'] = $OsServicoQtd;
				$OsServicos[$i]['ServicoValor'] = $OsServicoValor;
				$OsSubTotal+= ($OsServicoQtd*$OsServicoValor);
			}
			
		}
		if(count($OsServicos)<=0){
			return AlertaMsg("Nenhum serviço foi preenchido!");
		}
		
		$OsTotal = ($OsSubTotal-$OsDesconto);
		include("../Model/OS.php");
		$os = new OS();
		$os->setOsClienteId($OsClienteId);
		$os->setOsVeiculo(strtoupper($OsVeiculo));
		$os->setOsVeiculoPlaca(strtoupper(str_replace('-','',$OsVeiculoPlaca)));
		$os->setOsVeiculoCor(strtoupper($OsVeiculoCor));
		$os->setOsVeiculoAnoModelo(str_replace('/','',$OsVeiculoAnoModelo));
		$os->setOsServico($OsServicos);
		$os->setOsSubTotal($OsSubTotal);
		$os->setOsDesconto($OsDesconto);
		$os->setOsTotal($OsTotal);
		$os->setOsPagamento($OsPagamento);
		$os->setOsStatus($OsStatus);
		$os->setOsObs($OsObs);
		$os->setOsFuncionarioServicoId($OsFuncionarioServicoId);
		$os->setOsFuncionarioCadastroId($OsFuncionarioCadastroId);

		$OsId = $os->cadOS();
		
		if($OsId){
			print '<script type="text/javascript">';
			include("js/ver_os.js.php");
			print '</script>';
			print '<div id="ver_os">Ordem de Servico cadastrada com sucesso!</div>';
		}else{
			print "<script>alert('".$OsId."');</script>";
			Alerta();
		}
	}
}
?>