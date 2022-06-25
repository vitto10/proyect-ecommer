<?php

namespace App\Controllers;
Use App\Models\productos_model;
class crud_prod_controller extends BaseController
{
    public function index()
    {
        $prodModel = new productos_model();
        $datos['productos'] = $prodModel->findAll();
        // Página muestra listado de productos
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "CRUD Productos";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/productos/crudProductos', $datos).view('/front/footer');
    }
    public function crear()
    {
        // Página Crear Producto
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Agregar producto";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/productos/crearProducto').view('/front/footer');
    }
    public function formValidation() {
        //helper(['form', 'url']);
        
        $input = $this->validate([
            'nombre_prod'   => 'required|min_length[3]',
            'id_categoria' => 'is_not_unique[categorias.id]',
            'precio_compra'    => 'required|numeric',
            'precio_venta'  => 'required|numeric',
            'stock' => 'required|numeric',
            'imagen' => 'uploaded[imagen]|max_size[imagen,4096]'
        ]);
        $formModel = new productos_model();
        if (!$input) {
                $data['productos'] = $formModel->findAll();
                $data['title']='Agregar producto'; 
                $data['nombre_user'] = session()->get('nombre');
                echo view('/front/head',$data);
                echo view('/front/nav',$data);
                echo view('/back/CRUD/productos/crearProducto', ['validation' => $this->validator]);
                echo view('/front/footer');
        } else {
            $img = $this->request->getFile('imagen');
            $nombreAleatorio = $img->getRandomName();
            $img->move('public/assets/uploads', $nombreAleatorio);

            $formModel->save([
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'id_categoria' => $this->request->getVar('id_categoria'),
                'precio_compra' => $this->request->getVar('precio_compra'),
                'precio_venta'  => $this->request->getVar('precio_venta'),
                'stock'  => $this->request->getVar('stock'),
                'imagen' => $nombreAleatorio
            ]);
            $session = session();
            $session->setFlashdata('msg', 'Producto añadido exitosamente!');
            return redirect()->to('/crud-prod');
        }
    }
    public function borrar($id=null){
        $prodModel = new productos_model();
        $datos = $prodModel->where('id', $id)->first();
        //Borrado lógico
        $prodModel->update($id,[
            'eliminado' => "SI"
        ]);
        //$prodModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('crud-prod'));
    }
    public function editar($id=null){
        // Página Actualizar Producto
        $prodModel = new productos_model();
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Editar producto";
        $data['nombre_user'] = session()->get('nombre');

        $datos['producto'] = $prodModel->where('id', $id)->first();

        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/productos/actualizarProducto', $datos).view('/front/footer');
    }
    public function Actualizar() {
        //helper(['form', 'url']);
        $formModel = new productos_model();
        $id = $this->request->getVar('id');
        $input = $this->validate([
            'nombre_prod'   => 'required|min_length[3]',
            'id_categoria' => 'is_not_unique[categorias.id]',
            'precio_compra'    => 'required|numeric',
            'precio_venta'  => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        if (!$input) {
            $session = session();
            $session->setFlashdata('msg', 'Revise la información!');
            return redirect()->back()->withInput();
        } else {
            $formModel->update($id,[
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'id_categoria' => $this->request->getVar('id_categoria'),
                'precio_compra' => $this->request->getVar('precio_compra'),
                'precio_venta'  => $this->request->getVar('precio_venta'),
                'stock'  => $this->request->getVar('stock')
            ]);
            $validar_img = $this->validate([
                'imagen' => [
                    'uploaded[imagen]'
                ]
            ]);
            if( $validar_img && $imagen=$this->request->getFile('imagen')){
                $datosProducto = $formModel->where('id',$id)->first();
                // Borrar imagen anterior
                $imagen_vieja = ('public/assets/uploads/'.$datosProducto['imagen']);
                unlink($imagen_vieja);
                // Guardar nueva imagen
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('public/assets/uploads', $nuevoNombre);
                $datos = ['imagen' => $nuevoNombre];
                $formModel->update($id,$datos);
            }
                $session = session();
                $session->setFlashdata('msg', 'Producto actualizado exitosamente!');
                return redirect()->to('/crud-prod');
        }       
    }
    public function Eliminados(){
        $prodModel = new productos_model();
        $datos['productos'] = $prodModel->findAll();
        // Página muestra listado de productos eliminados
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Productos Eliminados";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/CRUD/productos/productosEliminados', $datos).view('/front/footer');
    }
    public function Alta($id=null){
        $prodModel = new productos_model();
        $datos = $prodModel->where('id', $id)->first();
        //Alta producto
        $prodModel->update($id,[
            'eliminado' => "NO"
        ]);
        return $this->response->redirect(site_url('eliminados-prod'));
    }
}