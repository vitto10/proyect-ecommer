<div class="container">
    <!-- Imagen -->
    <div class="row">
        <div class="col mb-3">
            <img class="" src="../../ProyectoX/public/assets/uploads/<?=$productos[0]['imagen'];?>" height="500" width="500" alt="">
        </div>
    <!-- Resto de la información -->
        <div class="col">
            <!-- Nombre del producto -->
            <h2 class="text-light mb-5"><?=$productos[0]['nombre_prod'];?></h2>
            <!-- Precio + Boton de compra -->
                <div class="d-flex-column d-md-inline-flex align-items-center">
                    <h4 class="text-primary me-5">$ <?=$productos[0]['precio_venta'];?></h4>
                    <?php
                    echo form_open('agregarProd');
                    echo form_hidden('id', $productos[0]['id']);
                    echo form_hidden('precio_venta', $productos[0]['precio_venta']);
                    echo form_hidden('nombre_prod', $productos[0]['nombre_prod']);
                    $comprar=array(
                        'class' =>  'btn btn-primary btn-lg',
                        'value' =>  'COMPRAR',
                        'name'  =>  'action'
                    );
                    echo form_submit($comprar);
                    echo form_close(); ?>
                </div>
            <!-- Descripcion -->
                <div class="d-none d-md-block row text-secondary">
                    <h5 class="mt-5">Descripción</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est atque, necessitatibus ea aperiam maxime incidunt dignissimos voluptatibus quasi id ipsum labore sit accusamus voluptatem corrupti, tempora vel earum aspernatur asperiores.</p>
                </div>
        </div>
        <!-- Descripcion -->
        <div class="d-md-none row text-secondary">
                    <h5 class="mt-5">Descripción</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est atque, necessitatibus ea aperiam maxime incidunt dignissimos voluptatibus quasi id ipsum labore sit accusamus voluptatem corrupti, tempora vel earum aspernatur asperiores.</p>
                </div>
    </div>
    <!-- Agregar comentarios de facebook -->
</div>