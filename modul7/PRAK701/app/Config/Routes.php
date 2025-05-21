<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/books', 'Book::index', ['filter' => 'auth']);
$routes->get('/books/new', 'Book::new', ['filter' => 'auth']);
$routes->post('/books', 'Book::create', ['filter' => 'auth']);
$routes->get('/books/edit/(:num)', 'Book::edit/$1', ['filter' => 'auth']);
$routes->post('/books/update/(:num)', 'Book::update/$1', ['filter' => 'auth']);
$routes->get('/books/delete/(:num)', 'Book::delete/$1', ['filter' => 'auth']);

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}