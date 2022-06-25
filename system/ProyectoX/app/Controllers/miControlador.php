<?php

namespace App\Controllers;

class miControlador extends BaseController
{
    public function index()
    {
        return view('holaMundo');
    }
}