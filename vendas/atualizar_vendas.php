<?PHP
require_once("../conexao/banco.php");

$id 	= $_REQUEST['txt_codigo'];

$idcli	= $_REQUEST['txt_clienteid'];
$tipopag 	= $_REQUEST['txt_descricao'];

$sql = "update tb_venda set 
					cli_codigo = '$idcli', 
					ven_tipo_pagamento = '$tipopag', 
				where 
					new_codigo = '$id'";
								
mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_vendas.php");
?>
