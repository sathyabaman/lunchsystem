<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class receivesms extends CI_Controller {


    function __construct() {
        parent::__construct();
              
      //session, url, satabase is set in auto load in the config
        $this->load->model('Receivesms_model', 'recive');
    }

    function index(){

    }


function receive() {
    $date = date("Y-m-d H:i:s"); 
    $from = $this->input->post('From');
    $body = $this->input->post('Body');

    if (isset($from) && isset($body)) { //create your insert array like that
        $sms = array(
            'pone_number' => $from,
            'message_type' => 2,
            'body' => $body,
            'date_time' => $date
        );

        $result = $this->recive->insert_received_message($sms);
    }
}



}
?>