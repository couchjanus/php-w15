<?php

require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';

class ProductController extends Controller
{
    /**
     * Просмотр всех товаров
     * @return bool
    */
    public function index()
    {
        $products = Product::all();
        $title = 'Product List Page';
        $this->view->render('admin/products/index', compact('title', 'products'), 'admin');
    }

    /**
     * Добавление товара
     *
     * @return bool
    */
    public function create()
    {
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $product = new Product();
            $product->setName(trim(strip_tags($_POST['name'])));
            $product->setStatus((int)isset($_POST['status']));
            $product->setPrice(trim(strip_tags($_POST['price'])));
            $product->setBrand(trim(strip_tags($_POST['brand'])));
            $product->setCategory_id($_POST['category_id']);
            $product->setDescription(trim(strip_tags($_POST['description'])));
            $product->setIs_new((int)isset($_POST['is_new']));
            $product->store();
            Helper::redirect('/admin/products');
        }
        $title = 'Admin Product Add New Product ';
        $categories = Category::all();
        $this->view->render('admin/products/create', compact('title', 'categories'), 'admin');
    }
}