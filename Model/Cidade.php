<?
class Cidade extends Model{
	var $CidadeId;
	var $CidadeNome;
	
	function __construct(){
	}
	
	public function getCidadeNome($id){
		$query = "SELECT nom_cidade FROM cidade WHERE cod_cidade = :cod_cidade LIMIT 1";
		$dados = array('cod_cidade'=>$id);
		$result = $this->sqlAll($query,$dados);
		return strtoupper($result[0]['nom_cidade']);
	}
}
?>