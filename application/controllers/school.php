<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class school extends CI_Controller {


    function __construct() {
        parent::__construct();
      
      $is_logged_in = $this->session->userdata('is_logged_in');
      $user_type = $this->session->userdata('usertype');
	  if($is_logged_in == true && $user_type == 'school'){

	  }else {
	  	redirect('login/', 'refresh');
	  }
      //session, url, satabase is set in auto load in the config
        $this->load->model('School_model', 'school');
    }

    function index(){
    	redirect('school/dashboard/', 'refresh');
    }

    function dashboard(){
        $data['total_order'] = $this->school->get_orders_count();
        $data['total_students'] = $this->school->get_students_count();
        $data['total_menus'] = $this->school->get_menu_count();
        $data['orders'] = $this->school->get_dashboard_orders();

        $this->load->view('school_dashboard', $data);
    }


    function manage_school(){
    	$school  = $this->session->userdata('user');

    	$data['schools'] = $this->school->get_schools($school[0]->sch_id);
    	$this->load->view('school_manage_school', $data);
    }

    function edit_school(){
    	 $post_data['school_id']   =  $this->input->post('scl_id');
         $post_data['school_name'] =  $this->input->post('scl_name');
         $post_data['email']       =  $this->input->post('scl_email');
         $post_data['phone']       =  $this->input->post('scl_Phonenumber');
         $post_data['address']     =  $this->input->post('scl_Address');
         $post_data['time_lunch']  =  $this->input->post('scl_TimeofLunch');
         $post_data['tno_student'] =  $this->input->post('scl_TotalNumberOfStudent');
         $post_data['admin_name']  =  $this->input->post('scl_admin');


            if($this->input->post('scl_password') !== ""){
                $post_data['password']    =  md5($this->input->post('scl_password'));
            }

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $config['upload_path'] = './school_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '6000';
                $config['file_name'] = 'lunch'.md5(time());
                $config['overwrite'] = false;

                $this->load->library('upload', $config);
                $this->upload->do_upload('avatar');

                $image_data = array('upload_data' => $this->upload->data());
                $post_data['image']    =$image_data["upload_data"]["file_name"];
            }

            $this->school->update_school($post_data);

           redirect('school/manage_school/', 'refresh');
    }


    function manage_parent(){
    	$school  = $this->session->userdata('user');


        $data['parent'] = $this->school->get_parent($school[0]->sch_id);
        $size = sizeof($data['parent']);
        
        	$get['school']=$school[0]->sch_id;

            for($k=0; $k< $size; $k++){
            	$get['parent']=$data['parent'][$k]->par_id;
            	$noof_student = $this->school->no_of_std_per_parent($get);
	                if(!$noof_student == 0){
	                $data['parent'][$k]->student = $noof_student;
	                }
            }

        $this->load->view('school_manage_parent', $data);
    }


    function get_student_single_parent(){
    	$school  = $this->session->userdata('user');

    	$data['school'] =$school[0]->sch_id;
        $data['parent'] = $this->input->post('parent_id');
        $students= $this->school->get_students_for_parent($data);
        echo json_encode(array( 'total'=> $students));
    }

    function manage_student(){
    	$school  = $this->session->userdata('user');

        $data['student'] = $this->school->get_students($school[0]->sch_id);
        $this->load->view('school_manage_student', $data);
    }



    function get_single_school(){
        $school_id = $this->input->post('school_id');
        $single_school= $this->school->get_single_school_details($school_id);
        echo json_encode(array( 'total'=> $single_school));
    }

    function get_single_parent(){
        $parent_id = $this->input->post('parent_id');
        $single_parent= $this->school->get_single_parent_details($parent_id);
        echo json_encode(array( 'total'=> $single_parent));

    }


    function add_menu(){
        $school  = $this->session->userdata('user');

        $post_data['menuname']  =  $this->input->post('menuname');

            if($post_data['menuname']){

                $inserted_id = $this->school->insert_menu($post_data);

                    $s_menu['school']=$school[0]->sch_id;
                    $s_menu['menu']=$inserted_id;
                    $this->school->insert_school_menu($s_menu);

                    for($k=1; $k<50; $k++){
                            $data['menu_id'] = $inserted_id;

                            $data['item_name'] = $this->input->post('item_name'.$k);
                            $data['category'] = $this->input->post('category'.$k);
                            $data['price'] = $this->input->post('price'.$k);
                            $data['cost'] = $this->input->post('cost'.$k);
                            $data['description'] = $this->input->post('description'.$k); 
                                                      
                           if($data['item_name'] && $data['price']){

                            $result = $this->school->insert_item($data);

                           }
                    }
                    redirect('school/manage_menu/', 'refresh');

            } else{
                $data['category'] = $this->school->get_all_categories();
                $this->load->view('school_add_menu', $data);

            }
    }


function edit_menu(){
      $id =  $this->uri->segment(3);
      if ($id) {
        $data['menu'] = $this->school->get_single_menu_dtls($id);
        $data['items'] = $this->school->get_items_for_menu($id);
        $data['category'] = $this->school->get_all_categories();
        $this->load->view('school_edit_menu_dtls', $data);
      }
      
    }

function add_menu_items_edit(){

      $data['menu_id'] = $this->input->post('menuid');

      if($data['menu_id']){

          for($k=1; $k<50; $k++){
                $data['item_name'] = $this->input->post('item_name'.$k);
                $data['category'] = $this->input->post('category'.$k);
                $data['price'] = $this->input->post('price'.$k);
                $data['cost'] = $this->input->post('cost'.$k);
                $data['description'] = $this->input->post('description'.$k); 
                                          
               if($data['item_name'] && $data['price']){
                $result = $this->school->insert_item($data);
               }
          }
      }
      redirect('school/edit_menu/'.$data['menu_id'].'', 'refresh');

    }

    function delete_edit_item(){
      $menu_id =  $this->uri->segment(3);
      $item_id =  $this->uri->segment(4);
      $this->school->delete_single_item($item_id);
      redirect('school/edit_menu/'.$menu_id.'', 'refresh');
    }

   function manage_menu(){
    $school  = $this->session->userdata('user');
        $data['menus'] = $this->school->get_all_menus($school[0]->sch_id);
        $size = sizeof($data['menus']);
            for($k=0; $k< $size; $k++){
            $noof_items = $this->school->no_of_items_per_menu($data['menus'][$k]->menu_id);
                if(!$noof_items == 0){
                $data['menus'][$k]->items = $noof_items;
                }
            }

        $this->load->view('school_manage_menu', $data);
    }

    function get_items_single_menu(){
        $menu_id = $this->input->post('menu_id');
        $menu= $this->school->get_items_for_menu($menu_id);
        echo json_encode(array( 'total'=> $menu));
    }

    function delete_item(){
        $id =  $this->uri->segment(3);
        $this->school->delete_single_item($id);
        redirect('school/manage_menu/', 'refresh');
    }

    function delete_menu(){
        $id =  $this->uri->segment(3);
        $this->school->delete_single_menu($id);
        redirect('school/manage_menu/', 'refresh');
    }

    function manage_orders(){
        $data['orders'] = $this->school->get_all_orders();
        $this->load->view('school_manage_orders', $data);
    }

    function get_single_order(){
        $order_id = $this->input->post('order_id');
        $single_order= $this->school->get_single_order_details($order_id);
        echo json_encode(array( 'total'=> $single_order));
    }

    function edit_order(){
        $id =  $this->uri->segment(3);
        $data['order_dels'] = $this->school->get_single_order_detls($id);
        $data['menu_items'] = $this->school->get_items_for_sin_order($id);
 
        $this->load->view('school_edit_ordered_menu', $data);
    }


    function edit_order_paid_delivary(){
         $post_data['order_id']         =  $this->input->post('order_id');
         $post_data['date']             =  $this->input->post('date');
         $post_data['paid_status']      =  $this->input->post('paid_status');
         $post_data['delivary_status']  =  $this->input->post('delivary_status');

         if($post_data['paid_status'] && $post_data['delivary_status']){
                $result = $this->school->update_delivary_status($post_data);
                redirect('school/manage_orders/', 'refresh');
         }else{
                redirect('school/manage_orders/', 'refresh');
         }
    }


    function add_menu_date(){
        $school  = $this->session->userdata('user');
         $post_data['menu']         =  $this->input->post('menu');
         $post_data['date']         =  $this->input->post('date');
         


         if($post_data['menu'] && $post_data['date']){
            
            // $value = str_replace("/", "-", $post_data['date']);
            // $post_data['date'] = date("Y-m-d", strtotime($value));


            $result = $this->school->inser_smd($post_data);
            redirect('school/add_menu_date/', 'refresh');

         } else{

                $data['menus'] = $this->school->get_all_menus($school[0]->sch_id);

                $data['display_dates'] = $this->school->get_menu_dates($school[0]->sch_id);

                $this->load->view('school_add_menu_date', $data);
         }

        
    }

    function delete_menu_dates(){

        $data['avaliableid'] =  $this->uri->segment(3);

        $this->school->delete_single_menu_date($data);
        redirect('school/add_menu_date/', 'refresh');

    }

    function logout(){
    	$this->session->set_userdata('is_logged_in', false);
        $this->session->unset_userdata('usertype');
        $this->session->unset_userdata('user');
        
        redirect('login/', 'refresh');
    }
    

    


}
?>