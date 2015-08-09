<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('minicio');
	}

	public function index()
	{
		$this->load->view('html', "", FALSE);
	}
	public function negociosCercanos()
	{
		$data["contenido"] = $this->load->view('negociosCercanos',"", TRUE);
		$this->load->view('html', $data, FALSE);
	}
	public function verCercanos()
	{
		$long = $this->input->get('long', TRUE);
		$lat = $this->input->get('lat', TRUE);
		$cercanos = $this->minicio->verCercanos($lat,$long);
		$this->output->set_content_type('application/json')->set_output(json_encode($cercanos));
		
	}
	public function buscar()
	{
		$data["contenido"] = $this->load->view('buscador/buscador_nombre', '', TRUE);
		$this->load->view('html',$data, FALSE);	
	}
	public function buscarNombre()
	{
		$data["contenido"] = $this->load->view('buscador/buscador_nombre', '', TRUE);
		$this->load->view('html',$data, FALSE);	
	}
	public function busquedaNombre()
	{
		$nombre = $this->input->get_post('nombre', TRUE);
		$resultados = $this->minicio->getDatos_byNombre($nombre);
		$this->minicio->registroBusqueda($nombre,'nombre');
		//$resultados = '{"registros":'.json_encode($resultados).'}';
		$this->output->set_content_type('application/json')->set_output(json_encode($resultados));	
		
	}
	public function buscarColonia()
	{
		$data_buscador["opciones"] = $this->minicio->getColonias();
		$data["contenido"] = $this->load->view('buscador/buscador_colonia',$data_buscador , TRUE);
		$this->load->view('html',$data, FALSE);	
	}
	public function busquedaColonia()
	{
		$colonia = $this->input->post('colonia', TRUE);
		$resultados = $this->minicio->getDatos_byColonia($colonia);
		$this->minicio->registroBusqueda($colonia,'colonia');
		$this->output->set_content_type('application/json')->set_output(json_encode($resultados));	
	}
	public function buscarGiro()
	{
		$data_buscador["opciones"] = $this->minicio->getGiros();
		$data["contenido"] = $this->load->view('buscador/buscador_giros',$data_buscador , TRUE);
		$this->load->view('html',$data, FALSE);	
	}
	public function busquedaGiro()
	{
		$giro = $this->input->post('giro', TRUE);
		$this->minicio->registroBusqueda($giro,'giro');
		$resultados = $this->minicio->getDatos_byGiro($giro);
		$this->output->set_content_type('application/json')->set_output(json_encode($resultados));	
	}

	public function verNegocio()
	{

	}

	public function busquedaRegistro()
	{
		//$registro = $this->input->post('registro',TRUE);

	} 

	public function analisisdatos()
	{
		$this->load->view('analisis/header', $data, FALSE);
		$this->load->minicio->algoBusqueda();
		$this->load->view('analisis/analisis', $data, FALSE);
		$this->load->view('analisis/footer', $data, FALSE);
	}
}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */