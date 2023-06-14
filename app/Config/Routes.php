<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/commerce', 'Home::commerce');
$routes->get('/contact', 'Home::contact');
$routes->get('/wip', 'Home::wip');
$routes->get('/products', 'Home::products');
$routes->get('/services', 'Home::services');

/* registro */
$routes->get('/register', 'Usuario_controller::create');
$routes->post('/send-form', 'Usuario_controller::formValidation');

/* login */
$routes->get('/login', 'Login_controller');
$routes->post('/send-login', 'Login_controller::auth');
$routes->get('/panel', 'Panel_controller::index',['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

/* prueba luego de logearse */
$routes->get('/welcome', 'Home::welcome');

/* productos */
$routes->get('/crear', 'Producto_controller::index');
$routes->get('/agregar', 'Producto_controller::index');
$routes->get('/producto-form', 'Producto_controller::creaproducto');
$routes->post('/post-producto', 'Producto_controller::store');
$routes->get('/editar/(:num)', 'Producto_ontroller::singleproducto/$1');
$routes->post('/modificar/(:num)', 'Producto_controller::modifica/$1');
$routes->get('/eliminar/(:num)', 'Producto_controller::deleteproducto/$1');
$routes->get('/eliminados', 'Producto_controller::eliminado');
$routes->get('/activar/(:num)', 'Producto_controller::activarproducto/$1');

/* carrito */
$routes->get('/carrito', 'carrito_controller::index');
$routes->get('/todos_p', 'Productocontroller::index');
$routes->get('/producto-form', 'Productocontroller::creaproducto');
$routes->post('/post-producto', 'Productocontroller::store');
$routes->get('/editar/(:num)', 'Productocontroller::singleproducto/$1');





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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}