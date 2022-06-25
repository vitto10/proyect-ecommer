
<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
        <h2>Listado de Usuarios</h2>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('/crear-user');?>" class="btn btn-light">Crear Usuario</a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('/eliminados-user');?>" class="btn btn-danger">Ver Eliminados</a>
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
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($usuarios as $usuario):
                            if($usuario['baja'] == "NO"):
                    ?>
                    <tr>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['apellido']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo $usuario['usuario']; ?></td>
                        <td><?php echo $usuario['perfil_id']; ?></td>
                        <td><a href="<?php echo base_url('editar-user')."/".$usuario['id']; ?>" class="btn btn-warning"><img src="../../ProyectoX/public/assets/img/editar.svg" alt=""></a></td>
                        <td><a href="<?php echo base_url('borrar-user')."/".$usuario['id']; ?>" class="btn btn-danger"><img src="../../ProyectoX/public/assets/img/eliminar.svg" alt=""></a></td>
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