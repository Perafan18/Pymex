<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Minicio extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}
	public function getDatos_byID($id)
	{
		$this->db->select('ID,RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->where("ID",$id);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function getDatos_byNombre($nombre)
	{
		$this->db->select('ID,RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->like("RazonSocial",$nombre);
		$query = $this->db->get('licencias',100,0);
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
		$this->db->select('ID,RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->where("Colonia",$colonia);
		$query = $this->db->get('licencias',100,0);
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
		$this->db->select('ID,RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->where("Giro",$giro);
		$query = $this->db->get('licencias',100,0);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}	
	}
	public function comprobarDuplicados($nombre){
		$this->db->select('RazonSocial as Nombre,Giro,Domicilio,Colonia');
		$this->db->where("RazonSocial",$nombre);
		$query = $this->db->get('licencias');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	public function verCercanos($lat,$long)
	{
		//( 6371 * ACOS( COS( RADIANS($lat) ) * COS(RADIANS( coordenadas.Latitud ) ) * COS(RADIANS( coordenadas.Longuitud )  - RADIANS($long) ) + SIN( RADIANS($lat) ) * SIN(RADIANS( coordenadas.Latitud ) ) )) AS distancia
		//(6371 * ACOS( SIN(RADIANS(coordenadas.Latitud)) * SIN(RADIANS($lat)) + COS(RADIANS(coordenadas.Longuitud - $long)) * COS(RADIANS(coordenadas.Latitud)) * COS(RADIANS($lat)))) AS distance
		$query =$this->db->query("SELECT licencias.ID, licencias.RazonSocial, coordenadas.Longuitud,coordenadas.Latitud, SQRT((($lat-coordenadas.Latitud)*($lat-coordenadas.Latitud))+(($long-coordenadas.Longuitud)*($long-coordenadas.Longuitud))) AS distancia FROM licencias INNER JOIN coordenadas ON licencias.ID = coordenadas.ID ORDER BY distancia DESC LIMIT 5");
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function giroCercan($lat,$long,$giro)
	{
		//( 6371 * ACOS( COS( RADIANS($lat) ) * COS(RADIANS( coordenadas.Latitud ) ) * COS(RADIANS( coordenadas.Longuitud )  - RADIANS($long) ) + SIN( RADIANS($lat) ) * SIN(RADIANS( coordenadas.Latitud ) ) )) AS distancia
		//(6371 * ACOS( SIN(RADIANS(coordenadas.Latitud)) * SIN(RADIANS($lat)) + COS(RADIANS(coordenadas.Longuitud - $long)) * COS(RADIANS(coordenadas.Latitud)) * COS(RADIANS($lat)))) AS distance
		$query =$this->db->query("SELECT licencias.ID, licencias.RazonSocial, coordenadas.Longuitud,coordenadas.Latitud, SQRT((($lat-coordenadas.Latitud)*($lat-coordenadas.Latitud))+(($long-coordenadas.Longuitud)*($long-coordenadas.Longuitud))) AS distancia FROM licencias INNER JOIN coordenadas ON licencias.ID = coordenadas.ID where licencias.Giro = '$giro' ORDER BY distancia DESC LIMIT 5");
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	

	public function registroBusqueda($nombre,$tipo){
		$nombre = array(
			'busqueda' => $nombre,
			'tipoBusqueda' => $tipo, 
			'fechaBusqueda' => date('Y-m-d H:i:s')
		);
		$this->db->insert('_regbusqueda',$nombre);
	}
	public function verCoordenadas($id)
	{
		$this->db->where('ID', $id);
		$query = $this->db->get('coordenadas');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}	
	}

}

/* End of file minicio.php */
/* Location: ./application/models/minicio.php */