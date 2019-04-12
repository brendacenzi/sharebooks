<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstanteModel extends CI_Model {
    private $idlivro, $usuario, $disp, $estado, $emp, $troc, $doa;
    
    public function __init__($usuario, $idlivro = "", $estado = "", $emp = 0, $troc = 0, $doa = 0){
        $this->usuario = $usuario;
        $this->idlivro = $idlivro;
        $this->estado = $estado;
        $this->emp = $emp;
        $this->troc = $troc;
        $this->doa = $doa;
    }
    
    public function toArray(){
        $data = array();
        $data["cd_usuario"] = $this->usuario;
        $data["cd_livro"] = $this->idlivro;
        $data["ds_estado"] = $this->estado;
        $data["cd_emp"] = $this->emp;
        $data["cd_doa"] = $this->doa;
        $data["cd_troc"] = $this->troc;
        return $data;
    }
    
    public function adcEstante(){
        $this->db->insert('Estante',$this->toArray());
    }
    
    public function jaTem(){
        $this->db->select('*');
        $this->db->from('Estante');
        $this->db->where('cd_livro',$this->idlivro);
        $this->db->where('cd_usuario',$this->usuario);
        $query = $this->db->get();
        return $query->num_rows() == 1;
    }
    
    
    public function mostrarLivros(){
        $this->db->select('e.cd_livro, l.nm_livro, l.nm_autor, l.cd_isbn, l.ds_capalivro, e.cd_emp, e.cd_troc, e.cd_doa');
        $this->db->from('Estante as e');
        $this->db->join('Livro as l', 'l.cd_livro = e.cd_livro');
        $this->db->where('e.cd_usuario', $this->usuario);
        $query = $this->db->get();
        return $query;
    }
    
    public function remover(){
        $this->db->where('cd_livro',$this->idlivro);
        $this->db->where('cd_usuario',$this->usuario);  
        $this->db->delete('Estante');
    }

    public function transacao($aux, $aux1){
        $data = array();
        $data[$aux] = $aux1;
        $this->db->where('cd_usuario', $this->usuario);
        $this->db->where('cd_livro', $this->idlivro);
        $this->db->update('Estante',$data); 
    }

    public function verDisp(){
        $this->db->select('e.cd_emp, e.cd_troc, e.cd_doa');
        $this->db->from('Estante as e');
        $this->db->join('Livro as l', 'l.cd_livro = e.cd_livro');
        $this->db->where('e.cd_usuario', $this->usuario);
        $this->db->where('e.cd_livro', $this->idlivro);
        $query = $this->db->get();
        return $query;
    }
    
    public function buscar(){
        $this->db->select(" *
        from Estante as e
        inner join Livro as l on l.cd_livro = e.cd_livro
        inner join Usuario as u on e.cd_usuario = u.cd_usuario
        where (e.cd_emp = 1 OR e.cd_troc = 1 OR e.cd_doa = 1)
        and e.cd_usuario <> ". $this->usuario ."
        and l.". $this->estado ." like '%". $this->idlivro ."%'
		");
		$query = $this->db->get();
        return $query;
    }
    
    public function buscarFiltro($filtro){
        $this->db->select(" *
        from Estante as e
        inner join Livro as l on l.cd_livro = e.cd_livro
        inner join Usuario as u on e.cd_usuario = u.cd_usuario
        where (e.cd_emp = 1 OR e.cd_troc = 1 OR e.cd_doa = 1)
        and e.cd_usuario <> ". $this->usuario ."
        and l.". $this->estado ." like '%". $this->idlivro ."%'
		and u.nm_estado = '" . $filtro . "'
		");
		$query = $this->db->get();
        return $query;
    }
    public function estados(){
        $this->db->select(" u.nm_estado
        from Estante as e
        inner join Livro as l on l.cd_livro = e.cd_livro
        inner join Usuario as u on e.cd_usuario = u.cd_usuario
        where (e.cd_emp = 1 OR e.cd_troc = 1 OR e.cd_doa = 1)
        and e.cd_usuario <> ". $this->usuario ."
        and l.". $this->estado ." like '%". $this->idlivro ."%'
		 group by u.nm_estado");
		$query = $this->db->get();
        return $query;
    }
    
    public function temRetorno(){
        $this->db->select(" *
        from Estante as e
        inner join Livro as l on l.cd_livro = e.cd_livro
        inner join Usuario as u on e.cd_usuario = u.cd_usuario
        where (e.cd_emp = 1 OR e.cd_troc = 1 OR e.cd_doa = 1)
        and e.cd_usuario <> ". $this->usuario ."
        and l.". $this->estado ." like '%". $this->idlivro ."%'
		");
        $query = $this->db->get();
        return $query->num_rows() > 0;                                                                                                               
    }
    
    public function livroDisp(){
        $this->db->select('e.cd_livro,l.nm_livro,l.nm_autor,l.cd_isbn,l.ds_capalivro,l.ds_bannerlivro,l.ds_categoria,l.ds_livro, u.cd_usuario, u.nm_usuario, u.cd_usuario, u.nm_estado, u.nm_cidade, e.ds_estado, l.cd_class');
        $this->db->from('Estante as e');
        $this->db->join('Livro as l', 'l.cd_livro = e.cd_livro');
        $this->db->join('Usuario as u', 'e.cd_usuario = u.cd_usuario');
        $this->db->where('l.cd_livro', $this->idlivro);
        $this->db->where('e.cd_usuario', $this->usuario);
        $query = $this->db->get();
        return $query;
    }
    
    public function verTipo(){
        $this->db->select('cd_emp, cd_doa, cd_troc');
        $this->db->from('Estante');
        $this->db->where('cd_livro', $this->idlivro);
        $this->db->where('cd_usuario', $this->usuario);
        $query = $this->db->get();
        return $query;
    }
}
?>