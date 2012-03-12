<div class="container_16" style="text-align: center;">
	<div class="prefix_2 grid_12">
		<div class="ui-widget-content ui-corner-all descAction">
			<div class="title ui-widget-header ui-corner-all">Dados cliente</div>
			<div class="list_itens" style="padding: 10px;">
				<div class="item_list_itens">
				<table style="width: 100%">
					<? 
						if(isset($_REQUEST['ClienteId'])){
							if($_REQUEST['ClienteId']!=null || $_REQUEST['ClienteId']!=''){
								include_once("../Model/Cliente.php");
								$ClienteId = $_REQUEST['ClienteId'];
								$cliente = new Cliente();
								$dados = $cliente->getCliente($ClienteId);
							}
						}
						else{
							return AlertaMsg("Cliente não informado!");
						}
						if(isset($dados) && count($dados)>0){
						foreach($dados as $row){
					?>
					<tr>
					<td style="width: 50%">
						<b>Nome</b>: <? echo $row['ClienteNome']; ?>
						<br><? if($row['ClienteNascimento']!=null && $row['ClienteNascimento']!='' && $row['ClienteNascimento']!='0000-00-00') echo '<b>Data de nascimento</b>: '.dataFromdb($row['ClienteNascimento']).' &nbsp; &nbsp;';
						$sexo = $row['ClienteSexo'] == 0 ? 'MASCULINO' : 'FEMININO';
						echo '<b>Sexo</b>: '.$sexo.'<br>';
						$CTp = $row['ClienteTipo'];
						$CCC = $row['ClienteCpfOrCnpj'];
						if($CTp == 0 && !empty($CCC)){
							echo '<b>CPF</b>: '.$CCC[0].$CCC[1].$CCC[2].'.'.$CCC[3].$CCC[4].$CCC[5].'.'.$CCC[6].$CCC[7].$CCC[8].'-'.$CCC[9].$CCC[10];
							if($row['ClienteRg']!='' && $row['ClienteRg']!=null){
								echo ' &nbsp; &nbsp;<b>RG</b>: '.$row['ClienteRg'];
							}
							echo '<br>';
						}
						elseif($CTp == 1 && !empty($CCC)){
							echo '<b>CNPJ</b>: '.$CCC[0].$CCC[1].'.'.$CCC[2].$CCC[3].$CCC[4].'.'.$CCC[5].$CCC[6].$CCC[7].'/'.$CCC[8].$CCC[9].$CCC[10].$CCC[11].'-'.$CCC[12].$CCC[13].'<br>';
						}
						echo '<b>Dada de cadastro</b>: '.dataFromdb($row['ClienteCadDate']).'<br>';
						$ClienteObs = $row['ClienteObs'];
						if(!empty($ClienteObs)){
							echo "<b>Obs.</b>: ".$ClienteObs;
						}
						echo '<br><br>';
						
						$ClienteEndereco = $row['ClienteEndereco'] != '' || $row['ClienteEndereco'] != null ? true : false; 
						if($ClienteEndereco){
							echo '<b>Endereço</b>: '.$row['ClienteEndereco'].' &nbsp; &nbsp;';
							if($row['ClienteEndNumero']!=0) echo '<b>Numero</b>: '.$row['ClienteEndNumero'];
							echo '<br>';
							if($row['ClienteEndComplemento']!=null) echo '<b>Complemento</b>: '.$row['ClienteEndComplemento'].'<br>';
							if($row['ClienteCep']!=null){ echo '<b>CEP</b>: '.$row['ClienteCep'][0].$row['ClienteCep'][1].$row['ClienteCep'][2].$row['ClienteCep'][3].$row['ClienteCep'][4].'-'.$row['ClienteCep'][5].$row['ClienteCep'][6].$row['ClienteCep'][7].'<br>'; }
							if($row['ClienteEstado']!=0){
								include_once("../Model/Estado.php");
								$estado = new Estado();
								$ClienteEstado = $estado->getEstadoNome($row['ClienteEstado']);
								
								if($row['ClienteCidade']!=0){
									include_once("../Model/Cidade.php");
									$cidade = new Cidade();
									$ClienteCidade = $cidade->getCidadeNome($row['ClienteCidade']);
									
									echo '<b>Cidade</b>: '.$ClienteCidade.' &nbsp; &nbsp;';
								}
								echo '<b>Estado</b>: '.$ClienteEstado;
							}
							echo '<br><br>';
							if($row['ClienteTelefone']!=null){
								$ClT = $row['ClienteTelefone'];
								echo '<b>Telefone</b>: ('.$ClT[0].$ClT[1].') '.$ClT[2].$ClT[3].$ClT[4].$ClT[5].'-'.$ClT[6].$ClT[7].$ClT[8].$ClT[9].' &nbsp; &nbsp;';
							}
							if($row['ClienteCelular']!=null){
								$ClT = $row['ClienteCelular'];
								echo '<b>Celular</b>: ('.$ClT[0].$ClT[1].') '.$ClT[2].$ClT[3].$ClT[4].$ClT[5].'-'.$ClT[6].$ClT[7].$ClT[8].$ClT[9];
							}
							echo '<br>';
						}
						?>
						
					</td>
					</tr>
					<? }}
					else{
						echo '<tr><td style="text-align: center"><b>Nenhum cliente encontrado !</b></td></tr>';
					}?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>