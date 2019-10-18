<?php

// regexp.meta.test.php

$url = "blaha-muha/8282";
$result = preg_match("@\d@", $url, $match); // \d    Цифра (0-9)
var_dump(
    $result,
    $match
);
// Результат:
// int(1)
// array(1) {
//   [0]=>
//   string(1) "8"
// }

// \d\d\d\d - найдёт 8282
$url = "blaha-muha/8282";
$result = preg_match("@\d\d\d\d@", $url, $match); // \d\d\d\d - найдёт 8282

var_dump(
    $result,
    $match
);
// Результат:
// int(1)
// array(1) {
//   [0]=>
//   string(4) "8282"
// }

// \D - найдёт все буквы, пробелы и знаки препинания
// $sresult = preg_match_all("/\D/", $text, $match);
// var_dump(
//     $sresult,
//     $match
// );

// $sresult = preg_match_all("/\D\D\D\D/", $text, $match);
// var_dump(
//     $sresult,
//     $match
// );

// \s - найдёт все пробелы в тексте.
// $presult = preg_match_all("/\s/", $text, $match);
// var_dump(
//     $presult,
//     $match
// );


// $eresult = preg_match_all("/\d\d\d[0,2,4,6,8]/", $text, $match);
// var_dump(
//     $eresult,
//     $match
// );
// $eresult = preg_match_all("/[0,2,4,6,8]{4}/", $text, $match);

// var_dump(
//     $eresult,
//     $match
// );

// $eresult = preg_match_all("/[a-z]{4}/", $text, $match);
// var_dump(
//     $eresult,
//     $match
// );


