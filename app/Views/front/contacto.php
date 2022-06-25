<div class="container mb-5 mt-5 text-white">
    <div class="row">
    <?php $validation = \Config\Services::validation(); ?>
        <h2>Contacto</h2>
        <p>Si desea hacernos alguna consulta, complete sus datos y envíenos su comentario:</p>
        <form method="post" action="<?php echo base_url('/enviar-consulta') ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <?php if(session()->get('isLoggedIn')){ ?>
                    <input name="nombre" value="<?php echo session()->get('nombre')?>" type="text" class="form-control" placeholder="nombre" required minlength="3">
                <?php } else { ?>
                    <input type="nombre" class="form-control" name="nombre" id="exampleInputName" placeholder="nombre" aria-describedby="nameHelp">
                <?php } ?>
                <!-- Error -->
                <?php if($validation->getError('nombre')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nombre'); ?>
                            </div>
                        <?php }?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <?php if(session()->get('isLoggedIn')){ ?>
                    <input name="email" value="<?php echo session()->get('email')?>" type="text" class="form-control" placeholder="email" required minlength="3">
                <?php } else { ?>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="email" aria-describedby="emailHelp">
                <?php } ?>
                <!-- Error -->
                <?php if($validation->getError('email')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('email'); ?>
                            </div>
                        <?php }?>
            </div>
            <div class="mb-3">
                <label for="exampleInputMensaje" class="form-label">Mensaje</label>
                <input name="descripcion" class="form-control"></input>
                <!-- Error -->
                <?php if($validation->getError('descripcion')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('descripcion'); ?>
                            </div>
                        <?php }?>
            </div>
            <button type="submit" value="guardar" class="btn btn-primary">ENVIAR MENSAJE</button>
        </form>
    </div>
</div>