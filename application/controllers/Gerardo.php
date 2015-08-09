<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerardo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model('minicio');
	}

	public function index()
	{
		$data["contenido"] = $this->load->view('nuevo/mapa', '', TRUE);
		$this->load->view('html',$data, FALSE);	
	}
	public function getLocation(){
		

	}

}

/* End of file Gerardo.php */
/* Location: ./application/controllers/Gerardo.php */