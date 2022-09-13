<?PHP
require_once('../../conexao/banco.php');

$idcli 	= $_REQUEST['txt_clienteid'];
$tipopag 	= $_REQUEST['txt_tipopag']; 
$idprod 	= $_REQUEST['txt_produtoid'];
$vrunit		= $_REQUEST['txt_vrunit'];
$qtde 		= $_REQUEST['txt_qtditem'];
$total 	= $_REQUEST['txt_valorven'];
 
$sql = "insert into tb_venda (cli_codigo, ven_tipo_pagamento) 
								values ('$idcli', '$tipopag')";
		
$query = mysqli_query($con, $sql) or die ("Erro na sql!") ;

	                if ($query == true) {
						$getid = "SELECT MAX(ven_codigo) as id FROM tb_venda;"
						$getid = $con->query($getid);
						$row = $getid->fetch_assoc();;
						
						$lastid = $row['id'];

						$sql2 = "insert into tb_itens_venda (ven_codigo, pro_codigo, ite_valor_unit, ite_qtde, ite_total)
												values ('$lastid', '$idprod', '$vrunit', '$qtde', '$total')";
						
						$query2 = mysqli_query($con, $sql2) or die ("Erro na sql!");
						if ($query2 == true) {
							echo 'Venda feita com sucesso!';
							header("Location: consulta_vendas.php");
						} 
	                }
	            }
	        }
	    } else {
	        echo 'Ocorreu algum erro com o upload, por favor tente novamente!';
	    }
	 
?>

