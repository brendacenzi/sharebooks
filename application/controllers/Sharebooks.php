<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharebooks extends CI_Controller {
	public function index()
	{
		$this->load->view('index');
	}
	
	public function pesquisa(){
		$this->load->view('pesquisa');
	}
	
	public function sobre(){
		$this->load->view('sobre');
	}
	
	public function funcionamento(){
		$this->load->view('funcionamento');
	}
	
	public function termos(){
		$this->load->view('termos');
	}
	
	public function contato(){
		$this->load->view('contato');
	}
	
	public function premios(){
		if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
			$usuario = $this->session->userdata('_LOGIN');;
	        $this->load->model('UsuarioModel','user');
	        $this->user->__init__($usuario, "");
	        $data['usuario'] = $this->user->getPontos();
	        
	        $this->load->model('PremioModel','premio');
	        $this->premio->__init__();
	        $data["result"] = $this->premio->mostrarPremios();
	        $this->load->view('recuperarPremios',$data);
        }
    }
    
    public function enviar(){
    	$this->load->view('emailEnviado');
    }
}