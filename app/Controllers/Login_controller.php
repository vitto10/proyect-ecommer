<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
Use App\Models\productos_model;
use CodeIgniter\Controller;
class Login_controller extends Controller{
    public function __construct(){
        helper(['form']);
    }
   
    public function login() {
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "login";
        echo view('/front/head',$data);
        echo view('/front/nav',$data);
        echo view('/back/usuarios/login');
        echo view('/front/footer');
    }

    public function loginAuth() {
        $session = session();
        $userModel = new usuarios_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['pass'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'perfil_id' => $data['perfil_id'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                //Bienvenida
                $mensaje = "Bienvenido, ".$session->get('nombre');
                $session->setFlashdata('msg', $mensaje);
                return redirect()->to('/panel');
            
            }else{
                $session->setFlashdata('msg', 'Contraseña incorrecta.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'El usuario ingresado no existe.');
            return redirect()->to('/login');
        }
    }
    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}