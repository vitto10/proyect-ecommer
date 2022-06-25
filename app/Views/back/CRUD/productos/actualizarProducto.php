<div class="container text-light mb-4">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card bg-transparent">
            <div class="card-body">
            <h5 class="card-title">Actualizar Producto</h5>
            <p class="card-text">
                <form method="post" action="<?php echo base_url('/actualizar-prod') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $producto['id']?>">
                    <label for="exampleFormControlInput1" class="form-label">Nombre producto</label>
                    <input name="nombre_prod" value="<?php echo $producto['nombre_prod']?>" type="text" class="form-control" placeholder="nombre">
                    <!-- Error -->
                    <?php if($validation->getError('nombre_prod')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('nombre_prod'); ?>
                                    </div>
                                <?php }?>
                    <label for="exampleFormControlTextarea1" class="form-label">ID de categoria</label>
                    <input type="text" name="id_categoria" value="<?php echo $producto['id_categoria']?>" class="form-control" placeholder="categoria">
                    <!-- Error -->
                    <?php if($validation->getError('id_categoria')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('id_categoria'); ?>
                                    </div>
                                <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Precio compra</label>
                    <input name="precio_compra" value="<?php echo $producto['precio_compra']?>" type="text" class="form-control"  placeholder="Precio">
                    <!-- Error -->
                    <?php if($validation->getError('precio_compra')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('precio_compra'); ?>
                                    </div>
                                <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Precio venta</label>
                    <input  type="text" name="precio_venta" value="<?php echo $producto['precio_venta']?>" class="form-control" placeholder="Precio">
                    <!-- Error -->
                    <?php if($validation->getError('precio_venta')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('precio_venta'); ?>
                                    </div>
                                <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Stock</label>
                    <input  tyupe="text" name="stock" value="<?php echo $producto['stock']?>" class="form-control" placeholder="stock">
                    <!-- Error -->
                    <?php if($validation->getError('stock')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('stock'); ?>
                                    </div>
                                <?php }?>
                    <label for="exampleFormControlInput1" class="form-label">Imagen</label><br>
                    <img class="img-thumbnail" src="../../ProyectoX/public/assets/uploads/<?=$producto['imagen'];?>" height="300" width="300" alt=""><br><br>
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