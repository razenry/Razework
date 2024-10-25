<?php


class Beranda
{
    public function index()
    {
        // Data yang akan dikirimkan ke view
        $data = [
            'title' => 'Homepage',
            'description' => 'Home Page!',
        ];

        // Render view 'home/index' dengan layout 'layouts/main'
        App::view('home/index', $data, 'home/layouts/app');
    }

}
