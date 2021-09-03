<?php

require_once __DIR__.'/../../vendor/autoload.php';
session_start();
use app\Router;
use app\Database;
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\ReservationController;
use app\controllers\RoomController;


$database = new Database();
$router = new Router();

//incoming get requests
$router->get('/', [MainController::class, 'index']);
$router->get('/index', [MainController::class, 'index']);
$router->get('/signup', [MainController::class, 'signup']);
$router->get('/login', [MainController::class, 'login']);
$router->get('/logout', [MainController::class, 'logout']);
$router->get('/profile', [UserController::class, 'userProfile']);
$router->get('/dashboard', [UserController::class, 'dashboard']);
$router->get('/reservation/view', [ReservationController::class, 'viewReservation']);
$router->get('/room/view', [RoomController::class, 'viewRoom']);

//incoming post requests
$router->post('/signup', [MainController::class, 'signup']);
$router->post('/login', [MainController::class, 'login']);
$router->post('/profile', [UserController::class, 'userProfile']);
$router->post('/reservation/view', [ReservationController::class, 'viewReservation']);
$router->post('/reservation/delete', [ReservationController::class, 'deleteReservation']);
$router->post('/reservation/confirm', [ReservationController::class, 'createReservation']);
$router->post('/room/view', [RoomController::class, 'viewRoom']);


$router->resolve();
