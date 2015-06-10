<?php

class Receivesms_model extends CI_Model {

	
    function __construct()
    {
    	parent::__construct();
    }

  
 

function insert_received_message($data){

     $this->db->insert('Sms_message', $data); 
     if($this->db->insert_id()>0)// check last insert id
     {
         return $this->db->insert_id();
     }
     else{
         return FALSE;
     }

}
   



}

?>