<?php

class Commonmodel extends CI_Model {
   
   public function index()
   {
	   $db = $this->load->database('addressBook');
   }
   
   public function listData(){	   
	   $query = $this->db->query("select * from addressBook");
	   return $query->result();
   }
   
   public function insertData()
   {
	 $data = $this->input->post();
	 echo '<pre>';print_r($data);die;
	 $query = $this->db->insert('addressBook',$data);
	 return $query; 
   }
   
   public function updateData($data,$id)
   {
	   $query = $this->db->query("update  from addressBook where id = ".$id);
	   return $query;
   }
   
   public function deleteData($id)
   {
	   $this->db->where('id',$id);
	   $this->db->delete('addressBook');
   }
   
   public function viewData($id)
   {
	   $query = $this->db->query("select * from addressBook where id=".$id);
	   $data = $query->result();
	   $details = array('fname'=>$data[0]->firstName,'lname'=>$data[0]->lastName,'mob'=>$data[0]->mobileNo,'email'=>$data[0]->emailAddress);
	   return $details;
   }
}