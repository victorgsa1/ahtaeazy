<?php
require_once('../conexao/banco.php');

$id = $_REQUEST['ven_codigo'];

$sql = "select * from tb_venda where new_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário Atualizar Venda</title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">
</head>
<body>
<form name="frm_veb" action="atualizar_vebdas.php" method="post">
<div id="principal">
  <h1> Atualizar Vendas </h1>
    <label> Código </label>
    <input name="txt_codigo" type="number" class="input_01" value="<?php echo $dados['ven_codigo']; ?>">

    <label> ID Cliente </label>
    <input name="txt_clienteid" type="text" class="input_01" value="<?php echo $dados['cli_codigo']; ?>">
    
    <label> Tipo Pagamento </label>
    <input name="txt_tipopag" type="text" class="input_01" value="<?php echo $dados['ven_tipo_pagamento']; ?>">
    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
