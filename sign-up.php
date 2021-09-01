<!DOCTYPE html>
<html>

<head>
  <title> Sign Up on MyMangaList.net! </title>
  <link rel="stylesheet" href="src\styles\signup_style.css">
</head>

<body>
  <?php
  $str = file_get_contents('src/databaseConnect.json');
  $json = json_decode($str, true);

  $connect = oci_connect($json['usernameDB'], $json['passwordDB'], 'bdengcomp_low');
  if (!$connect) {
    $m = oci_error();
    trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
  }

  if (
    isset($_POST['signup'])
    && !empty($_POST['username']) && !empty($_POST['email'])
    && !empty($_POST['password']) && !empty($_POST['date_birth'])
  ) {

    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $date = ($_POST['date_birth']);

    $newDate = strtotime($date);
    $date_birth = date('d/M/Y', $newDate);

    $s = oci_parse(
      $connect,
      "INSERT into USERS(user_id,username,email,password,profile_pic,role,date_birth) values ('0', '$username', '$email', '$password','','user','$date_birth')"
    );
    if (!$s) {
      $m = oci_error($connect);
      trigger_error("Erro oci parse: " . $m["message"], E_USER_ERROR);
    }

    $r = oci_execute($s);
    if (!$r) {
      $m = oci_error($r);
      trigger_error("Erro oci execute: " . $m["message"], E_USER_ERROR);
    }
    oci_commit($connect);
  }
  ?>
  <div class="content">
    <div class="menuTop">
      <div class="title"><a href="/index.php" style="color: #1d439b; text-decoration: none">MyMangaList</a></div>
      <div class="loginBtn"><strong>
          <div class="textBtn1"><a href="/login.php" style="color: #1d439b; text-decoration: none">Login</a></div>
        </strong></div>
      <div class="signUpBtn"><strong>
          <div class="textBtn2"><a href="/sign-up.php" style="color:white; text-decoration: none">Sign Up</a>
        </strong></div>
    </div>
  </div>

  <div class="menuBar"></div>
  <div class="containerContent">
    <div class="pageContent">
      <form method="POST">
        <label>Username:</label><input type="text" name="username" id="username"><br>
        <label>Email:</label><input type="text" name="email" id="email"><br>
        <label>Password:</label><input type="password" name="password" id="password"><br>
        <label>Date of Birtyday:</label><input type="text" name="date_birth" id="date_birth" value="DD/MM/YYYY"><br>
        <input class="btnSubmit" type="submit" value="Sign-up" id="signup" name="signup">
      </form>
    </div>
  </div>
  </div>

</body>

</html>