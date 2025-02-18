<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cors_headers() {
    // Definir cabeçalhos de CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    // Se for uma requisição OPTIONS (preflight), encerra a execução aqui
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
}
