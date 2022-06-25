
<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
        <h2>Listado de Productos</h2>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('/crear-prod');?>" class="btn btn-light">Crear Producto</a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('/eliminados-prod');?>" class="btn btn-danger">Ver Eliminados</a>
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
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($productos as $producto):
                            if($producto['eliminado'] == "NO"):
                    ?>
                    <tr class="align-middle text-center">
                        <td><?php echo $producto['nombre_prod']; ?></td>
                        <td>$<?php echo $producto['precio_venta']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td>
                            <img class="img-thumbnail" src="../../ProyectoX/public/assets/uploads/<?=$producto['imagen'];?>" height="100" width="100" alt="">
                        </td>
                        <td><a href="<?php echo base_url('editar-prod')."/".$producto['id']; ?>" class="btn btn-warning"><img src="../../ProyectoX/public/assets/img/editar.svg" alt=""></a></td>
                        <td><a href="<?php echo base_url('borrar-prod')."/".$producto['id']; ?>" class="btn btn-danger"><img src="../../ProyectoX/public/assets/img/eliminar.svg" alt=""></a></td>
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