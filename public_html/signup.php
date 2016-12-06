<?php

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Signup();

$app->run();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規ユーザー登録</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
  <p id="ClockArea"></p>
  <h1>相続 弁護士相談チャット　新規ユーザー登録</h1>
</header>
  <div class="line"></div>
  <p>遺産分割、遺留分、相続放棄、代襲相続など、相続に関するお悩みをご相談ください。なお、個人情報の保護に関して、 組織的、物理的、人的、技術的に適切な対策を実施し、当社の取り扱う個人情報の漏えい、滅失又はき損の防止その他の個人情報の安全管理のために 必要かつ適切な措置を講ずるものとします。詳しくは、当社個人情報保護方針をご参照ください。</p>
  <hr>
  <div id="container">
    <form action="" method="post" id="signup">
      <p>
        <input type="text" name="name" placeholder="ChatName / 弁護士名" value="">
      </p>
      <p class="err"><?= h($app->getErrors('name')); ?></p>
      <p>
        <input type="text" name="email" placeholder="Email" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email): ''; ?>">
      </p>
      <p class="err"><?= h($app->getErrors('email')); ?></p>
      <p>
        <input type="password" name="password" placeholder="Password">
      </p>
      <p>
        <input type="radio" name="lawyer" value="0" checked>一般ユーザー
        <input type="radio" name="lawyer" value="1">弁護士
      </p>
      <p class="err"><?= h($app->getErrors('password')); ?></p>
      <div class="btn" onclick="document.getElementById('signup').submit();">新規登録</div>
      <p class="fs12"><a href="/chat/public_html/login.php">ログイン画面</p>
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
  </div>
  <footer>
    Copyright &copy; 〇〇 Co., Ltd All Rights Reserved.
  </footer>
  <script src="main.js"></script>
</body>
</html>