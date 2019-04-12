<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConversaModel extends CI_Model {
    private $livro1, $livro2, $usu1, $usu2, $tipo, $tempo;
    
    public function __init__($livro1 = "", $livro2 = "", $usu1 = "", $usu2 = "", $tipo = "", $tempo = ""){
        $this->livro1 = $livro1;
        $this->livro2 = $livro2;
        $this->usu1 = $usu1;
        $this->usu2 = $usu2;
        $this->tipo = $tipo;
        $this->tempo = $tempo;
    }

    public function toArray(){
        $data = array();
        $data["cd_livrosolicitado"] = $this->livro1;
        $data["cd_livroofertado"] = $this->livro2;
        $data["cd_usuariosolicitante"] = $this->usu1;
        $data["cd_usuariosolicitado"] = $this->usu2;
        $data["ds_tipo"] = $this->tipo;
        $data["qt_tempo"] = $this->tempo;
        return $data;
    }
    
    public function cadastrar(){
        $this->db->insert('Conversa', $this->toArray());
    }
    
    public function buscarMensagens($eu){
        $this->db->select('c.*, u.nm_usuario as solicitante, u.cd_usuario as idsolicitante, u.ds_foto as imgsolicitante, user.nm_usuario as solicitado, user.cd_usuario as idsolicitado, user.ds_foto as imgsolicitado, l.nm_livro,
        (SELECT m.ds_msg 
        FROM  Mensagem as m 
        WHERE m.cd_conversa = c.id_conversa 
        ORDER BY dt_msg DESC 
        LIMIT 1) as msg
        ');
        $this->db->from('Conversa as c');
        $this->db->join('Usuario as u', 'u.cd_usuario = c.cd_usuariosolicitante');
        $this->db->join('Usuario as user', 'user.cd_usuario = c.cd_usuariosolicitado');
        $this->db->join('Livro as l', 'l.cd_livro = c.cd_livrosolicitado');
        $this->db->where('c.ic_finalizado', 0);
        $this->db->where("(`c.cd_usuariosolicitante` = " . $eu . " or `c.cd_usuariosolicitado` = " . $eu . ")");
        // $this->db->where('c.cd_usuariosolicitante', $eu);
        // $this->db->or_where('c.cd_usuariosolicitado', $eu);
        $query = $this->db->get();
        return $query;
    }
    
    public function finalizada($eu, $t){
        $this->db->select('c.*, l.*, user.nm_usuario as solicitado, u.nm_usuario as solicitante, user.cd_usuario as idsolicitado, u.cd_usuario as idsolicitante, user.ds_foto as imgsolicitado, u.ds_foto as imgsolicitante');
        $this->db->from('Conversa as c');
        $this->db->join('Usuario as u', 'u.cd_usuario = c.cd_usuariosolicitante');
        $this->db->join('Usuario as user', 'user.cd_usuario = c.cd_usuariosolicitado');
        $this->db->join('Livro as l', 'l.cd_livro = c.cd_livrosolicitado');
        $this->db->where('c.ic_finalizado', 1);
        $this->db->where('c.ds_tipo', $t);
        $this->db->where('c.cd_acordo <>', $eu);
        $this->db->where("(`c.cd_usuariosolicitante` = " . $eu . " or `c.cd_usuariosolicitado` = " . $eu . ")");
        $query = $this->db->get();
        return $query;
    }
    
    public function finalizada2($eu){
        $this->db->select('c.*, u.nm_usuario as solicitante, user.nm_usuario as solicitado, u.ds_foto as imgsolicitante, user.ds_foto imgsolicitado, u.ds_foto, l.nm_livro as nmlivro, li.nm_livro as nmoferta, li.ds_capalivro as dsoferta, l.ds_capalivro dslivro');
        $this->db->from('Conversa as c');
        $this->db->join('Usuario as u', 'u.cd_usuario = c.cd_usuariosolicitante');
        $this->db->join('Usuario as user', 'user.cd_usuario = c.cd_usuariosolicitado');
        $this->db->join('Livro as l', 'l.cd_livro = c.cd_livrosolicitado');
        $this->db->join('Livro as li', 'li.cd_livro = c.cd_livroofertado');
        $this->db->where('c.ic_finalizado', 1);
        $this->db->where('c.ds_tipo', 2);
        $this->db->where('c.cd_acordo <>', $eu);
        $this->db->where("(`c.cd_usuariosolicitante` = " . $eu . " or `c.cd_usuariosolicitado` = " . $eu . ")");
        $query = $this->db->get();
        return $query;
    }
    
    
    public function confirmar($c){
        $this->db->set('ic_finalizado', 1 , FALSE);
        $this->db->where('id_conversa', $c);
        $this->db->update('Conversa');
    }
    
    public function acordo($c, $u){
        $this->db->set('cd_acordo', $u , FALSE);
        $this->db->where('id_conversa', $c);
        $this->db->update('Conversa');
    }
    
    public function excluir($c){
        $this->db->where('id_conversa', $c);
        $this->db->delete('Conversa');
    }
}    
?>