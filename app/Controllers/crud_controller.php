<?php

namespace App\Controllers;
Use App\Models\Usuarios_model;
Use App\Models\productos_model;
class crud_controller extends BaseController
{
    public function index()
    {
        $prodModel = new productos_model();
        $userModel = new usuarios_model();
        $datos['usuarios'] = $userModel->findAll();
        // Página muestra listado de usuarios
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "CRUD usuarios";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/usuarios/crudUsuarios', $datos).view('/front/footer');
    }
    public function crear()
    {
        // Página Crear Usuario
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Creación usuario";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/usuarios/crearUsuario').view('/front/footer');
    }
    public function formValidation() {
        //helper(['form', 'url']);
        
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'perfil_id' => 'required|numeric|is_not_unique[perfiles.id]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);
        $formModel = new usuarios_model();
        $prodModel = new productos_model();
        if (!$input) {
                $data['productos'] = $prodModel->findAll();
                $data['title']='Creación usuario'; 
                $data['nombre_user'] = session()->get('nombre');
                echo view('/front/head',$data);
                echo view('/front/nav');
                echo view('/back/CRUD/usuarios/crearUsuario', ['validation' => $this->validator]);
                echo view('/front/footer');
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email'  => $this->request->getVar('email'),
                'pass'  => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id' => $this->request->getVar('perfil_id')
            ]);
            $session = session();
            $session->setFlashdata('msg', 'Usuario creado exitosamente!');
            return redirect()->to('/crud-user');
        }
    }
    public function borrar($id=null){
        $userModel = new usuarios_model();
        $datos = $userModel->where('id', $id)->first();
        //Borrado lógico
        $userModel->update($id,[
            'baja' => "SI"
        ]);
        //$userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('crud-user'));
    }
    public function editar($id=null){
        // Página Actualizar Usuario
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Editar usuario";
        $data['nombre_user'] = session()->get('nombre');

        $userModel = new usuarios_model();
        $datos['usuario'] = $userModel->where('id', $id)->first();

        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/usuarios/actualizarUsuario', $datos).view('/front/footer');
    }
    public function Actualizar() {
        //helper(['form', 'url']);
        $formModel = new usuarios_model();
        $id = $this->request->getVar('id');
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email',
            'usuario'  => 'required|min_length[3]',
            'perfil_id' => 'required|numeric|is_not_unique[perfiles.id]',
        ]);
        if (!$input) {
            $session = session();
            $session->setFlashdata('msg', 'Revise la información!');
            return redirect()->back()->withInput();
        } else {

        $formModel->update($id,[
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email'  => $this->request->getVar('email'),
            'perfil_id' => $this->request->getVar('perfil_id')
        ]);
        $session = session();
        $session->setFlashdata('msg', 'Usuario actualizado exitosamente!');
        return redirect()->to('/crud-user');
        }
    }
    public function Eliminados(){
        $prodModel = new productos_model();
        $userModel = new usuarios_model();
        $datos['usuarios'] = $userModel->findAll();
        // Página muestra listado de usuarios ELIMINADOS
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Usuarios Eliminados";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/usuarios/usuariosEliminados', $datos).view('/front/footer');
    }
    public function alta($id=null){
        $userModel = new usuarios_model();
        $datos = $userModel->where('id', $id)->first();
        //Alta usuario
        $userModel->update($id,[
            'baja' => "NO"
        ]);
        return $this->response->redirect(site_url('eliminados-user'));
    }
}