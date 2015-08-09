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
		echo $direcciones["0"]["Domicilio"];
		$geocode = $this->geocode(" San Luis Potosi, México");
		print_r($geocode);
		//$this->mprueba->nuevosdatos($data);		
			
		

		//$this->output->set_content_type('application/json')->set_output(json_encode($direcciones));	
	}
	public function guardarDatos()
	{
		$data["latitude"]= $this->input->get("latitude");
		$data["longuitud"] = $this->input->get("longuitud");
		$this->mprueba->nuevosdatos($data);

	}
	function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?key=AIzaSyD7170VuMY8-WHDKzMImO-9Lv2LpFH7xwQ&sensor=false&address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']='OK'){
 		print_r($resp);
        // get the important data
        print_r($resp['results']);
        /*
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         */
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}
}

/* End of file Gerardo.php */
/* Location: ./application/controllers/Gerardo.php */