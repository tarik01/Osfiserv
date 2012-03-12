<?
header( "content-type: application/msword" );
$empresa = strtoupper("EMPRESA");
$endEmpresa = strtoupper("1206 SUL ALAMEDA 13 CASA 05 - PALMAS - TO");
$fone = "FONE: (63) 0000-0000";
$cnpj = "00.000.000/0000-00";

include_once("../Model/Model.php");
include_once("../Model/Cliente.php");
include_once("../Model/Funcionario.php");
include_once("../Model/OS.php");
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
		if($OsVeiculoAnoModelo!=null && $OsVeiculoAnoModelo!=''){
			$OsVeiculoAnoModelo = $OsVeiculoAnoModelo[0].$OsVeiculoAnoModelo[1].$OsVeiculoAnoModelo[2].$OsVeiculoAnoModelo[3].'/'.$OsVeiculoAnoModelo[4].$OsVeiculoAnoModelo[5].$OsVeiculoAnoModelo[6].$OsVeiculoAnoModelo[7];
		}
		$OsSubTotal = $row['OsSubTotal'];
		$OsDesconto = $row['OsDesconto'];
		$OsTotal = $row['OsTotal'];
		$OsPagamento = $row['OsPagamento'];
		$OsStatus = $row['OsStatus'];
		$OsObs = $row['OsObs'];
		$OsFuncionarioServicoId = $row['OsFuncionarioServicoId'];
	}
}else{
	echo "erro";
	return;
}

$os = null;
$dados = null;

$os = new OS();
$OsServico = $os->getServicos($OsId);
	$os = null;
	
if($OsFuncionarioServicoId!=0 && (!empty($OsFuncionarioServicoId))){
	$funcionario = new Funcionario();
	$dados = $funcionario->getFuncionario($OsFuncionarioServicoId);
	if(count($dados)>0){
		foreach($dados as $row){
			$OsFuncionario = $row['FuncionarioNome'];
		}
	}else{
		$OsFuncionario = '';
	}
}else{
	$OsFuncionario = '';
}

$cliente = new Cliente();
$dados = $cliente->getCliente($OsClienteId);
if(count($dados)>0){
	foreach($dados as $row){
		$ClienteNome = $row['ClienteNome'];
		if(!empty($ClienteObs)){
			$ClienteObs = "<b>Obs.</b>: ".$ClienteObs;
		}
		$CTp = $row['ClienteTipo'];
		$CCC = $row['ClienteCpfOrCnpj'];
		if($CTp == 0 && !empty($CCC)){
			$ClienteCpfOrCnpj = $CCC[0].$CCC[1].$CCC[2].'.'.$CCC[3].$CCC[4].$CCC[5].'.'.$CCC[6].$CCC[7].$CCC[8].'-'.$CCC[9].$CCC[10];
		}
		elseif($CTp == 1 && !empty($CCC)){
			$ClienteCpfOrCnpj = $CCC[0].$CCC[1].'.'.$CCC[2].$CCC[3].$CCC[4].'.'.$CCC[5].$CCC[6].$CCC[7].'/'.$CCC[8].$CCC[9].$CCC[10].$CCC[11].'-'.$CCC[12].$CCC[13];
		}else{
			$ClienteCpfOrCnpj = '';
		}
		$ClienteEndereco = $row['ClienteEndereco'];
		
		if($ClienteEndereco != null){
			if($row['ClienteEndNumero']!=0){
				$ClienteEndereco.= ' N '.$row['ClienteEndNumero'];
			}
		}
		$ClienteCidade = $row['ClienteCidade'];
		$ClienteEstado = $row['ClienteEstado'];
		$ClienteTelefone = '';
		if($row['ClienteTelefone']!=null){
			$ClT = $row['ClienteTelefone'];
			$ClienteTelefone.='('.$ClT[0].$ClT[1].') '.$ClT[2].$ClT[3].$ClT[4].$ClT[5].'-'.$ClT[6].$ClT[7].$ClT[8].$ClT[9];
		}
		if($row['ClienteCelular']!=null){
			$ClT = $row['ClienteCelular'];
			if($ClienteTelefone!='') $ClienteTelefone.= ' / ';
			$ClienteTelefone.= '('.$ClT[0].$ClT[1].') '.$ClT[2].$ClT[3].$ClT[4].$ClT[5].'-'.$ClT[6].$ClT[7].$ClT[8].$ClT[9];
		}
	}
}

if($ClienteEstado!=0){
	include_once("../Model/Estado.php");
	$estado = new Estado();
	$ClienteEstado = $estado->getEstadoNome($ClienteEstado);
	if($row['ClienteCidade']!=0){
		include_once("../Model/Cidade.php");
		$cidade = new Cidade();
		$ClienteCidade = $cidade->getCidadeNome($ClienteCidade);
		$ClienteEndereco.= ' - '.$ClienteCidade;
	}
	$ClienteEndereco.= ' - '.$ClienteEstado;
}

$cliente = null;
$dados = null;


$OsSubTotal = number_format($OsSubTotal, 2, '.', '');
$OsTotal = number_format($OsTotal, 2, '.', '');
if($OsDesconto!=null && $OsDesconto!=''){
	$OsDesconto = number_format($OsDesconto, 2, '.', '');
}else{
	$OsDesconto = '0.00';
}

$os = new OS();
$dados = $os->getServicos($OsId);

include("os.rtf");
?>