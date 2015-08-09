
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		
		$this->load->view('html', $data);
	}

	public function analisisdatos()
	{
		//$this->load->view('html');
		$datos = $this->load->minicio->algo();
		$this->load->view('analisis/analisis',$datos,FALSE);
		
	}

}

/* End of file Graficas.php */
/* Location: ./application/controllers/Graficas.php */
 ?>