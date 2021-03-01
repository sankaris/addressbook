<?php
class BookModel extends CI_Model
{
  public function __construct()
  {
	parent::__construct();
  }
  

  public function list()
  {
    $this->db->select("*");
	$this->db->from("addressBook");
	$result = $this->db->get()->result();
	return $result;
  }

}