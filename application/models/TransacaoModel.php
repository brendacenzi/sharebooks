<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransacaoModel extends CI_Model {
    private $usuario, $doa, $emp, $troca;
    
    public function __init__($usuario, $doa = 0, $emp = 0, $troca = 0){
        $this->usuario = $usuario;
        $this->doa = $doa;
        $this->emp = $emp;
        $this->troca = $troca;
    }
    
    public function toArray(){
        $data = array();
        $data["cd_usuario"] = $this->usuario;
        $data["qt_doa"] = $this->doa;
        $data["qt_emp"] = $this->emp;
        $data["qt_troca"] = $this->troca;
        return $data;
    }

    public function getTransacoes(){
        $this->db->select('*');
        $this->db->from('Transacoes');
        $this->db->where('cd_usuario',$this->usuario);
        $query = $this->db->get();
        return $query;
    }
    
    public function add(){
        $this->db->insert('Transacoes',$this->toArray());
    }
    
    public function updtTroca(){
        $this->db->set('qt_troca', 'qt_troca + ' . 1 , FALSE);
        $this->db->where('cd_usuario', $this->usuario);
        $this->db->update('Transacoes');
    }
    
    public function updtEmp(){
        $this->db->set('qt_emp', 'qt_emp + ' . 1 , FALSE);
        $this->db->where('cd_usuario', $this->usuario);
        $this->db->update('Transacoes');
    }
    
    public function updtDoa(){
        $this->db->set('qt_doa', 'qt_doa + ' . 1 , FALSE);
        $this->db->where('cd_usuario', $this->usuario);
        $this->db->update('Transacoes');
    }
}
    