<?php

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Formulário de Cadastro </title>
<link rel="stylesheet" type="text/css" href="../css/formatacao.css">


<script language="JavaScript">
	
 function mascara(t, mask){

 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 
  if (texto.substring(0,1) != saida){
      t.value += texto.substring(0,1);
  }

 }

 function foco() {
	document.frm_modelo.txt_nome.focus()
}

 function validar_dados() {
	if(document.frm_news.txt_titulo.value=="") {
        alert ("Você deve preencher o campo Titulo!");
		document.frm_news.txt_titulo.focus();

        return false;
  }

	if(document.frm_news.txt_autor.value=="") {
        alert ("Você deve preencher o campo Autor!");
		document.frm_news.txt_autor.focus();

        return false;
  }

  if(document.frm_news.txt_descricao.value=="") {
        alert ("Você deve preencher o campo Descricao!");
		document.frm_news.txt_descricao.focus();

        return false;
  }

  
  if(document.frm_news.txt_status.value=="") {
        alert ("Você deve preencher o campo Status!");
		document.frm_news.txt_status.focus();

        return false;
  }
 }
  
</script>

</head>
<body onload="foco()">

<form name="frm_news" id="frm_news" action="cadastro_news.php" method="post" enctype="multipart/form-data">
<div id="principal">
  <h1> Realizar Vendas </h1>

  <hr>
    <h3>Informações da Venda</h3>
    <label> Código Cliente </label>
    <input name="txt_clienteid" type="text" class="input_01">

    <label> Tipo de Pagamento </label>
    <input name="txt_tipopag" type="text" class="input_01">
    
    <hr>
    <h3>Itens da Venda</h3>
    <label>Código do produto</label>
    <input name="txt_produtoid" type="text" class="input_01">

    <label> Valor Unitário </label>
    <select name="txt_vrunit" class="select_01">

    <label>Qtde.</label>
    <input name="txt_qtditem" type="text" class="input_01">

    <label>Total</label>
    <input name="txt_totalven" type="text" class="input_01">

    <input name="btn_enviar" type="submit" class="btn" onclick="return validar_dados()">
</div>
</form>
</body>
</html>

