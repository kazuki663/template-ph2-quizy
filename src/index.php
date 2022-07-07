<?php

require('dbconnect.php');
?>
<?php
$id = $_GET['id'];
$stmt = $db->query("SELECT * FROM big_questions WHERE id = $id");
$big_question = $stmt->fetch();

//問題取得
$stmt = $db->query("SELECT * FROM questions WHERE big_question_id = $id");
$questions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>quizy</title>
  <link rel="stylesheet" href="./normalize.css">
  <link rel="stylesheet" href="./style.css">
  <script src="./quiz.js" defer></script>
</head>

<body>
  <div class="container">
    <header>
      <a href="https://www.edu.keio.jp/ess2/login?lang=jp">
        <img src="https://www.edu.keio.jp/ess2/images/ess_title_03.png" alt="授業支援" class= "headerImg">
      </a>
      <a href="http://typingx0.net/sushida/play.html" class= "headerImg">寿司打</a>
    </header>
    <h4><?= $big_question['name'] ;?></h4>
    <div class="kuizy_net">
      <img class= "quizy_logo" src="https://pbs.twimg.com/profile_images/1352968042024562688/doQgizBj_400x400.jpg" alt="k">
      <a class= "kuizy" href="https://kuizy.net/user/kuizy_net">@kuizy_net</a>
    </div>
    <?php foreach($questions as $index => $question) :?>
    <h1><?= $index + 1; ?>.この地名はなんと読む？</h1>
  <div class="image-container">
    <img src="<?= $question['image'] ?>" alt="">
  </div>
  <ul>
  <?php 
  $question_id = $question['id'];
  $stmt = $db->query("SELECT * FROM choices WHERE question_id = $question_id");
  $choices = $stmt->fetchAll();
  $shuffles = shuffle($choices);
  foreach($choices as $choice) :
  ?>
    <li class="selections"><?= $choice['name']; ?></li>
    <?php endforeach ; ?>
  </ul>
  <?php endforeach ; ?>
</div>
</body>

</html>