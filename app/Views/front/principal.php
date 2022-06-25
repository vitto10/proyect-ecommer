<div class="container">
    <div class="row">
        <div class="col-12 col-sm-9">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../ProyectoX/public/assets/img/imagen4.jpg" class="d-block w-100" height="400" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../ProyectoX/public/assets/img/imagen5.jpg" class="d-block w-100" height="400" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../ProyectoX/public/assets/img/imagen3.jpg" class="d-block w-100" height="400" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row col-md-3">
            <div class="col-12 row-md">
                <a href="<?php echo base_url('catalogo');?>?categor=2"><img src="../../ProyectoX/public/assets/img/mouse.jpg" class="margen" width="200" height="130" alt=""></a>
                <a href="<?php echo base_url('catalogo');?>?categor=3"><img src="../../ProyectoX/public/assets/img/teclado.jpg" class="margen" width="200" height="130" alt=""></a>
                <a href="<?php echo base_url('catalogo');?>?categor=1"><img src="../../ProyectoX/public/assets/img/imagen6.jpg" class="margen" width="200" height="130" alt=""></a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card negro">
        <div class="card-body negro">
            <h2 class="card-title text-light mt-2 mb-3">OFERTAS</h2>
            <p class="card-text">
                <!-- Tarjetas de productos -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-4 ">
                <?php 
                    helper(['form', 'url']);
                    foreach($productos as $producto):
                        echo form_open('agregarProd');
                        echo form_hidden('id', $producto['id']);
                        echo form_hidden('precio_venta', $producto['precio_venta']);
                        echo form_hidden('nombre_prod', $producto['nombre_prod']); ?>
                    <div class="col">
                        <div class="card">
                            <h5 class="card-title text-center mt-2 mb-4"><?php echo $producto['nombre_prod']; ?></h5>
                            <img class=" card-img-top" src="../../ProyectoX/public/assets/uploads/<?=$producto['imagen'];?>" height="200" alt="">
                            <div class="card-body">
                                <h5 class="card-text mb-5 mt-2"><?php echo $producto['precio_venta']; ?></h5>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="<?php echo base_url('ver-producto')."/".$producto['id'];?>" class="btn morado text-light">VER</a>
                                    </div>
                                    <div class="col-3">
                                        <?php        
                                            $comprar=array(
                                                'class' =>  'btn btn-primary',
                                                'value' =>  'COMPRAR',
                                                'name'  =>  'action'
                                            );
                                            echo form_submit($comprar);
                                            echo form_close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    ?>
                </div>
            </p>
        </div>
    </div>
</div>
