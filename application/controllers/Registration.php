<?php
class Registration extends CI_Controller
{
 
 public function __construct()
 {
     parent::__construct;
 }

 public function index()
 {
     $this->load->helper(array('url','form'));
 }

 public function register()
 {
     $data['title'] = 'Register Here';
     $this->load->view('registerForm',@$data);
 }

}