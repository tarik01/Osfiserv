<?
class Estado extends Model{
	var $EstadoId;
	var $EstadoNome;
	
	function __construct(){
	}
	
	public function getEstadoNome($id){
		$query = "SELECT nom_estado FROM estado WHERE cod_estado = :cod_estado LIMIT 1";
		$dados = array('cod_estado'=>$id);
		$result = $this->sqlAll($query,$dados);
		return strtoupper($result[0]['nom_estado']);
	}
}
?>