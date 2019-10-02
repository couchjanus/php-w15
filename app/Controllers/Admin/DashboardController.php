<?php
// DashboardController.php

class DashboardController
{
    public function index()
    {
      $title = 'Admin Dashboard';
		  view('admin/index', ['title'=>$title], 'admin');
    }
}
