<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
        <h2>Consultas por responder</h2>
        </div>
        <div class="col-4">
            <div class="row">
                <!-- <div class="col">
                    <a href="<?php echo base_url('/crear-user');?>" class="btn btn-light">Crear Usuario</a>
                </div> -->
                <div class="col">
                    <a href="<?php echo base_url('/respondidos');?>" class="btn btn-success">Ver Respondidos</a>
                </div>
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="table table-responsive text-light">
            <table id="tabla_users" class="table table-bordered text-light">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Mensaje</th>
                        <th>Responder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($consultas as $consulta):
                            if($consulta['respondido'] == "NO"):
                    ?>
                    <tr>
                        <td><?php echo $consulta['nombre']; ?></td>
                        <td><?php echo $consulta['email']; ?></td>
                        <td><?php echo $consulta['descripcion']; ?></td>
                        <td class="text-center"><a href="<?php echo base_url('responder')."/".$consulta['id']; ?>" class="btn btn-success"><img src="../../ProyectoX/public/assets/img/check-circle.svg" alt=""></a></td>
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