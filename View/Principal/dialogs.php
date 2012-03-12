<!-- Inicio - Dialog das Pesquisas -->
<div id="pclientes" title="Pesquisar cliente" class="hide">
	<form name="pclientes_form" id="pclientes_form" method="post" action="./?page=Cliente&action=pesquisar">
	<fieldset>
		<label for="nome">Nome</label><br>
		<input type="text" name="ClienteNome_pesq" id="ClienteNome_pesq" class="text ui-widget-content ui-corner-all" style="width: 100%"/><br>
		<label for="cpf">CPF/CNPJ</label><br>
		<input type="text" name="ClienteCpf_pesq" id="ClienteCpf_pesq" onkeypress="return somenteNumeros(event)" value="" class="text ui-widget-content ui-corner-all" style="width: 100%"/>
	</fieldset>
	</form>
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding:0.7em; height: 38px;">
			<p class="alerta">Você deve digitar pelo menos um dos campos de busca.</p>
		</div>
	</div>
</div>
<div id="pfuncionarios" title="Pesquisar funcionário" class="hide">
	<form name="pclientes_form" method="post" action="./">
	<fieldset>
		<label for="nome">Nome</label><br>
		<input type="text" name="nome" id="nome" class="text ui-widget-content ui-corner-all" style="width: 100%"/><br>
		<label for="cpf">CPF</label><br>
		<input type="text" name="cpf" id="cpf" value="" class="text ui-widget-content ui-corner-all" style="width: 100%"/>
	</fieldset>
	</form>
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding:0.7em; height: 38px;">
			<p class="alerta">Você deve digitar pelo menos um dos campos de busca.</p>
		</div>
	</div>
</div>
<div id="pos" title="Pesquisar ordem de serviço" class="hide">
	<form name="pos_form" id="pos_form" method="post" action="./?page=OS&action=pesquisar">
	<input type="text" name="pos_cliente_id" id="pos_cliente_id" style="display: none"/>
	<fieldset>
		<table class="boxDialog" width="100%">
			<tr>
				<td width="200px"><label for="nome">N° da Ordem de Serviço</label></td>
				<td>Placa/Veículo</td>
			</tr>
			<tr>
				<td><input type="text" style="width: 95%" name="numero_os" id="numero_os" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 100%" name="placa_carro" id="placa_carro" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
			<tr><td colsspan="2"><label>Nome do Cliente</label><br></td></tr>
			<tr><td colspan="2"><input type="text" name="pos_cliente_nome" id="pos_cliente_nome" class="text ui-widget-content ui-corner-all" style="width: 100%"/></td></tr>
		</table>
	</fieldset>
	</form>
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding:0.7em; height: 20px;">
			<p class="alerta">Você deve digitar pelo menos um dos campos de busca.</p>
		</div>
	</div>
</div>
<!-- Fim - Dialog das Pesquisas -->

<!-- Inicio - Dialog cadastro -->
<div id="cadastrar_cliente" title="Cadastrar cliente" class="hide">
	<div id="pessoa_select" style="display: absolute; float: right; font-size: 16px; font-weight: bold;">
		Física
	</div>
	<form name="cad_cliente_form" id="cad_cliente_form" method="post" action="./?page=Cliente&action=cadastrar">
	Pessoa/Tipo:
	<div id="pessoa">
		<input type="radio" id="fisica" name="clienteTipo" value="0" checked="checked"/><label for="fisica">Física</label>
		<input type="radio" id="juridica" name="clienteTipo" value="1" /><label for="juridica">Jurídica</label>
	</div><br>
	<fieldset id="pessoa_fisica">
		<label>Nome do cliente*</label><br>
		<input type="text" style="width: 100%" name="clienteNome" id="clienteNome" value="" class="text ui-widget-content ui-corner-all" onkeypress='return somenteLetras(event)'/>
		<table class="boxDialog" width="100%">
			<tr>
				<td width="200px"><label>Data de nascimento</label></td>
				<td>Sexo</td>
			</tr>
			<tr>
				<td><input type="text" style="width: 95%" name="nascimento" id="nascimento" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td>
					<select name="sexo" id="sexo" style="width: 100%; border: 1px solid #A6C9E2;">
						<option value="0">Masculino</option>
						<option value="1">Feminino</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="200px"><label for="nome">CPF</label></td>
				<td>RG</td>
			</tr>
			<tr>
				<td><input type="text" style="width: 95%" name="cpf" id="cpf" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 100%" name="rg" id="rg" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
			<tr><td colspan="2"><label>Endereço</label><br></td></tr>
			<tr><td colspan="2"><input type="text" name="endereco" id="endereco" class="text ui-widget-content ui-corner-all" style="width: 100%"/></td></tr>
		</table>
		<table class="boxDialog">
			<tr>
				<td width="60px"><label>Numero</label></td>
				<td width="200px"><label>Complemento</label></td>
				<td><label>CEP</label></td>
			</tr>
			<tr>
				<td><input type="text" style="width: 50px" name="numero" id="numero" value="" class="text ui-widget-content ui-corner-all" onkeypress='return somenteNumeros(event)'/></td>
				<td><input type="text" style="width: 95%" name="complemento" id="complemento" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 100%" name="cep" id="cep" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
		</table>
		<table class="boxDialog">
		<tr>
			<td width="220px"><label>Estado</label></td>
			<td width="220px"><label>Cidade</label></td>
		</tr>
		<tr>
			<td>
				<select name="Estado" id="Estado" style="width: 95%; border: 1px solid #A6C9E2;">
					<option value="0" selected="selected">--</option>
					<option value="1">Acre</option>
					<option value="2">Alagoas</option>
					<option value="3">Amapá</option>
					<option value="4">Amazonas</option>
					<option value="5">Bahia</option>
					<option value="6">Ceará</option>
					<option value="7">Distrito Federal</option>
					<option value="8">Espírito Santo</option>
					<option value="9">Goiás</option>
					<option value="10">Maranhão</option>
					<option value="11">Mato Grosso</option>
					<option value="12">Mato Grosso do Sul</option>
					<option value="13">Minas Gerais</option>
					<option value="14">Pará</option>
					<option value="15">Paraíba</option>
					<option value="16">Paraná</option>
					<option value="17">Pernambuco</option>
					<option value="18">Piauí</option>
					<option value="19">Rio de Janeiro</option>
					<option value="20">Rio Grande do Norte</option>
					<option value="21">Rio Grande do Sul</option>
					<option value="22">Rondônia</option>
					<option value="23">Roraima</option>
					<option value="24">Santa Catarina</option>
					<option value="25">São Paulo</option>
					<option value="26">Sergipe</option>
					<option value="27">Tocantins</option>
				</select>
			</td>
			<td><select name="Cidade" id="Cidade" cid="" style="width: 100%; border: 1px solid #A6C9E2;"></select></td>
		</tr>
		</table><br>
		<table class="boxDialog">
			<tr>
					<td style="width: 170px;">Telefone</td>
					<td>Celular</td>
				</tr>
				<tr>
					<td><input type="text" style="width: 150px" name="telefone" id="telefone" value="" class="text ui-widget-content ui-corner-all" /></td>
					<td><input type="text" style="width: 150px" name="celular" id="celular" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
		</table>
		<label>Obs.</label><br>
		<textarea style="width: 100%; height: 50px; border: 1px solid #ECEAE8;" name="obs_fis" id="obs_fis"></textarea>
	</fieldset>
	<fieldset id="pessoa_juridica" class="hide">
		<label>Nome do cliente*</label><br>
		<input type="text" style="width: 100%" name="cliente_nome_jur" id="cliente_nome_jur" value="" class="text ui-widget-content ui-corner-all" />
		<table class="boxDialog" width="100%">
			<tr>
				<td width="200px"><label for="nome">CNPJ</label></td>
			</tr>
			<tr>
				<td><input type="text" style="width: 200px" name="cnpj" id="cnpj" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
			<tr><td colspan="2"><label>Endereço</label><br></td></tr>
			<tr><td colspan="2"><input type="text" name="endereco_jur" id="endereco_jur" class="text ui-widget-content ui-corner-all" style="width: 100%"/></td></tr>
		</table>
		<table class="boxDialog">
			<tr>
				<td width="60px"><label>Numero</label></td>
				<td width="200px"><label>Complemento</label></td>
				<td><label>CEP</label></td>
			</tr>
			<tr>
				<td><input type="text" style="width: 50px" name="numero_jur" id="numero_jur" value="" onkeypress='return somenteNumeros(event)' class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 95%" name="complemento_jur" id="complemento_jur" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 100%" name="cep_jur" id="cep_jur" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
		</table>
		<table class="boxDialog">
		<tr>
			<td width="220px"><label>Estado</label></td>
			<td width="220px"><label>Cidade</label></td>
		</tr>
		<tr>
			<td>
				<select name="Estado_jur" id="Estado_jur" style="width: 95%; border: 1px solid #A6C9E2;">
					<option value="0" selected="selected">--</option>
					<option value="1">Acre</option>
					<option value="2">Alagoas</option>
					<option value="3">Amapá</option>
					<option value="4">Amazonas</option>
					<option value="5">Bahia</option>
					<option value="6">Ceará</option>
					<option value="7">Distrito Federal</option>
					<option value="8">Espírito Santo</option>
					<option value="9">Goiás</option>
					<option value="10">Maranhão</option>
					<option value="11">Mato Grosso</option>
					<option value="12">Mato Grosso do Sul</option>
					<option value="13">Minas Gerais</option>
					<option value="14">Pará</option>
					<option value="15">Paraíba</option>
					<option value="16">Paraná</option>
					<option value="17">Pernambuco</option>
					<option value="18">Piauí</option>
					<option value="19">Rio de Janeiro</option>
					<option value="20">Rio Grande do Norte</option>
					<option value="21">Rio Grande do Sul</option>
					<option value="22">Rondônia</option>
					<option value="23">Roraima</option>
					<option value="24">Santa Catarina</option>
					<option value="25">São Paulo</option>
					<option value="26">Sergipe</option>
					<option value="27">Tocantins</option>
				</select>
			</td>
			<td><select name="Cidade_jur" id="Cidade_jur" cid="" style="width: 100%; border: 1px solid #A6C9E2;"></select></td>
		</tr>
		</table><br>
		<table class="boxDialog">
			<tr>
					<td style="width: 170px;">Telefone</td>
					<td>Celular</td>
				</tr>
				<tr>
					<td><input type="text" style="width: 150px" name="telefone_jur" id="telefone_jur" value="" class="text ui-widget-content ui-corner-all" /></td>
					<td><input type="text" style="width: 150px" name="celular_jur" id="celular_jur" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
		</table>
		<label>Obs.</label><br>
		<textarea style="width: 100%; height: 50px; border: 1px solid #ECEAE8;" name="obs_jur" id="obs_jur"></textarea>
	</fieldset>
	</form>
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding:0.7em; height: 20px;">
			<p class="alerta">Obrigatório preenchimento dos campos com * (asterisco).</p>
		</div>
	</div>
</div>
<div id="cadastrar_funcionario" title="Cadastrar funcionário" class="hide">
<form name="cad_funcionario_form" id="cad_funcionario_form" method="post" action="./?page=Funcionario&action=cadastrar">
	<label>Nome do funcionário*</label><br>
		<input type="text" style="width: 100%" name="nome_func" id="nome_func" value="" class="text ui-widget-content ui-corner-all" onkeypress='return somenteLetras(event)'/>
		<table class="boxDialog" width="100%">
			<tr>
				<td width="200px"><label>Data de nascimento</label></td>
				<td>Sexo</td>
			</tr>
			<tr>
				<td><input type="text" style="width: 95%" name="nascimento_func" id="nascimento_func" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td>
					<select name="sexo_func" id="sexo_func" style="width: 100%; border: 1px solid #A6C9E2;">
						<option value="0">Masculino</option>
						<option value="1">Feminino</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="200px"><label for="nome">CPF</label></td>
				<td>RG</td>
			</tr>
			<tr>
				<td><input type="text" style="width: 95%" name="cpf_func" id="cpf_func" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 100%" name="rg_func" id="rg_func" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
		</table>
		<table class="boxDialog">
			<tr>
				<td width="200px">Telefone</td>
				<td width="222px">Celular</td>
			</tr>
			<tr>
				<td><input type="text" style="width: 95%" name="telefone_func" id="telefone_func" value="" class="text ui-widget-content ui-corner-all" /></td>
				<td><input type="text" style="width: 100%" name="celular_func" id="celular_func" value="" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
		</table>
		<label>Função</label><br>
		<select name="funcao" id="funcao" style="width: 45%; border: 1px solid #A6C9E2;">
			<option value="0" selected="selected">--</option>
			<option value="1">Atendente</option>
			<option value="2">Mecânico</option>
			<option value="3">Outro</option>
		</select>
	</form>
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding:0.7em; height: 20px;">
			<p class="alerta">Obrigatório preenchimento dos campos com * (asterisco).</p>
		</div>
	</div>
</div>
<!-- Fim - Dialog cadastro -->

<!-- Inicio - Dialog configurações -->
<div id="configuracoes" title="Configurações" class="hide">
<div id="configuracoes_accord">
	<h3><a href="#">Alterar senha</a></h3>
	<div>
		<p>
		
		</p>
	</div>
</div>
</div>
<!-- Fim - Dialog configurações -->

<!-- Inicio - Dialog Sair -->
<div id="sair_dialog" title="Sair do sistema" class="hide">
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 0px; padding:0.7em; height: 20px;">
			<p class="alerta">Deseja realmente sair do sistema ?</p>
		</div>
	</div>
</div>
<!-- Fim - Dialog Sair -->

<!-- Inicio - Dialog OS -->
<div id="fechar_os" title="Fechar ordem de serviço" class="hide">
	<form name="fechar_os_form" id="fechar_os_form" method="post" action="./?page=OS&action=fechar">
	<fieldset>
		<label for="os_numero">OS nº</label><br>
		<input type="text" name="numero_os" id="numero_os_fechar" onkeypress="return somenteNumeros(event);" class="text ui-widget-content ui-corner-all" style="width: 98%"/><br>
		<label for="os_status">Situação</label><br>
		<select name="status_os" id="status_os" style="width: 98%; border: 1px solid #A6C9E2;">
			<option value="2">Concluída/Entregue</option>
			<option value="4">Não Autorizada</option>
			<option value="3">Cancelada</option>
		</select>
	</fieldset>
	</form>
</div>

<div id="nova_os" title="Nova ordem de serviço" class="hide">
	<form name="nova_os_form" id="nova_os_form" method="POST" action="./?page=OS&action=nova">
	<input type="text" name="id_cliente_os" id="id_cliente_os" value='' hidden='hidden' style="display: none;"/>
	</form>
	<fieldset>
		<label for="nome">Nome do cliente</label><br>
		<input type="text" name="nome_cliente_os" id="nome_cliente_os" class="text ui-widget-content ui-corner-all toupper" style="width: 100%"/><br>
	</fieldset>
	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: -10px; padding:0.7em; height: 35px;">
			<p class="alerta">Digite o nome do cliente para buscar ou "CLIENTE" para cliente avulso. Para cadastrar um novo cliente utilize o menu Clientes.</p>
		</div>
	</div><br>
</div>
<!-- Fim - Dialog OS -->