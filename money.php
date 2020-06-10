<?php
session_start();
require('dbconnect.php');
 
if  ($_SESSION['time'] + 3600 > time()) {
   $_SESSION['time'] = time();
} else {
  header('Location: login.php');
  exit();
}
 
$members = $dbh->query('SELECT * FROM members');

if (!empty($_POST)){

  if(empty($error)){
      $_SESSION['join'] = $_POST;
      header('Location: money_confirm.php');
      exit();
    }
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
    <h1 class="uk-heading-line uk-text-center"><span>追加する人を選択</span></h1>

    <form action="" method="post">
      <fieldset class="uk-fieldset">
        <div class="uk-margin uk-grid-small  uk-text-center">
        <?php foreach ($members as $member): ?>  
          <label><input class="uk-radio" type="radio" name="name" value ="<?php print(htmlspecialchars($member['name'], ENT_QUOTES)); ?>"><?php print(htmlspecialchars($member['name'], ENT_QUOTES)); ?></label>
          <input type="hidden" name="now_count" value="<?php print(htmlspecialchars($member['count'], ENT_QUOTES)); ?>" />
        <?php endforeach ?>
        <h1 class="uk-heading-line uk-text-center"><span>追加する回数</span></h1>
        <div class="uk-margin">
          <input class="uk-input" type="text" placeholder="回数を数字で入力してください" name ="add_count">
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