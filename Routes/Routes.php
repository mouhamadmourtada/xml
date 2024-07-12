<?php

namespace Routes;
use Routes\Router;
use controllers\FilmController;
use auth\AuthController;
use controllers\RestaurantController;
use middleware\AuthMiddleware;



class Routes {

    private $router;

    function __construct() {
        
        $this->router = new Router();

        $this->router->add('GET', '/xml/film', [FilmController::class, 'index']);
        $this->router->add('GET', '/xml/film/create', [FilmController::class, 'create'],[AuthMiddleware::class]);
        $this->router->add('GET', '/xml/film/{id}', [FilmController::class, 'show']);
        $this->router->add('POST', '/xml/film', [FilmController::class, 'store']);
        $this->router->add('GET', '/xml', [FilmController::class, 'index']);
        $this->router->add('GET', '/xml/film/{id}/edit', [FilmController::class, 'edit']);
        $this->router->add('POST', '/xml/film/{id}/update', [FilmController::class, 'update']);
        $this->router->add('GET', '/xml/film/{id}/delete', [FilmController::class, 'destroy']);

        $this->router->add('GET', '/xml/test', [FilmController::class, 'test']);

        $this->router->add('GET', '/xml/restaurant', [RestaurantController::class, 'index'], );
        $this->router->add('GET', '/xml/restaurant/create', [RestaurantController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/xml/restaurant/{id}', [RestaurantController::class, 'show']);
        $this->router->add('POST', '/xml/restaurant', [RestaurantController::class, 'store'], [AuthMiddleware::class]);
        $this->router->add('GET', '/xml/restaurant/{id}/edit', [RestaurantController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/xml/restaurant/{id}/update', [RestaurantController::class, 'update'], [AuthMiddleware::class]);

        $this->router->add('GET', '/xml/restaurant/{id}/delete', [RestaurantController::class, 'destroy'], [AuthMiddleware::class]);
        

        $this->router->add('GET', '/xml/auth/login', [AuthController::class, 'login']);
        $this->router->add('POST', '/xml/auth/loginProcess', [AuthController::class, 'loginProcess']);
        $this->router->add('GET', '/xml/auth/logout', [AuthController::class, 'logout']);


        
    }
    
    public function dispatch() {
        $this->router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }

}