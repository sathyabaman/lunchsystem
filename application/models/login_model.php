<?php

class Login_model extends CI_Model {

	
    function __construct()
    {
    	parent::__construct();
    }




    //check if user exists
    function check_vendor($data){
     $array = array ('vendor_email' => $data['email'], 'vendor_password'=> $data['password']);
      
      $this->db->select('vendor_id');
      $this->db->from('Vendor');
      $this->db->where($array);
      $query = $this->db->get();
      $total_rows =  $query->num_rows();
      return $total_rows;
    }

     function check_school($data){
      $array = array ('sch_email' => $data['email'], 'sch_password'=> $data['password']);
      
      $this->db->select('sch_id');
      $this->db->from('school');
      $this->db->where($array);
      $query = $this->db->get();
      $total_rows =  $query->num_rows();
      return $total_rows;
    }

    function check_admin($data){
      $array = array ('email' => $data['email'], 'password'=> $data['password']);
      
      $this->db->select('id');
      $this->db->from('Admin');
      $this->db->where($array);
      $query = $this->db->get();
      $total_rows =  $query->num_rows();
      return $total_rows;
    }


    //login

    function admin_login($data){
      $array = array ('email' => $data['email'], 'password'=> $data['password']);
      $this->db->select('*');
      $this->db->from('Admin');
      $this->db->where($array);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function vendor_login($data){
      $array = array ('vendor_email' => $data['email'], 'vendor_password'=> $data['password']);
      $this->db->select('*');
      $this->db->from('Vendor');
      $this->db->where($array);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function school_login($data){
      $array = array ('sch_email' => $data['email'], 'sch_password'=> $data['password']);
      
      $this->db->select('*');
      $this->db->from('school');
      $this->db->where($array);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function check_email_exists($email){
      $total = 0;


        $total = $this->check_school_email_exist($email);
        if($total == 1){ return $total ;}
        $total = $this->check_vendor_email_exist($email);
        if($total == 1){ return $total ;}
    }

    private function check_school_email_exist($email){
      $where = array('sch_email' => $email);
      $this->db->select('*');
      $this->db->from('school'); 
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    private function check_vendor_email_exist($email){
      $where = array('vendor_email' => $email);
      $this->db->select('*');
      $this->db->from('Vendor'); 
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

}
?>