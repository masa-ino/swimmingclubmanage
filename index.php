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
    <h1 class="uk-heading-line uk-text-center"><span>残り回数</span></h1>
    <table class="uk-table uk-table-striped">
      <thead>
          <tr>
              <th>メンバー</th>
              <th>残り回数</th>
          </tr>
      </thead>
      <tbody>
        <?php foreach ($members as $member): ?>  
          <tr>
                <td><?php print(htmlspecialchars($member['name'], ENT_QUOTES)); ?></td>
                <td><?php print(htmlspecialchars($member['count'], ENT_QUOTES)); ?>回</td>
            </tr>
        <?php endforeach; ?>
      </tbody>
  </table>

  <div class ="uk-text-center">
    <a href ="money.php" class="uk-button uk-button-primary">金額追加</a>
    <a href ="member.php" class="uk-button uk-button-primary">メンバー追加</a>
    <a href ="active.php" class="uk-button uk-button-primary">活動</a>
  </div>
  </main>
  <footer>

  </footer>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/uikit.min.js"></script>
  </footer>
</body>

</html>