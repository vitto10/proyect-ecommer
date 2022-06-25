<div class="container mt-1 mb-2 d-flex justify-content-center">
	<div class="card" style="width: 50%;" >
		<div class= "card-header text-center">
			<h2>Ingreso</h2>
		</div>
	
 <?php $validation = \Config\Services::validation(); ?>

     <form method="post" action="<?php echo base_url('/enviar-login') ?>">
 
<div class ="card-body" media="(max-width:768px)">
	<div class="mb-3">
     	<label for="exampleFormControlInput1" class="form-label">Email</label>
 	 	<input name="email"  type="femail" class="form-control"  placeholder="correo electrónico" >
 	  	<!-- Error -->
        <?php if($validation->getError('email')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('email'); ?>
            </div>
        <?php }?>
	</div>
	
	<div class="mb-3">
 	 	<label for="exampleFormControlInput1" class="form-label">Contraseña</label>
 	 	<input name="pass" type="password" class="form-control"  placeholder="contraseña">
 	 	<!-- Error -->
        <?php if($validation->getError('pass')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('pass'); ?>
            </div>
        <?php }?>
 	</div>

 	<input type="submit" value="Ingresar" class="btn text-light morado">
 	<input type="reset" value="cancelar" class="btn btn-dark">   

	<a href="<?php echo base_url('registro') ?>" class="ms-5">Si aun no tiene cuenta Registrese!</a>
 </div>
</form>
</div>
</div>