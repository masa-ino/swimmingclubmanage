<?php
try{
  $db = new PDO('mysql:dbname=swimming; host=127.0.0.1; charset =utf8','root','Masa0077');
}catch(PDOException $e){
  print('DB接続エラー:'. $e->getMessage());
}
?>