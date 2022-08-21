<?php
// Declaração das variaveis de erro.
$erroUser = "";
$erroEmail = "";
$erroSenha = "";
$erroConfSenha = "";

// Função para limpar stings
function clean($valor){
  $valor = trim($valor);
  $valor = htmlspecialchars($valor);
  $valor = stripslashes($valor);
return $valor;

}
// Logica do formulário
//°1
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(empty($_POST['usuario'])){
    $erroUser = "Digite algo!";
  }else{
    $user = clean($_POST['usuario']);
      if(!preg_match("/^[a-zA-Z' ]*$/", $user)){
        $erroUser = "Nome inválido!";
      }
  } 

  if(empty($_POST['senha'])){
    $erroSenha = "Digite algo";
  }else{
    $senha = clean($_POST['senha']);
      if(strlen($senha) < 6){
        $erroSenha = "Senha muito pequena!";
      }
  } 

  if(($erroUser == "") && ($erroSenha == "")){
  
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
  <title>Login</title>
</head>
<body>

<section class="login">
    <div class="login_form">
      <form method="post">
        <label>login</label>
          <input type="text" name="usuario" placeholder="Nome" autofocus>
          <br><span class="erro"><?php echo $erroUser;?></span>
          <input type="password" name="senha" placeholder="Senha">
          <br><span class="erro"><?php echo $erroSenha;?></span>
        <input type="submit" value="ENVIAR">
      </form>
    <p>Ainda não possui uma conta? <a href="registro.php">clique aqui</a></p>
  </div>
</section>

</body>
</html>
