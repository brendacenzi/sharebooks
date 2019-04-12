<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {
    public function cadastrar(){
		$this->load->view('cadastroLivro');
	}
	
	public function info($r, $id){
	    if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
    	    $page = file_get_contents("https://www.googleapis.com/books/v1/volumes/" . $id);
            $data = json_decode($page, true);
            if(isset($data['volumeInfo'])){
                $itens = $data['volumeInfo'];
                $data["idlivro"] = $id;
                $data["image"] = (empty($itens['imageLinks']['medium']))? "/resources/img/indisponivel.jpg" : $itens['imageLinks']['medium'];
                $data["capa"] = (empty($itens['imageLinks']['extraLarge']))? "/resources/img/capa.png" : $itens['imageLinks']['extraLarge'];
                $data["nome"] = $itens['title'];
                $data["isbn"] = (empty($itens['industryIdentifiers'][0]['identifier']))? "" : $itens['industryIdentifiers'][0]['identifier'];
                $data["autor"] = (empty(@implode(", ", $itens['authors'])))? "" : @implode(", ", $itens['authors']);
                $data["categ"] = @implode(", ", $itens['categories']);
                $data["public"] = (empty($itens['publishedDate']))? "" : $itens['publishedDate'];
                $data["ds"] = (empty($itens['description']))? "Este livro não possui descrição" : $itens['description'];
                $data["pg"] = (empty($itens['pageCount']))? "" : $itens['pageCount'];
                $data["class"] = (empty($itens['averageRating']))? "" : $itens['averageRating'];
                $data["result"] = 1;
                $data["pesquisa"] = $this->session->userdata('sslivro');
                $data["retorno"] = $r;
                $usuario = $this->session->userdata('_LOGIN');
                $this->load->model('EstanteModel','estante');
                $this->estante->__init__($usuario, $id);
                if($this->estante->jaTem()){
                    $data["tem"] = 1;
                    $data["disp"] = $this->estante->verDisp();
                }else
                    $data["tem"] = 0;
            }else{
                $data["result"] = 0;
            }
            
            $this->load->view("showLivro", $data);
        }
	}
	
	public function buscaLivro(){
		$livro = $_POST["titulo"];
		$tipo = $_POST["pesquisa"];
		
	    if( preg_match('/\s/', $livro)){
	    	$livro = str_replace(' ', '+', $livro);
	    }
	        
	    $page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=" . $livro . "+" . $tipo . "&langRestrict=pt");
	    if(strlen($page) < 100){
	     	$itens['result'] = "Não foram encontrados livros para colocar na estante, realize outra busca.";
	      	$itens['tipo'] = 1;
	    } else{
	        $data = json_decode($page, true);
	        $itens['result'] = $data["items"];
	        $itens['tipo'] = 2;
	    }
	    $itens['opc'] = 1;
	    $this->load->view('pesquisa', $itens);
	}
	
	public function buscaInteresse(){
   		$livro = $_POST["titulo"];
   		$tipo = $_POST["pesquisa"];
   		$usuario = $this->session->userdata('_LOGIN');
   		$this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $livro, $tipo);
    	if($this->estante->temRetorno()){
    		$r = $this->estante->buscar();
    		$estados = $this->estante->estados();
    		$itens = array();
	        $itens['result'] = $r;
	        $itens['estados'] = $estados;
	        $itens['livro'] = $livro;
   		    $itens['pesquisa'] = $tipo;
	        $itens['tipo'] = 4;
    	} else{
    		$itens['result'] = "Não foram encontrados livros para transação, realize outra busca.";
    		$itens['estados'] = 'Nenhum resultado';
    		$itens['livro'] = '';
   		    $itens['pesquisa'] = '';
	        $itens['tipo'] = 3;
    	}
    	$itens['opc'] = 2;
    	$this->load->view('pesquisa', $itens);
	}
	
	public function buscaFiltrada(){
   		$livro = $_POST["titulo"];
   		$tipo = $_POST["pesquisa"];
   		$filtro = $_POST["filtro"];
   		$usuario = $this->session->userdata('_LOGIN');
   		$this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $livro, $tipo);
    	$r = $this->estante->buscarFiltro($filtro);
    	$estados = $this->estante->estados();
    	$itens = array();
	    $itens['result'] = $r;
	    $itens['estados'] = $estados;
	    $itens['livro'] = $livro;
   		$itens['pesquisa'] = $tipo;
	    $itens['tipo'] = 4;
    	$itens['opc'] = 2;
    	$this->load->view('pesquisa', $itens);
	}
	
	public function adicionar(){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $estado = ucfirst(implode(", ",$this->input->post("estado")));
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $idlivro, $estado);
        
        $this->load->model('LivroModel','livro');
        $nome = $this->input->post("nome");
        $autor = $this->input->post("autor");
        $isbn = $this->input->post("isbn");
        $capa = $this->input->post("foto");
        $banner = $this->input->post("capa");
        $ds = $this->input->post("ds");
        $class = $this->input->post("class");
        $categ = $this->input->post("categ");
        
        $this->livro->__init__($idlivro,$nome,$autor,$isbn,$capa,$banner,$ds,$class, $categ);
        if(! $this->livro->existeLivro()){
            $this->livro->cadastrar();
        }
        
        $this->estante->adcEstante();
        
        header('location: /index.php/Livro/info/1/' . $idlivro);
    }
    
    public function doar($aux){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $idlivro);
        $this->estante->transacao("cd_doa", $aux);
        header('location: /index.php/Livro/info/1/' . $idlivro);
    }
    
    public function trocar($aux){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $idlivro);
        $this->estante->transacao("cd_troc", $aux);
        header('location: /index.php/Livro/info/1/' . $idlivro);
    }
    
    public function emprestar($aux){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $idlivro);
        $this->estante->transacao("cd_emp", $aux);
        header('location: /index.php/Livro/info/1/' . $idlivro);
    }
    
    public function remover(){
        $usuario = $this->session->userdata('_LOGIN');
        $idlivro = $this->input->post("idlivro");
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($usuario, $idlivro);
        $this->estante->remover();
        header('location: /index.php/Livro/info/1/' . $idlivro);
    }
    
    public function solicitar($cd,$id){
        if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
            $this->load->model('EstanteModel','estante');
            $this->estante->__init__($cd,$id);
            $r = $this->estante->livroDisp();
            $slc = $this->estante->verTipo();
            
            $usuario = $this->session->userdata('_LOGIN');
            $this->load->model('SolicitacaoModel','solic');
            $this->solic->__init__($cd, $usuario, $id, "", "" , "");
            $tipo = $this->solic->temSolicitacao();
            
            if(! isset($r)) 
                $data['result'] = 0;
            else{
                $data['result'] = 1;
                $data['r'] = $r;
                $data['tem'] = $slc;
                $data['slc'] = $tipo;
            }
            $this->load->view('showSolicitar',$data);
        }
    }
}