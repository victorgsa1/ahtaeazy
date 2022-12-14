<?PHP
require_once("../seguranca.php");
require_once('../conexao/banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_nome   = isset($_REQUEST['txt_cons_nome']) ? $_REQUEST['txt_cons_nome'] : '';
$cons_fone  = isset($_REQUEST['txt_cons_fone']) ? $_REQUEST['txt_cons_fone'] : '';
$cons_cel  = isset($_REQUEST['txt_cons_cel']) ? $_REQUEST['txt_cons_cel'] : '';
$cons_email  = isset($_REQUEST['txt_cons_email']) ? $_REQUEST['txt_cons_email'] : '';
$cons_data_cadastro  = isset($_REQUEST['txt_cons_data_cadastro']) ? $_REQUEST['txt_cons_data_cadastro'] : '';

$sql = "select *, date_format(for_data_cadastro,'%d/%m/%Y') as data 
        from tb_fornecedor
        where for_codigo like '%".$cons_codigo."%' AND
              for_nome like '%".$cons_nome."%' AND
              for_fone like '%".$cons_fone."%' AND
              for_cel like '%".$cons_cel."%' AND
              for_email like '%".$cons_email."%' AND
              for_data_cadastro like '%".$cons_data_cadastro."%'  
      ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta Login </title>
    
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

<form name="frm_consulta" action="consulta_fornecedor.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="txt_cons_nome" type="text" placeholder="nome">
    <input name="txt_cons_fone" type="text" placeholder="Fone">
    <input name="txt_cons_cel" type="text" placeholder="Celular">
    <input name="txt_cons_email" type="text" placeholder="Email">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_03"> <strong> Nome </strong></div>
    <div class="coluna_02"> <strong> Telefone </strong></div>
    <div class="coluna_02"> <strong> Celular </strong></div>
    <div class="coluna_02"> <strong> Email </strong></div>
    <div class="coluna_03"> <strong> Data Cadastro </strong> </div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['for_codigo']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['for_nome']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['for_fone']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['for_cel']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['for_email']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['data']; ?> </div>

    <div class="coluna_01">
      <a href="delete_fornecedor.php?for_codigo=<?php echo $dados['for_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_fornecedor.php?for_codigo=<?php echo $dados['for_codigo']; ?>"> 
        <img src="../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

