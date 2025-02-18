<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');


use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class UserController extends RestController{

    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel') ;
     }

    public function index_get(){
        $user = new UserModel;
        $result_emp = $user->get_user();
        $this->response($result_emp, 200);

    }

}