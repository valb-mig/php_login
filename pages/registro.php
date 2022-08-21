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

  if(empty($_POST['email'])){
    $erroEmail = "Digite algo!";
  }else{
    $email = clean($_POST['email']);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erroEmail = "Email inválido!";
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

  if(empty($_POST['conf_senha'])){
    $erroConfSenha = "Digite algo!";
  }else{
    $confSenha = clean($_POST['conf_senha']);
      if($confSenha != $senha){
        $erroConfSenha = "As senhas são diferentes!";
      }
  } 

  if(($erroUser == "") && ($erroEmail == "") && ($erroSenha == "") && ($erroConfSenha == "")){
  header('location: login.php');
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
  <title>Registro</title>
</head>
<body>

<section class="registro">
    <div class="registro_form">
      <form method="post">
        <label>Registro</label>
          <input type="text" name="usuario" placeholder="Nome" autofocus>
          <br><span class="erro"><?php echo $erroUser;?></span>
          <input type="email" name="email" placeholder="Email">
          <br><span class="erro"><?php echo $erroEmail;?></span>
          <input type="password" name="senha" placeholder="Senha">
          <br><span class="erro"><?php echo $erroSenha;?></span>
          <input type="password" name="conf_senha" placeholder="Confirmar senha">
          <br><span class="erro"><?php echo $erroConfSenha;?></span>
        <input type="submit" value="ENVIAR">
      </form>
    <p>Já possui uma conta? <a href="login.php">clique aqui</a></p>
  </div>
</section>

</body>
</html>
