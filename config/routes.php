<?php

return [
   'contact' => 'ContactController@index',
   'about' => 'AboutController@index',
   'blog' => 'BlogController@index',
   'guest' => 'GuestbookController@index',
   'admin' => 'Admin\DashboardController@index',

   'api/shop' => 'HomeController@getProducts',
   'api/shop/{id}' => 'HomeController@getProduct',
   'api/product/{id}' => 'HomeController@getProductItem',

   'api/check' => 'AuthController@loggedCheck',
   'api/cart' => 'OrderController@cart',
   
   'admin/categories' => 'Admin\CategoryController@index',
   'admin/active-categories' => 'Admin\CategoryController@getActiveCategories',
   'admin/categories/create' => 'Admin\CategoryController@create',
   'admin/categories/show/{id}' => 'Admin\CategoryController@show',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

   'admin/roles' => 'Admin\RoleController@index',
   'admin/roles/create' => 'Admin\RoleController@create',
   'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
   'admin/roles/delete/{id}' => 'Admin\RoleController@delete',

   'admin/users' => 'Admin\UserController@index',
   'admin/users/create' => 'Admin\UserController@create',
   'admin/users/edit/{id}' => 'Admin\UserController@edit',
   'admin/users/delete/{id}' => 'Admin\UserController@delete',

   'admin/products' => 'Admin\ProductController@index',
   'admin/products/create' => 'Admin\ProductController@create',

   'admin/orders' => 'Admin\OrderController@index',
   'admin/orders/edit/{id}' => 'Admin\OrderController@edit',
   'admin/orders/delete/{id}' => 'Admin\OrderController@delete',


   'register' => 'AuthController@signup',
   'login' => 'AuthController@signin',
   'logout' => 'AuthController@logout',
   
   'profile' => 'ProfileController@index',
   'profile/edit' => 'ProfileController@edit',

   'profile/orders' => 'ProfileController@ordersList',
   'profile/orders/view/{id}' => 'ProfileController@ordersView',
   'profile/orders/edit/{id}' => 'ProfileController@ordersEdit',
   'profile/orders/delete/{id}' => 'ProfileController@ordersDelete',
   
   //Главаня страница
   'index.php' => 'HomeController@index',
   '' => 'HomeController@index',
];
