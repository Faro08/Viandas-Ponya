<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Usuarios_model;

class Login_controller extends BaseController
{

	public function index(){
        helper(['form', 'url']);
        $data['titulo']='Ingresar'; 
        echo view('Front/head_view',$data);
        echo view('Front/nav_view');
        echo view('Back/usuario/login');
        echo view('Front/footer_view');
	}

    public function auth()
    {
        $session = session();
        $model = new Usuarios_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['pass'];
            $baja = $data['baja'];
            if($baja == 'SI'){
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('');
            }
            $verify_pass = password_verify($password, $pass);
 
            if($verify_pass){
                $ses_data =[
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id'=> $data['perfil_id'],
                    'loged_in' => TRUE
                ];
                $session->set($ses_data);

                session()->setFlashdata('msg', 'Bienvenido!');
                return redirect()->to('');
                /* return redirect()->to('/welcome'); */
            }else{
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
                /* return redirect()->to('/welcome'); */
            }
        }else{
            $session->setFlashdata('msg', 'No existe el usuario o email incorrecto');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('');
    }
}