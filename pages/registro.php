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
    $erroUser = "Digite algo.";
  }else{
    $user = clean($_POST['usuario']);
      if(!preg_match("/^[a-zA-Z' ]*$/", $user)){
        $erroUser = "Usuario, inválido!.";
      }
  } 

  if(empty($_POST['email'])){
    $erroEmail = "Digite algo.";
  }else{
    $email = clean($_POST['email']);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erroEmail = "Email, inválido!.";
      }
  } 

  if(empty($_POST['senha'])){
    $erroSenha = "Digite algo.";
  }else{
    $senha = clean($_POST['senha']);
      if(strlen($senha) < 6){
        $erroSenha = "Senha muito pequena!.";
      }
  } 

  if(empty($_POST['conf_senha'])){
    $erroConfSenha = "Digite algo.";
  }else{
    $confSenha = clean($_POST['conf_senha']);
      if($confSenha != $senha){
        $erroConfSenha = "Senha diferente.";
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
  <title>Registro</title>
</head>
<body>

<h1>Registro</h1>
<hr>

<form method="post">

  <label>Usuario: </label>
  <br><input type="text" name="usuario" size="25" placeholder="Digite um usuário..."><br>
  <span class="erro"><?php echo $erroUser;?></span><br><br>

  <label>Email: </label>
  <br><input type="email" name="email" size="25" placeholder="Digite um email..."><br>
  <span class="erro"><?php echo $erroEmail;?></span><br><br>
  
  <label>Senha: </label>
  <br><input type="password" name="senha" size="25" placeholder="Digite uma senha..."><br>
  <span class="erro"><?php echo $erroSenha;?></span><br><br>
  
  <label>Confirmar Senha: </label>
  <br><input type="password" name="conf_senha" size="25" placeholder="Confirme sua senha..."><br>
  <span class="erro"><?php echo $erroConfSenha;?></span><br><br>
  
  <button type="submit">Enviar</button>

</form>

<hr>
<a href="../index.php">Voltar</a>

</body>
</html>