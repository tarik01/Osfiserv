<?php
class Funcionario extends Model{
	public $FuncionarioId;
	public $FuncionarioNome;
	public $FuncionarioNascimento;
	public $FuncionarioSexo;
	public $FuncionarioCpf;
	public $FuncionarioRg;
	public $FuncionarioTelefone;
	public $FuncionarioCelular;
	public $FuncionarioFuncao;
	public $FuncionarioSenha;
	
	function __construct(){
	}
	
	public function cadFuncionario(){
		$dados = array('FuncionarioNome'=>$this->getNome(),'FuncionarioNascimento'=>dataTOdb($this->getNascimento()),'FuncionarioSexo'=>$this->getSexo(),'FuncionarioCpf'=>$this->getCpf(),'FuncionarioRg'=>$this->getRg(),'FuncionarioTelefone'=>$this->getTelefone(),'FuncionarioCelular'=>$this->getCelular(),'FuncionarioFuncao'=>$this->getFuncao(),'FuncionarioSenha'=>md5('123'));
		$result = $this->sql('INSERT INTO funcionario (FuncionarioNome,FuncionarioNascimento,FuncionarioSexo,FuncionarioCpf,FuncionarioRg,FuncionarioTelefone,FuncionarioCelular,FuncionarioFuncao,FuncionarioSenha) VALUES (:FuncionarioNome,:FuncionarioNascimento,:FuncionarioSexo,:FuncionarioCpf,:FuncionarioRg,:FuncionarioTelefone,:FuncionarioCelular,:FuncionarioFuncao,:FuncionarioSenha)', $dados);
		$this->desconectar();
		return $result;
	}
	
	public function getListFuncionarioSelect(){
		$sql = "SELECT FuncionarioId,FuncionarioNome FROM funcionario WHERE FuncionarioFuncao = 2 ORDER BY FuncionarioNome";
		$result = $this->onlySql($sql);
		return $result;
	}
	
	public function getFuncionario($id){
		$query = "SELECT * FROM funcionario WHERE FuncionarioId = :FuncionarioId";
		$dados = array('FuncionarioId'=>$id);
		return $this->sqlAll($query,$dados);
	}
	
	function getId(){
		return $this->FuncionarioId;
	}
	function setId($FuncionarioId){
		$this->FuncionarioId = $FuncionarioId;
	}
	
	function getNome(){
		return $this->FuncionarioNome;
	}
	function setNome($FuncionarioNome){
		$this->FuncionarioNome = $FuncionarioNome;
	}
	
	function getNascimento(){
		return $this->FuncionarioNascimento;
	}
	function setNascimento($FuncionarioNascimento){
		$this->FuncionarioNascimento = $FuncionarioNascimento;
	}
	
	function getSexo(){
		return $this->FuncionarioSexo;
	}
	function setSexo($FuncionarioSexo){
		$this->FuncionarioSexo = $FuncionarioSexo;
	}
	
	function getCpf(){
		return $this->FuncionarioCpf;
	}
	function setCpf($FuncionarioCpf){
		$this->FuncionarioCpf = $FuncionarioCpf;
	}
	
	function getRg(){
		return $this->FuncionarioRg;
	}
	function setRg($FuncionarioRg){
		$this->FuncionarioRg = $FuncionarioRg;
	}
	
	function getTelefone(){
		return $this->FuncionarioTelefone;
	}
	function setTelefone($FuncionarioTelefone){
		$this->FuncionarioTelefone = $FuncionarioTelefone;
	}
	
	function getCelular(){
		return $this->FuncionarioCelular;
	}
	function setCelular($FuncionarioCelular){
		$this->FuncionarioCelular = $FuncionarioCelular;
	}
	
	function getFuncao(){
		return $this->FuncionarioFuncao;
	}
	function setFuncao($FuncionarioFuncao){
		$this->FuncionarioFuncao = $FuncionarioFuncao;
	}
	
	function setSenha($FuncionarioSenha){
		$this->FuncionarioSenha = $FuncionarioSenha;
	}
}
?>