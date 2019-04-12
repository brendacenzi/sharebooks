<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class UsuarioModel extends CI_Model {
        private $nome, $login, $senha, $id, $foto, $desc, $cidade, $estado, $interesses, $nasc, $ponto, $cpf;
      
        public function __init__($login, $senha, $nome = "", $foto = "", $desc = "", $cidade = "", $estado = "", $interesses = "", $nasc = "", $ponto = "", $cpf = ""){
            $this->login = $login;
            $this->senha = $senha;
            $this->nome = $nome;
            $this->foto = $foto;
            $this->desc = $desc;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->interesses = $interesses;
            $this->nasc = $nasc;
            $this->ponto = $ponto;
            $this->cpf = $cpf;
        }
    
        public function toArray(){
            $data = array();
            $data["nm_usuario"] = $this->nome;
            $data["ds_email"] = $this->login;
            $data["cd_usuario"] = $this->id;
            $data["ds_senha"] = $this->senha;
            $data["cd_cpf"] = $this->cpf;
            $data["ds_foto"] = $this->foto;
            $data["ds_usuario"] = $this->desc;
            $data["nm_cidade"] = $this->cidade;
            $data["nm_estado"] = $this->estado;
            $data["ds_interesses"] = $this->interesses;
            $data["dt_nascimento"] = $this->nasc;
            $data["qt_pontos"] = $this->ponto;
            return $data;
        }
        
        public function existeUsuario(){
            $this->db->select('*');
            $this->db->from('Usuario');
            $this->db->where('ds_email', $this->login);
            $query = $this->db->get();
            return $query->num_rows() == 1;
        }
        
        public function existeUsuario2(){
            $this->db->select('*');
            $this->db->from('Usuario');
            $this->db->where('ds_email', $this->login);
            $this->db->where('ds_senha', $this->senha);
            $query = $this->db->get();
            return $query->num_rows() == 1;
        }
        
        public function cadastrar(){
            $this->db->insert('Usuario',$this->toArray());
        }
        
        public function getID(){
            $this->db->select('cd_usuario');
            $this->db->from('Usuario');
            $this->db->where('ds_email',$this->login);
            return $this->db->get();
        }
        
        public function getNome(){
            $this->db->select('nm_usuario');
            $this->db->from('Usuario');
            $this->db->where('cd_usuario',$this->login);
            return $this->db->get();
        }
        
        public function getPontos(){
            $this->db->select('qt_pontos');
            $this->db->from('Usuario');
            $this->db->where('cd_usuario',$this->login);
            return $this->db->get();
        }
        
        public function getinfouser(){
            $this->db->select('`cd_usuario` , `ds_email` ,  `nm_usuario` , `ds_foto` ,  `ds_usuario` ,  `nm_cidade` ,  `nm_estado` ,  `ds_interesses` ,  `dt_nascimento`, `qt_pontos`, `cd_cpf`');
            $this->db->from('Usuario');
            $this->db->where('cd_usuario ='.$this->login);
            return $this->db->get()->result();
        }
        
        public function descontar($p){
            $this->db->set('qt_pontos', 'qt_pontos - ' . $p , FALSE);
            $this->db->where('cd_usuario', $this->login);
            $this->db->update('Usuario');
        }
        
        public function pontuar($p){
            $this->db->set('qt_pontos', 'qt_pontos + ' . $p , FALSE);
            $this->db->where('cd_usuario', $this->login);
            $this->db->update('Usuario');
        }
    }
?>