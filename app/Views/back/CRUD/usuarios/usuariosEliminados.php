
<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
        <h2>Listado de Usuarios Eliminados</h2>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('/crear-user');?>" class="btn btn-light">Crear Usuario</a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('/crud-user');?>" class="btn btn-success">Ver Activos</a>
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
                        <th>Apellido</th>
                        <th>Correo electrónico</th>
                        <th>Usuario</th>
                        <th>Perfil ID</th>
                        <th>Alta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($usuarios as $usuario):
                        if($usuario['baja'] == "SI"):
                    ?>
                    <tr>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['apellido']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo $usuario['usuario']; ?></td>
                        <td><?php echo $usuario['perfil_id']; ?></td>
                        <td><a href="<?php echo base_url('alta-user')."/".$usuario['id']; ?>" class="btn btn-success"><img src="../../ProyectoX/public/assets/img/check-circle.svg" alt=""></a></td>
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