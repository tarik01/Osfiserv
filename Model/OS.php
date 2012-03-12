<?
class OS extends Model{
	
	var $OsId;
	var $OsClienteId;
	var $OsVeiculo;
	var $OsVeiculoPlaca;
	var $OsVeiculoCor;
	var $OsVeiculoAnoModelo;
	var $OsServico = array();
	var $OsSubTotal;
	var $OsDesconto;
	var $OsTotal;
	var $OsPagamento;
	var $OsStatus;
	var $OsObs;
	var $OsFuncionarioServicoId;
	var $OsFuncionarioCadastroId;
	
	function __construct(){
	}
	
	public function cadOS(){
		$dados = array('OsClienteId'=>$this->getOsClienteId(),'OsVeiculo'=>$this->getOsVeiculo(),'OsVeiculoPlaca'=>$this->getOsVeiculoPlaca(),'OsVeiculoCor'=>$this->getOsVeiculoCor(),'OsVeiculoAnoModelo'=>$this->getOsVeiculoAnoModelo(),'OsSubTotal'=>$this->getOsSubTotal(),'OsDesconto'=>$this->getOsDesconto(),'OsTotal'=>$this->getOsTotal(),'OsPagamento'=>$this->getOsPagamento(),'OsStatus'=>$this->getOsStatus(),'OsObs'=>$this->getOsObs(),'OsFuncionarioServicoId'=>$this->getOsFuncionarioServicoId(),'OsFuncionarioCadastroId'=>$this->getOsFuncionarioCadastroId(),'OsCadData'=>date('Y-m-d'));
		$OsId = $this->sql('INSERT INTO os (OsClienteId,OsVeiculo,OsVeiculoPlaca,OsVeiculoCor,OsVeiculoAnoModelo,OsSubTotal,OsDesconto,OsTotal,OsPagamento,OsStatus,OsObs,OsFuncionarioServicoId,OsFuncionarioCadastroId,OsCadData) VALUES (:OsClienteId,:OsVeiculo,:OsVeiculoPlaca,:OsVeiculoCor,:OsVeiculoAnoModelo,:OsSubTotal,:OsDesconto,:OsTotal,:OsPagamento,:OsStatus,:OsObs,:OsFuncionarioServicoId,:OsFuncionarioCadastroId,:OsCadData)',$dados);
		if($OsId > 0){
			foreach($this->getOsServico() as $row){
				$temp_serv = array('ServicoNome'=>$row['ServicoNome'], 'ServicoQtd'=>$row['ServicoQtd'],'ServicoValor'=>$row['ServicoValor'],'ServicoOsId'=>$OsId);
				$OsServicoId = $this->sql('INSERT INTO servico (ServicoNome,ServicoQtd,ServicoValor,ServicoOsId) VALUES (:ServicoNome,:ServicoQtd,:ServicoValor,:ServicoOsId)', $temp_serv);
				if(!$OsServicoId>0){
					return "Erro ao adicionar servicos a OS, contate o administrador!";
				}
			}
		}
		return $OsId;
	}
	
	public function getOS($id){
		$query = "SELECT * FROM os WHERE OsId = :OsId";
		$dados = array('OsId'=>$id);
		return $this->sqlAll($query,$dados);
	}
	
	public function getOSbyCliente($cliente){
		$query = "SELECT * FROM os WHERE OsClienteId = :OsClienteId";
		$dados = array('OsClienteId'=>$cliente);
		return $this->sqlAll($query,$dados);
	}
	
	public function getOSbyVeiculoPlaca($placa){
		$query = "SELECT * FROM os WHERE OsVeiculoPlaca = :OsVeiculoPlaca";
		$dados = array('OsVeiculoPlaca'=>$placa);
		return $this->sqlAll($query,$dados);
	}
	
	public function getServicos($id){
		$query = "SELECT * FROM servico WHERE ServicoOsId = :OsId";
		$dados = array('OsId'=>$id);
		return $this->sqlAll($query,$dados);
	}
	
	public function fecharOS($id,$situacao){
		$query = "UPDATE os SET OsStatus = :OsStatus WHERE OsId = :OsId";
		$dados = array('OsId'=>$id,'OsStatus'=>$situacao);
		return $this->sqlReturnTrue($query,$dados);
	}
	
	public function setOsId($OsId) {
		$this->OsId = $OsId;
	}

	public function getOsId() {
		return $this->OsId;
	}

	public function setOsClienteId($OsClienteId) {
	   $this->OsClienteId = $OsClienteId;
	}

	public function getOsClienteId() {
		return $this->OsClienteId;
	}

	public function setOsVeiculo($OsVeiculo) {
	   $this->OsVeiculo = $OsVeiculo;
	}

	public function getOsVeiculo() {
		return $this->OsVeiculo;
	}

	public function setOsVeiculoPlaca($OsVeiculoPlaca) {
	   $this->OsVeiculoPlaca = $OsVeiculoPlaca;
	}

	public function getOsVeiculoPlaca() {
		return $this->OsVeiculoPlaca;
	}

	public function setOsVeiculoCor($OsVeiculoCor) {
	   $this->OsVeiculoCor = $OsVeiculoCor;
	}

	public function getOsVeiculoCor() {
		return $this->OsVeiculoCor;
	}

	public function setOsVeiculoAnoModelo($OsVeiculoAnoModelo) {
	   $this->OsVeiculoAnoModelo = $OsVeiculoAnoModelo;
	}

	public function getOsVeiculoAnoModelo() {
		return $this->OsVeiculoAnoModelo;
	}

	public function setOsServico($OsServico) {
	   $this->OsServico = $OsServico;
	}

	public function getOsServico() {
		return $this->OsServico;
	}

	public function setOsSubTotal($OsSubTotal) {
	   $this->OsSubTotal = $OsSubTotal;
	}

	public function getOsSubTotal() {
		return $this->OsSubTotal;
	}

	public function setOsDesconto($OsDesconto) {
	   $this->OsDesconto = $OsDesconto;
	}

	public function getOsDesconto() {
		return $this->OsDesconto;
	}

	public function setOsTotal($OsTotal) {
	   $this->OsTotal = $OsTotal;
	}

	public function getOsTotal() {
		return $this->OsTotal;
	}

	public function setOsPagamento($OsPagamento) {
	   $this->OsPagamento = $OsPagamento;
	}

	public function getOsPagamento() {
		return $this->OsPagamento;
	}

	public function setOsStatus($OsStatus) {
	   $this->OsStatus = $OsStatus;
	}

	public function getOsStatus() {
		return $this->OsStatus;
	}

	public function setOsObs($OsObs) {
	   $this->OsObs = $OsObs;
	}

	public function getOsObs() {
		return $this->OsObs;
	}

	public function setOsFuncionarioServicoId($OsFuncionarioServicoId) {
	   $this->OsFuncionarioServicoId = $OsFuncionarioServicoId;
	}

	public function getOsFuncionarioServicoId() {
		return $this->OsFuncionarioServicoId;
	}

	public function setOsFuncionarioCadastroId($OsFuncionarioCadastroId) {
	   $this->OsFuncionarioCadastroId = $OsFuncionarioCadastroId;
	}

	public function getOsFuncionarioCadastroId() {
		return $this->OsFuncionarioCadastroId;
	}


}

?>