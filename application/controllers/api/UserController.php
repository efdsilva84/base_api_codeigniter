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

 
    public function login_post(){
        $user = new UserModel;

        $user_cpf = $this->post('cpf');
        $user_senha = $this->post('senha');

 

        $result = $user->login_user($user_cpf, $user_senha);
        // $this->response($data, 201);
        if(!empty($result)){

            $this->response([
                'status' => true,
                'message'=> 'Longin realizado com sucesso!',
                'user' => $result // Pode retornar os dados do usuário, sem a senha

            ], RestController::HTTP_OK);
            return $result;
        }else{

            $this->response([
                'status' => false,
                'message'=> 'CPF/Senha inválidos!'
            ], RestController::HTTP_BAD_REQUEST);
            

        }
    }
 
    public function cad_user_post(){
        $user = new UserModel;

        $data = [
            'nome' => $this->post('nome'),
            'email' => $this->post('email'),
            'assunto' => $this->post('assunto'),
            'msg' => $this->post('mensagem'),
        ];

        $result = $user->insertUser($data);
        // $this->response($data, 201);
        if($result > 0){

            $this->response([
                'status' => true,
                'message'=> 'Criado com sucesso !'
            ], RestController::HTTP_OK);
        }else{

            $this->response([
                'status' => false,
                'message'=> 'Falha !'
            ], RestController::HTTP_BAD_REQUEST);
            

        }
    }





    
}