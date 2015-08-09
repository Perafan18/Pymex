<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Minicio extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}

	public function getDatos_byNombre($nombre)
	{
		$this->db->select('RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->like("RazonSocial",$nombre);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function getColonias()
	{
		$this->db->select('Colonia');
		$this->db->distinct();
		$this->db->order_by('Colonia', 'asc');
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function getDatos_ByColonia($colonia)
	{
		$this->db->select('RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->where("Colonia",$colonia);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}	
	}
	public function getGiros()
	{
		$this->db->select('Giro');
		$this->db->distinct();
		$this->db->order_by('Giro', 'asc');
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function getDatos_ByGiro($giro)
	{
		$this->db->select('RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->where("Giro",$giro);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}	
	}

}

/* End of file minicio.php */
/* Location: ./application/models/minicio.php */