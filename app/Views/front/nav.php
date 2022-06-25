<?php if(session()->get('perfil_id') == 2):?>
<!-- Cambia la parte del header y nav 
        Panel de administrador -->
    <body>
        
    <header class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <!-- Logo -->
            <div class="d-none d-md-block">
                <a href="<?php echo base_url();?>"><img src="../../ProyectoX/public/assets/img/Loga.png" id="logo" alt="logito" width="100" height="100"></a>
            </div>
        <!-- Buscador -->
        <div class="mt-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Buscar" id="buscador" class="buscador form-control">
                        </div>
                        <div class="col d-none d-md-block">
                            <button id="search" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                        </div>
                        <ul id="resultado" style="list-style: none;">
                        </ul> 
                    </div>
            </div>
            <div class="d-none">
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Buscar" id="buscador1" class="buscador1 form-control">
                        </div>
                        <div class="col">
                            <button id="search1" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                        </div>
                        <ul id="resultado1" style="list-style: none;"></ul>
                    </div>
            </div>
        <!-- Dashboard -->
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="dropdown" href="<?php echo base_url('panel');?>"><img src="../../ProyectoX/public/assets/img/user.svg" alt="avatar" width="20" height="20"></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><p class="dropdown-item text-primary">Hola, <?php echo ucfirst($nombre_user);?><br>CUENTA ADMIN</p></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('crud-user');?>">Crud Usuarios</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('crud-prod');?>">Crud Productos</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('ventas');?>">Ventas</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('consulta-admin');?>">Consultas</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?php echo base_url('salir');?>"><img src="../../ProyectoX/public/assets/img/logout.svg" alt="" width="20" height="20"></a>
            </li>
            <li class="nav-item">
            <div class="d-block d-md-none ms-3">
                <a href="<?php echo base_url('carrito');?>"><img src="../../ProyectoX/public/assets/img/cart3.svg" id="carrito" alt="carrito" width="40" height="40">
                    <?php $cart = \Config\Services::cart();
                        if($cart->totalItems() !== 0){?>
                            <button>
                            <?php echo $cart->totalItems();?>
                            </button>
                        <?php }
                        ?>
                </a>
            </div>
            </li>
        </ul>
        <!-- Carrito -->
            <div class="me-5 d-none d-md-block">
                <a href="<?php echo base_url('carrito');?>"><img src="../../ProyectoX/public/assets/img/cart3.svg" id="carrito" alt="carrito" width="40" height="40">
                <?php $cart = \Config\Services::cart();
                            if($cart->totalItems() !== 0){?>
                                <button>
                                <?php echo $cart->totalItems();?>
                                </button>
                            <?php }
                            ?>
                </a>
            </div>
    </header>
    <div id="cover"></div>
    <nav class="container-fluid">
        <!-- Bienvenida de usuario / mensajes según la acción -->
        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-dark">
            <?= session()->getFlashdata('msg') ?>
        </div>
        <?php endif;?>
        <!-- Productos -->
        <div class="row">
            <div class="col-3">
                <?php helper(['form', 'url']);
                    echo form_open('catalogo');
                    $options = array(
                        ' ' => 'Productos',
                        '1'         => 'Auriculares',
                        '2'         => 'Mouses',
                        '3'        => 'Teclados',
                        '4'         => 'Gabinetes',
                        '5'         => 'Memorias Flash',
                        '6'        => 'Cables y Adaptadores',
                        ''         => 'Todos los productos'
                    );
                    $js = 'class="form-control btn btn-outline-light botonesnav d-flex justify-content-center align-items-center" id="var" onChange="this.form.submit();"';
                    echo form_dropdown('categor', $options, ' ', $js);
                    echo form_close();
                ?> 
            </div>   
            <div class="col-2"></div> 
            <!-- Botones -->
            <div class="col-7 d-flex justify-content-between align-items-center d-none d-sm-flex">
                <a type="button" href="<?php echo base_url();?>" class="w-50 btn btn-outline-light botonesnav">Inicio</a>
                <a type="button" href="<?php echo base_url('nosotros');?>" class="w-50 btn btn-outline-light botonesnav">Nosotros</a>
                <a type="button" href="<?php echo base_url('preguntas-frecuentes');?>" class="w-50 btn btn-outline-light botonesnav">FAQ</a>
            </div>
            <!-- Botones para >576 -->
            <div class="col-7 d-block d-sm-none dropdown d-flex justify-content-end">
                    <a class="btn btn-outline-light botonesnav" href="#" role="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../ProyectoX/public/assets/img/list.svg" alt="menu"></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo base_url();?>">Inicio</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('nosotros');?>">Nosotros</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('preguntas-frecuentes');?>">FAQ</a></li>
                    </ul>
            </div>
        </div>
    </nav>
    <hr size="10" style="color: white;" />


<?php elseif(session()->get('perfil_id') == 1):?>
    <!-- Panel de usuario -->
<body>
    <header class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <!-- Logo -->
            <div class="d-none d-md-block">
                <a href="<?php echo base_url();?>"><img src="../../ProyectoX/public/assets/img/Loga.png" id="logo" alt="logito" width="100" height="100"></a>
            </div>
        <!-- Buscador -->
        <div class="mt-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Buscar" id="buscador" class="buscador form-control">
                        </div>
                        <div class="col d-none d-md-block">
                            <button id="search" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                        </div>
                        <ul id="resultado" style="list-style: none;">
                        </ul> 
                    </div>
            </div>
            <div class="d-none">
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Buscar" id="buscador1" class="buscador1 form-control">
                        </div>
                        <div class="col">
                            <button id="search1" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                        </div>
                        <ul id="resultado1" style="list-style: none;"></ul>
                    </div>
            </div>
            <div></div>
        <!-- Dashboard -->
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="dropdown" href="<?php echo base_url('panel');?>"><img src="../../ProyectoX/public/assets/img/user.svg" alt="avatar" width="20" height="20"></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><p class="dropdown-item">Hola, <?php echo ucfirst($nombre_user);?></p></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('cuenta');?>">Mi cuenta</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('carrito');?>">Carrito</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('ventas');?>">Compras</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('consulta-user');?>">Consultas</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?php echo base_url('salir');?>"><img src="../../ProyectoX/public/assets/img/logout.svg" alt="" width="20" height="20"></a>
            </li>
            <li class="nav-item">
            <div class="d-block d-md-none ms-3">
                <a href="<?php echo base_url('carrito');?>"><img src="../../ProyectoX/public/assets/img/cart3.svg" id="carrito" alt="carrito" width="40" height="40">
                    <?php $cart = \Config\Services::cart();
                        if($cart->totalItems() !== 0){?>
                            <button>
                            <?php echo $cart->totalItems();?>
                            </button>
                        <?php }
                        ?>
                </a>
            </div>
            </li>
        </ul>
        <!-- Carrito -->
            <div class="me-5 d-none d-md-block">
                <a href="<?php echo base_url('carrito');?>"><img src="../../ProyectoX/public/assets/img/cart3.svg" id="carrito" alt="carrito" width="40" height="40">
                    <?php $cart = \Config\Services::cart();
                        if($cart->totalItems() !== 0){?>
                            <button>
                            <?php echo $cart->totalItems();?>
                            </button>
                        <?php }
                        ?>
                </a>
            </div>
    </header>
    <div id="cover"></div>
    <nav class="container-fluid">
        <!-- Bienvenida de usuario / mensajes según la acción -->
        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-dark">
            <?= session()->getFlashdata('msg') ?>
        </div>
        <?php endif;?>
        <!-- Productos -->
        <div class="row">
            <div class="col-3">
                <?php helper(['form', 'url']);
                    echo form_open('catalogo');
                    $options = array(
                        ' ' => 'Productos',
                        '1'         => 'Auriculares',
                        '2'         => 'Mouses',
                        '3'        => 'Teclados',
                        '4'         => 'Gabinetes',
                        '5'         => 'Memorias Flash',
                        '6'        => 'Cables y Adaptadores',
                        ''         => 'Todos los productos'
                    );
                    $js = 'class="form-control btn btn-outline-light botonesnav d-flex justify-content-center align-items-center" id="var" onChange="this.form.submit();"';
                    echo form_dropdown('categor', $options, ' ', $js);
                    echo form_close();
                ?> 
            </div>  
            <div class="col-2"></div> 
            <!-- Botones -->
            <div class="col-7 d-flex justify-content-between align-items-center d-none d-sm-flex">
                <a type="button" href="<?php echo base_url();?>" class="w-50 btn btn-outline-light botonesnav">Inicio</a>
                <a type="button" href="<?php echo base_url('nosotros');?>" class="w-50 btn btn-outline-light botonesnav">Nosotros</a>
                <a type="button" href="<?php echo base_url('preguntas-frecuentes');?>" class="w-50 btn btn-outline-light botonesnav">FAQ</a>
            </div>
            <!-- Botones para >576 -->
            <div class="col-7 d-block d-sm-none dropdown d-flex justify-content-end">
                    <a class="btn btn-outline-light botonesnav" href="#" role="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../ProyectoX/public/assets/img/list.svg" alt="menu"></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo base_url();?>">Inicio</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('nosotros');?>">Nosotros</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('preguntas-frecuentes');?>">FAQ</a></li>
                    </ul>
            </div>
        </div>
    </nav>
    <hr size="10" style="color: white;" />



<?php else:?>
    <!-- Usuario no logeado -->
<body>
    <header class="d-flex flex-row justify-content-around align-items-center">
        <!-- Logo -->
            <div class="d-none d-sm-block">
                <a href="<?php echo base_url();?>"><img src="../../ProyectoX/public/assets/img/Loga.png" id="logo" alt="logito" width="100" height="100"></a>
            </div>
        <!-- Buscador -->
            <div class="mt-5 mb-3 mt-sm-1 mb-sm-0">
                    <div class="row">
                        <div class="col" id="contenedor-buscador">
                            <input type="text" placeholder="Buscar" id="buscador" class="buscador form-control">
                        </div>
                        <div class="col d-none d-lg-block">
                            <button id="search" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                        </div>
                        <ul id="resultado" style="list-style: none;">
                        </ul> 
                    </div>
            </div>
            <div class="d-none">
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Buscar" id="buscador1" class="buscador1 form-control">
                        </div>
                        <div class="col">
                            <button id="search1" class="btn pb-3"><img src="../../ProyectoX/public/assets/img/search.svg" alt="search"></button>
                        </div>
                        <ul id="resultado1" style="list-style: none;"></ul>
                    </div>
            </div>
        <!-- Carrito -->
            <div class="me-4 ms-5 d-none d-md-block">
                <div class="row">

                <a href="https://www.instagram.com/" class="text-decoration-none text-dark"><img src="../../ProyectoX/public/assets/img/instagram.svg" alt="ig"> Seguinos</a>
                <a href="https://www.facebook.com/" class="text-decoration-none text-dark"><img src="../../ProyectoX/public/assets/img/facebook.svg" alt="fb"> en nuestras</a>
                <a href="https://www.twitter.com/" class="text-decoration-none text-dark"><img src="../../ProyectoX/public/assets/img/twitter.svg" alt="tw"> Redes!</a>
                
            
                </div>
            </div>
    </header>
    <div id="cover"></div>
    <nav class="container-fluid">
        <!-- Bienvenida de usuario / mensajes según la acción -->
        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-dark">
            <?= session()->getFlashdata('msg') ?>
        </div>
        <?php endif;?>
        <!-- Productos -->
        <div class="row">
            <div class="col-3">
                <?php helper(['form', 'url']);
                    echo form_open('catalogo');
                    $options = array(
                        ' ' => 'Productos',
                        '1'         => 'Auriculares',
                        '2'         => 'Mouses',
                        '3'        => 'Teclados',
                        '4'         => 'Gabinetes',
                        '5'         => 'Memorias Flash',
                        '6'        => 'Cables y Adaptadores',
                        ''         => 'Todos los productos'
                    );
                    $js = 'class="form-control btn btn-outline-light botonesnav d-flex justify-content-center align-items-center" id="var" onChange="this.form.submit();"';
                    echo form_dropdown('categor', $options, ' ', $js);
                    echo form_close();
                ?> 
            </div> 
            <div class="col-2"></div> 
            <!-- Botones -->
            <div class="col-7 d-flex justify-content-between align-items-center d-none d-sm-flex">
                <a type="button" href="<?php echo base_url();?>" class="w-50 btn btn-outline-light botonesnav">Inicio</a>
                <a type="button" href="<?php echo base_url('nosotros');?>" class="w-50 btn btn-outline-light botonesnav">Nosotros</a>
                <a type="button" href="<?php echo base_url('preguntas-frecuentes');?>" class="w-50 btn btn-outline-light botonesnav">FAQ</a>
                <a type="button" href="<?php echo base_url('registro');?>" class="w-50 btn btn-outline-light botonesnav">Registro</a>
                <a type="button" href="<?php echo base_url('login');?>" class="w-50 btn btn-outline-light botonesnav">Login</a>
            </div>
            <!-- Botones para >576 -->
            <div class="col-7 d-block d-sm-none dropdown d-flex justify-content-end">
                    <a class="btn btn-outline-light botonesnav" href="#" role="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../ProyectoX/public/assets/img/list.svg" alt="menu"></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo base_url();?>">Inicio</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('nosotros');?>">Nosotros</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('preguntas-frecuentes');?>">FAQ</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('registro');?>">Registro</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('login');?>">Login</a></li>
                    </ul>
            </div>
        </div>
    </nav>
    <hr size="10" style="color: white;" />
    
    
<?php endif;?>
<script>
    //Buscador en tiempo real usando idexOf

    //Pasar el nombre de los productos de la base de datos
    //Tienen que estar en minuscula
    var formulario = document.querySelector('#buscador');
    var boton = document.querySelector('#search');
    var resultado = document.querySelector('#resultado');
    let nombre;
    const filter = ()=>{
        resultado.innerHTML = '';
        const texto = formulario.value.toLowerCase();
        <?php foreach($productos as $producto){ 
            $producto['nombre_pro'] = strtolower($producto['nombre_prod']); ?>
            nombre = '<?=$producto['nombre_pro']?>';
            if(nombre.indexOf(texto) !== -1){
                resultado.innerHTML += `
                <li><a href="<?php echo base_url('ver-producto')."/".$producto['id']?>"><?=$producto['nombre_prod']?></a></li>
                <style type="text/css" media="screen">
                    #resultado li a { 
                        display: block;
                        color: #777777;
                        padding: 12px 20px;
                        text-decoration: none; }
                    #resultado li a:hover { 
                        display: block;
                        color: #5b2c81;
                        background: rgb(162, 160, 163); }
                </style>
                `
                if(formulario.value === ""){
                    resultado.innerHTML = " ";
                }
            }
        <?php } ?>
        
        if(resultado.innerHTML === ''){
            resultado.innerHTML += `
                    <li>Producto no encontrado...</li>
                `
        }
    }
    boton.addEventListener('click', filter);
    formulario.addEventListener('keyup', filter);
</script>  