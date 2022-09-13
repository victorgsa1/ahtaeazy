<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> .:: Login ::. </title>

<link rel="stylesheet" type="text/css" href="css/formatacao.css">
<style type="text/css">

body {
        background-image: url('img/fundo.jpg');
        background-attachment: fixed;
        background-size: 100%;
      }

</style>

</head>

<body>

<form name="frm_login" action="validacao.php" method="post">
  <div id="principal">
    <label> Login </label>
    <input name="txt_usuario" type="text" class="input_01">

    <label> Senha </label>
    <input name="txt_senha" type="password" class="input_01">

    <input name="btn_enviar" type="submit" value="Logar" class="btn">
  </div>
</form>

</body>
</html>

