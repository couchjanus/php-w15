<?php
// regexp.preg.match.path.test.php

## Простая группа с захватом

$url = "admin/categories/show/8";
$pattern = "@^admin/categories/show/([a-zA-Z0-9]+)$@";
$result = preg_match($pattern, $url, $match); // 

var_dump(
    $result,
    $match
);


// preg_replace
$key="admin/categories/show/8";
$pattern = preg_replace("/([0-9]+)/", "$1", $key);
var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $key, $match); // 
var_dump(
    $result,
    $match
);

// preg_replace
echo "\nPattern\n";
$key="admin/categories/show/{id}";
var_dump(preg_replace("/{([a-zA-Z]+)}/", "$1", $key));

// Pattern
// string(24) "admin/categories/show/id"

echo "\nReplace Pattern\n";
$url="admin/categories/show/8";
$key="admin/categories/show/{id}";

$pattern = preg_replace("/{([a-zA-Z]+)}/", "(?<$1>[0-9]+)", $key);
var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $url, $match); // 
var_dump(
    $result,
    $match
);

// Replace Pattern
// string(35) "admin/categories/show/(?<id>[0-9]+)"
// int(1)
// array(3) {
//   [0]=>
//   string(23) "admin/categories/show/8"
//   ["id"]=>
//   string(1) "8"
//   [1]=>
//   string(1) "8"
// }


// $key="edit/{id}";
// var_dump(preg_replace("/{([a-zA-Z]+)}/", "(?<$1>[0-9]+)", $key));
// $pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
