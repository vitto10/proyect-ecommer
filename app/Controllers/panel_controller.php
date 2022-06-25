<?php 
namespace App\Controllers;
Use App\Models\Usuarios_model;
Use App\Models\productos_model;
use CodeIgniter\Controller;
  
class panel_controller extends Controller
{
    public function index()
    {
        $session = session();
        $data['nombre_user'] = $session->get('nombre');
        $data['title'] = "Dashboard";
        $bienvenida = "Bienvenido, ".ucfirst($session->get('nombre'));
        $session->setFlashdata('msg', $bienvenida);
        return redirect('/');
    }
    public function cuenta(){
        $prodModel = new productos_model();
        $userModel = new usuarios_model();
        $session = session();
        $datos['usuario'] = $userModel->where('id', $session->get('id'))->first();
        $data['productos'] = $prodModel->findAll();
        $data['nombre_user'] = $session->get('nombre');
        $data['title'] = "Mi cuenta";
        return view('/front/head', $data).view('/front/nav', $data).view('back/usuarios/miCuenta', $datos).view('/front/footer');
    }
}