<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function prueba()
    {
        return view('welcome_message');
    }
    public function index()
    {
        /* Página de inicio */
        $data['title'] = "Inicio";
        return view('/front/head', $data).view('/front/nav').view('/front/principal').view('/front/footer');
    }
    public function contacto()
    {
        $data['title'] = "Contacto";
        return view('/front/head', $data).view('/front/nav').view('/front/contacto').view('/front/footer');
    }
    public function nosotros()
    {
        $data['title'] = "Nosotros";
        return view('/front/head', $data).view('/front/nav').view('/front/nosotros').view('/front/footer');
    }
    public function comercializacion()
    {
        $data['title'] = "Preguntas frecuentes";
        return view('/front/head', $data).view('/front/nav').view('/front/faq').view('/front/footer');
    }
    public function terminos()
    {
        $data['title'] = "Términos y Usos";
        return view('/front/head', $data).view('/front/nav').view('/front/terminos').view('/front/footer');
    }
}
