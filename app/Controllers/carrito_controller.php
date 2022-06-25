<?php

namespace App\Controllers;
Use App\Models\productos_model;
class carrito_controller extends BaseController
{
    public function index()
    {
        
        $prodModel = new productos_model();
        $datos['productos'] = $prodModel->findAll();
        // Página muestra el carrito
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Carrito";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('back/carrito', $datos);
    }
    public function agregarProd()
    {
        if(!session()->get('isLoggedIn')) {
            // se lo redirecciona al login
            return redirect()->to('/login'); 
        }else{
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        //Se accede al stock del producto
        $nombre = $request->getPost('nombre_prod');
        $prodModel = new productos_model();
        $datos['producto'] = $prodModel->where('nombre_prod', $nombre)->first();
        $stock = $datos['producto']['stock'];

        if($stock <= $datos['producto']['min_stock']){
            $session = session();
            $session->setFlashdata('msg', 'No existe stock disponible del producto por el momento.');
            return redirect()->to('/catalogo');
        } else{
        $cart->insert(array(
            'id'    =>  $request->getPost('id'),
            'qty'   =>  1,
            'price' =>  $request->getPost('precio_venta'),
            'name'  =>  $request->getPost('nombre_prod'),
        ));
        return redirect('carrito');
            }
        }
    }
    public function actualizarCarrito($id=null){
        //Para actualizar la cantidad
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        //Se accede al stock del producto
        $prodModel = new productos_model();
        $datos['producto'] = $prodModel->where('id', $id)->first();
        $stock = $datos['producto']['stock'];
        
        foreach($cart->contents() as $prod){
            //Si se encuentra el producto se aumenta la cantidad en uno
            if($id === $prod['id']){
                $cantidad = $prod['qty'];
            }
        }

        if($stock - $cantidad <= $datos['producto']['min_stock']){
            $session = session();
            $session->setFlashdata('msg', 'No existe más stock disponible del producto por el momento.');
            return redirect()->to('/carrito');
        } else {
        foreach($cart->contents() as $prod){
            //Si se encuentra el producto se aumenta la cantidad en uno
            if($id === $prod['id']){
                $cart->update(array(
                    'rowid'    => $prod['rowid'],
                    'qty'   =>  $prod['qty']+1,
                ));
            }
            }
        }   
        return redirect('carrito');
    }
    public function restarCantidad($id=null){
        //Para actualizar la cantidad
        $cart = \Config\Services::cart();
        
        foreach($cart->contents() as $prod){
            //Si se encuentra el producto y la cantidad es mayor a 0, se disminuye la cantidad en uno
            if($id === $prod['id'] and $prod['qty'] > 1){
                $cart->update(array(
                    'rowid'    => $prod['rowid'],
                    'qty'   =>  $prod['qty']-1,
                ));
            }
        }   
        return redirect('carrito');
    }
    public function borrar_carrito()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect('carrito');
    }
    public function borrar_prod_carrito($id=null)
    {   
        $cart = \Config\Services::cart();
        //Se recorre los productos
        foreach($cart->contents() as $prod){
            //Si se encuentra el producto se lo remueve
            if($id === $prod['id']){
                $cart->remove($prod['rowid']);
            }
        }
        return redirect('catalogo');
    }
}