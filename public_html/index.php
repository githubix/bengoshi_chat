<?php

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Index();

$app->run();

// $app->me()
// $app->getValues()->users

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>相続 弁護士相談チャット</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header>
	<p id="ClockArea"></p>
	<h1>相続 弁護士相談チャット　会員相談ページ</h1>
</header>
	<div class="line"></div>
	<div id="content"></div>
	<p>弁護士相談チャットは相続等のお悩みをオンライン上で解決する手段として利用できるツールです。遺産分割、遺留分、相続放棄、代襲相続など、相続に関するお悩みをご相談ください。なお、チャット上で問題が解決しない場合は、直接弁護士と連絡を取り合ってください。なお、個人情報の保護に関して、 組織的、物理的、人的、技術的に適切な対策を実施し、当社の取り扱う個人情報の漏えい、滅失又はき損の防止その他の個人情報の安全管理のために 必要かつ適切な措置を講ずるものとします。詳しくは、当社個人情報保護方針をご参照ください。</p>
<p id="navi">| ヘルプ | ランキング | よくある質問 | 個人情報保護方針 | 会社概要<p>
<p><?= h($app->me()->name); ?>さん - (<?= h($app->me()->email); ?>)</p>
<hr><br>
<iframe src="" id="frame"></iframe>
	<div id="container">
		<h2>オンライン中の弁護士</h2>
			<!-- <ul>
				<?php foreach($app->getValues()->users as $user) : ?>
					<li><?= h($user->name); ?></li>
				<?php endforeach; ?>
			</ul> -->
			<ul id="lawyer"></ul>
		</div>
		<br>
		※社会通念上、不適切と思われる会話や相談内容は、<b>こちら</b>にユーザ名および内容をご連絡ください。
			<form action="logout.php" method="post" id="logout">
				<input type="submit" value="退室する">
				<input type="hidden" name="email" value="<?= h($app->me()->email); ?>">
				<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
			</form>
		</div>
	<footer>
		Copyright &copy; 〇〇 Co., Ltd All Rights Reserved.
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="app.js"></script>
	<script src="main.js"></script>
</body>
</html>
