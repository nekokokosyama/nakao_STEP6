<?php
// 直接アクセス防止（c）
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// エスケープ関数（e）
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// データ取得（a）
$name = $_POST['name'] ?? '';
$company = $_POST['company'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$message = $_POST['message'] ?? '';

// エラーチェック（b）
$errors = [];

/* 名前（ひらがな・カタカナ・漢字・英字） */
if (empty($name) || !preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/u", $name)) {
    $errors[] = "名前の形式が正しくありません。";
}
/* 会社名 */
if ($company === '') $errors[] = '会社名は必須です';
/* メール */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "メールアドレスの形式が正しくありません。";
}
/* 年齢（0〜150） */
if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 0 || $age > 150) {
    $errors[] = "年齢は0〜150で入力してください。";
}
if ($message === '') $errors[] = 'お問い合わせ内容は必須です';

// エラーがあれば戻す
if (!empty($errors)) {
    echo '<h2>エラーがあります</h2>';
    foreach ($errors as $error) {
        echo '<p style="color:red;">' . h($error) . '</p>';
    }
    echo '<a href="contact.php">戻る</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>確認画面</title>
<link rel="stylesheet" href="style.css">
<script src="style.js"></script>
</head>

<body>
<div class="container">

<div class="title">お問い合わせフォーム・確認画面</div>

<div class="content">
    <div class="menu">
        <ul>
            <li><a href="#">トップページ</a></li>
            <li><a href="#">人気投稿</a></li>
            <li><a href="#">エンジニアおすすめ商品</a></li>
            <li><a href="#">エンジニアおすすめ記事</a></li>
            <li><a href="#">投稿ページ</a></li>
        </ul>
    </div>

    <div class="main">
        <!-- テーブル表示（d） -->
        <table>
            <tr><td>お名前</td><td><?= h($name) ?></td></tr>
            <tr><td>会社名</td><td><?= h($company) ?></td></tr>
            <tr><td>メールアドレス</td><td><?= h($email) ?></td></tr>
            <tr><td>年齢</td><td><?= h($age) ?></td></tr>
            <tr><td>お問い合わせ内容</td><td><?= h($message) ?></td></tr>
        </table>

        <div class="buttons">
            <!-- 戻るボタン -->
            <button onclick="history.back()">戻る</button>

            <!-- 送信ボタン（f） -->
            <form action="send.php" method="POST" style="display:inline;">
                <input type="hidden" name="name" value="<?= h($name) ?>">
                <input type="hidden" name="company" value="<?= h($company) ?>">
                <input type="hidden" name="email" value="<?= h($email) ?>">
                <input type="hidden" name="age" value="<?= h($age) ?>">
                <input type="hidden" name="message" value="<?= h($message) ?>">
                <button type="submit">送信</button>
            </form>
        </div>
    </div>
</div>

</div>
</body>
</html>