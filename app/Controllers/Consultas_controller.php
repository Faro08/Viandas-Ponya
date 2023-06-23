<?php 
namespace App\Controllers;
use App\Models\consulta_Model;
use CodeIgniter\Controller;

class Consultas_controller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
        //$db = \Config\Database::connect();
                     
      }
      
    /* CONSULTAS */

    public function listar_consultas(){
        // instancio el modelo de consultas
        $consultas = new consulta_model();
        // traer todos los consultas activas desde la db
        $data['consultas'] = $consultas->getConsultas();
        $dato['titulo']='Consultas'; 
    
        echo view('front/head_view', $dato);
         echo view('front/nav_view');
         echo view('back/consultas/consultas_view', $data);
         echo view('front/footer_view');

            }

    public function post_consulta(){
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|',
            'mensaje'  => 'required|min_length[3]|max_length[300]'
            
        ],
    );
        $consultaModel = new consulta_model();
        if (!$input) {
            $data['titulo']='Contacto'; 
             echo view('Front/head_view',$data);
             echo view('Front/nav_view');
             //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
             echo view('Front/contact_us', ['validation' => $this->validator]);
             echo view('Front/footer_view');

     } else {
         $data =[
             'nombre' => $this->request->getVar('nombre'),
             'email'=> $this->request->getVar('email'),
             'mensaje'=> $this->request->getVar('mensaje')

           //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
         ];  
           //return $this->response->redirect(site_url(''));

         // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            $consultaModel->insert($data);
            session()->setFlashdata('success', 'Consulta enviada');
            return $this->response->redirect(base_url('contact'));
   
     }
    }

    public function atender_consulta($id){
        $consultaModel = new consulta_model();
        $data['leida'] = $consultaModel->where('id', $id)->first();
        $data['leida'] = 'SI';
        $consultaModel->update($id, $data);
        return redirect()->to(base_url('consultas'));
    }

    /* public function eliminar_consulta($id = null){
        // instancio el modelo de consultas
        $model = new consulta_model();
        // traigo consulta por id
        $model->getConsulta($id);
        // elimino la consulta
        $model->delete($id);
        // redirecciona al metodo de el controllador
        return redirect()->to(base_url('consultas_view'));
    } */
}