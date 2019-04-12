<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LivroModel extends CI_Model {
    private $idlivro, $nome, $autor, $isbn, $capa, $banner, $ds, $classi, $categ;
    
    public function __init__($idlivro, $nome, $autor = NULL, $isbn = NULL, $capa = NULL, $banner = NULL, $ds = NULL, $classi = NULL, $categ = NULL){
        $this->idlivro = $idlivro;
        $this->nome = $nome;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->capa = $capa;
        $this->banner = $banner;
        $this->ds = $ds;
        $this->classi = $classi;
        $this->categ = $categ;
    }

    public function toArray(){
        $data = array();
        $data["cd_livro"] = $this->idlivro;
        $data["nm_livro"] = $this->nome;
        $data["nm_autor"] = $this->autor;
        $data["cd_isbn"] = $this->isbn; 
        $data["ds_capalivro"] = $this->capa;
        $data["ds_bannerlivro"] = $this->banner;
        $data["ds_livro"] = $this->ds;
        $data["cd_class"] = $this->classi;
        $data["ds_categoria"] = $this->categ;
        return $data;
    }
    
    public function cadastrar(){
        $this->db->insert('Livro',$this->toArray());
    }
    
    public function existeLivro(){
        $this->db->select('*');
        $this->db->from('Livro');
        $this->db->where('cd_livro', $this->idlivro);
        $query = $this->db->get();
        return $query->num_rows() == 1;
    }
}
?>