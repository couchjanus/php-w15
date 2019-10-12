<?php

// CategoryController.php

// class CategoryController extends Controller
// {
//     /**
//      * Главная страница управления категориями
//      *
//      * @return bool
//      */
//     public function index()
//     {
//         $connection = Connection::connect(require_once DB_CONFIG_FILE);
//         $stmt = $connection->query("SELECT * FROM categories ORDER BY id ASC");
//         $categories = $stmt->fetchAll();
//         $title = 'Category List Page ';
//         $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
//     }
//     /**
//      * Добавление категории
//      *
//      * @return bool
//      */
//     public function create()
//     {
//         if (isset($_POST) and !empty($_POST)) {
//             $connection = Connection::connect(require_once DB_CONFIG_FILE);
//             $stmt = $connection->prepare("INSERT INTO categories (name, status) VALUES (?, ?)");
//             $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
//             $status = (int)isset($_POST['status']);
//             $stmt->bindParam(1, $_POST['name']);
//             $stmt->bindParam(2, $status);
//             $stmt->execute();
//             Helper::redirect('/admin/categories');
//         }
//         $title = 'Admin Category Add New Category ';
//         $this->view->render('admin/categories/create', compact('title'), 'admin');
//     }
// }

require_once MODELS.'/Category.php';

// class CategoryController extends Controller
// {
//     /**
//      * Главная страница управления категориями
//      *
//      * @return bool
//      */
//     public function index()
//     {
//         // Create an instance
//         $categories = new Category();
//         // Get the list of Categories
//         $categories = $categories->index();
//         $title = 'Category List Page ';
//         $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
//     }
//     /**
//      * Добавление категории
//      *
//      * @return bool
//      */
//     // public function create()
//     // {
//     //     if (isset($_POST) and !empty($_POST)) {
//     //         $opts = [];
//     //         array_push($opts, trim(strip_tags($_POST['name'])));
//     //         $status = (int)isset($_POST['status']);
//     //         array_push($opts, $status);
//     //         $category = new Category();
//     //         $category->store($opts);
//     //         Helper::redirect('/admin/categories');
//     //     }
//     //     $title = 'Admin Category Add New Category ';
//     //     $this->view->render('admin/categories/create', compact('title'), 'admin');
//     // }

//     public function create()
//     {
//         if (isset($_POST) and !empty($_POST)) {
//             $opts[] = trim(strip_tags($_POST['name']));
//             $opts[] = (int)isset($_POST['status']);
//             $category = new Category();
//             $category->store($opts);
//             Helper::redirect('/admin/categories');
//         }
//         $title = 'Admin Category Add New Category ';
//         $this->view->render('admin/categories/create', compact('title'), 'admin');
//     }
// }

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $title = 'Category List Page ';
        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
    }
    /**
     * Добавление категории
     *
     * @return bool
     */
 
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $category = new Category();
            $category->setName(trim(strip_tags($_POST['name'])));
            $category->setStatus((int)isset($_POST['status']));
            $category->store();
            Helper::redirect('/admin/categories');
        }
        $title = 'Admin Category Add New Category ';
        $this->view->render('admin/categories/create', compact('title'), 'admin');
    }

    /**
     * Возвращает Список категорий, 
     * у которых статус отображения = 1  
     */
    public function getActiveCategories()
    {
        $categories = Category::all(array('status'=>1));
        $title = 'Active Category List Page ';
        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
    }
}