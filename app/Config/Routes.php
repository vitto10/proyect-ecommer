<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/preguntas-frecuentes', 'Home::comercializacion');
$routes->get('/terminos-y-usos', 'Home::terminos');
$routes->get('/construccion', 'Home::construccion');

// Registro
$routes->get('/registro', 'Usuario_controller::create', ['filter' => 'auth2']);
$routes->post('/enviar-form', 'Usuario_controller::formValidation');

// Login
$routes->get('/login', 'login_controller::login', ['filter' => 'auth2']);
$routes->post('/enviar-login', 'login_controller::loginAuth');

// Panel de usuario
$routes->get('/panel', 'panel_controller::index',['filter' => 'auth']);
$routes->get('/salir', 'login_controller::logout');
$routes->get('/cuenta', 'panel_controller::cuenta',['filter' => 'auth']);

// CRUD usuarios
$routes->get('/crud-user', 'crud_controller::index', ['filter' => 'auth3']);
$routes->get('/eliminados-user', 'crud_controller::eliminados', ['filter' => 'auth3']);
$routes->get('/crear-user', 'crud_controller::crear', ['filter' => 'auth3']);
$routes->post('/enviar-user', 'crud_controller::formValidation', ['filter' => 'auth3']);
$routes->get('/editar-user/(:num)', 'crud_controller::editar/$1', ['filter' => 'auth3']);
$routes->post('/actualizar-user', 'crud_controller::Actualizar', ['filter' => 'auth3']);
$routes->get('/borrar-user/(:num)', 'crud_controller::borrar/$1', ['filter' => 'auth3']);
$routes->get('/alta-user/(:num)', 'crud_controller::alta/$1', ['filter' => 'auth3']);

// CRUD Productos
$routes->get('/crud-prod', 'crud_prod_controller::index', ['filter' => 'auth3']);
$routes->get('/eliminados-prod', 'crud_prod_controller::eliminados', ['filter' => 'auth3']);
$routes->get('/crear-prod', 'crud_prod_controller::crear', ['filter' => 'auth3']);
$routes->post('/enviar-prod', 'crud_prod_controller::formValidation', ['filter' => 'auth3']);
$routes->get('/editar-prod/(:num)', 'crud_prod_controller::editar/$1', ['filter' => 'auth3']);
$routes->post('/actualizar-prod', 'crud_prod_controller::Actualizar', ['filter' => 'auth3']);
$routes->get('/borrar-prod/(:num)', 'crud_prod_controller::borrar/$1', ['filter' => 'auth3']);
$routes->get('/alta-prod/(:num)', 'crud_prod_controller::alta/$1', ['filter' => 'auth3']);

// Catalogo
$routes->get('/catalogo', 'catalogo_controller::catalogo');
$routes->post('/orden', 'catalogo_controller::ordenar');
$routes->post('/catalogo', 'catalogo_controller::catalogo');
$routes->get('/ver-producto/(:num)', 'catalogo_controller::verProducto/$1');

// Carrito
$routes->get('/carrito', 'carrito_controller::index', ['filter' => 'auth']);
$routes->post('/agregarProd', 'carrito_controller::agregarProd');
$routes->get('/borrar-prod-carrito/(:num)', 'carrito_controller::borrar_prod_carrito/$1');
$routes->get('/borrar-carrito', 'carrito_controller::borrar_carrito');
$routes->get('/actualizarCarrito/(:num)', 'carrito_controller::actualizarCarrito/$1');
$routes->get('/restarCantidad/(:num)', 'carrito_controller::restarCantidad/$1');

// Consultas
$routes->get('/consulta-admin', 'consulta_controller::consulta', ['filter' => 'auth3']);
$routes->get('/consulta-user', 'consulta_controller::consulta_user', ['filter' => 'auth']);
$routes->get('/respondidos', 'consulta_controller::respondidos', ['filter' => 'auth3']);
$routes->post('/enviar-consulta', 'consulta_controller::envio_consulta');
$routes->get('/responder/(:num)', 'consulta_controller::responder/$1', ['filter' => 'auth3']);
$routes->post('/actualizar-respuesta', 'consulta_controller::actualizar', ['filter' => 'auth3']);

// Ventas
$routes->get('/ventas', 'ventas_controller::index');
$routes->get('/vistaDetalle/(:num)', 'ventas_controller::vistaDetalle/$1');
$routes->post('/enviar-compra', 'ventas_controller::envio_compra');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
