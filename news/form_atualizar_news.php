<?php
require_once('../conexao/banco.php');
require_once("../seguranca.php");

$id = $_REQUEST['new_codigo'];

$sql = "select * from tb_news where new_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário Atualizar News</title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">
</head>
<body>
<form name="frm_news" action="atualizar_news.php" method="post">
<div id="principal">
  <h1> Atualizar Noticias </h1>
    <label> Código </label>
    <input name="txt_codigo" type="number" class="input_01" value="<?php echo $dados['new_codigo']; ?>">

    <label> Titulo </label>
    <input name="txt_titulo" type="text" class="input_01" value="<?php echo $dados['new_titulo']; ?>">
    
    <label> Descrição </label>
    <input name="txt_descricao" type="text" class="input_01" value="<?php echo $dados['new_descricao']; ?>">
    
    <label> Autor </label>
    <input name="txt_autor" type="text" class="input_01" value="<?php echo $dados['new_autor']; ?>">

    <label>Status</label>
      <select name="txt_status" class="select_01">
        <option value="A" <?php if ($dados['new_status'] == "A") {echo "selected";} ?>> Ativo </option>
        <option value="I" <?php if ($dados['new_status'] == "I") {echo "selected";} ?>> Inativo </option>
      </select>
    
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
