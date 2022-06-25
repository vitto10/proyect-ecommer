<?php 
helper(['form', 'url']);
$cart = \Config\Services::cart();

if($cart->contents() == null){
        ?>
        <h2 class="text-center text-light mb-3">Carrito de compras</h2>
        <br>
        <p class="text-center text-light mb-5">No hay productos en el carrito.</p>
<?php 
}
else{
echo form_open('enviar-compra'); ?>

<table cellpadding="6" cellspacing="3" style="width:80%" border="0" class="table table-bordered table-responsive container bg-light">
<tr class="text-center">
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Sub-Total</th>
        <th>Borrar producto</th>
</tr>
<?php $i = 1; ?>
<?php foreach ($cart->contents() as $items): 
        //echo form_hidden($i.'[rowid]', $items['rowid']);
        foreach ($productos as $producto){
                if($producto['nombre_prod'] === $items['name']){
                        echo form_hidden($i.'prod', $producto['id']);
                };
        }
        
        echo form_hidden($i.'cantidad', $items['qty']);
        echo form_hidden($i.'subtotal', $items['subtotal']);
        
        ?>
        <tr class="text-center">
                <td><?php echo $items['name']; ?></td>
                <td><a href="<?php echo base_url('restarCantidad')."/".$items['id']; ?>" class="me-2"><img src="../../ProyectoX/public/assets/img/dash-circle.svg" alt=""></a>
                        <?php echo $items['qty']; ?>
                        <a href="<?php echo base_url('actualizarCarrito')."/".$items['id']; ?>" class="ms-2"><img src="../../ProyectoX/public/assets/img/plus-circle.svg" alt=""></a></td>
                <td>$<?php echo $items['price']; ?></td>
                <td>$<?php echo $items['subtotal']; ?></td>
                <td><a href="<?php echo base_url('borrar-prod-carrito')."/".$items['id']; ?>" class="btn btn-danger"><img src="../../ProyectoX/public/assets/img/eliminar.svg" alt=""></a></td>
        </tr>
<?php $i++; 
        endforeach; ?>

<tr>
        <td></td>
        <td></td>
        <td class="text-center"><strong>Total</strong></td>
        <td class="text-center">$<?php echo $cart->total(); ?></td>
</tr>
<?php
        echo form_hidden('contador', $i);
        
        echo form_hidden('id_user', session()->get('id'));

        echo form_hidden('importeTotal', $cart->total()); ?>
</table>

<p style="text-align:right" class="container ms-3 mt-1">
<a class="btn btn-primary" href="<?php echo base_url('borrar-carrito'); ?>">
        Vaciar Carrito
</a>

<?php
        $completar=array(
                'class' =>  'btn btn-primary',
                'value' =>  'Completar Compra',
                'name'  =>  'action'
                );
        echo form_submit($completar); 
        echo form_close();?></p>

        <?php }?>
        <div class="d-flex justify-content-center">
                <a class="btn btn-success btn-lg" href="<?php echo base_url('catalogo'); ?>">Seguir Comprando</a>
        </div>
        

    <script src="../../ProyectoX/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../ProyectoX/public/assets/js/jquery-3.6.0.min.js"></script>
    <!-- Data Table-->
    <script src="../../ProyectoX/public/assets/datatable/datatables.min.js"></script>
    <script src="../../ProyectoX/public/assets/js/mijs.js"></script>
</body>