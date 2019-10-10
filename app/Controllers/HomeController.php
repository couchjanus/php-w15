<?php
/**
 * HomeController.php
 */

// class HomeController
// {
//     public function index()
//     {
//         $title = 'Our Best Cats Members Home Page';
//         $this->view('home/index', compact('title'));
//     }

//     public function view($path, $data = null, $layout='app') 
//     {
//         if ( $data ) {
//             extract($data);
//         }
//         $path .= '.php';
//         return require VIEWS."/layouts/${layout}.php";
//     }
// }

class HomeController extends View
{
    public function index()
    {
        $title = 'Our Best Cats Members Home Page';
        $this->render('home/index', compact('title'));
    }
}

// class HomeController extends Controller
// {
//     public function index()
//     {
//         $title = 'Our Best Cats Members Home Page';
//         $this->view->render('home/index', compact('title'));
//     }
// }