<? 
	require("../Model/Model.php");
	require("../Util/Util.php");
	require("Principal/header.php");
	require("Principal/dialogs.php");
	require("Principal/menu.php");
	$view_principal = isset($_GET['page']) ? $view_principal = $_GET['page'] : $view_principal = 'Principal';
	$view_secundaria = isset($_GET['action']) ? $view_secundaria = $_GET['action'] : $view_secundaria = 'Index';
	if(file_exists('./'.$view_principal.'/'.$view_secundaria.'.php')){
		include($view_principal.'/'.$view_secundaria.'.php');
	}
	else{
		Alerta();
	}
	require("Principal/footer.php");
?>