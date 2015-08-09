<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnuevo extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}

	public function comprobarDuplicados($Nombre)
	{
		$this->db->select('RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->get_where("RazonSocial",$nombre);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	public function registroBusqueda($nombre,$tipo)
	{
		$nombre = array(
			'busqueda' => $nombre['Nombre'],
			'tipoBusqueda' => $tipo, 
			'fechaBusqueda' => date('Y-m-d H:i:s'), 
		);
		$this->db->insert('_regbusqueda',$nombre);
	}

	public function algo() 
	{
		$this->db->select('Busquedas as busqueda, tipoBusqueda,fechaBusqueda');
		$this->db->where("fechaBusqueda"<=date(2015-10-d);
		$query= $this->db->get('_regbusqueda');
		for ($i=0; $i < $query.length; $i++) { 
					# code...
			echo("<p>"+$query+"</p>");
		}
		return $query;		
		
	}


}

/* End of file mnuevo.php */
/* Location: ./application/models/mnuevo.php */