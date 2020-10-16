<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *| --------------------------------------------------------------------------
 *| Web Controller
 *| --------------------------------------------------------------------------
 *| For default controller
 *|
 */
class Landing extends MY_Controller
{


	public function index()
	{
		$this->load->view('pages/home');
	}
	public function login()
	{
		$this->load->view('auth/login');
	}
	public function register()
	{
		$this->load->view('auth/register');
	}
}


/* End of file Web.php */
/* Location: ./application/controllers/Web.php */