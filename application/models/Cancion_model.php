<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cancion_model extends CI_Model
{

    public $table = 'cancion';
    public $id = 'id';
    public $order = 'DESC';
	public $user_id = 'user_id';
	public $genero = 'genero';
	public $visita = 'visita';

    function __construct()
    {
        parent::__construct();
    }
	
	function get_visitas(){
		
		 
		$start = '0';
		$limit = '10';
		
		$this->db->select($this->table.'.id');
		$this->db->select($this->table.'.nombre');
		$this->db->select('count('.$this->visita.'.cancion_id) as `visitas`');
		$this->db->from($this->table);
		$this->db->join($this->visita, $this->table.'.id = '.$this->visita.'.cancion_id');
		$this->db->group_by($this->table.'.id');
		$this->db->order_by("visitas", "desc");
		//if($limit!='' && $start!=''){
		$this->db->limit($limit, $start);
		//}
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) return $query->result();
		
		return NULL;
		
	}

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

     // get data by user_id
    function get_by_user_id($user_id)
    {
    	$this->db->order_by($this->id, $this->order);
        $this->db->where($this->user_id, $user_id);
        return $this->db->get($this->table)->result();
    }
    
	 // get data by genero
    function get_by_genero($genero)
    {
    	$this->db->order_by($this->id, $this->order);
        $this->db->where($this->genero, $genero);
        return $this->db->get($this->table)->result();
    }
    
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
	function set_visita($data)
    {
        $this->db->insert($this->visita, $data);
    }
	
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nombre', $q);
	$this->db->or_like('autor', $q);
	$this->db->or_like('genero', $q);
	$this->db->or_like('album', $q);
	$this->db->or_like('creacion', $q);
	$this->db->or_like('letra', $q);
	$this->db->or_like('ruta_video', $q);
	$this->db->or_like('ruta_audio', $q);
	$this->db->or_like('user_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nombre', $q);
	$this->db->or_like('autor', $q);
	$this->db->or_like('genero', $q);
	$this->db->or_like('album', $q);
	$this->db->or_like('creacion', $q);
	$this->db->or_like('letra', $q);
	$this->db->or_like('ruta_video', $q);
	$this->db->or_like('ruta_audio', $q);
	$this->db->or_like('user_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result_array();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Cancion_model.php */
/* Location: ./application/models/Cancion_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-04 20:21:04 */
/* http://harviacode.com */
