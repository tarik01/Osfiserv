<?php
class Cliente extends Model{
	public $ClienteId;
	public $ClienteNome;
	public $ClienteNascimento;
	public $ClienteSexo;
	public $ClienteCpfOrCnpj;
	public $ClienteRg;
	public $ClienteTelefone;
	public $ClienteCelular;
	public $ClienteCep;
	public $ClienteEndereco;
	public $ClienteEndNumero; //Numero da Casa
	public $ClienteEndComplemento; //Complemento de Endereço
	public $ClienteCidade;
	public $ClienteEstado;
	public $ClienteTipo; //Física ou Jurídica
	public $ClienteObs; //Observações
	
	function __construct(){
	}
	
	public function cadPessoaFisica(){
		$dados_busca = array('ClienteNome'=>$this->getNome());
		
		$dados = array('ClienteNome'=>$this->getNome(),'ClienteNascimento'=>dataTOdb($this->getNascimento()),'ClienteSexo'=>$this->getSexo(),'ClienteCpfOrCnpj'=>$this->getCpfOrCnpj(),'ClienteRg'=>$this->getRg(),'ClienteTelefone'=>$this->getTelefone(),'ClienteCelular'=>$this->getCelular(),'ClienteCep'=>$this->getCep(),'ClienteEndereco'=>$this->getEndereco(),'ClienteEndNumero'=>$this->getNumero(),'ClienteEndComplemento'=>$this->getComplemento(),'ClienteEstado'=>$this->getEstado(),'ClienteCidade'=>$this->getCidade(),'ClienteTipo'=>$this->getTipo(),'ClienteObs'=>$this->getObs(),'ClienteCadDate'=>date('Y-m-d'));
		return $this->sql('INSERT INTO cliente (ClienteNome,ClienteNascimento,ClienteSexo,ClienteCpfOrCnpj,ClienteRg,ClienteTelefone,ClienteCelular,ClienteCep,ClienteEndereco,ClienteEndNumero,ClienteEndComplemento,ClienteEstado,ClienteCidade,ClienteTipo,ClienteObs,ClienteCadDate) VALUES (:ClienteNome,:ClienteNascimento,:ClienteSexo,:ClienteCpfOrCnpj,:ClienteRg,:ClienteTelefone,:ClienteCelular,:ClienteCep,:ClienteEndereco,:ClienteEndNumero,:ClienteEndComplemento,:ClienteEstado,:ClienteCidade,:ClienteTipo,:ClienteObs,:ClienteCadDate)', $dados);
		
	}
	public function cadPessoaJuridica(){
		$dados = array('ClienteNome'=>$this->getNome(),'ClienteCpfOrCnpj'=>$this->getCpfOrCnpj(),'ClienteTelefone'=>$this->getTelefone(),'ClienteCelular'=>$this->getCelular(),'ClienteCep'=>$this->getCep(),'ClienteEndereco'=>$this->getEndereco(),'ClienteEndNumero'=>$this->getNumero(),'ClienteEndComplemento'=>$this->getComplemento(),'ClienteEstado'=>$this->getEstado(),'ClienteCidade'=>$this->getCidade(),'ClienteTipo'=>$this->getTipo(),'ClienteObs'=>$this->getObs(),'ClienteCadDate'=>date('Y-m-d'));
		return $this->sql('INSERT INTO cliente (ClienteNome,ClienteCpfOrCnpj,ClienteTelefone,ClienteCelular,ClienteCep,ClienteEndereco,ClienteEndNumero,ClienteEndComplemento,ClienteEstado,ClienteCidade,ClienteTipo,ClienteObs,ClienteCadDate) VALUES (:ClienteNome,:ClienteCpfOrCnpj,:ClienteTelefone,:ClienteCelular,:ClienteCep,:ClienteEndereco,:ClienteEndNumero,:ClienteEndComplemento,:ClienteEstado,:ClienteCidade,:ClienteTipo,:ClienteObs,:ClienteCadDate)', $dados);
		
	}
	
	public function getClienteNome($nome){
		$query = "SELECT ClienteId,ClienteNome,ClienteCpfOrCnpj,ClienteTipo FROM cliente WHERE ClienteNome LIKE :ClienteNome LIMIT 10";
		$dados = array('ClienteNome'=>$nome."%");
		return $this->sqlAll($query,$dados);
	}
	
	public function getClienteNomeAll($nome){
		$query = "SELECT ClienteId,ClienteNome,ClienteCpfOrCnpj,ClienteTipo,ClienteObs FROM cliente WHERE ClienteNome LIKE :ClienteNome ORDER BY ClienteNome";
		$dados = array('ClienteNome'=>$nome."%");
		return $this->sqlAll($query,$dados);
	}
	
	public function getClienteCpfOrCnpj($cpforcnpj){
		$query = "SELECT ClienteId,ClienteNome,ClienteCpfOrCnpj,ClienteTipo,ClienteObs FROM cliente WHERE ClienteCpfOrCnpj = :ClienteCpfOrCnpj LIMIT 1";
		$dados = array('ClienteCpfOrCnpj'=>$cpforcnpj);
		return $this->sqlAll($query,$dados);
	}
	
	public function getCliente($id){
		$query = "SELECT * FROM cliente WHERE ClienteId = :ClienteId";
		$dados = array('ClienteId'=>$id);
		return $this->sqlAll($query,$dados);
	}
	
	function getId(){
		return $this->ClienteId;
	}
	function setId($ClienteId){
		$this->ClienteId = $ClienteId;
	}
	
	function getNome(){
		return $this->ClienteNome;
	}
	function setNome($ClienteNome){
		$this->ClienteNome = $ClienteNome;
	}
	
	function getNascimento(){
		return $this->ClienteNascimento;
	}
	function setNascimento($ClienteNascimento){
		$this->ClienteNascimento = $ClienteNascimento;
	}
	
	function getSexo(){
		return $this->ClienteSexo;
	}
	function setSexo($ClienteSexo){
		$this->ClienteSexo = $ClienteSexo;
	}
	
	function getCpfOrCnpj(){
		return $this->ClienteCpfOrCnpj;
	}
	function setCpfOrCnpj($ClienteCpfOrCnpj){
		$this->ClienteCpfOrCnpj = $ClienteCpfOrCnpj;
	}
	
	function getRg(){
		return $this->ClienteRg;
	}
	function setRg($ClienteRg){
		$this->ClienteRg = $ClienteRg;
	}
	
	function getTelefone(){
		return $this->ClienteTelefone;
	}
	function setTelefone($ClienteTelefone){
		$this->ClienteTelefone = $ClienteTelefone;
	}
	
	function getCelular(){
		return $this->ClienteCelular;
	}
	function setCelular($ClienteCelular){
		$this->ClienteCelular = $ClienteCelular;
	}
	
	function getCep(){
		return $this->ClienteCep;
	}
	function setCep($ClienteCep){
		$this->ClienteCep = $ClienteCep;
	}
	
	function getEndereco(){
		return $this->ClienteEndereco;
	}
	function setEndereco($ClienteEndereco){
		$this->ClienteEndereco = $ClienteEndereco;
	}	
	
	function getNumero(){
		return $this->ClienteEndNumero;
	}
	function setNumero($ClienteEndNumero){
		$this->ClienteEndNumero = $ClienteEndNumero;
	}
	
	function getComplemento(){
		return $this->ClienteEndComplemento;
	}
	function setComplemento($ClienteEndComplemento){
		$this->ClienteEndComplemento = $ClienteEndComplemento;
	}
	
	function getCidade(){
		return $this->ClienteCidade;
	}
	function setCidade($ClienteCidade){
		$this->ClienteCidade = $ClienteCidade;
	}	
	
	function getEstado(){
		return $this->ClienteEstado;
	}
	function setEstado($ClienteEstado){
		$this->ClienteEstado = $ClienteEstado;
	}	
	
	function getTipo(){
		return $this->ClienteTipo;
	}
	function setTipo($ClienteTipo){
		$this->ClienteTipo = $ClienteTipo;
	}
	
	function getObs(){
		return $this->ClienteObs;
	}
	function setObs($ClienteObs){
		$this->ClienteObs = $ClienteObs;
	}
}
?>