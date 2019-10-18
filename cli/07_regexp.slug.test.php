<?php

// regexp.slug.test.php

$subject = "Email, you sent was - bla-ha__2018@muha.com! Is it correct?";
var_dump($subject);

// Замена не алфавитных символов на разделитель
var_dump(preg_replace('/[^\pL]+/u', '-', $subject));
var_dump(preg_replace('/[^\p{L}]+/u', '-', $subject));


// Создаем выборочные замены
// $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        
// Транслитерация символов в ASCII
// if ($options['transliterate']) {
//     $str = str_replace(array_keys($char_map), $char_map, $str);
// }

// Замена не алфавитно-цифровых символов на разделитель
// $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

// Убираем дубли разделителей
// $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

// Замена не алфавитно-цифровых символов на разделитель
$subject = preg_replace('/[^\p{L}\p{Nd}]+/u', '-', $subject);
var_dump($subject);

// Убираем дубли разделителей
$subject = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $subject);
var_dump($subject);
