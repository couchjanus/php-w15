<?php
/**
 * UserController.php
 * Контроллер для управления users
 */
require_once MODELS.'/User.php';
require_once MODELS.'/Role.php';

class UserController extends Controller
{
    private $costs = [
        'cost' => 12,
    ];
    /**
     * Главная страница управления users
     *
     * @return bool
     */
    public function index()
    {
        $users = User::all();
        $title = 'User List Page';
        $this->view->render('admin/users/index', compact('users', 'title'), 'admin');
    }

    /**
     * Добавление user
     *
     * @return bool
     */

    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $user = new User();
            $user->name = trim(strip_tags($_POST['name']));
            $user->email = trim(strip_tags($_POST['email']));
            $user->role_id = $_POST['role_id'];
            $hash = password_hash(trim(strip_tags($_POST['password'])), PASSWORD_BCRYPT, $this->costs);
            $user->password = $hash;
            $user->store();
            Helper::redirect('/admin/users');
        }
        $title = 'Create User';
        $roles = Role::all();
        $this->view->render('admin/users/create', compact('title', 'roles'), 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $user = User::getByPrimaryKey($id);
        if (isset($_POST) and !empty($_POST)) {
            $user->name = trim(strip_tags($_POST['name']));
            $user->email = trim(strip_tags($_POST['email']));
            $hash = password_hash(trim(strip_tags($_POST['password'])), PASSWORD_BCRYPT, $this->costs);
            $user->password = $hash;
            $user->role_id = (int)$_POST['role_id'];
            $user->status = (int)isset($_POST['status']);
            $user->store();
            Helper::redirect('/admin/users');
        }
        $title = 'Edit User Page ';
        $roles = Role::all();
        $this->view->render('admin/users/edit', compact('user', 'title', 'roles'), 'admin');
    }
    
    public function delete($vars)
    {
        extract($vars);
        $user = User::getByPrimaryKey($id);
        if (isset($_POST['submit'])) {
            $user->destroy();
            Helper::redirect('/admin/users');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/users');            
        }
        $title = 'Delete user';
        $this->view->render('admin/users/delete', compact('title', 'user'), 'admin');
    }
}