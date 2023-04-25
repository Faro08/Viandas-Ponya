<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='home';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/home_page');
        echo view('front/footer_view');
    }
    public function about()
    {
        $data['titulo']='about';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/about_us');
        echo view('front/footer_view');
    }
    public function commerce()
    {
        $data['titulo']='commerce';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/commerce');
        echo view('front/footer_view');
    }
    public function contact()
    {
        $data['titulo']='contact';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/contact_us');
        echo view('front/footer_view');
    }

    public function wip()
    {
        $data['titulo']='wip';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/wip_page');
        echo view('front/footer_view');
    }
}