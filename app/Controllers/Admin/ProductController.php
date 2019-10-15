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
        $title = 'Products List Page';
        $this->view->render('admin/products/index', compact('title', 'products'), 'admin');
    }

    /**
     * Добавление товара
     *
     * @return bool
    */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $product = new Product();
            $product->name = trim(strip_tags($_POST['name']));
            $product->slug = Slug::makeSlug($product->name, array('transliterate' => true));
            $product->status = (int)isset($_POST['status']);
            $product->price = trim(strip_tags($_POST['price']));
            $product->brand = trim(strip_tags($_POST['brand']));
            $product->category_id = $_POST['category_id'];
            $product->description = trim(strip_tags($_POST['description']));
            $product->is_new = (int)isset($_POST['is_new']);
            $product->store();
            Helper::redirect('/admin/products');
        }
        $title = 'Add New Product ';
        $categories = Category::all();
        $this->view->render('admin/products/create', compact('title', 'categories'), 'admin');
    }
}