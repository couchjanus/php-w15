<?php
// regexp.patterns.test.php

$url = "blaha-muha/8";
$result = preg_match("@\d+@", $url, $match); // \d+ - найдёт 8282

var_dump(
    $result,
    $match
);
// int(1)
// array(1) {
//   [0]=>
//   string(4) "8282"
// }

$url = "admin/categories/show/8";
$pattern = "@[a-zA-Z0-9]+@";
$result = preg_match($pattern, $url, $match); // \d+ - найдёт 8282

var_dump(
    $result,
    $match
);

$url = "admin/categories/show/8";
$pattern = "@admin/categories/show/[a-zA-Z0-9]+@";
$result = preg_match($pattern, $url, $match); // \d+ - найдёт 8282

var_dump(
    $result,
    $match
);

## Метасимвол начала строки
$url = "admin/categories/show/8";
$pattern = "@^admin/categories/show/[a-zA-Z0-9]+@";
$result = preg_match($pattern, $url, $match); // \d+ - найдёт 8282

var_dump(
    $result,
    $match
);
## Метасимвол конца строки
$url = "admin/categories/show/8";
$pattern = "@^admin/categories/show/[a-zA-Z0-9]+$@";
$result = preg_match($pattern, $url, $match); // \d+ - найдёт 8282

var_dump(
    $result,
    $match
);

// $pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
