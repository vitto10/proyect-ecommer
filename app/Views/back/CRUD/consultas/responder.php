<div class="container text-light mb-4">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card bg-transparent">
            <div class="card-body">
            <h5 class="card-title">Respuesta</h5><br>
            <p class="card-text">
                <form method="post" action="<?php echo base_url('/actualizar-respuesta') ?>">
                    <input type="hidden" name="id" value="<?php echo $consultas['id']?>">

                    <p>Nombre: <strong><?php echo $consultas['nombre']?></strong></p>

                    <p>Email: <strong><?php echo $consultas['email']?></strong></p>

                    <p>Mensaje: <strong><?php echo $consultas['descripcion']?></strong></p><br>

                    <p>Respuesta:</p>
                    <input name="respuesta" type="text" class="form-control"  placeholder="respuesta">
                    <br><br>
                    <input type="submit" value="guardar" class="btn text-light morado">
                    <a href="<?= base_url('consulta-admin');?>" class="btn btn-light">Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>