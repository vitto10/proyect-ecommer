<div class="container-fluid">
    <div class="row">
        <div class="d-none d-md-block col-md-3 ps-3">
            <div class="card">
                <img src="../../ProyectoX/public/assets/img/imagen1.jpg" class="mx-auto d-block mt-5 mb-4" width="90%" height="200" alt="...">
                <div class="card-body mb-4">
                    <h5 class="card-title">Ordenar</h5>
                    <p class="card-text">
                        
                        <div class="list-group list-group-flush">
                            <?php helper(['form', 'url']);
                            echo form_open('orden');
                            if($title != "Productos"){
                                echo form_hidden('categor', $productos[0]['id_categoria']);
                            }
                            $options = array(
                                'aleatoria' => 'Seleccione...',
                                'aleatorio'         => 'Aleatorio',
                                'menor'         => 'Precio: Menor a Mayor',
                                'mayor'        => 'Precio: Mayor a Menor'
                            );
                            $js = 'id="var" onChange="this.form.submit();"';
                            echo form_dropdown('var', $options, ' ', $js);
                            echo form_close();
                            ?>
                        </div>
                    </p>
                    <!--<h5 class="card-title">Categorias</h5>
                    <p class="card-text">
                        <div class="list-group list-group-flush">
                            <a href="<?php echo base_url('catalogo');?>" class="list-group-item">Auriculares</a>
                            <a href="<?php echo base_url('catalogo');?>" class="list-group-item">Mouses</a>
                            <a href="<?php echo base_url('catalogo');?>" class="list-group-item">Teclados</a>
                            <a href="<?php echo base_url('catalogo');?>" class="list-group-item">Gabinetes</a>
                            <a href="<?php echo base_url('catalogo');?>" class="list-group-item">Memorias Flash</a>
                            <a href="<?php echo base_url('catalogo');?>" class="list-group-item">Cables y Adaptadores</a>
                        </div>
                    </p>-->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 pe-4">
            <div class="card">
                <div class="card-body">
                    <!-- Titulo depende de la categoria -->
                    <h2 class="card-title mb-5 mt-3 ps-4">
                        <?php 
                            if($title != "Productos"){
                                echo $categoria;
                            } else {
                                echo "Productos";
                            }
                             ?></h2>
                    <p class="card-text">
                        <!-- Tarjetas de productos -->
                        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-4 ">
                        <?php 

                        helper(['form', 'url']);
                        foreach($productos as $producto):
                        
                        //Enviar datos del producto para agregar al carrito
                        
                            echo form_open('agregarProd');
                            echo form_hidden('id', $producto['id']);
                            echo form_hidden('precio_venta', $producto['precio_venta']);
                            echo form_hidden('nombre_prod', $producto['nombre_prod']);
                        ?>
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
                                            <!-- <a href="#" class="btn btn-primary">COMPRAR</a> -->
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
    </div>
</div>