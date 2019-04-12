<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensagemModel extends CI_Model {
    private $idmsg, $to, $from, $data, $msg, $conversa, $lida;
    
    public function __init__($to = "", $from = "", $data = "", $msg = "", $conversa = "", $lida = 0){
        $this->to = $to;
        $this->from = $from;
        $this->data = $data;
        $this->msg = $msg;
        $this->conversa = $conversa;
        $this->lida = $lida;
    }
    
    public function toArray(){
        $data = array();
        $data["id_to"] = $this->to;
        $data["id_from"] = $this->from;
        $data["dt_msg"] = $this->data;
        $data["ds_msg"] = $this->msg;
        $data["cd_conversa"] = $this->conversa;
        $data["ic_msglida"] = $this->lida;
        return $data;
    }
    
    public function getConversa($id){
        $this->db->select('*');
        $this->db->from('Mensagem');
        $this->db->where('cd_conversa', $id);
        return $this->db->get()->result_array();
    }
    
    public function getMensagem($cd,$u){
        $this->db->select('*');
        $this->db->from('Mensagem');
        $this->db->where('cd_conversa', $cd);
        $this->db->where('ic_msglida', 0);
        $this->db->where('id_to', $u);
        return $this->db->get()->result_array();
    }
    
    public function cadastrar(){
        $this->db->insert('Mensagem',$this->toArray());
    }
    
    public function msgLida($id){
        $this->db->set('ic_msglida', 1 , FALSE);
        $this->db->where('id_msg', $id);
        $this->db->update('Mensagem');
    }
    
    public function excluir($c){
        $this->db->where('cd_conversa', $c);
        $this->db->delete('Mensagem');
    }
}
?>