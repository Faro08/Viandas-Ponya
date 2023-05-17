<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Usuarios_model;

class Usuario_controller extends Controller{

	public function __construct(){
           helper(['form', 'url']);

	}
    public function create() {
        
         $data['titulo']='Registro'; 
         echo view('Front/head_view',$data);
         echo view('Front/nav_view');
         echo view('Back/usuario/registro');
         echo view('Front/footer_view');
      }
 
    public function formValidation() {
             
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]',
            'direccion'     => 'required|min_length[3]|max_length[50]'
        ],
        
       );
        $formModel = new Usuarios_model();
     
        if (!$input) {
               $data['titulo']='Registro'; 
                echo view('Front/head_view',$data);
                echo view('Front/nav_view');
                //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                echo view('back/usuario/registro', ['validation' => $this->validator]);
                echo view('Front/footer_view');

        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido'=> $this->request->getVar('apellido'),
                'usuario'=> $this->request->getVar('usuario'),
                'email'=> $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'direccion'=> $this->request->getVar('direccion')

              //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);  
              //return $this->response->redirect(site_url(''));

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
               session()->setFlashdata('success', 'Usuario registrado con exito');
               return $this->response->redirect(base_url('/register'));
      
        }
    }
}