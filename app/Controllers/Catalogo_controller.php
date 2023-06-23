<?php
namespace App\Controllers;
Use App\Models\producto_model;
Use App\Models\categoria_model;
use CodeIgniter\Controller;

class Catalogo_controller extends Controller
{

    public function __construct(){
        helper(['url', 'form']);
        //$db = \Config\Database::connect();
                     
      }

    public function index()
    {
        $productoModel = new Producto_model();
        $data['productos'] = $productoModel->where('eliminado', 'NO')->findAll();
        
        $categoriaModel = new categoria_model();
        $data['categorias'] = $categoriaModel->orderBy('id', 'DESC')->findAll();

        $dato['titulo']='Catalogo de productos'; 
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/catalogo_view', $data);
        echo view('front/footer_view');
    }
}