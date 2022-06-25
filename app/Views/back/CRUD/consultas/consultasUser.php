<div class="container text-light mb-4">
    <div class="row">
        <div class="col-8 mb-5">
        <h2>Consultas realizadas</h2>
        </div>
        <div class="col-4">
            <div class="row">
                <!-- <div class="col">
                    <a href="<?php echo base_url('/crear-user');?>" class="btn btn-light">Crear Usuario</a>
                </div> -->
                <div class="col">
                    <a href="<?php echo base_url('/contacto');?>" class="btn morado text-light">Hacer Consulta</a>
                </div>
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="table table-responsive text-light">
            <table class="table table-bordered text-light">
                <thead>
                    <tr>
                        <th>Mensaje</th>
                        <th>Respuesta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                        foreach($consultas as $consulta):
                            if($consulta['email'] == session()->get('email')):
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $consulta['descripcion']; ?></td>
                        <?php if($consulta['respuesta'] == ''){ ?>
                            <td><?php echo 'SIN RESPONDER AUN'; ?></td>
                        <?php } else { ?>
                            <td><?php echo $consulta['respuesta']; ?></td>
                        <?php } ?>
                        
                    </tr>
                    <?php 
                        endif;
                        endforeach;
                        if($i == 0){ ?>
                            <tr><td>No hay mensajes!</td><td>--------</td></tr>
                        <?php } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>