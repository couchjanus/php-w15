<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Order.php';
require_once CORE.'/Session.php';

/**
 * ProfileController.php
 * Контроллер для authetication users
 */
class ProfileController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        $userId = Session::get('userId');
        $this->user = User::getByPrimaryKey($userId);
    }
     
    /**
     * страница index
     *
     * @return bool
     */
    public function index()
    {
        $userId = Session::get('userId');
        if (!$this->user) {
            Helper::redirect('/login');
        }

        $user = $this->user;
        if ($this->user->role_id == 1) {
            $title = 'Admin Profile';
            $this->view->render('admin/index', compact('user',  'title'), 'admin');
        } else {
            $title = 'My Profile';
            $instance = User::getByPrimaryKey($this->user->id);
            if (isset($_POST) and !empty($_POST)) {
                $instance->name = trim(strip_tags($_POST['name']));
                $instance->phone_number = trim(strip_tags($_POST['phone_number']));
                $instance->first_name = trim(strip_tags($_POST['first_name']));
                $instance->last_name = trim(strip_tags($_POST['last_name']));
                $instance->store();
                Helper::redirect('/profile');
            }
            $this->view->render('profile/index', compact('title', 'user'));
        }
    }

    /**
     * Просмотр истории заказов пользователя
     *
     * @return bool
    */

    public function ordersList()
    {
        $orders = Order::getOrdersListByUserId($this->user->id);
        $title = 'Личный кабинет ';
        $subtitle = 'Ваши заказы ';
        $user = $this->user;
        $this->view->render('profile/orders', compact('user', 'orders', 'title', 'subtitle'));
    }

    public function ordersView($vars)
    {
        extract($vars);
        $order = Order::getUserOrderById($id);

        $title = 'Личный кабинет ';
        $subtitle = 'Ваш заказ #'.$order->id;

        // Преобразуем JSON  строку продуктов и их кол-ва в массив
        $orders = json_decode(json_decode($order->products, true));
        $products = [];

        for ($i=0; $i<count($orders); $i++) {
            array_push($products, (array)$orders[$i]);
        }
        $user = $this->user;
        $this->view->render('profile/order', compact('user', 'orders', 'order', 'title', 'subtitle', 'products'));
    }
}