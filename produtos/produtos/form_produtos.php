<?php
require_once("../../seguranca.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário de Cadastro </title>
<link rel="stylesheet" type="text/css" href="../../css/formatacao.css">
</head>
<body>

<form name="frm_produto" action="cadastro_produto.php" method="post" enctype="multipart/form-data">
<div id="principal">
  <h1> Cadastro Produtos </h1>
    <label> Descrição </label>
    <input name="txt_descricao" type="text" class="input_01">
    
    <label> Quantidade </label>
    <input name="txt_qtde" type="number" class="input_01">
    
    <label> Preço </label>
    <input name="txt_preco" type="number" class="input_01">

    <label> Status </label>
    <select name="txt_status" class="select_01">
      <option value="A">Ativo</option>
      <option value="I">Inativo</option>
    </select>

    <label> Foto </label>
    <input name="txt_arquivo" type="file" class="input_01">
    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>

