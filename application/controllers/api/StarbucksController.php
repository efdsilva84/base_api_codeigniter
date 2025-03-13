<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');


use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class StarbucksController extends RestController{

    public function __construct(){
        parent::__construct();
        $this->load->model('StarbucksModel') ;
     }

    public function index_get(){
        $starbucks = new StarbucksModel;
        $result_emp = $starbucks->get_star();
        $this->response($result_emp, 200);

    }

    public function atualiza_star_post(){
        $starbucks = new StarbucksModel;

        $data = json_decode(file_get_contents("php://input"), true);
        $id = isset($data['id_msg']) ? $data['id_msg'] : null;
        // var_dump("id e formulario",$id,  $data);
        // exit; 

          // Acessa os valores individuais
    // $nome = isset($data['nome']) ? $data['nome'] : null;
    // $email = isset($data['email']) ? $data['email'] : null;
    // $mensagem = isset($data['mensagem']) ? $data['mensagem'] : null;

            $update_result = $starbucks->update_start($id, $data);
        // $this->response($data, 201);
        if($update_result > 0){

            $this->response([
                'status' => true,
                'message'=> 'Atualizado sucess !'
            ], RestController::HTTP_OK);
        }else{

            $this->response([
                'status' => false,
                'message'=> 'Falha  a atualizar!'
            ], RestController::HTTP_BAD_REQUEST);
            

        }

    }

//     public function atualiza_star_post($id){
//         $starbucks = new StarbucksModel;



//               var_dump("meu vardump",$data);
//               var_dump('meu id', )

//         $data=[

//             'titulo_banner' => $this->put('titulo_banner'),
//             'quebra_titulo' => $this->put('quebra_titulo'),
//             'frase_1' => $this->put('frase_1'),
//             'titulo_1' => $this->put('titulo_1'),
//             'titulo_2' => $this->put('titulo_2'),
//             'titulo_3' => $this->put('titulo_3'),
//             'titulo_4' => $this->put('titulo_4'),
//             'msg' => $this->put('msg'),
//             'msg_titulo_2' => $this->put('msg_titulo_2'),
//             'msg_titulo_3' => $this->put('msg_titulo_3'),
//             'msg_titulo_4' => $this->put('msg_titulo_4'),
//         ];

//         $update_result = $starbucks->update_start($id, $data);
//         // $this->response($data, 201);
//         if($update_result > 0){

//             $this->response([
//                 'status' => true,
//                 'message'=> 'Atualizado sucess !'
//             ], RestController::HTTP_OK);
//         }else{

//             $this->response([
//                 'status' => false,
//                 'message'=> 'Falha  a atualizar!'
//             ], RestController::HTTP_BAD_REQUEST);
            

//         }
    

 
 






    
 }