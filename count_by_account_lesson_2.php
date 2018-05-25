<?php

if (count($argv) < 3) {
    echo "參數錯誤\n";
    exit;
}

$account = $argv[1];
$operator = $argv[2];

if (!in_array($operator, ['+', '-'])) {
    echo "運算邏輯錯誤\n";
    die();
}

$dsn = "mysql:host=localhost;dbname=users";
$db = new PDO($dsn, 'root', '');

$rs = $db->query("SELECT * FROM counter where account = '" . $account . "'");
$row = $rs->fetch();
if (empty($row)) {
    $insert = $db->query("INSERT INTO counter (`account`, `count`) VALUES ('{$account}', 0)");
    $insert->execute();
    exit;
}
if ($operator == '+') {
    $count = (int) $row['count'] + 1;
} else {
    $count = (int) $row['count'] - 1;
}
if ($count < 0) {
    echo "不能再少了！！！";
    die();
}
$update = $db->query("UPDATE counter set count = '" . $count . "' WHERE id = " . $row['id']);
$update->execute();
$rs = $db->query("SELECT * FROM counter where account = '" . $account . "'");
$row = $rs->fetch();

print_r($row);
