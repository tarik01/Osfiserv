<?
require("../Model/Cliente.php");
if($_POST){
	$clienteTipo = $_POST['clienteTipo'];
	if($clienteTipo == 0){
	
		$clienteNome = $_POST['clienteNome'];
		if (empty($clienteNome)){
			return AlertaMsg("Nome do cliente deve ser preenchido!");
		}
		
		$nascimento = $_POST['nascimento'];
		$cpf = $_POST['cpf'];
		$cpf = str_replace('.','',$cpf);
		$cpf = str_replace('-','',$cpf);
		$rg = $_POST['rg'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$cep = $_POST['cep'];
		$cep = str_replace('-','',$cep);
		$telefone = $_POST['telefone'];
		$telefone = str_replace('(','',$telefone);
		$telefone = str_replace(')','',$telefone);
		$telefone = str_replace(' ','',$telefone);
		$telefone = str_replace('-','',$telefone);
		$celular = $_POST['celular'];
		$celular = str_replace('(','',$celular);
		$celular = str_replace(')','',$celular);
		$celular = str_replace(' ','',$celular);
		$celular = str_replace('-','',$celular);
		$estado = $_POST['Estado'];
		$cidade = $_POST['Cidade'];
		$clienteSexo = $_POST['sexo'];
		$obs = $_POST['obs_fis'];
		
		$cliente = new Cliente();
		$cliente->setNome(strtoupper($clienteNome));
		$cliente->setNascimento($nascimento);
		$cliente->setSexo($clienteSexo);
		$cliente->setCpfOrCnpj($cpf);
		$cliente->setRg(strtoupper($rg));
		$cliente->setTelefone($telefone);
		$cliente->setCelular($celular);
		$cliente->setEndereco(strtoupper($endereco));
		$cliente->setCep($cep);
		$cliente->setNumero($numero);
		$cliente->setComplemento(strtoupper($complemento));
		$cliente->setCidade($cidade);
		$cliente->setEstado($estado);
		$cliente->setTipo($clienteTipo);
		$cliente->setObs(strtoupper($obs));
		
		$clienteId = $cliente->cadPessoaFisica();
		if($clienteId){
			print '<script type="text/javascript">';
			include("js/ver_cliente.js.php");
			print '</script>';
			print '<div id="ver_cliente">Cliente cadastrado com Sucesso</div>';
		}else{
			print "<script>alert('".$clienteId."');</script>";
			Alerta();
		}
	}
	elseif($clienteTipo == 1){
		$cliente_nome_jur = $_POST['cliente_nome_jur'];
		if (empty($cliente_nome_jur)){
			return AlertaMsg("Nome do cliente deve ser preenchido!");
		}
		
		$cnpj = $_POST['cnpj'];
		$cnpj = str_replace('.','',$cnpj);
		$cnpj = str_replace('-','',$cnpj);
		$cnpj = str_replace('/','',$cnpj);
		$endereco_jur = $_POST['endereco_jur'];
		$numero_jur = $_POST['numero_jur'];
		$complemento_jur = $_POST['complemento_jur'];
		$cep_jur = $_POST['cep_jur'];
		$cep_jur = str_replace('-','',$cep_jur);
		$telefone_jur = $_POST['telefone_jur'];
		$telefone_jur = str_replace('(','',$telefone_jur);
		$telefone_jur = str_replace(')','',$telefone_jur);
		$telefone_jur = str_replace(' ','',$telefone_jur);
		$telefone_jur = str_replace('-','',$telefone_jur);
		$celular_jur = $_POST['celular_jur'];
		$celular_jur = str_replace('(','',$celular_jur);
		$celular_jur = str_replace(')','',$celular_jur);
		$celular_jur = str_replace(' ','',$celular_jur);
		$celular_jur = str_replace('-','',$celular_jur);
		$estado_jur = $_POST['estado_jur'];
		$cidade_jur = $_POST['cidade_jur'];
		$obs_jur = $_POST['obs_jur'];
		
		$cliente = new Cliente();
		$cliente->setNome(strtoupper($cliente_nome_jur));
		$cliente->setCpfOrCnpj($cnpj);
		$cliente->setTelefone($telefone_jur);
		$cliente->setCelular($celular_jur);
		$cliente->setEndereco(strtoupper($endereco_jur));
		$cliente->setCep($cep_jur);
		$cliente->setNumero($numero_jur);
		$cliente->setComplemento(strtoupper($complemento_jur));
		$cliente->setCidade($Cidade_jur);
		$cliente->setEstado($Estado_jur);
		$cliente->setTipo($clienteTipo);
		$cliente->setObs(strtoupper($obs_jur));
		
		$clienteId = $cliente->cadPessoaJuridica();
		if($clienteId){
			print '<script type="text/javascript">';
			include("js/ver_cliente.js.php");
			print '</script>';
			print '<div id="ver_cliente">Cliente cadastrado com Sucesso</div>';
		}else{
			print "<script>alert('".$clienteId."');</script>";
			Alerta();
		}
	}
}
?>