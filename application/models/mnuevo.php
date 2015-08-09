<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnuevo extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}

	public function comprobarDuplicados($Nombre){
		$this->db->select('RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->get_where("RazonSocial",$nombre);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

}

/* End of file mnuevo.php */
/* Location: ./application/models/mnuevo.php */