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
   
   public function insertData($data)
   {
	 $query = $this->db->insert('addressBook',$data);
	 return $this->db->insert_id();
   }
   
   public function updateData($first_name,$last_name,$email,$id)
   {
	   $query = $this->db->query("update addressBook SET firstName='$first_name',lastName='$last_name',email='$email' where id='$id'");
   }
   
   public function deleteData($id)
   {
	   $this->db->where('id',$id);
	   $this->db->delete('addressBook');
   }
   
   public function viewData($id)
   {
	   $this->db->where('id',$id);
	   $q = $this->db->get('addressBook');
       $data = $q->result_array();
	   //$details = array('fname'=>$data[0]->firstName,'lname'=>$data[0]->lastName,'mob'=>$data[0]->mobileNo,'email'=>$data[0]->emailAddress);
	   return $data;
   }
}