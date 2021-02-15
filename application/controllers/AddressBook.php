<?php 

class AddressBook extends CI_Controller {

	
	public function index()
		{
			$this->load->model('commonmodel');
			$this->load->helper('url');
			$this->load->helper('form');
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
			$this->load->view('add');
			$this->load->model('commonmodel');
			if($this->input->post('save'))
			{
				$data['firstName']=$this->input->post('fname');
				$data['lastName']=$this->input->post('lname');
				$data['dob']=$this->input->post('dob');
				$data['gender']=$this->input->post('gender');
				$data['mobileNo']=$this->input->post('mobileno');
				$data['phoneNo']=$this->input->post('phoneno');
				$data['emailAddress']=$this->input->post('email');
				$data['street']=$this->input->post('street');
				$data['city']=$this->input->post('city');
				$data['hobbies']=$this->input->post('hobbies');
				$result=$this->commonmodel->insertData($data);
				if($result>0){
						echo "Contact Saved Successfully";
						$this->listContact();
				}
				else{
						echo "Error in inserting address";
				}
			}
	}
	
	public function updateContact()
		{
			$id=$this->input->post('id');
			$this->load->model('commonmodel');
			$result['data']=$this->commonmodel->viewData($id);
			$this->load->view('update',$result);
	
			if($this->input->post('update'))
			{
				$firstName=$this->input->post('fname');
				$lastName=$this->input->post('lname');
				$email=$this->input->post('email');
				$this->commonmodel->updateContact($first_name,$last_name,$email,$id);
				echo "Data updated successfully !";
			}
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