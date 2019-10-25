<?php
require_once MODELS.'/Category.php';

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
            $category->name = trim(strip_tags($_POST['name']));
            $category->status = (int)isset($_POST['status']);
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

    public function show($vars)
    {
        extract($vars);
        $category = Category::getByPrimaryKey($id);
        var_dump($category);
        // $title = 'Category Page ';
        // $this->view->render('admin/categories/show', compact('title', 'category'), 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $category = Category::getByPrimaryKey($id);

        if (isset($_POST) and !empty($_POST)) {
            $category->name = trim(strip_tags($_POST['name']));
            $category->status = (int)isset($_POST['status']);
            $category->store();
            Helper::redirect('/admin/categories');
        }
        $title = 'Edit Category Page ';
        $this->view->render('admin/categories/edit', compact('title', 'category'), 'admin');
    }

    public function delete($vars)
    {
        extract($vars);
        $category = Category::getByPrimaryKey($id);
        if (isset($_POST['submit'])) {
            $category->destroy();
            Helper::redirect('/admin/categories');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/categories');            
        }
        $title = 'Delete Category ';
        $this->view->render('admin/categories/delete', compact('title', 'category'), 'admin');
    }
}