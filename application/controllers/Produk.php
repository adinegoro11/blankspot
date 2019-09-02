<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
		$this->load->view('layouts/template');
    }
    
	public function a2()
	{
		echo "22222";
		// $this->load->view('welcome_message');
	}
}
