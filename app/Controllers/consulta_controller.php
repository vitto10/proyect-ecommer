<?php
namespace App\Controllers;
Use App\Models\consulta_model;
Use App\Models\productos_model;
use CodeIgniter\Controller;
class consulta_controller extends Controller{
    
    public function consulta(){
        $prodModel = new productos_model();
        $formModel = new consulta_model();
        $datos['consultas'] = $formModel->findAll();
        // Página de consultas admin, tabla con consultas
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Consultas";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/back/CRUD/consultas/crudConsulta', $datos).view('/front/footer');
    }
    public function consulta_user(){
        $prodModel = new productos_model();
        $formModel = new consulta_model();
        $datos['consultas'] = $formModel->findAll();
        // Página de consultas user, tabla con consultas
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Consultas";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/back/CRUD/consultas/consultasUser', $datos).view('/front/footer');
    }
    public function envio_consulta(){
        //helper(['form', 'url']);
        $prodModel = new productos_model();
        $formModel = new consulta_model();
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email',
            'descripcion'  => 'required|min_length[5]',
        ]);
        
        
        if (!$input) {
            $data['productos'] = $prodModel->findAll();
            $data['title']='Contacto';
            $data['nombre_user'] = session()->get('nombre');
            echo view('/front/head',$data);
            echo view('/front/nav', $data);
            echo view('/front/contacto', ['validation' => $this->validator]);
            echo view('/front/footer');
        } else {
        $formModel->save([
            'nombre' => $this->request->getVar('nombre'),
            'email'  => $this->request->getVar('email'),
            'descripcion'  => $this->request->getVar('descripcion'),
        ]);
        $session = session();
        $session->setFlashdata('msg', 'Consulta realizada con éxito!');
        return redirect()->to('/');
        }
    }
    public function responder($id=null){
        // Página Responder a usuario
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Respuesta";
        $data['nombre_user'] = session()->get('nombre');
        $formModel = new consulta_model();
        $datos['consultas'] = $formModel->where('id', $id)->first();
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/consultas/responder', $datos).view('/front/footer');
    }
    public function actualizar() {
        //helper(['form', 'url']);
        $formModel = new consulta_model();
        $id = $this->request->getVar('id');
        $input = $this->validate([
            'respuesta'   => 'required|min_length[5]',
            
        ]);
        if (!$input) {
            $session = session();
            $session->setFlashdata('msg', 'Revise la información!');
            return redirect()->back()->withInput();
        } else {
        
        $elem = [
            'respuesta' => $this->request->getVar('respuesta'),
            'respondido' => "SI"];

        $formModel->update($id, $elem);
        $session = session();
        $session->setFlashdata('msg', 'Respuesta realizada exitosamente!');
        return redirect()->to('/consulta-admin');
        }
    }
    public function respondidos(){
        $prodModel = new productos_model();
        $formModel = new consulta_model();
        $datos['consultas'] = $formModel->findAll();
        // Página de respuestas admin, tabla con respuestas
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Respondidos";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/back/CRUD/consultas/respondidos', $datos).view('/front/footer');
    }
}