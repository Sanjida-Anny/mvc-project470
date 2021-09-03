<?php

namespace app;




class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn){
        $this->getRoutes[$url] = $fn;
    }
    
    public function post($url, $fn){
        $this->postRoutes[$url] = $fn;
    }

    public function resolve(){
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if ($method === 'GET'){
            $fn = $this->getRoutes[$url] ?? null;
        }
        else{
            $fn = $this->postRoutes[$url] ?? null;
        }

        if(!$fn){
            echo 'page not found';
            exit;
        }

        call_user_func($fn, $this);

    }

    public function renderView($view, $title = 'The Grand Maharaja', $params = ['login_status'=> false, 'role' => 0]){
        
        ob_start();
        include __DIR__."/views/$view.php";
        $contents = ob_get_clean();
        include __DIR__."/views/_layout.php";
    }




}

