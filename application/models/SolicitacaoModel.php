<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class SolicitacaoModel extends CI_Model {
        private $u_solic, $u_solic2, $l_solic, $l_ofer, $data, $tipo, $tempo;
      
        public function __init__($u_solic = "", $u_solic2 = "", $l_solic = "", $l_ofer = "", $data = "", $tipo = 0, $tempo = ""){
            $this->u_solic = $u_solic;
            $this->u_solic2 = $u_solic2;
            $this->l_solic = $l_solic;
            $this->l_ofer = $l_ofer;
            $this->data = $data;
            $this->tipo = $tipo;
            $this->tempo = $tempo;
        }
             
    
        public function toArray(){
            $data = array();
            $data["cd_solicitado"] = $this->u_solic;
            $data["cd_solicitante"] = $this->u_solic2;
            $data["cd_livrosolicitado"] = $this->l_solic;
            $data["cd_livrooferecido"] = $this->l_ofer;
            $data["dt_transacao"] = $this->data;
            $data["cd_tipo"] = $this->tipo;
            $data["qt_tempo"] = $this->tempo;
            return $data;
        }
        
        public function temSolicitacao(){
            $this->db->select('cd_tipo');
            $this->db->from('Solicitacao');
            $this->db->where('cd_solicitado', $this->u_solic);
            $this->db->where('cd_solicitante', $this->u_solic2);
            $this->db->where('cd_livrosolicitado', $this->l_solic);
            $query = $this->db->get();
            return $query;  
        }
        
        public function solicitar(){
            $this->db->insert('Solicitacao',$this->toArray());
        }
        
        public function deletar(){
            $this->db->where('cd_solicitado', $this->u_solic);
            $this->db->where('cd_solicitante', $this->u_solic2); 
            $this->db->where('cd_livrosolicitado', $this->l_solic); 
            $this->db->where('cd_tipo', $this->tipo); 
            $this->db->delete('Solicitacao');
        }
        
        public function excluir($i){
            $this->db->where('id_transacao', $i);
            $this->db->delete('Solicitacao');
        }
        
        public function mostrar($i){
            $this->db->select('s.id_transacao, s.cd_solicitado, s.cd_solicitante, cd_livrosolicitado, s.cd_livrooferecido, s.dt_transacao, s.cd_tipo, s.qt_tempo,
                                    l.nm_livro, l.ds_capalivro, u.nm_usuario, u.ds_foto');
            $this->db->from('Solicitacao as s');
            $this->db->join('Livro as l', 'l.cd_livro = s.cd_livrosolicitado');
            $this->db->join('Usuario as u', 'u.cd_usuario = s.cd_solicitante');
            $this->db->where('s.cd_solicitado', $this->u_solic);
            $this->db->where('s.cd_tipo', $i);
            $query = $this->db->get();
            return $query;
        }
        
        public function mostrarTroca(){
            $this->db->select('s.id_transacao, s.cd_solicitado, s.cd_solicitante, cd_livrosolicitado, s.cd_livrooferecido, s.dt_transacao, s.cd_tipo, s.qt_tempo,
                                    l.nm_livro, l.ds_capalivro, u.nm_usuario, u.ds_foto, ofer.nm_livro as oferta, ofer.ds_capalivro as imgoferta');
            $this->db->from('Solicitacao as s');
            $this->db->join('Livro as l', 'l.cd_livro = s.cd_livrosolicitado');
            $this->db->join('Livro as ofer', 'ofer.cd_livro = s.cd_livrooferecido');
            $this->db->join('Usuario as u', 'u.cd_usuario = s.cd_solicitante');
            $this->db->where('s.cd_solicitado', $this->u_solic);
            $this->db->where('s.cd_tipo', 2);
            $query = $this->db->get();
            return $query;
        } 
    }
?>


