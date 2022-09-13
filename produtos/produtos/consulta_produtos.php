<?PHP
require_once("../../seguranca.php");
require_once('../../conexao/banco.php');

$cons_codigo    = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo'] : '';
$cons_descricao = isset($_REQUEST['txt_cons_descricao']) ? $_REQUEST['txt_cons_descricao'] : '';
$cons_preco     = isset($_REQUEST['txt_cons_preco']) ? $_REQUEST['txt_cons_preco'] : '';
$cons_status    = isset($_REQUEST['txt_cons_status']) ? $_REQUEST['txt_cons_status'] : '';
$cons_foto    = isset($_REQUEST['txt_cons_foto']) ? $_REQUEST['txt_cons_foto'] : '';
$cons_qtde    = isset($_REQUEST['txt_cons_qtde']) ? $_REQUEST['txt_cons_qtde'] : '';

$sql = "select *, date_format(pro_data_cadastro,'%d/%m/%Y') as data 
        from tb_produto
        where pro_codigo like '%".$cons_codigo."%' AND
              pro_descricao like '%".$cons_descricao."%' AND
              pro_preco like '%".$cons_preco."%' AND
              pro_status like '%".$cons_status."%' AND
              pro_foto like '%".$cons_foto."%' AND
              pro_qtde like '%".$cons_qtde."%'
       ";


$sql = mysqli_query($con, $sql) or die ("Erro na sql!3") ;

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Consulta Produtos </title>
    
    <link rel="stylesheet" type="text/css" href="../../css/consulta.css">
    
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

<form name="frm_consulta" action="consulta_produtos.php" method="post">
    <input name="txt_cons_codigo" type="text" placeholder="código">
    <input name="txt_cons_nome" type="text" placeholder="nome">
    <input name="txt_cons_produtos" type="text" placeholder="produtos">
    <input name="btn_consultar" type="submit" value="Buscar">
</form>

  <div class="linha"> 
    <div class="coluna_01"> <strong> ID </strong></div>
    <div class="coluna_02"> <strong> Descrição </strong></div>
    <div class="coluna_01"> <strong> Quantidade </strong></div>
    <div class="coluna_02"> <strong> Preço </strong></div>
    <div class="coluna_02"> <strong> Status </strong></div>
    <div class="coluna_03"> <strong> Foto </strong></div>
    <div class="coluna_02"> <strong> Data Cadastro </strong> </div>
  </div>
 
<?php while ($dados = mysqli_fetch_array($sql)) { ?>

  <div class="linha"> 
  
    <div class="coluna_01"> <?php echo $dados['pro_codigo']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['pro_descricao']; ?> </div>
    <div class="coluna_01"> <?php echo $dados['pro_qtde']; ?> </div>
    <div class="coluna_02"> <?php echo $dados['pro_preco']; ?> </div>
    <div class="coluna_03"> <?php echo $dados['pro_status']; ?> </div>
    <div class="coluna_02"> <a href="<?php echo $dados['pro_foto']; ?>" target="_blank"> <?php echo $dados['pro_foto']; ?> </a></div>
    <div class="coluna_01"> <?php echo $dados['data']; ?> </div>

    <div class="coluna_01">
      <a href="delete_produtos.php?pro_codigo=<?php echo $dados['pro_codigo']; ?>" onclick="excluir_registro(event)">
        <img src="../../img/excluir.png"> 
      </a>
    </div>
    
    <div class="coluna_01">
      <a href="form_atualizar_produtos.php?pro_codigo=<?php echo $dados['pro_codigo']; ?>"> 
        <img src="../../img/edit.png"> 
      </a>
    </div>
    
  </div>
  
<?php } ?>

</div>
</body>
</html>

