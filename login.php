<html>
<body>
<h2>登入</h2>
<form action="" method="POST">
    <input type="text" name="account" value="" placeholder="帳號" required>
    <input type="password" name="password" value="" placeholder="密碼" required>
    <input type="submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dsn = "mysql:host=localhost;dbname=test";
    $db = new PDO($dsn, 'root', '');

    $account = $_POST['account'];
    $password = $_POST['password'];
    $rs = $db->query("SELECT * FROM users where account = '{$account}'");
    $row = $rs->fetch();

    if ($row) {
        if ($row['password'] === $password) {
            echo "<span>登入成功。</span>";
        } else {
            echo "<span>使用者密碼錯誤。</span>";
        }
    } else {
        echo "<span>使用者不存在。</span>";
    }
}
?>
</body>
</html>