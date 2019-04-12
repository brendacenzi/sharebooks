<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    public function senha()
	{
		$this->load->view('recuperarSenha');
	}
	
	public function cadastro()
	{
		$this->load->view('cadastrarUsuario');
	}
	
	public function autenticar(){
        $login = $this->input->post("login");
        $s = $this->input->post("senha");
	    $senha = sha1($s);
        $this->load->model('UsuarioModel','user');
        $this->user->__init__($login,$senha);
        if ( $this->user->existeUsuario2()){
            $id = $this->user->getID();
            foreach($id->result_array()  as $row) { 
                $id = $row["cd_usuario"];
            }
            $this->session->set_userdata("_LOGIN",$id);
                header('location: /index.php/Sharebooks/pesquisa');
        }else{
            $this->load->view('errologin');
            $this->load->view('index');
        }
    }

    
    public function perfil(){
        if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
            $usuario = $this->session->userdata('_LOGIN');
    		$this->load->model('UsuarioModel','user');
            $this->user->__init__($usuario, "");
    		$info = $this->user->getinfouser()[0];
    		$this->load->model('TransacaoModel','tr');
            $this->tr->__init__($usuario);
            $trans = $this->tr->getTransacoes();
            $this->load->model('EstanteModel','estante');
            $this->estante->__init__($usuario);
            $data["result"] = $this->estante->mostrarLivros();
    		$data["info"] = $info;
    		$data["trans"] = $trans;
    		$this->load->view('showPerfil', $data);
        }
            
	}
	
	public function informacoes($u){
// 	    $usuario = $this->session->userdata('_LOGIN');
// 		$this->load->model('UsuarioModel','user');
//         $this->user->__init__($usuario, "");
// 		$info = $this->user->getinfouser()[0];
// 		$this->load->model('TransacaoModel','tr');
//         $this->tr->__init__($usuario);
//         $trans = $this->tr->getTransacoes();
//         $this->load->model('EstanteModel','estante');
//         $this->estante->__init__($usuario);
//         $data["result"] = $this->estante->mostrarLivros();
// 		$data["info"] = $info;
// 		$data["trans"] = $trans;
// 		$this->load->view('showPerfil', $data);
	    
	    
		$this->load->model('UsuarioModel','user');
        $this->user->__init__($u, "");
		$info = $this->user->getinfouser()[0];
		$this->load->model('TransacaoModel','tr');
        $this->tr->__init__($u);
        $trans = $this->tr->getTransacoes();
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($u);
        $data["result"] = $this->estante->mostrarLivros();
		$data["info"] = $info;
		$data["trans"] = $trans;
		$this->load->view('outroPerfil', $data);
	}

	public function cadastrar(){
	    $nome = $this->input->post("nome");
	    $login = $this->input->post("login");
	    $s = $this->input->post("senha");
	    $senha = sha1($s);
	    $cpf = $this->input->post("cpf");
	    
	    $nm_arqfoto = random_string('alpha') . ".jpg";
	    $foto = $_FILES['foto'];
        $path = "./resources/img/perfil/";
        $configuracao = array(
             'upload_path'   => $path,
             'allowed_types' => 'jpg',
             'file_name'     => $nm_arqfoto,
             'max_size'      => '2048',
             'max_width'     => '2048',
             'max_height'    => '1280'
        );
	    if ( ! is_dir($path)) {
            mkdir($path, 0777, $recursive = true);
        }
	    $this->load->library('upload', $configuracao);
	    $this->upload->initialize($configuracao);
        $this->upload->do_upload('foto');
	    $desc = $this->input->post("descricao");
	    $cidade = $this->input->post("cidade");
	    $estado = $this->input->post("estado");
	    $interesses = implode(";", $this->input->post("interesses"));
	    $nasc = $this->input->post("nascimento");
	    $this->load->model('UsuarioModel', 'user');
	    $this->user->__init__($login, $senha, $nome, $nm_arqfoto, $desc, $cidade, $estado, $interesses, $nasc, 0, $cpf);
	    if ( $this->user->existeUsuario() ){
            echo "Usuario ja existe";
        }else{
            $this->user->cadastrar();
            $id = $this->user->getID();
            foreach($id->result_array()  as $row) { 
                $id = $row["cd_usuario"];
            }
            $this->session->set_userdata("_LOGIN",$id);
            
            $id = $this->session->userdata('_LOGIN');
            $this->load->model('TransacaoModel', 'tr');
	        $this->tr->__init__($id);
	        $this->tr->add();
	        
            header("location: /index.php/Sharebooks/pesquisa");
        }
	}
	
	public function sair(){
        unset ($_SESSION['_LOGIN']);
	    header("location: /");
    }
    
    public function estante(){
        if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
            $usuario = $this->session->userdata('_LOGIN');;
            $this->load->model('EstanteModel','estante');
            $this->estante->__init__($usuario);
        
            $this->load->model('UsuarioModel','user');
            $this->user->__init__($usuario, "");
            $data['usuario'] = $this->user->getNome();
        
            $data["result"] = $this->estante->mostrarLivros();
            $this->load->view('showEstante',$data);
        }
    }
	
    public function criarConversa(){
        $id_to = $this->input->post("para");
	    $id_from = $this->session->userdata('_LOGIN');
	    $transacao = $this->input->post('transacao');
	    $livro = $this->input->post("livro");
	    $tempo = $this->input->post("tempo");
	    $outro = $this->input->post("outrolivro");
	    $this->load->model('ConversaModel','conversa');
	    $this->conversa->__init__($livro, $outro, $id_to, $id_from, $transacao, $tempo);
	    $this->conversa->cadastrar();
	    $t = $this->input->post("idtrans");
        $this->load->model('SolicitacaoModel','solic');
        $this->solic->__init__($id_from);
        $this->solic->excluir($t);
        $data["result1"] = $this->solic->mostrar(1);
    	$data["result2"] = $this->solic->mostrarTroca();
    	$data["result3"] = $this->solic->mostrar(3);
        header("location: /index.php/Usuario/mensagens");
    }
    
    public function solicitacoes(){
        if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
            $usuario = $this->session->userdata('_LOGIN');
            $this->load->model('SolicitacaoModel','solic');
    	    $this->solic->__init__($usuario);
    	    $this->load->model('ConversaModel','cv');
    	    $this->cv->__init__();
    	    $data["result1"] = $this->solic->mostrar(1);
    	    $data["result2"] = $this->solic->mostrarTroca();
    	    $data["result3"] = $this->solic->mostrar(3);
    	    $data["result4"] = $this->cv->finalizada($usuario,1);
    	    $data["result5"] = $this->cv->finalizada2($usuario);
    	    $data["result6"] = $this->cv->finalizada($usuario,3);
            $this->load->view('showSolicitacoes', $data);
        }
    }
    
    public function mensagens(){
        if ($this->session->userdata("_LOGIN") == null )
            $this->load->view('index');
        else{
            $usuario = $this->session->userdata('_LOGIN');
            $this->load->model('ConversaModel','conv');
    	    $this->conv->__init__();
    	    $data["result"] = $this->conv->buscarMensagens($usuario);
    	    $data["usuario"] = $usuario;
    	    $this->load->view('showMensagens', $data);
        }
    }
    
    public function mensagemConversa($id){
        $this->load->model('MensagemModel','msg');
    	$this->msg->__init__();
    	$retorno = $this->msg->getConversa($id);
    	$json = json_encode($retorno);
        header('Content-Type: application/json');
        echo $json;
    }
    
    public function mensagemNova($cd){
        $usuario = $this->session->userdata('_LOGIN');
        $this->load->model('MensagemModel','msg');
    	$this->msg->__init__();
    	$retorno = $this->msg->getMensagem($cd,$usuario);
    	$json = json_encode($retorno);
    	header('Content-Type: application/json');
        echo $json;
    }
    
    public function enviaMensagem(){
        $usuario = $this->session->userdata('_LOGIN');
        $id_to = $this->input->post("para");
        $dt_msg = $data = date('Y-m-d H:i:s');
        $texto = $this->input->post("msg");
        $cd_conv = $this->input->post("conv");
        $this->load->model('MensagemModel','msg');
    	$this->msg->__init__($id_to, $usuario, $dt_msg, $texto, $cd_conv);
    	$this->msg->cadastrar();
    	$json = json_encode([
    	    "stats" => "enviada"
    	]);
    	header('Content-Type: application/json');
        echo $json;
    }
    
    private function get_input_params(){
        $result = NULL;
        if(function_exists('json_decode')) {
            $jsonData = json_decode(trim(file_get_contents('php://input')), true);
            $result = $jsonData['data'][0];
        }
        return $result;
    }
    
    public function trocaLida($cd){
        $this->load->model('MensagemModel','msg');
    	$this->msg->__init__();
    	$this->msg->msgLida($cd);
    }
    
    public function verEstante($u){
        $usuario = $this->session->userdata('_LOGIN');;
        $this->load->model('EstanteModel','estante');
        $this->estante->__init__($u);
    
        $this->load->model('UsuarioModel','user');
        $this->user->__init__($u, "");
        $data['usuario'] = $this->user->getNome();
        $data['usuarioid'] = $u;
        $data["result"] = $this->estante->mostrarLivros();
        $this->load->view('outraEstante',$data);
    }
    
}
