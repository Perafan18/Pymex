<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mprueba extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}

	public function nuevosdatos($data)
	{
		$objeto = array(
		'Latitude'=>$data["latitude"],
		'Longuitud'=>$data["longuitud"],
		);
		$this->db->insert('coordenadas', $objeto);
	}
	public function direcciones()
	{
		$this->db->select('Domicilio');
		$this->db->order_by('ID', 'asc');
		$query = $this->db->get('licencias',10);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

}

/* End of file  */
/* Location: ./application/models/ */