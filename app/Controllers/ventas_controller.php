<?php

namespace App\Controllers;
Use App\Models\usuarios_model;
Use App\Models\productos_model;
Use App\Models\ventas_user_model;
Use App\Models\ventas_prod_model;
class ventas_controller extends BaseController
{
    public function index(){
        $formModel = new ventas_user_model();
        $prodModel = new productos_model();
        /*  ME BORRABA EL ID_FACTURA, id DE VENTAS_RESUMEN
        $formModel->join('usuarios', 'usuarios.id = ventas_resumen.id_usuario');
        $datos['ventas'] = $formModel->findAll();
        print_r($datos);
        */
        $datos['ventas'] = $formModel->findAll();
        $formModel1 = new usuarios_model();
        $datos['user'] = $formModel1->findAll();
        // Página de resumenes de ventas
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Ventas";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/back/CRUD/ventas/crudVentas', $datos).view('/front/footer');
    }
    public function vistaDetalle($id=null){
        $prodModel = new productos_model();
        $formModel = new ventas_prod_model();
        //Se genera el modelo con las tablas: venta_producto, ventas_resumen, usuarios y productos
        $formModel->join('ventas_resumen', 'ventas_resumen.id = venta_producto.id_factura')
                    ->join('usuarios', 'usuarios.id = ventas_resumen.id_usuario')
                    ->join('productos', 'productos.id = venta_producto.id_producto');
        $datos = $formModel->findAll();

        foreach($datos as $elem ){
            //Si id_facturas es igual al id de la tabla ventas_resumen
            if($elem['id_factura'] === $id){
                $datos['ventas'] []= $elem ;
            }
        }
        // PARA QUE EL USUARIO SOLO PUEDA ACCEDER A SU FACTURA Y NO A LA DE OTRA PERSONA
        
        if($datos['ventas'][0]['email'] != session()->get('email') and session()->get('perfil_id') == 1){
            return redirect()->back();
        }
        // Página de detalles de la venta
        $data['productos'] = $prodModel->findAll();
        $data['title'] = "Detalles";
        $data['nombre_user'] = session()->get('nombre');
        return view('/front/head', $data).view('/front/nav', $data).view('/back/CRUD/ventas/crudDetalle', $datos).view('/front/footer');
    }
    public function envio_compra(){
        $cart = \Config\Services::cart();
        //Guardar en la tabla ventas_resumen
        $formModel = new ventas_user_model();
        $formModel->save([
            'id_usuario' => $this->request->getVar('id_user'),
            'importeTotal' => $this->request->getVar('importeTotal')
        ]);

        $arrayResumenes = $formModel->findAll();
        //Guardar en la tabla venta_producto
        $formModel1 = new ventas_prod_model();
        
        //Se guardaran tantos registros como productos haya
        $cantProductos = $this->request->getVar('contador');
        for($j = 1; $j < $cantProductos; $j++){
            $formModel1->save([
                'id_factura' => end($arrayResumenes)['id'], //se obtiene el id del último resumen
                'id_producto' => $this->request->getVar($j.'prod'),
                'cantidad' => $this->request->getVar($j.'cantidad'),
                'subtotal' => $this->request->getVar($j.'subtotal')
            ]);

        }
        //Cargo modelo para actualizar el stock
        $prodModel = new productos_model();
        for($j = 1; $j < $cantProductos; $j++){
           
            $id = $this->request->getVar($j.'prod');
            $datos['producto'] = $prodModel->where('id', $id)->first();
            $stock = $datos['producto']['stock'] - $this->request->getVar($j.'cantidad');
            $prodModel->update($id,[
                'stock' => $stock
            ]);
        }
        $cart->destroy();
        $session = session();
        $session->setFlashdata('msg', 'Compra realizada con éxito!');
        return redirect('catalogo');
    }
}