<?
class Model extends PDO{
	var $conexao;
	
	public function conectar(){
		$this->conexao = new PDO('mysql:host=localhost;dbname=os', 'root','');
		$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function desconectar(){
		$conexao = null;
	}
	
	//Sql de inserir um elemento, retornando o ultimo id inserido no banco.
	public function sql($query,$array){
		try{
			$this->conectar();
			if($this->conexao->prepare($query)->execute($array)){
				$id = $this->conexao->lastInsertId();
				$this->desconectar();
				return $id;
			}
			else{
				return false;
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
	}
	
	public function onlySql($query){
		try{
			$this->conectar();
			$dados = $this->conexao->prepare($query);
			$dados->execute();
			$result = $dados->fetchAll();
			$this->desconectar();
			return $result;
		}catch(PDOException $e){
			print $e->getMessage();
		}
	}
	
	//Retorna um vetor de itens
	public function sqlAll($query,$array){
		
		try{
			$this->conectar();
			$dados = $this->conexao->prepare($query);
			$dados->execute($array);
			$result = $dados->fetchAll();
			$this->desconectar();
			return $result;
		}catch(PDOException $e){
			print $e->getMessage();
		}
	}
	
	public function sqlReturnTrue($query,$array){
		try{
			$this->conectar();
			$dados = $this->conexao->prepare($query);
			$dados->execute($array);
			if($dados){
				$this->desconectar();
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
	}
	
}
?>