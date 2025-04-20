<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');


use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class PortifolioController extends RestController
{

    public function __construct() {
        parent::__construct();
        $this->load->model('PortifolioModel');
    }


    public function msg_portifolio_post(){

        $folio = new PortifolioModel;

        $data = [
            'nome' => $this->post('nome'),
            'email' => $this->post('email'),
            'assunto' => $this->post('assunto'),
            'mensagem' => $this->post('mensagem'),
 
        ];

        $result = $folio->new_msg($data);
        // $this->response($data, 201);
        if($result > 0){

            $this->response([
                'status' => true,
                'message'=> 'Mensagem enviada com sucesso!'
            ], RestController::HTTP_OK);
        }else{

            $this->response([
                'status' => false,
                'message'=> 'Falha ao enviar mensagem!'
            ], RestController::HTTP_BAD_REQUEST);
            

        }
    }

}