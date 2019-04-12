<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conversa extends CI_Controller {
    public function apagar(){
		$c = $_POST["conv"];
        $this->load->model('MensagemModel','msg');
        $this->msg->__init__();
    	$this->msg->excluir($c);
    	$this->load->model('ConversaModel','cv');
        $this->cv->__init__();
    	$this->cv->excluir($c);
    	header("location: /index.php/Usuario/mensagens");
    }
    
    public function soConversa(){
		$c = $_POST["cv"];
    	$this->load->model('ConversaModel','cv');
        $this->cv->__init__();
    	$this->cv->excluir($c);
    	header("location: /index.php/Usuario/solicitacoes");
    }
    
    public function confirmar(){
        $u = $this->session->userdata('_LOGIN');
		$c = $this->input->post("cv");
        $this->load->model('MensagemModel','msg');
        $this->msg->__init__();
    	$this->msg->excluir($c);
    	$this->load->model('ConversaModel','cv');
        $this->cv->__init__();
    	$this->cv->confirmar($c);
    	$this->cv->acordo($c, $u);
    	header("location: /index.php/Usuario/mensagens");
    }
    
    public function trFinal(){
        $c = $this->input->post("cv");
        $u = $this->input->post("usu");
        $t = $this->input->post("tp");
        $this->load->model('ConversaModel','cv');
        $this->cv->__init__();
    	$this->cv->excluir($c);
    	$this->load->model('TransacaoModel','tr');
        $this->tr->__init__($u);
        if($t == 1){
    	    $this->tr->updtDoa();
    	    $pt = 30;
    	}else{
    	    if($t == 2){
    	        $this->tr->updtTroca();
    	        $pt = 15;
    	    }else{
    	        $this->tr->updtEmp();
    	        $pt = 10;
    	    }
    	}
    	$this->load->model('UsuarioModel','us');
        $this->us->__init__($u,"");
    	$this->us->pontuar($pt);
    	header("location: /index.php/Usuario/solicitacoes");
    }
    
    public function trFinal2(){
        $c = $this->input->post("cv");
        $u = $this->input->post("usu");
        $u2 = $this->input->post("usu2");
        $t = $this->input->post("tp");
        $this->load->model('ConversaModel','cv');
        $this->cv->__init__();
    	$this->cv->excluir($c);
    	$this->load->model('TransacaoModel','tr');
        $this->tr->__init__($u);
        $this->load->model('TransacaoModel','tr2');
        $this->tr2->__init__($u2);
        if($t == 1){
    	    $this->tr->updtDoa();
    	    $this->tr2->updtDoa();
    	    $pt = 30;
    	}else{
    	    if($t == 2){
    	        $this->tr->updtTroca();
    	        $this->tr2->updtTroca();
    	        $pt = 15;
    	    }else{
    	        $this->tr->updtEmp();
    	        $this->tr2->updtEmp();
    	        $pt = 10;
    	    }
    	}
    	$this->load->model('UsuarioModel','us');
        $this->us->__init__($u,"");
    	$this->us->pontuar($pt);
    	$this->load->model('UsuarioModel','us2');
        $this->us2->__init__($u2,"");
    	$this->us2->pontuar($pt);
    	header("location: /index.php/Usuario/solicitacoes");
    }
}
?>