<html>
<body>
<h2>表單資料：</h2>
<form action="" method="POST">
    <input type="text" name="name" value="" placeholder="名稱">
    <input type="text" name="account" value="" placeholder="帳號">
    <input type="password" name="password" value="" placeholder="密碼">
    <label>
        <input type="checkbox" name="terms" value="true">
        我是核取方塊。
    </label>
    <input type="submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
?>
    <h2>輸入的資料：</h2>
    <label>名稱： <?=$_POST['name'] ?></label><br>
    <label>帳號： <?=$_POST['account'] ?></label><br>
    <label>密碼： <?=$_POST['password'] ?></label><br>
    <label>我是核取方塊： <?=$_POST['terms'] ?? 'false' ?></label><br>
<?php
}
?>
</body>
</html>