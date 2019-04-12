<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitacao extends CI_Controller {
    public function verificaSolic(){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $idlivro);
        $this->estante->remover();
        header('location: /index.php/Livro/info/1/' . $idlivro);
    }
    
    public function doIt($tipo, $acao){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $idlivro2 = $this->input->post("idlivro2");
        $idusuario = $this->input->post("idusuario");
        $tempo = $this->input->post("tempo");
        $this->load->model('SolicitacaoModel','solic');
        if ($tipo == 1)
            $this->solic->__init__($idusuario, $usuario, $idlivro, "", date("Y-m-d"), $tipo);
        else{
            if ($tipo == 2)
                $this->solic->__init__($idusuario, $usuario, $idlivro, $idlivro2, date("Y-m-d"), $tipo);
            else
                $this->solic->__init__($idusuario, $usuario, $idlivro, "", date("Y-m-d"), $tipo, $tempo);
        }
        
        if ($acao == 0)
            $this->solic->solicitar();
        else
            $this->solic->deletar();
        header('location: /index.php/Livro/solicitar/' . $idusuario . "/" . $idlivro);
    }
    
    public function troca(){
        $usuario = $this->session->userdata('_LOGIN');
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario);
        $data["result"] = $this->estante->mostrarLivros();
        
        $data["livro"] = $this->input->post("idlivro");
        $data["usuario"] = $this->input->post("idusuario");
        $data["nmlivro"] = $this->input->post("nmlivro");
        $data["nmusuario"] = $this->input->post("nmusuario");
        $data["capa"] = $this->input->post("capa");
        $this->load->view('solicTroca', $data);
    }
    
    public function recusar(){
        $t = $this->input->post("transacao");
        $this->load->model('SolicitacaoModel','solic');
        $this->solic->__init__();
        $this->solic->excluir($t);
        header('location: /index.php/Usuario/solicitacoes');
    }
}