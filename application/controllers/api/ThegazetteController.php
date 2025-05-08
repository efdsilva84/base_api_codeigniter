<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');


use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class ThegazetteController extends RestController{

    public function __construct() {
        parent::__construct();
        $this->load->model('ThegazetteModel');
    }

    public function index_get(){
        $policites = new ThegazetteModel;
        $result_emp = $policites->politices_notice_get();
        $this->response($result_emp, 200);

    }

    public function breaking_news_get(){
        $breaking = new ThegazetteModel;
        $result_emp = $breaking->breaking_new_get();
        $this->response($result_emp, 200);

    }

    public function login_post(){
        $thegazette = new ThegazetteModel;
        $email  = $this->post('email');
        $senha  = $this->post('senha');
 

        $result = $thegazette->log($email, $senha);

        try {
            $result = $thegazette->log($email, $senha);
    
            if ($result) {
                $this->response([
                    'status' => true,
                    'message' => 'Login Realizado!',
                    $result
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Email ou senha incorretos!'
                ], RestController::HTTP_UNAUTHORIZED); // HTTP 401 é mais apropriado
            }
        } catch (Exception $e) {
            $this->response([
                'status' => false,
                'message' => 'Erro interno no servidor!'
            ], RestController::HTTP_INTERNAL_ERROR);
        }


    }

    public function new_notice_politices_post(){
        $thegazette = new ThegazetteModel;
        $this->load->helper('file'); // Carrega o helper para manipulação de arquivos
        $extensao = 'jpg';
        $data = json_decode(file_get_contents("php://input"), true);
        $imagem_base64 = isset($data['imagem']) ? $data['imagem'] : null;
        $id_notice = isset($data['id_notice']) ? $data['id_notice'] : null;



        // Decodifica a imagem
        $imagem_decodificada = base64_decode($imagem_base64);
        // Configura o nome do arquivo
        $nome_arquivo = time() . '_' . rand(1000, 9999) . '.' . $extensao;
        $caminho_pasta = FCPATH . 'application/imagens/';
        $caminho_arquivo = $caminho_pasta . $nome_arquivo;

        // Salva a imagem no servidor
        if (!write_file($caminho_arquivo, $imagem_decodificada)) {

            $this->response([
                'status' => false,
                'message' => 'Falha  a atualizar!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            // echo json_encode(['status' => 'sucesso', 'mensagem' => 'Imagem salva com sucesso', 'caminho' => base_url('application/imagens/' . $nome_arquivo)]);
            $data['img_politices'] = $nome_arquivo;
            $thegazette->update_notice_policites($id_notice, $data);

            $this->response([
                'status' => true,
                'message' => 'Atualizado sucess !',
                'caminho' => base_url('application/imagens/' . $nome_arquivo)
            ], RestController::HTTP_OK);
        }

    }




}