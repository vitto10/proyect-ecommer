<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
Use App\Models\productos_model;
use CodeIgniter\Controller;
class Usuario_controller extends Controller{
    public function __construct(){
           helper(['form', 'url']);
    }
   
    public function create() {
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Registro"; 
        echo view('/front/head',$data);
        echo view('/front/nav',$data);
        echo view('/back/usuarios/registro');
        echo view('/front/footer');
    }
 
    public function formValidation() {
        //helper(['form', 'url']);
        
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]',
            'passconf' => 'required|matches[pass]'
        ]);
        $formModel = new usuarios_model();
        $prodModel = new productos_model();
        if (!$input) {
                $data['productos'] = $prodModel->findAll();
                $data['title']='Registro'; 
                echo view('/front/head',$data);
                echo view('/front/nav', $data);
                echo view('/back/usuarios/registro', ['validation' => $this->validator]);
                echo view('/front/footer');
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email'  => $this->request->getVar('email'),
                'pass'  => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id' => "1"
            ]);
            $session = session();
            $session->setFlashdata('msg', 'Registrado con éxito!');
            return redirect('/');
        }
    }
}
