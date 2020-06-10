<?php
session_start();
require('dbconnect.php');
 
if (!empty($_POST)) {
  if($_POST['member'] === '') {
    $error['member'] ='blank';
  }
  $_SESSION['join'] = $_POST;
  header('Location: member_confirm.php');
  exit();
}
 
if ($_REQUEST['action'] == 'rewrite'  && isset($_SESSION['join'])){
  $_POST = $_SESSION['join'];
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

  <!-- Font Awesome Icons -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Sans+JP:wght@100;400;900&display=swap"
    rel="stylesheet">

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
  <form action="" method="post">
      <fieldset class="uk-fieldset">
        <h1 class="uk-heading-line uk-text-center"><span>追加するメンバー</span></h1>
        <div class="uk-margin">
          <input name ="member" class="uk-input" type="text" placeholder="追加する名前を入力してください" value="<?php print(htmlspecialchars($_POST['member'], ENT_QUOTES)); ?>">
          <?php if($error['name'] === 'blank'): ?>
          <p class="error">*名前を入力してください</p>
          <?php endif; ?>
        </div>
      </fieldset>
      <div class="uk-text-center">
        <button class="uk-button uk-button-primary" type="submit">確認</button>
      </div>
    </form>


  </main>
  <footer>

  </footer>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/uikit.min.js"></script>
  </footer>
</body>

</html>