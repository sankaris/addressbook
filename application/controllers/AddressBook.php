<?php 

class AddressBook extends CI_Controller {

	
	public function index()
		{
			$this->load->model('commonmodel');
			$this->load->helper('url');
			$result['data'] = $this->commonmodel->listData();
			$this->load->view('list',$result);
		}
  
	public function listContact()
		{
			$this->load->model('commonmodel');
			$data = $this->commonmodel->listData();
			$this->load->view('list');
		}
		
	public function addContact()
		{
			$this->load->model('commonmodel');
			$this->load->view('add');
			$this->save();
		}
		
	public function save()
	{
		$this->load->model('commonmodel');
		$fname = $this->input->post('fname');
		echo $fname;die;
		if($this->input->post('submit') == true){
			$ins = $this->commonmodel->insertData();
		}
	}
	
	public function updateContact()
		{
			$this->load->model('commonmodel');
			$this->load->view('update');
		}
	
	public function deleteContact()
		{
			$this->load->model('commonmodel');
			$this->commonmodel->deleteData($this->input->post('id'));
			$this->listContact();
		}
		
		
	public function viewContact()
	{
			$this->load->model('commonmodel');
			$data = $this->commonmodel->viewData($this->input->post('id'));
			echo "Firstname". $data['fname'];echo '<br/>';
			echo "Lastname". $data['lname'];echo '<br/>';
			echo "Email". $data['email'];echo '<br/>';
			echo "MobileNo". $data['mob'];echo '<br/>';
	}
	

}