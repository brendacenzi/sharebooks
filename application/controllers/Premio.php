<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premio extends CI_Controller {
    public function solicitar($p){
        $this->load->model('PremioModel','premio');
        $this->premio->__init__($p);
        $premio = $this->premio->getPremio();
        $data['premio'] = $premio;
        
        $usuario = $this->session->userdata('_LOGIN');;
        $this->load->model('UsuarioModel','user');
        $this->user->__init__($usuario, "");
        $data['usuario'] = $this->user->getPontos();
        
        $this->load->model('PremioModel','premio');
        $this->premio->__init__();
        $dataa["result"] = $this->premio->mostrarPremios();
        
        
		$this->load->view('solicPremio' , $data);
		$this->load->view('recuperarPremios',$dataa);
	}
	
	public function debitar(){
	    $pt = $_POST["qtponto"];
	    $usuario = $this->session->userdata('_LOGIN');;
        $this->load->model('UsuarioModel','user');
        $this->user->__init__($usuario, "");
        $this->user->descontar($pt);
        $data['usuario'] = $this->user->getPontos();
        
        $this->load->model('PremioModel','premio');
        $this->premio->__init__();
        $data["result"] = $this->premio->mostrarPremios();
        $this->load->view('premioSolicitado',$data);
	}
}