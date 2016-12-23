<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
	{
		$this->load->view('home');
	}
	
 public function sobre()
	{
				$data['sobre'] = 1;
		        $data['funciona'] = 0;
		        $data['dicas'] = 0;
		
		$this->load->view('pagesdts',$data);
	} 
	public function funciona()
	{
				$data['sobre'] = 0;
		        $data['funciona'] = 1;
		        $data['dicas'] = 0;
		$this->load->view('pagesdts',$data);
	}
	public function dicas()
	{
		        $data['sobre'] = 0;
		        $data['funciona'] = 0;
		        $data['dicas'] = 1;

		
		$this->load->view('pagesdts',$data);
	}

	public function search()
	{
		$this->load->view('search');
	}
    public function logout()
    {
        $this->load->view('logout');
    }

}


?>