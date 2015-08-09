<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerardo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model('mprueba');
	}

	public function index()
	{
		$data["contenido"] = $this->load->view('nuevo/mapa', '', TRUE);
		$this->load->view('html',$data, FALSE);	
	}
	public function getLocation(){
		

	}
	public function prueba()
	{
		$data["contenido"] = $this->load->view('nuevo/pruebas', '', TRUE);
		$this->load->view('html',$data, FALSE);		
	}
	public function pruebados()
	{
		$direcciones = $this->mprueba->direcciones();
		$this->output->set_content_type('application/json')->set_output(json_encode($direcciones));	
	}
	public function guardarDatos()
	{
		$data["latitude"]= $this->input->get("latitude");
		$data["longuitud"] = $this->input->get("longuitud");
		$this->mprueba->nuevosdatos($data);

	}

}

/* End of file Gerardo.php */
/* Location: ./application/controllers/Gerardo.php */