<?php
require_once('../conexao/banco.php');
require_once("../seguranca.php");


$id = $_REQUEST['cli_codigo'];

$sql = "select * from tb_cliente where cli_codigo = '$id'";
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$dados = mysqli_fetch_array($sql);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário Atualizar </title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">
</head>
<body>
<form name="frm_cliente" action="atualizar_cliente.php" method="post">
<div id="principal">
  <h1> Atualizar Cliente </h1>
    <label> Código </label>
    <input name="txt_codigo" type="number" class="input_01" value="<?php echo $dados['cli_codigo']; ?>">
    
    <label> Nome </label>
    <input name="txt_nome" type="text" class="input_01" value="<?php echo $dados['cli_nome']; ?>">
    
    <label> Data de Nascimento </label>
    <input name="txt_data_nascimento" type="date" class="input_01" value="<?php echo $dados['cli_data_nascimento']; ?>">
    
    <label> Email </label>
    <input name="txt_email" type="text" class="input_01" value="<?php echo $dados['cli_email']; ?>">
    
    <label>Sexo</label>
      <select name="txt_sexo" class="select_01">
        <option value="M" <?php if ($dados['cli_sexo'] == "M") {echo "selected";} ?>> Masculino </option>
        <option value="F" <?php if ($dados['cli_sexo'] == "F") {echo "selected";} ?>> Feminino </option>
      </select>
    <input name="btn_enviar" type="submit" class="btn">
</div>
</form>
</body>
</html>
