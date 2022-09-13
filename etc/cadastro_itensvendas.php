<?PHP

require_once('../conexao/banco.php');


$titulo 		= $_REQUEST['txt_titulo'];
$descricao	   = $_REQUEST['txt_descricao'];
$autor     		= $_REQUEST['txt_autor'];
$status 	   		= $_REQUEST['txt_status'];

$sql = "insert into tb_news (new_titulo, new_descricao, new_autor, new_status) 
								values ('$titulo', '$descricao', '$autor', '$status')";

mysqli_query($con, $sql) or die ("Erro na sql!2") ;

header("Location: consulta_news.php");

?>



