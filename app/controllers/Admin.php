<?php

class Admin
{

    public function index()
    {
        Session::checkSession("Admin");
        header("Location:" . Routes::base('admin/dashboard'));
    }

    public function dashboard()
    {

        Session::checkSession("Admin");

        $data = [
            'title' => 'Dashboard',
            'link' => 'Dashboard',
            'description' => 'Dashboard Page!',
            'navLink' => true,

        ];

        // Render view 'home/index' dengan layout 'layouts/main'
        App::view('admin/index', $data, 'admin/layouts/app');
    }

      public function test($params = null)
    {
        // var_dump(ProductModel::all());
        App::view('test/test');
        
    }

    public function logout()
    {
        Session::checkSession('Admin');
        session_destroy();
        unset($_SESSION);
        header("Location:" . Routes::base('auth'));
        exit();
    }
}
