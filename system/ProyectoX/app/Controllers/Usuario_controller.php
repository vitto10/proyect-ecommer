<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
use CodeIgniter\Controller;
class Usuario_controller extends Controller{
    public function __construct(){
           helper(['form', 'url']);
    }
   
    public function create() {
        $data['title'] = "Registro"; 
        echo view('/front/head',$data);
        echo view('/front/nav');
        echo view('/back/usuarios/registro');
        echo view('/front/footer');
    }
 
    public function formValidation() {
        helper(['form', 'url']);
        
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);
        $formModel = new usuarios_model();
 
        if (!$input) {
               $data['title']='Registro'; 
                echo view('/front/head',$data);
                echo view('/front/nav');
                echo view('/back/usuarios/registro', ['validation' => $this->validator]);
                echo view('/front/footer');
        } else {
            $request = \Config\Services::request();
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email'  => $this->request->getVar('email'),
                'pass'  => $this->request->getVar('pass'),
            ]);
            $data['title'] = "Registro"; 
            return view('/front/head', $data).view('/back/usuarios/alertaExito').view('/front/nav').view('/front/principal').view('/front/footer');
        }
    }
}
