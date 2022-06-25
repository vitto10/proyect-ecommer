<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
            <?php if(session()->get('perfil_id') == 2) { ?>
                <h2>Resumenes de Ventas</h2>
                <?php } else { ?>
                <h2>Resumenes de Compras</h2>
                <?php } ?>
        </div>
        <div class="col-4">
            <div class="row">
                <!-- <div class="col">
                    <a href="<?php echo base_url('/crear-user');?>" class="btn btn-light">Crear Usuario</a>
                </div> 
                <div class="col">
                    <a href="<?php echo base_url('/respondidos');?>" class="btn btn-success">Ver Respondidos</a>
                </div>-->
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="table table-responsive text-light">
            <table id="tabla_users" class="table table-bordered text-light">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Importe</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        foreach($ventas as $venta):
                            //Se diferencia si es usuario o admin
                            if(session()->get('perfil_id') == 2){
                                foreach($user as $us){
                                    if($venta['id_usuario'] === $us['id']){ ?>
                                    <tr>
                                        <td><?php echo $venta['fecha']; ?></td>
                                        <td><?php echo $us['nombre'].' '.$us['apellido']; ?></td>
                                        <td><?php echo $us['email']; ?></td>
                                        <td>$<?php echo $venta['importeTotal']; ?></td>
                                        <td><a href="<?php echo base_url('vistaDetalle')."/".$venta['id']; ?>" class="btn btn-warning"><img src="../../ProyectoX/public/assets/img/bag-check.svg" alt=""></a></td>
                                    </tr>
                                    <?php
                                    }
                                }
                            } else {
                                if($venta['id_usuario'] === session()->get('id')){ ?>
                                    <tr>
                                        <td><?php echo $venta['fecha']; ?></td>
                                        <td><?php echo session()->get('nombre').' '.session()->get('apellido'); ?></td>
                                        <td><?php echo session()->get('email'); ?></td>
                                        <td>$<?php echo $venta['importeTotal']; ?></td>
                                        <td><a href="<?php echo base_url('vistaDetalle')."/".$venta['id']; ?>" class="btn btn-warning"><img src="../../ProyectoX/public/assets/img/bag-check.svg" alt=""></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>