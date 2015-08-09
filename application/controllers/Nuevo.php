<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Nuevo extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
		
			$this->load->model('minicio');
		}

		public function index()
		{
			$data["contenido"] = $this->load->view('nuevo/nuevo', '', TRUE);
			$this->load->view('html',$data, FALSE);	
		}

		public function buscar(){

			$nombre = $this->input->get_post('nombre', TRUE);
			$resultados = $this->minicio->comprobarDuplicados($nombre);

			if($resultados==FALSE){
				$data["contenido"] = $this->load->view('nuevo/nuevoLibre', '', TRUE);
				$this->load->view('html',$data, FALSE);	
			}else{
				$data["contenido"] = $this->load->view('nuevo/nuevo', '', TRUE);
				$this->load->view('html',$data, FALSE);
			}

		}
		
		public function nombreOcupado()
		{
			$nombre = $this->input->get_post('nombre', TRUE);
			$resultados = $this->minicio->comprobarDuplicados($nombre);
			//$resultados = '{"registros":'.json_encode($resultados).'}';
			if($resultados==FALSE){
				$resultados=array("resultado"=>"Nombre Libre");
			}else{
				$resultados=array("resultado"=>"Nombre Ocupado");
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($resultados));	

		}
		public function nuevoGiro()
		{
			$giro = $this->input->get_post('giro', TRUE);
			$lat = $this->input->get_post('lat', TRUE);
			$lon = $this->input->get_post('lon', TRUE);
			$datos = $this->minicio->giroCercan($lat,$lon,$giro);
			$this->output->set_content_type('application/json')->set_output(json_encode($datos));
		}

	}

	/* End of file nuevo.php */
	/* Location: ./application/controllers/nuevo.php */	
?>