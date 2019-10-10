<?php

// load file
$data = file_get_contents(DB.'/blog.json');

// decode json to associative array
$posts = json_decode($data, true);

$title = 'Peculiar Blog';

view('blog/index', compact('title', 'posts'));





// BlogController.php

include_once MODELS.'Post.php';

class BlogController
{
    public function index()
    {
	  $title = 'Our <b>Best Cat Members Blog Page </b>';
	  $posts = all();
	  view('blog/index', ['title'=>$title, 'posts' => $posts]);
    }
}

// число элементов в массиве можно вычислить при помощи функции count():

// for ($i = 1; $i <= count($posts); $i++)
// {
//     var_dump($posts[$i]);
// }


