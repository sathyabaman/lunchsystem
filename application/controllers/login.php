<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller {


    function __construct() {
        parent::__construct();
              
      //session, url, satabase is set in auto load in the config
        $this->load->model('Login_model', 'login');
    }

    function index(){

    	 $post_data['email'] 	=  $this->input->post('email');
         $post_data['password'] =  $this->input->post('password');

         if($post_data['email'] && $post_data['password']){
         	$post_data['password'] = md5( $this->input->post('password'));

         	$total = $this->login->check_vendor($post_data);
         	if($total == 1){
         		$user_data1 = $this->login->vendor_login($post_data);
         		$this->session->set_userdata('is_logged_in', true);
         		$this->session->set_userdata('usertype', 'vendor');
                $this->session->set_userdata('user', $user_data1);
                redirect('login/send_user', 'refresh');
         	}

         	$total2 = $this->login->check_school($post_data);
         	if($total2 == 1){
         		$user_data2 = $this->login->school_login($post_data);
         		$this->session->set_userdata('is_logged_in', true);
         		$this->session->set_userdata('usertype', 'school');
                $this->session->set_userdata('user', $user_data2);
                redirect('login/send_user', 'refresh');
         	}


            $total3 = $this->login->check_admin($post_data);
            if($total3 == 1){
                $user_data2 = $this->login->admin_login($post_data);
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_userdata('usertype', 'administrator');
                $this->session->set_userdata('user', $user_data2);
                redirect('login/send_user', 'refresh');
            }

            $this->session->set_userdata('login_error', "failed");           
            $this->load->view('login');


         }else {
    		$this->load->view('login');
    	}
    }


    function send_user(){

    	$is_logged_in = $this->session->userdata('is_logged_in');
	    	if($is_logged_in){

	    	 $user_type = $this->session->userdata('usertype');
		    	 if($user_type == 'school'){
		    	 	redirect('school/', 'refresh');
		    	 } else if($user_type == 'vendor'){
		    	 	redirect('vendor/', 'refresh');
		    	 }else if($user_type == 'administrator'){
                    redirect('administrator/', 'refresh');
                 }else {
		    	 	redirect('login/', 'refresh');
		    	 }
		    	 
	    	} else{
	    		redirect('login/send_user', 'refresh');
	    	}
    }


    function reset_password(){
        $post_data['email']     =  $this->input->post('reset_email');
        if($post_data['email']){
           $total = $this->login->check_email_exists($post_data['email']);

                   if($total == 1){
                    $this->session->set_userdata('reset_email', "exists");           
                    redirect('login/', 'refresh');
                   }else{
                    $this->session->set_userdata('reset_email', "notexists");           
                    redirect('login/', 'refresh');
                   }

        } 
    }


    //send email to change passwords




}
?>