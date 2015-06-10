<?php

class Mail_model extends CI_Model {

	
    function __construct()
    {
    	parent::__construct();
      $this->load->library('email');
    }



    function email_config(){
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'smbiz.lankahost.net ',
          'smtp_port' => 465,
          'smtp_user' => 'info@lankahomes.lk',
          'smtp_pass' => 'fdsfds542760',
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1'
      );
      $this->load->library('email', $config);
    }


    function get_email_config(){
      $this->db->select('*'); 
      $this->db->from('Email_settings'); 
      $this->db->where('id', '1'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;

    }

    function send_mail($data){

    $this->email_config();

    $this->email->set_newline("\r\n");

    $this->email->from('info@lankahomes.lk', 'Lankahomes');
    $this->email->to($data['to']); 
    $this->email->subject($data['subject']);
    $this->email->message($data['message']);  

    // Set to, from, message, etc.

    $result = $this->email->send();
    return $result;

    }



}


  ?>