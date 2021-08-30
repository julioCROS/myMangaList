<?php

// Altere as seguintes linhas com seu nome de usuário e senha do banco de dados:
$usernameDB = 'ECLBDIT213';
$passwordDB = 'senha@EngComp2021';

$connect = oci_connect($usernameDB, $passwordDB, 'bdengcomp_low');
if (!$connect) {
  $m = oci_error();
  trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
}

$stmtarray = array(
  "BEGIN
  EXECUTE IMMEDIATE 'DROP TABLE USERS';
  EXCEPTION
  WHEN OTHERS THEN
  IF SQLCODE NOT IN (-00942) THEN
  RAISE;
  END IF;
  END;",

  "CREATE TABLE USERS (id NUMBER, data VARCHAR2(20))"
);

$login = $_POST['username'];
$senha = MD5($_POST['password']);

if ($login == "" || $login == null) {
  echo "Error - O campo login deve ser preenchido";
} else {
  $query = "INSERT INTO USERS VALUES ('$login','$senha')";
  $insert = oci_parse($connect, $query);

  if ($insert) {
    echo "<script language='javascript' type='text/javascript'>
      alert('Usuário cadastrado com sucesso!');window.location.
      href='index.php'</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>
      alert('Não foi possível cadastrar esse usuário');window.location
      .href='sign-up.html'</script>";
  }
}
