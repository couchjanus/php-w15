<?php

// load file
$data = file_get_contents(DB.'/blog.json');

// decode json to associative array
$posts = json_decode($data, true);

$title = 'Peculiar Blog';

view('blog/index', compact('title', 'posts'));
