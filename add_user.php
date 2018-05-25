<html>
<body>
<h2>表單資料：</h2>
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
    $insert = $db->query("INSERT INTO users (account, password) VALUES ('{$account}', {$password});");
    $insert->execute();

    $rs = $db->query("SELECT * FROM users where account = '{$account}'");
    $row = $rs->fetch();

    if (isset($row)) {
        echo "<span>新增成功。</span>";
    } else {
        echo "<span>新增失敗。</span>";
    }
}
?>
</body>
</html>