<?php
session_start();
require('dbconnect.php');

if(!isset($_SESSION['join'])){
	header('Locatin: index.php');
	exit();
}
if (!empty($_POST)){
	$statement = $db->prepare('INSERT INTO members SET name =? , count = 0');
	$statement->execute(array($_SESSION['join']['member']));
	unset($_SESSION['join']);

	header('Location: index.php');
	exit();
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
  <main class="uk-container uk-container-small uk-text-center">
    <h1 class="uk-heading-line uk-text-center"><span>確認</span></h1>

    <form action="" method="post">
      <input type="hidden" name="action" value="submit" />
      <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin">
        <h3 class="uk-card-title">追加するメンバー</h3>
        <p><?php print(htmlspecialchars($_SESSION['join']['member'],ENT_QUOTES)); ?></p>
      </div>

      <div class="uk-text-center">
        <a href="member.php?action=rewrite" class="uk-button uk-button-primary">戻る</a>
        <button class="uk-button uk-button-primary" type ="submit">追加</button>
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