<?php

// 他のPHPファイルを読み込む
require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();

// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $birthDay = $_POST['birthday'];
    $passWord = $_POST['password'];

    // 連想配列を作成
    $user = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'birthday' => $birthDay,
        'password' => $passWord,
    ];

    // 関数を呼び出す
    $user = saveUser($user);

    // セッションにIDを保存
    $_SESSION['id'] = $user['id'];

    // my-page に移動させる（リダイレクト）
    header('Location: ./my-page.php');
    exit();
}

?>
<html>
    <head>
    <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body class="body">
        <h1 class="rgs1">会員登録</h1>
        <!-- action: フォームの送信先 -->
        <!-- method: 送信方法（GET / POST） -->
        <form action="./register.php" method="post">
            <div class="rgs">
                お名前<br>
                <input type="text" name="name">
            </div>
            <div class="rgs">
                メールアドレス<br>
                <input type="email" name="email">
            </div>
            <div class="rgs">
                電話番号<br>
                <input type="text" name="phone">
            </div>
            <div class="rgs">
                ご住所<br>
                <input type="text" name="address">
            </div>
            <div class="rgs">
                生年月日<br>
                <input type="date" name="birthday" max="9999-12-31">
            </div>
            <div class="rgs">
                パスワード<br>
                <input type="password" name="password">
            </div>
            <div class="rgs2">
                <!-- <button type="submit">登録</button> -->
                <input type="submit" value="登録" name="submit-button">
            </div>
        </form>
    </body>
</html>
