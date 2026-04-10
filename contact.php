<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>お問い合わせフォーム</h2>
</header>

<!-- sidebar -->
<ul>
    <li><a href="#">トップページ</a></li>
    <li><a href="#">人気投稿</a></li>
    <li><a href="#">エンジニアおすすめ商品</a></li>
    <li><a href="#">エンジニアおすすめ記事</a></li>
    <li><a href="#">投稿ページ</a></li>
</ul>

<!-- フォーム -->
<form action="confirm.php" method="post">
    <table class="confirm-table" border="2">
        <tr>
            <th>お名前</th>
            <td><input type="text" id="name" name="name" size="40"></td>
        </tr>
        <tr>
            <th>会社名</th>
            <td><input type="text" id="company" name="company" size="40"></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><input type="email" id="email" name="email" size="40"></td>
        </tr>
        <tr>
            <th>年齢</th>
            <td><input type="text" id="age" name="age" size="40"></td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>
                <textarea name="message" rows="5" cols="40" placeholder="お問い合わせ内容"></textarea>
            </td>
        </tr>
    </table>

    <br>
    <input type="submit" value="送信">
</form>

<p>下のボタンを押すとfooterの背景色が変わります。</p>

<footer>
    <button id="changeFooterColor">押してみてね！</button>
</footer>

<script src="style.js"></script>
</body>
</html>