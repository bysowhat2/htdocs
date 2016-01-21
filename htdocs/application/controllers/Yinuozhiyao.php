<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yinuozhiyao extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($pg=1)
	{
		$data['path'] = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, __FILE__);;
		if($pg == 1)
			$this->load->view('1',$data);
		if($pg == 2)
			$this->load->view('2',$data);
		if($pg == 3)
			$this->load->view('3',$data);
		
	}
	
	public function test($pg=1)
	{
		$this->load->view('test3.html');
	}
}
