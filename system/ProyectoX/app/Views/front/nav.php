<body>
    <header class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <!-- Logo -->
            <div class="ms-sm-5">
                <a href="<?php echo base_url();?>"><img src="../../ProyectoX/public/assets/img/Loga.png" id="logo" alt="logito" width="100" height="100"></a>
            </div>
        <!-- Buscador -->
            <div class="d-none d-sm-block">
                <form>
                    <input type="search" placeholder="Buscar" class="buscador">
                    <button type="submit" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                </form>
            </div>
            <div class="d-block d-sm-none">
                <form>
                    <input type="search" placeholder="Buscar" class="buscador1">
                    <button type="submit" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                </form>
            </div>
        <!-- Carrito -->
            <div class="me-5 d-none d-md-block">
                <a href="#"><img src="../../ProyectoX/public/assets/img/cart3.svg" id="carrito" alt="carrito" width="60" height="60"></a>
            </div>
    </header>
    <nav class="container-fluid">
        <!-- Productos -->
        <div class="row">
            <div class="col-3">
                <a class="w-100 btn btn-outline-light botonesnav d-flex justify-content-center align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Auriculares</a></li>
                    <li><a class="dropdown-item" href="#">Mouses</a></li>
                    <li><a class="dropdown-item" href="#">Teclados</a></li>
                    <li><a class="dropdown-item" href="#">Gabinetes</a></li>
                    <li><a class="dropdown-item" href="#">Memorias Flash</a></li>
                    <li><a class="dropdown-item" href="#">Cables y Adaptadores</a></li>
                    <li><a class="dropdown-item" href="#">Otros</a></li>
                </ul>
            </div>   
            <div class="col-2"></div> 
            <!-- Botones -->
            <div class="col-7 d-flex justify-content-between align-items-center d-none d-sm-flex">
                <a type="button" href="<?php echo base_url();?>" class="w-50 btn btn-outline-light botonesnav">Inicio</a>
                <a type="button" href="<?php echo base_url('nosotros');?>" class="w-50 btn btn-outline-light botonesnav">Nosotros</a>
                <a type="button" href="<?php echo base_url('registro');?>" class="w-50 btn btn-outline-light botonesnav">Registro</a>
                <a type="button" href="<?php echo base_url('preguntas-frecuentes');?>" class="w-50 btn btn-outline-light botonesnav">FAQ</a>
            </div>
            <!-- Botones para >576 -->
            <div class="col-7 d-block d-sm-none dropdown d-flex justify-content-end">
                    <a class="btn btn-outline-light botonesnav" href="#" role="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../ProyectoX/public/assets/img/list.svg" alt="menu"></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo base_url();?>">Inicio</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('nosotros');?>">Nosotros</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('registro');?>">Registro</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('preguntas-frecuentes');?>">FAQ</a></li>
                    </ul>
            </div>
        </div>
    </nav>
    <hr size="10" style="color: white;" />
    
    