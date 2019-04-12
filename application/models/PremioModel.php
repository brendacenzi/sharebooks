<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class PremioModel extends CI_Model {
        private $id, $nome, $imagem, $desc, $pontos;

        public function __init__($id = "", $nome = "", $imagem = "", $desc = "", $pontos = ""){
            $this->id = $id;
            $this->nome = $nome;
            $this->imagem = $imagem;
            $this->desc = $desc;
            $this->pontos = $pontos;
        }
    
        public function toArray(){
            $data = array();
            $data["id_premio"] = $this->id;
            $data["nm_premio"] = $this->nome;
            $data["ds_imagem"] = $this->imagem;
            $data["ds_premio"] = $this->desc;
            $data["qt_pontos"] = $this->pontos;
            return $data;
        }
        
        public function mostrarPremios(){
            $this->db->select('*');
            $this->db->from('Premio');
            $this->db->order_by("qt_pontos", "asc");
            $query = $this->db->get();
            return $query;
        }
        
        public function getPremio(){
            $this->db->select('*');
            $this->db->from('Premio');
            $this->db->where("id_premio", $this->id);
            $query = $this->db->get();
            return $query;
        }
    }
?>