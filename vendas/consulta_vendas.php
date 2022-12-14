<?PHP
require_once('../conexao/banco.php');

$cons_codigo    = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_clienteid   = isset($_REQUEST['txt_cons_clienteid']) ? $_REQUEST['txt_cons_clienteid'] : '';
$cons_tipopag = isset($_REQUEST['txt_cons_tipopag']) ? $_REQUEST['txt_cons_tipopag'] : '';
$cons_vendata   = isset($_REQUEST['txt_cons_vendata']) ? $_REQUEST['txt_cons_vendata'] : '';

$sql = "select *, date_format(ven_data,'%d/%m/%Y') as data 
        from tb_venda
        where ven_codigo like '%".$cons_codigo."%' AND
              cli_codigo like '%".$cons_clienteid."%' AND
              ven_tipo_pagamento like '%".$cons_tipopag."%'
       ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta de Venda </title>
    
    <link rel="stylesheet" type="text/css" href="../css/consulta.css">
    
	<script type="text/javascript">
    
        function excluir_registro( ) {
            if( !confirm('Deseja realmente excluir este registro?') 
        ){
            if( window.event)
                window.event.returnValue=false;
            else
                e.preventDefault();
         }
        }
    
    </script>

  </head>
<body>
<div id="principal">

<form name="frm_consulta" action="consulta_vendas.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="Código">
    <input name="txt_cons_clienteid" type="text" placeholder="ID do Cliente">
    <input name="txt_cons_tipopag" type="text" placeholder="Tipo Pagamento">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_03"> <strong> Cliente ID </strong></div>
    <div class="coluna_02"> <strong> Tipo Pagamento </strong></div>
    <div class="coluna_02"> <strong> Data de Publicação </strong></div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['ven_codigo']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['cli_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['ven_tipo_pagamento']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['data']; ?> </div>

    <div class="coluna_01">
      <a href="delete_venda.php?ven_codigo=<?php echo $dados['ven_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_venda.php?ven_codigo=<?php echo $dados['ven_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

