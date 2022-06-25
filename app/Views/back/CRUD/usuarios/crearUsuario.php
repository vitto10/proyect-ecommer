<div class="container text-light mb-4">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card bg-transparent">
            <div class="card-body">
            <h5 class="card-title">Agregar Usuario</h5>
            <p class="card-text">
                <form method="post" action="<?php echo base_url('/enviar-user') ?>">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input name="nombre" type="text"  class="form-control" placeholder="nombre" >
                    <!-- Error -->
                        <?php if($validation->getError('nombre')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nombre'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlTextarea1" class="form-label">Apellido</label>
                    <input type="text" name="apellido"class="form-control" placeholder="apellido" >
                    <!-- Error -->
                        <?php if($validation->getError('apellido')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('apellido'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input name="email"  type="femail" class="form-control"  placeholder="correo electrónico" >
                    <!-- Error -->
                        <?php if($validation->getError('email')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('email'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input  tyupe="text" name="usuario" class="form-control" placeholder="usuario">
                    <!-- Error -->
                        <?php if($validation->getError('usuario')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('usuario'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                    <input name="pass" type="password" class="form-control"  placeholder="contraseña">
                    <!-- Error -->
                        <?php if($validation->getError('pass')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('pass'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Perfil ID (1-Usuario) (2-Administrador)</label>
                    <input  tyupe="text" name="perfil_id" class="form-control" placeholder="perfil">
                    <!-- Error -->
                        <?php if($validation->getError('perfil_id')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('perfil_id'); ?>
                            </div>
                        <?php }?>
                    <br>
                    <input type="submit" value="guardar" class="btn text-light morado">
                    <a href="<?= base_url('crud-user');?>" class="btn btn-light">Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>