<?php

namespace App\Controllers;
Use App\Models\productos_model;
Use App\Models\categorias_model;
class catalogo_controller extends BaseController
{
public function catalogo()
    {
        // Página de catálogos
        // el título depende de la categoria
        $prodModel = new productos_model();
        $categoria = $this->request->getVar('categor');
        if($categoria != null){
            
            // Por defecto se ordena aleatorio
            $datos['productos'] = $prodModel->where('id_categoria', $categoria)->orderBy('precio_venta','RANDOM')->findAll(); //filtro
            
            switch($datos['productos'][0]['id_categoria']){
                case 1:
                    $datos['categoria'] = "Auriculares";
                    break;
                case 2:
                    $datos['categoria'] = "Mouses";
                    break;
                case 3:
                    $datos['categoria'] = "Teclados";
                    break;
                case 4:
                    $datos['categoria'] = "Gabinetes";
                    break;
                case 5:
                    $datos['categoria'] = "Memorias Flash";
                    break;
                case 6:
                    $datos['categoria'] = "Cables y Adaptadores";
                    break;    
            }
            // titulo
            $data['productos'] = $prodModel->findAll();
            $data['title'] = $datos['categoria'];
            $data['nombre_user'] = session()->get('nombre');
            return view('/front/head', $data).view('/front/nav', $data).view('/front/catalogo', $datos).view('/front/footer');
        
        } else {
            // Por defecto se ordena aleatorio
            $datos['productos'] = $prodModel->orderBy('precio_venta','RANDOM')->findAll(); //filtro
            // titulo
            $data['productos'] = $prodModel->findAll();
            $data['title'] = "Productos";
            $data['nombre_user'] = session()->get('nombre');
            return view('/front/head', $data).view('/front/nav', $data).view('/front/catalogo', $datos).view('/front/footer');
        }
    }
    public function ordenar(){
        $prodModel = new productos_model();
        $categoria = $this->request->getVar('categor');
        $respuesta = $this->request->getVar('var');
        if($categoria == null){
            if($respuesta == 'mayor'){
                $datos['productos'] = $prodModel->orderBy('precio_venta','DESC')->findAll(); //filtro
            }
            elseif($respuesta == 'menor'){
                $datos['productos'] = $prodModel->orderBy('precio_venta','ASC')->findAll(); //filtro
            }
            else{
                $datos['productos'] = $prodModel->orderBy('precio_venta','RANDOM')->findAll(); //filtro
            }
            $data['productos'] = $prodModel->findAll();
            $data['title'] = "Productos";
            $data['nombre_user'] = session()->get('nombre');
            return view('/front/head', $data).view('/front/nav', $data).view('/front/catalogo', $datos).view('/front/footer');
        } else{
            
            if($respuesta == 'mayor'){
                $datos['productos'] = $prodModel->where('id_categoria', $categoria)->orderBy('precio_venta','DESC')->findAll(); //filtro
            }
            elseif($respuesta == 'menor'){
                $datos['productos'] = $prodModel->where('id_categoria', $categoria)->orderBy('precio_venta','ASC')->findAll(); //filtro
            }
            else{
                $datos['productos'] = $prodModel->where('id_categoria', $categoria)->orderBy('precio_venta','RANDOM')->findAll(); //filtro
            }
            switch($datos['productos'][0]['id_categoria']){
                case 1:
                    $datos['categoria'] = "Auriculares";
                    break;
                case 2:
                    $datos['categoria'] = "Mouses";
                    break;
                case 3:
                    $datos['categoria'] = "Teclados";
                    break;
                case 4:
                    $datos['categoria'] = "Gabinetes";
                    break;
                case 5:
                    $datos['categoria'] = "Memorias Flash";
                    break;
                case 6:
                    $datos['categoria'] = "Cables y Adaptadores";
                    break;    
            }
            $data['productos'] = $prodModel->findAll();
            $data['title'] = $datos['categoria'];
            $data['nombre_user'] = session()->get('nombre');
            return view('/front/head', $data).view('/front/nav', $data).view('/front/catalogo', $datos).view('/front/footer');
        }
    }
    public function verProducto($id=null){
        $prodModel = new productos_model();
        $datos['productos'] = $prodModel->where('id', $id)->findAll();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = $datos['productos'][0]['nombre_prod'];
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/front/verProducto', $datos).view('/front/footer');
    }
}