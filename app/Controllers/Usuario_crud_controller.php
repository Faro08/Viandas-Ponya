<?php 
namespace App\Controllers;
use App\Models\usuarios_Model;
use App\Models\consulta_Model;
Use App\Models\perfil_model;
use CodeIgniter\Controller;

class Usuario_crud_controller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
        //$db = \Config\Database::connect();
                     
      }

    // show users list
    public function index(){
        $userModel = new usuarios_model();
        $perfilModel = new perfil_model();
        $data['usuarios'] = $userModel->orderBy('id', 'DESC')->findAll();
        $data['perfiles'] = $perfilModel->orderBy('id', 'DESC')->findAll();

         $dato['titulo']='Crud_usuarios'; 
         echo view('front/head_view', $dato);
         echo view('front/nav_view');
         echo view('back/usuario/crud_usuarios_view',$data);
         echo view('front/footer_view');
    }
    // form creacion usuario
    public function create(){
        $perfilModel = new perfil_model();
        //traer perfiles de la bd
        $data['perfiles'] = $perfilModel->getPerfiles();
        $userModel = new usuarios_model();
        $data['user_obj'] = $userModel->orderBy('id', 'DESC')->findAll();
      
         $dato['titulo']='Alta Usuario'; 
        echo view('front/head_view',$dato);
        echo view('front/nav_view');
         echo view('back/usuario/alta_usuario_view',$data);
          echo view('front/footer_view');
    }
 
    // insert data
    public function store() {
        
        $userModel = new usuarios_model();
        $perfilesModel = new perfil_model();
        $data['perfiles'] = $perfilesModel->getPerfiles();

        /* validacion inputs */
        $input = $this->validate([
            'perfil'=>'is_not_unique[perfiles.id]',
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'direccion' => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);
        
 
        if (!$input) {
               $data['titulo']='Modificacion'; 
                echo view('front/head_view',$data);
                echo view('front/nav_view');
                echo view('back/usuario/usuario_crud_view', [
                'validation' => $this->validator
            ]);
        } else {
           
        $data = [
                'perfil_id' => $this->request->getVar('perfil'),
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'direccion' => $this->request->getVar('direccion'),
                'usuario' => $this->request->getVar('usuario'),
                'email'  => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
               
              //  'pass'  => $this->request->getVar('pass'),
            ];  
             $userModel->insert($data);
             return $this->response->redirect(site_url('crud-usuarios'));
        }
    
   }
    // show single user
    public function singleUser($id = null){
         $userModel = new Usuarios_Model();
         $data['user_obj'] = $userModel->where('id', $id)->first();
         $perfilModel = new perfil_model();
         $data['perfiles'] = $perfilModel->getPerfiles();
        $dato['titulo']='Modificar Usuario'; 
         echo view('front/head_view', $dato);
         echo view('front/nav_view');
         echo view('back/usuario/edit_usuario', $data);
         echo view('front/footer_view');
    }
    // update user data
    public function update(){
        $userModel = new Usuarios_Model();
        $id = $this->request->getVar('id');
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email'  => $this->request->getVar('email'),
            'direccion'  => $this->request->getVar('direccion'),
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('crud-usuarios'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new Usuarios_Model();
        $data['usuario'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('crud-usuarios'));
    } 
    //delete lógico (cambia el estado del campo baja)   
    public function deletelogico($id = null)
    {
        $userModel = new Usuarios_Model();
        $data['baja'] = $userModel->where('id', $id)->first();
        $data['baja'] = 'SI';
         $userModel->update($id, $data);
        return $this->response->redirect(site_url('crud-usuarios'));
    }    

    public function eliminados()
      {
          $usuarioModel = new usuarios_model();
          $data['usuarios'] = $usuarioModel->orderBy('id', 'DESC')->findAll();
          $dato['titulo']='Usuarios eliminados';
          echo view('front/head_view', $dato);
          echo view('front/nav_view');
          echo view('back/usuario/usuarios_baja', $data);
          echo view('front/footer_view');
    }

     public function activarusuario($id)
        {
          $usuarioModel = new usuarios_model();
          $data['baja'] = $usuarioModel->where('id', $id)->first();
          $data['baja'] = 'NO';
          $usuarioModel->update($id, $data);
         return $this->response->redirect(site_url('crud-usuarios'));
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

    public function atender_consulta($id = null){
       
        $consultasM = new consulta_model();
        // traigo consulta por id
        $consultasM->getConsulta($id);
        // actualizo el estado de la consulta
        $consultasM->update($id, ['leida' => 'SI']);
        // redirecciona al metodo de el controllador
        return redirect()->to(base_url('listar_consultas'));
    }

    public function eliminar_consulta($id = null){
        // instancio el modelo de consultas
        $model = new consulta_model();
        // traigo consulta por id
        $model->getConsulta($id);
        // elimino la consulta
        $model->delete($id);
        // redirecciona al metodo de el controllador
        return redirect()->to(base_url('listar_consultas'));
    }
}