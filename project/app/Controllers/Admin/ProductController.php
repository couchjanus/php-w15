<?php

require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Picture.php';
require_once CORE.'/Uploader.php';
require_once CORE.'/Validation.php';


class ProductController extends Controller
{
    private $_resource = 'products';
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
            
            if (!empty($_FILES['images'])) {
                $files = $_FILES['images'];
                for ($i = 0; $i < count($files["name"]); $i++) {
                    $file["name"] = $files["name"][$i];
                    $file["tmp_name"] = $files["tmp_name"][$i];
                    $file["size"] = $files["size"][$i];
                    $file["type"] = $files["type"][$i];
                    $file["error"] = $files["error"][$i];

                    $upload = Uploader::factory('assets/images/products');
                    $upload->file($file);
                    $validation = new Validation();
                    $upload->callbacks($validation, array('check_name_length'));
                    $results = $upload->upload();
                    
                    $picture = new Picture();
                    $picture->filename = $results["filename"];
                    $picture->resource_id = (int)Product::lastId();
                    $picture->resource = $this->_resource;
                    $picture->store();
                }    
            }
            Helper::redirect('/admin/products');
        }
        $title = 'Add New Product ';
        $categories = Category::all();
        $this->view->render('admin/products/create', compact('title', 'categories'), 'admin');
    }
}