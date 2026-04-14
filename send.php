<?php
// 直接アクセス防止（c）
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// エスケープ関数
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// データ取得（a,b）
$name = $_POST['name'] ?? '';
$companyName = $_POST['companyName'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$message = $_POST['message'] ?? '';

// メール内容作成
$to = 'your@email.com'; // ← 自分のメールに変更
$subject = 'お問い合わせが届きました';

$body = "お問い合わせ内容\n\n";
$body .= "名前: $name\n";
$body .= "会社名: $companyName\n";
$body .= "メール: $email\n";
$body .= "年齢: $age\n";
$body .= "内容:\n$message\n";

// ヘッダー
$headers = "From: $email";

// メール送信
$result = mail($to, $subject, $body, $headers);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>送信結果</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="title">送信結果</div>

    <div class="main">

        <?php if ($result): ?>
            <h2>送信が完了しました！</h2>
            <p>お問い合わせありがとうございました。</p>
        <?php else: ?>
            <h2>送信に失敗しました</h2>
            <p>再度お問い合わせフォームから送信してください。</p>
        <?php endif; ?>

        <p><a href="contact.php">お問い合わせフォームに戻る</a></p>

    </div>
</div>

</body>
</html>