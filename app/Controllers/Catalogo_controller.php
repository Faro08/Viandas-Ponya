<?php
namespace App\Controllers;
Use App\Models\producto_model;
Use App\Models\categoria_model;
use CodeIgniter\Controller;

class Catalogo_controller extends Controller
{
    public function index()
    {
        $productoModel = new Producto_model();
        $data['productos'] = $productoModel->where('eliminado', 'NO')->findAll();

        // Configura la biblioteca de paginación
        $pagConfig = [
            'baseURL' => site_url('producto_controller/index'),
            'totalRows' => count($data['productos']), // Total de filas
            'perPage' => 10, // Número de filas por página
            'uriSegment' => 3, // Segmento de URI que contiene el número de página
            'numLinks' => 2, // Número de enlaces de paginación a mostrar
            // Otras configuraciones opcionales que desees utilizar
        ];

        // Carga la biblioteca de paginación
        $pager = \Config\Services::pager(null, null, false);
        $pager->setSegment(3); // Configura el segmento de URI para la paginación
        $pager->setPath('producto_controller/index'); // Configura el path base para los enlaces de paginación

        // Obtiene los productos para la página actual utilizando la biblioteca de paginación
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['productos'] = $productoModel->where('eliminado', 'NO')->findAll($pagConfig['perPage'], ($page - 1) * $pagConfig['perPage']);

        // Genera los enlaces de paginación
        $data['pagination'] = $pager->makeLinks($page, $pagConfig['perPage'], $pagConfig['totalRows']);

        // Carga las vistas necesarias
        $dato['titulo']='Catalogo productos'; 
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/catalogo_view', $data);
        echo view('front/footer_view');
    }
}