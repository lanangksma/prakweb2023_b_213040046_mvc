<?php

class App {
    public function __construct() {
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // rtrim() untuk menghapus tanda / di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); // filter_var() untuk membersihkan url dari karakter-karakter aneh
            $url = explode('/', $url); // explode() untuk memecah url dengan delimiter / menjadi array
            return $url;
        }
    }
}