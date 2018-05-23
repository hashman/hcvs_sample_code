<?php

if (count($argv) < 3) {
    echo "參數錯誤\n";
    exit;
}

$account = $argv[1];
$operator = $argv[2];

if (!in_array($operator, ['+', '0'])) {
    echo "運算邏輯錯誤\n";
    die();
}

$dsn = "mysql:host=localhost;dbname=test";
$db = new PDO($dsn, 'root', '');

$rs = $db->query("SELECT * FROM count where account = '" . $account . "'");
$row = $rs->fetch();
if ($operator == '+') {
    $count = (int) $row['count']++;
} else {
    $count = (int) $row['count']--;
}
$update = $db->query("UPDATE count set count = '" . $count . "' WHERE id = " . $row['id']);
$update->execute();
$rs = $db->query("SELECT * FROM count where account = '" . $account . "'");
$row = $rs->fetch();

print_r($row);
