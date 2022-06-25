<div class="container">
    <div class="row text-white">
        <h2 class="mb-5 mt-3">Mi cuenta</h2>
        <div class="col">
            <div class="card mb-3" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Datos personales</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nombre: <strong><?php echo $usuario['nombre']; ?></strong></li>
                        <li class="list-group-item">Apellido: <strong><?php echo $usuario['apellido']; ?></strong></li>
                        <li class="list-group-item">Correo electrónico: <strong><?php echo $usuario['email']; ?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <!--<div class="card mb-3" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Dirección</h5>
                    <?php if(isset($direccion)) { ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Calle: </strong></li>
                        <li class="list-group-item">Numeración: <strong></strong></li>
                        <li class="list-group-item">Provincia: <strong></strong></li>
                        <li class="list-group-item">Localidad: <strong></strong></li>
                        <li class="list-group-item">Teléfono: <strong></strong></li>
                    </ul>
                    <?php } ?>
                    <a href="" class="btn btn-primary mt-3">Agregar Dirección</a>
                </div>
            </div>-->
        </div>
    </div>




</div>

