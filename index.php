<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>MyMangaList.net - Personal Manga Database</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="src\styles\index-style.css">
</head>


<body>
  <div class="horizontalSpace"></div>
  <div class="body">
    <div class="menuTop">
      <div class="title">MyMangaList</div>
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
    <div class="welcomeText">
      <p>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          echo "<p style='color:red;'>" . "teste" . "</p>";
        } else {
          echo "<p style='color:black;
          font-size: 16px; 
          padding: 5px 9px; 
          font-weight: 700;
          border-bottom-color: #1d439b;
          border-left-color: #ebebeb;
          border-right-color: #ebebeb;
          border-style: solid;
          border-top-color: #ebebeb;
          border-width: 1px;
          background-color: #e1e7f5;
          font-family: Verdana, Geneva, Tahoma, sans-serif;'>" . "Welcome to MyMangaList.net!" . "</p>";
        }
        ?>
      </p>
    </div>
        AQUI VAI O CONTEÚDO DA PAGINA INICIAL.
  </div>
  <div class="horizontalSpace"></div>
</body>


</html>