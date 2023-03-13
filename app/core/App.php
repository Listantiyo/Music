<?php

class App {

    protected $controller   = 'Home';
    protected $method       = 'index';
    protected $params       = [];

    public function __construct()
    {
        $url = $this->parseUrl();
   
        // Admin
        if (isset($url[0])) {

            if ($url[0] === 'admin') {
                unset($url[0]);
                $this->controller = 'Dashboard';
    
                //cek controller
                if ( isset($url[1])) {
                    if ( file_exists('../app/controllers/admin/'.$url[1].'.php')) {
                        $this->controller = $url[1];
                        unset($url[1]);
                    }
                }
                
                require_once '../app/controllers/admin/' . $this->controller . '.php';
                $this->controller = new $this->controller; 
                
        
                //cek method
                if ( isset($url[2])) {
                    if ( method_exists($this->controller,$url[2])) {
                        $this->method = $url[2];
                        unset($url[2]);
                    }
                }
                //cek param
                if (!empty($url)) {
                    //jika $url punya array tersisa setelah array 0 dan 1 di unset $url[2] ++ maka, jika menggunakan array_values array akan disimpan ulang sebagai array numeric dimulai dari index 0 
                    //array_values to get value an array then store to array numeric
                    $this->params = array_values($url);
                    
                }
        
                call_user_func_array([$this->controller,$this->method],$this->params);
                exit;
            }
        }

        // User
        //cek controller
        if ( isset($url[0])) {
            if ( file_exists('../app/controllers/'.$url[0].'.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        

        //cek method
        if ( isset($url[1])) {
            if ( method_exists($this->controller,$url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //cek param
        if (!empty($url)) {
            //jika $url punya array tersisa setelah array 0 dan 1 di unset $url[2] ++ maka, jika menggunakan array_values array akan disimpan ulang sebagai array numeric dimulai dari index 0 
            //array_values to get value an array then store to array numeric
            $this->params = array_values($url);
            
        }

        call_user_func_array([$this->controller,$this->method],$this->params);
    }



    public function parseURL(){
        if ( isset ( $_GET['url'] )) {
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    } 
}

