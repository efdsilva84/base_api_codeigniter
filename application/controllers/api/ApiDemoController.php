<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class ApiDemoController extends RestController{

    public function index_get(){
        // echo  " minha api";
    }

}