<?php
namespace App\Controllers;
Use App\Models\producto_model;
Use App\Models\usuarios_model;
Use App\Models\ventas_cabecera_model;
Use App\Models\ventas_detalle_model;
Use App\Models\categoria_model;
use CodeIgniter\Controller;

class Producto_controller extends Controller
{
   public function __construct(){
      helper(['url', 'form']);
      //$db = \Config\Database::connect();
                   
    }
    // mostrar los productos en lista
    public function index()
    {
        $productoModel = new producto_model();
        $data['productos'] = $productoModel->orderBy('id', 'DESC')->findAll();
      
        $dato['titulo']='Crud_productos'; 
          echo view('front/head_view', $dato);
          echo view('front/nav_view');
          echo view('back/productos/producto_nuevo_view', $data);
          echo view('front/footer_view');
    }
   
    public function creaproducto(){
   
      $categoriasmodel = new categoria_model();
      // traer todas las categorias desde la db
      $data['categorias'] = $categoriasmodel->getCategorias();
    
      $productoModel = new producto_model();
      $data['obj'] = $productoModel->orderBy('id', 'DESC')->findAll();
      
      $dato['titulo']='Alta producto'; 
      echo view('front/head_view',$dato);
      echo view('front/nav_view');
      echo view('back/productos/alta_producto_view',$data);
      echo view('front/footer_view');
    }
    
    public function store() {
      $categoriasmodel = new categoria_model();
      $data['categorias'] = $categoriasmodel->getCategorias();

       $input = $this->validate([
                        
            'nombre_producto' =>'required|min_length[2]',
            'categoria'=>'is_not_unique[categorias.id]',
            'costo'  => 'required',
            'precio_venta'  => 'required',
            'stock'  => 'required',
            'stock_min' => 'required'
          ]);
        
        $productoModel = new producto_model();
 
        /* if (!$input) {
               $dato['titulo']='Alta'; 
                echo view('front/head_view',$dato);
                echo view('front/nav_view');
                echo view('back/productos/alta_producto_view', $data,  [
                'validation' => $this->validator
            ]);
        } else { */
          
              $img = $this->request->getFile('imagen');
              $nombre_aleatorio = $img->getRandomName();
              $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

              $data = [
                   'nombre_producto' => $this->request->getVar('nombre'),
                   'imagen' => $img->getName(),
                    // completar con los demas campos
                    'categoria_id' => $this->request->getVar('categoria'),
                    'costo' => $this->request->getVar('costo'),
                    'precio_venta' => $this->request->getVar('precio_venta'),
                    'stock' => $this->request->getVar('stock'),
                    'stock_min' => $this->request->getVar('stock_min'),
                     //'eliminado' => NO
            ];
           
              $producto = new producto_model();
              $producto->insert($data);
             
              return $this->response->redirect(site_url('crear'));

        /* } */
    }
        
    // show single producto
    public function singleproducto($id = null){
        
        $productoModel = new producto_model();
        $data['old'] = $productoModel->where('id', $id)->first();

         if (empty($data['old'])) {
            // lanzar error
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encuentra el producto seleccionado');
            }
         // instancio el modelo de categorias
        $categoriasM = new categoria_model();
        // traer todas las categorias desde la db
        $data['categorias'] = $categoriasM->getCategorias();
        
        $dato['titulo']='Crud_productos'; 
         echo view('front/head_view', $dato);
         echo view('front/nav_view');
         echo view('back/productos/edit', $data);
         echo view('front/footer_view');
    }

        // update de productos (modificacion)
    public function modifica($id){
        $productoModel = new producto_model();
        $id = $productoModel->where('id', $id)->first();

         $img = $this->request->getFile('imagen');
         $nombre_aleatorio = $img->getRandomName();
         $img->move(ROOTPATH.'assets/uploads',$nombre_aleatorio);

         //$productoModel->update($id, ['imagen' => $nombre_aleatorio)]);

         $data = [
                   'nombre_producto' => $this->request->getVar('nombre_producto'),
                    'imagen' => $img->getName(),
                    // completar con los demas campos
                    'categoria_id' => $this->request->getVar('categoria'),
                    'costo' => $this->request->getVar('costo'),
                    'precio_venta' => $this->request->getVar('precio_venta'),
                    'stock' => $this->request->getVar('stock'),
                    'stock_min' => $this->request->getVar('stock_min'),
                   // 'eliminado' => 'NO',
            ];
        
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('crear'));
    } 
    //eliminar lógicamente 
      public function deleteproducto($id)
        {
          $productoModel = new producto_model();
          $data['eliminado'] = $productoModel->where('id', $id)->first();
          $data['eliminado'] = 'SI';
          $productoModel->update($id, $data);
         return $this->response->redirect(site_url('crear'));
    }  

      public function eliminados()
      {
      
          $productoModel = new producto_model();
          $data['productos'] = $productoModel->orderBy('id', 'DESC')->findAll();
          $dato['titulo']='Crud_productos'; 
          echo view('front/head_view', $dato);
          echo view('front/nav_view');
          echo view('back/productos/producto_eliminado', $data);
          echo view('front/footer_view');
    }

     public function activarproducto($id)
        {
          $productoModel = new producto_model();
          $data['eliminado'] = $productoModel->where('id', $id)->first();
          $data['eliminado'] = 'NO';
          $productoModel->update($id, $data);
         return $this->response->redirect(site_url('crear'));
      }

     public function listar_ventas()
      { 
          
      $dato = array('titulo' => 'Ventas');
     $producto = new producto_model();
    
     $producto = $producto->findAll();
   $query=  $producto->join('productos', 'productos.categoria_id=categorias.id');
    $query   = $producto->get();

     // return json_encode($query->getResult());
        // $productoModel = new producto_model();
         $ventas = new Ventas_cabecera_model();
       $data = array('ventas_cabecera' => $this->producto_model->get_ventas_cabecera());

          echo view('front/head_view',$dato);
          echo view('front/nav_view');
          echo view('back/productos/muestraventas', $ventas);
          echo view('front/footer_view');
          
         }
        
        
      public  function muestra_detalle($id)
    {
             if($this->_veri_log()){
      $data = array('titulo' => 'Detalle');
    
      $session_data = $this->session->userdata('logged_in');
      $data['perfil_id'] = $session_data['perfil_id'];
      $data['nombre'] = $session_data['nombre'];
                 
      $dat = array('ventas_detalle' => $this->producto_model->get_ventas_detalle($id));

      $this->load->view('front/head_view', $data);
      $this->load->view('front/menu_view2', $data);
      $this->load->view('productos/muestradetalle', $dat);
      $this->load->view('front/footer_view');
            }else{
      redirect('login', 'refresh');
            }
        }
}