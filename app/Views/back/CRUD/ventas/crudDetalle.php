<div class="container bg-light mb-4 pt-3 ps-5">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col">
                    <?php 
                        if(session()->get('perfil_id') == 1) { ?>
                        <h2>Detalles de la Compra </h2>
                        <?php } else { ?>
                            <h2>Detalles de la Venta </h2><?php } ?>
                </div>
                <div class="col text-end">
                <img src="../../ProyectoX/public/assets/img/Loga.png" id="logo" alt="logito" class="me-5" width="100" height="100" alt="">
                </div>
            
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <div class="col-12">
                    <h4>Fecha: <?php echo $ventas[0]['fecha']; ?></h4>
                </div> 
                <div class="col">
                    <h4>Nombre: <?php echo ucfirst($ventas[0]['nombre']).' '.ucfirst($ventas[0]['apellido']); ?></h4>
                </div>
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="table table-responsive">
            <table  class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Productos</th><!-- Nombre del producto-->
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        foreach($ventas as $venta):
                    ?>
                    <tr>
                        <td><?php echo $venta['nombre_prod']; ?></td>
                        <td><?php echo $venta['precio_venta']; ?></td>
                        <td><?php echo $venta['cantidad']; ?></td>
                        <td>$<?php echo $venta['subtotal']; ?></td>
                    </tr>
                    <?php 
                        endforeach;
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"><strong>Total</strong></td>
                        <td class="text-center">$<?php echo $venta['importeTotal'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>