<?php 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		
		$this->load->view('templates/header', $data);
	}

}

/* End of file Graficas.php */
/* Location: ./application/controllers/Graficas.php */
 ?>