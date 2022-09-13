<?PHP

require_once('../../conexao/banco.php');


$descricao = $_REQUEST['txt_descricao'];
$qtde 	   = $_REQUEST['txt_qtde'];
$preco     = $_REQUEST['txt_preco'];
$status    = $_REQUEST['txt_status'];
$foto 	   = $_REQUEST['txt_foto'];

$sql = "insert into tb_produto (pro_descricao, pro_qtde, pro_preco, pro_foto, pro_status) 
								values ('$descricao', '$qtde', '$preco', '$foto', '$status')";

mysqli_query($con, $sql) or die ("Erro na sql!2") ;

header("Location: consulta_produtos.php");

?>



