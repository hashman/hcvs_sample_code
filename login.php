<html>
<body>
<h2>表單資料：</h2>
<form action="" method="POST">
    <input type="text" name="account" value="" placeholder="帳號">
    <input type="password" name="password" value="" placeholder="密碼">
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
    if (isset($row) && $row['password'] === $password) {
        echo "<span>登入成功。</span>";
    } else {
        echo "<span>帳號或密碼錯誤。</span>";
    }
}
?>
</body>
</html>