<?php

namespace App\Controllers;
Use App\Models\productos_model;
class Home extends BaseController
{
    public function prueba()
    {
        return view('welcome_message');
    }
    public function index()
    {
        //Productos en oferta (aleatorios)
        $prodModel = new productos_model();
        $datosx = $prodModel->orderBy('precio_venta','RANDOM')->findAll();
        for($i = 1; $i <= 4; $i++){
            $datos['productos'] [] = $datosx[$i];
        }
        //Obtener array de todos los productos para el nav (buscador)
        $data['productos'] = $prodModel->findAll();
        // Página de inicio
        $data['title'] = "Inicio";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/principal', $datos).view('/front/footer');
    }
    public function contacto()
    {
        // Página Contacto
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Contacto";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/contacto').view('/front/footer');
    }
    public function nosotros()
    {
        // Página Nosotros
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Nosotros";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/nosotros').view('/front/footer');
    }
    public function comercializacion()
    {
        // Página de preguntas frecuentes
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Preguntas frecuentes";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/faq').view('/front/footer');
    }
    public function terminos()
    {
        // Página Términos y Usos
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Nosotros";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/terminos').view('/front/footer');
    }
    public function construccion()
    {
        // Página En construcción
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "En construcción";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/construccion').view('/front/footer');
    }
}