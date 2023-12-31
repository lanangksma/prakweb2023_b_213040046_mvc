<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct() {
        $url = $this->parseURL();

        // controller
        if (isset($url) && is_array($url) && count($url) > 0 && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } // Merubah controller karena terdapat warning ketika hendak dieksekusi.

        // Inisiasi Controller
        require_once '../app/controllers/' . $this -> controller . '.php';
        $this -> controller = new $this -> controller;

        // Method
        if (isset($url[1])) {
            if (method_exists($this -> controller, $url[1])) {
                $this -> method = $url[1];
                unset($url[1]);
            }
        }

        // Params
        if (!empty($url)) {
            $this -> params = array_values($url);
        }

        // Jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this -> controller, $this -> method], $this -> params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // rtrim() untuk menghapus tanda '/' di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); // filter_var() untuk membersihkan url dari karakter-karakter aneh
            $url = explode('/', $url); // explode() untuk memecah url berdasarkan tanda '/'
            return $url;
        }
    }
}