<?php
class Users extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
	}
	
	function login()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('words');
		}
		$this->load->view('users/login');
	}
	
	function authenticate()
	{
		$this->config->load('userlogin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(($username === $this->config->item('username'))&&(hash('md5',$password) === $this->config->item('password_encrypt')))
		{
			$info = array(
				'username' => $username,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($info);
			redirect('words');
		}
		else
		{
			set_flash('message','failed','Username or Password is wrong.');
			redirect('users/login');
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		set_flash('message','success','Logout Complete');
		redirect('users/login');
	}
}
?>