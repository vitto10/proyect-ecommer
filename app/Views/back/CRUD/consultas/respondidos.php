<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8">
        <h2>Consultas respondidas</h2>
        </div>
        <div class="col-4">
            <div class="row">
                
                <div class="col">
                    <a href="<?php echo base_url('/consulta-admin');?>" class="btn btn-warning">Por responder</a>
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
                        <th>Respuesta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($consultas as $consulta):
                            if($consulta['respondido'] == "SI"):
                    ?>
                    <tr>
                        <td><?php echo $consulta['nombre']; ?></td>
                        <td><?php echo $consulta['email']; ?></td>
                        <td><?php echo $consulta['descripcion']; ?></td>
                        <td><?php echo $consulta['respuesta']; ?></td>
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