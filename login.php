<?php
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );
session_start();
require('dbconnect.php');

if(!empty($_POST)){
  if(!empty($_POST)){
    if($_POST['password'] !== ''){
      $login =$dbh->prepare('SELECT * FROM posts WHERE password=?');
      $login->execute(array(
        sha1($_POST['password'])
      ));
  
      if($login->fetch()){
        $_SESSION['time']=time();

        if($_POST['save'] === 'on'){
          setcookie('password',$_POST['password'],time()+60*60*24*14);
        }
        header('Location:index.php');
        exit();
      }else{
        $error['login']='failed';
      }
    }else{
      $error['login']='blank';
    }
  }
}
?>

<!DOCTYPE html>

<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="author" content="">
  <title></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link rel="icon" href="img/favicon.ico">

  <!-- Style CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/uikit.min.css" rel="stylesheet">

</head>

<body>
  <header>
    <nav class="uk-navbar-container uk-margin" uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="index.php">水泳同好会前払いページ</a>
      </div>
    </nav>
  </header>
  <main class="uk-container uk-container-small">
    <h1 class="uk-heading-line uk-text-center"><span>ログイン</span></h1>

    <form action="" method="post">
      <fieldset class="uk-fieldset">
        <div class="uk-margin">
          <input class="uk-input" type="password" name="password" placeholder="パスワードを入力してください" value="<?php print(htmlspecialchars($_POST['password'], ENT_QUOTES)); ?>">
          <?php if ($error['login'] === 'blank'): ?>
          <p class="error">* パスワードをご記入ください</p>
          <?php endif; ?>
          <?php if ($error['login'] === 'failed'): ?>
          <p class="error">* ログイン失敗しました。正しくご記入ください</p>
          <?php endif; ?>
        </div>

        <div class="uk-text-center">
          <button class="uk-button uk-button-primary" type="submit">ログイン</button>
        </div>

      </fieldset>
    </form>


  </main>
  <footer>

  </footer>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/uikit.min.js"></script>
  </footer>
</body>

</html>