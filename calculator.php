<?php

if (count($argv) == 1) {
    say("請輸入正確的數字");
}

$input = explode(' ', trim($argv[1]));

if (count($input) != 3) {
    say('格式錯誤');
}

$operator = $input[1];

if (!in_array($operator, ['+', '-', '*', '/'])) {
    say('運算符號輸入錯誤');
}

if (!is_numeric($input[0]) || !is_numeric($input[2])) {
    say('請輸入數字');
}

$first_num = (int)$input[0];
$second_num = (int)$input[2];

$result = eval("return $first_num $operator $second_num;");
say($result);

function say($string)
{
    echo $string . "\n";
    exit;
}
