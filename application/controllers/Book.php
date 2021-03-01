<?php

class Book extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('BookModel');
	}
	
	public function index()
	{
		$result['data'] = $this->BookModel->list();
		$result['title'] = 'Address Book';
		$this->load->view('listView',$result);
	}
	
	public function save()
	{
		$this->load->model('bookModel');
		
	}


}