<?php
require_once('../../conexao/banco.php');
require_once("../../seguranca.php");



$id = $_REQUEST['pro_codigo'];

$sql = "select * from tb_produto where pro_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);

$sql2 = "select * from tb_fornecedor";
$sql2 = mysqli_query($con, $sql2) or die ("Erro na sql!2") ;

$dados2 = mysqli_fetch_array($sql2);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário Atualizar </title>
<link rel="stylesheet" type="text/css" href="../../css/formatacao.css">
</head>
<body>
<form name="frm_produtos" action="atualizar_produtos.php" method="post">
<div id="principal">
  <h1> Atualizar Produtos </h1>
    <label> Código </label>
    <input name="txt_codigo" type="number" class="input_01" value="<?php echo $dados['pro_codigo']; ?>">
    
    <label> Descrição </label>
    <input name="txt_descricao" type="text" class="input_01" value="<?php echo $dados['pro_descricao']; ?>">
    
    <label> Quantidade </label>
    <input name="txt_qtde" type="number" class="input_01" value="<?php echo $dados['pro_qtde']; ?>">
    
    <label> Preço </label>
    <input name="txt_preco" type="text" class="input_01" value="<?php echo $dados['pro_preco']; ?>">

    <label>Status</label>
      <select name="txt_status" class="select_01">
        <option value="A" <?php if ($dados['pro_status'] == "A") {echo "selected";} ?>> Ativo </option>
        <option value="I" <?php if ($dados['pro_status'] == "I") {echo "selected";} ?>> Inativo </option>
      </select>

    <label> Foto </label>
    <input name="txt_arquivo" type="file" class="input_01">
    <input name="txt_foto" type="hidden" class="input_01" value="<?php echo $dados['pro_foto']; ?>">
    <img src="<?php echo $dados['pro_foto']; ?>" width="50px" height="50px">

    <label>Fornecedor</label>
      <select name="txt_fornecedor" class="select_01">
        <?php while ($dados2 = mysqli_fetch_array($sql2)) { ?>
          <option value="<?php echo $dados2 ['for_codigo']; ?>">
          </option>
        }
       <?php } ?>
      </select>
    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
