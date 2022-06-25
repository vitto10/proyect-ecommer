<div class="container text-light mb-4">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card bg-transparent">
            <div class="card-body">
            <h5 class="card-title">Agregar Producto</h5>
            <p class="card-text">
                <!-- enctype="multiform-data PARA ENVIAR ARCHIVOS"-->
                <form method="post" action="<?php echo base_url('/enviar-prod') ?>" enctype="multipart/form-data">
                    <label for="exampleFormControlInput1" class="form-label">Nombre producto</label>
                    <input name="nombre_prod" type="text" class="form-control" placeholder="nombre" >
                    <!-- Error -->
                        <?php if($validation->getError('nombre_prod')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nombre_prod'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlTextarea1" class="form-label">ID de categoria</label>
                    <input type="text" name="id_categoria" class="form-control" placeholder="categoria" >
                    <!-- Error -->
                        <?php if($validation->getError('id_categoria')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('id_categoria'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Precio compra</label>
                    <input name="precio_compra"  type="text" class="form-control"  placeholder="precio" >
                    <!-- Error -->
                        <?php if($validation->getError('precio_compra')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('precio_compra'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Precio venta</label>
                    <input  tyupe="text" name="precio_venta" class="form-control" placeholder="precio">
                    <!-- Error -->
                        <?php if($validation->getError('precio_venta')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('precio_venta'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Stock</label>
                    <input name="stock" type="text" class="form-control"  placeholder="stock">
                    <!-- Error -->
                        <?php if($validation->getError('stock')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('stock'); ?>
                            </div>
                        <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Imagen</label><br>
                    <input type="file" name="imagen" accept="image/x-png,image/jpg,image/jpeg">
                    <!-- Error -->
                    <?php if($validation->getError('imagen')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('imagen'); ?>
                            </div>
                        <?php }?>
                    <br><br>
                    <input type="submit" value="guardar" class="btn text-light morado">
                    <a href="<?= base_url('crud-prod');?>" class="btn btn-light">Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>