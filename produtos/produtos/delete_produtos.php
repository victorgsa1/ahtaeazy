<?PHP
require_once('../../conexao/banco.php');

$id 	= $_REQUEST['pro_codigo'];

$sql = "delete from tb_produto where pro_codigo = '$id'";

mysqli_query($con, $sql) or die ("Erro na sql!4") ;

header("Location: consulta_produtos.php");

?>


