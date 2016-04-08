<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_biodata extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function tambah_biodata($input_biodata){
		$this->db->insert('biodata',$input_biodata);
	}

	function tampil_biodata(){
		$this->db->select('*')->from('biodata');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function delete_biodata($id){
		$this->db->where('id',$id);
		$this->db->delete('biodata');
	}

	function tampil_biodata_edit($id){
		$this->db->select('*')->from('biodata')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function edit_biodata($id,$edit_biodata){
		$this->db->where('id', $id);
		$this->db->update('biodata', $edit_biodata); 
	}
	
}