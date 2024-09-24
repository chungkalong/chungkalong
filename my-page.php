<?php

require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();

// セッションとCOOKIEにIDが保存されていなければ
// ログインページに移動
if (!isset($_SESSION['id']) && !isset($_COOKIE['id'])) {
    header('Location: ./login.php');
    exit();
}

// セッションにIDが保存されていればセッション
// ない場合はCOOKIEからIDを取得
$id = $_SESSION['id'] ?? $_COOKIE['id'];

$user = getUser($id);

// ユーザーが見つからなかったらログインページへ
if (is_null($user)) {
    header('Location: ./login.php');
    exit();
}

?>
<html>
    <head>
    <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body class="body">
        <h1 class="mypage">マイページ</h1>
        <table class="table">
            <tr class="rgs">
                <td>ID</td>
                <td>
                    <?php echo $user['id'] ?>
                </td>
            </tr>
            <tr class="rgs">
                <td>名前</td>
                <td>
                    <?php echo $user['name'] ?>
                </td>
            </tr>
            <tr class="rgs">
                <td>メールアドレス</td>
                <td>
                    <?php echo $user['email'] ?>
                </td>
            </tr>
            <tr class="rgs">
                <td>電話番号</td>
                <td>
                    <?php echo $user['phone'] ?>
                </td>
            </tr>
            <tr class="rgs">
                <td>ご住所</td>
                <td>
                    <?php echo $user['address'] ?>
                </td>
            </tr>
            <tr class="rgs">
                <td>生年月日</td>
                <td>
                    <?php echo $user['birthday'] ?>
                </td>
            </tr>
        </table>
        <div>
            <a href="./logout.php">
                ログアウト
            </a>
        </div>
    </body>
</html>
