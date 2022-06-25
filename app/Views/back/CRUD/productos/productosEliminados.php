
<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
        <h2>Listado de Productos Eliminados</h2>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('/crear-prod');?>" class="btn btn-light">Crear Producto</a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('/crud-prod');?>" class="btn btn-success">Ver Activos</a>
                </div>
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="table table-responsive text-light">
            <table id="tabla_users" class="table table-bordered text-light">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Alta</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($productos as $producto):
                        if($producto['eliminado'] == "SI"):
                    ?>
                    <tr>
                        <td><?php echo $producto['nombre_prod']; ?></td>
                        <td><?php echo $producto['precio_venta']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['imagen']; ?></td>
                        <td><a href="<?php echo base_url('alta-prod')."/".$producto['id']; ?>" class="btn btn-success"><img src="../../ProyectoX/public/assets/img/check-circle.svg" alt=""></a></td>
                    </tr>
                    <?php 
                        endif;
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>