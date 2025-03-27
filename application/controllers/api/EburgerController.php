<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');


use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class EburgerController extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EburgerModel');
    }

    public function index_get(){
        $eburger = new EburgerModel;

        $result_emp = $eburger->get_burgers();
        $this->response($result_emp, 200);

    }
    public function create_burger_post()
    {
        $eburger = new EburgerModel;
        $this->load->helper('file'); // Carrega o helper para manipulação de arquivos
        $extensao = 'jpg';
        $data = json_decode(file_get_contents("php://input"), true);
        $imagem_base64 = isset($data['imagem']) ? $data['imagem'] : null;

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
            $data['imagem'] = $nome_arquivo;
            $eburger->novo_hamburguer($data);

            $this->response([
                'status' => true,
                'message' => 'Atualizado sucess !',
                'caminho' => base_url('application/imagens/' . $nome_arquivo)
            ], RestController::HTTP_OK);
        }







        // $new_name = time();
        // $config = [
        //     'upload_path' => './images/',
        //     'allowed_types' => 'gif|jpg|png',
        //     'file_name' => $new_name ,
        // ];
        // $this->load->library('upload', $config);








        // $eburger_filename = $this->upload->data('img_name');


        // var_dump("imagemmm", $image);
        // $id = isset($data['id_msg']) ? $data['id_msg'] : null;




    }
}
