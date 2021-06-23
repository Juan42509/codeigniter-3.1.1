<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function getTemplate($view){
        $data = array(
            'head' => $this->load->view('layouts/header','',true),
            'sidebar' => $this->load->view('layouts/sidebar','',true),
            'nav' => $this->load->view('layouts/nav','',true),
            'content' => $view,
            'footer' => $this->load->view('layouts/footer','',true)
        );

        return $this->load->view('layouts/dashboard',$data);
    }

	// $vista =  $this->load->view('admin/usuarios',$data,true);
	// $this->getTemplate($vista);


	public function index()
	{
		echo base_url();

		$_SESSION['hola'] = true;
		var_dump($_SESSION['hola']);
		$this->load->view('welcome_message');
	}

	public function hola(){
		echo 'hola';
	}
}
