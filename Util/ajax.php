<?php
require_once("../Model/Model.php");
$_q = $_REQUEST['query'];
if($_REQUEST['identifier']=='cliente' && strlen($_q)>0){
	include("../Model/Cliente.php");
	$cliente = new Cliente();
	$dados = $cliente->getClienteNome($_q);
	if(count($dados)>0){
		echo '<ul>'."\n";
		foreach($dados as $row){
			$ClienteNome = $row['ClienteNome'];
			$ClienteId = $row['ClienteId'];
			$ClienteTipo = $row['ClienteTipo'];
			$ClienteCpfOrCnpj = $row['ClienteCpfOrCnpj'];
			if($ClienteCpfOrCnpj != '' && $ClienteCpfOrCnpj != null){
				if($ClienteTipo == 0){
					$ClienteCpfOrCnpj = ' - CPF: '.$ClienteCpfOrCnpj[0].$ClienteCpfOrCnpj[1].$ClienteCpfOrCnpj[2].'.'.$ClienteCpfOrCnpj[3].$ClienteCpfOrCnpj[4].$ClienteCpfOrCnpj[5].'.'.$ClienteCpfOrCnpj[6].$ClienteCpfOrCnpj[7].$ClienteCpfOrCnpj[8].'-'.$ClienteCpfOrCnpj[9].$ClienteCpfOrCnpj[10];
				}
				elseif($ClienteTipo == 1){
					$ClienteCpfOrCnpj = '- CNPJ: '.$ClienteCpfOrCnpj[0].$ClienteCpfOrCnpj[1].'.'.$ClienteCpfOrCnpj[2].$ClienteCpfOrCnpj[3].$ClienteCpfOrCnpj[4].'.'.$ClienteCpfOrCnpj[5].$ClienteCpfOrCnpj[6].$ClienteCpfOrCnpj[7].'/'.$ClienteCpfOrCnpj[8].$ClienteCpfOrCnpj[9].$ClienteCpfOrCnpj[10].$ClienteCpfOrCnpj[11].'-'.$ClienteCpfOrCnpj[12].$ClienteCpfOrCnpj[13];
				}
			}else{
				$ClienteCpfOrCnpj = ' - <small>Sem CPF/CNPJ</small>';
			}
			$p = $ClienteNome;
			$p = preg_replace('/(' . $_q . ')/i', '<span style="font-weight:bold;">$1</span>', $p);
			echo "\t".'<li id="autocomplete_'.$ClienteId.'" rel="'.$ClienteId.'">'. utf8_encode( $p ) .$ClienteCpfOrCnpj.'</li>'."\n";
		}
		echo '</ul>';
	}
	//while( $campo = mysql_fetch_array( $res ) )
	/*{
		echo "Id: {$campo['id']}\t{$campo['sigla']}\t{$campo['estado']}<br />";
		$id = $campo['id'];
		$estado = $campo['estado'];
		$sigla = $campo['sigla'];
		$estado = addslashes($estado);
		$html = preg_replace("/(" . $q . ")/i", "<span style=\"font-weight:bold\">\$1</span>", $estado);
		echo "<li onselect=\"this.setText('$estado').setValue('$id','$estado','$sigla');\">$html ($sigla)</li>\n";
	}*/
}

?>