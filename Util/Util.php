<?
	require_once("../Model/Model.php");
	function Alerta(){
		print "<div id='alerta' class='hide' title='Erro'>Erro na requisição, favor contatar administrador do sistema</div>";
	}
	function AlertaMsg($msg){
		print "<div id='alerta' class='hide' title='Alerta'>".$msg."</div>";
	}
	function AlertaMsg2($msg){
		print "<div id='alerta2' class='hide' title='Alerta'>".$msg."</div>";
	}
	
	function getCidade($id){
		$db = new Model();
		$db = conectar();
		$result = $db->prepare('SELECT nom_cidade FROM cidade WHERE cod_cidade=:id');
		$novo = array('cod_cidade'=>$id);
		$result->execute($novo);
		$cidade = $result ? $result->fetch(PDO::FETCH_OBJ)->nom_cidade : false;
		return $cidade;
	}
	function getEstado($id){
		$db = new Model();
		$db = conectar();
		$result = $db->prepare('SELECT nom_estado FROM estado WHERE cod_estado=:id');
		$novo = array('cod_estado'=>$id);
		$result->execute($novo);
		$estado = $result ? $result->fetch(PDO::FETCH_OBJ)->nom_estado : false;
		return $estado;
	}
	function dataBr($data){
	$str = explode('-', $data);
	return $str[2] .'-'. $str[1] .'-'. $str[0];
	}
	function dataTOdb($data){
		$str = explode('/', $data);
		if($data) return $str[2] .'/'. $str[1] .'/'. $str[0];
		else return false;
	}
	function dataFromdb($data){
		$str = explode('-', $data);
		return $str[2] .'/'. $str[1] .'/'. $str[0];
	}
?>
