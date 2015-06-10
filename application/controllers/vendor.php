<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class vendor extends CI_Controller {


    function __construct() {
        parent::__construct();
      $is_logged_in = $this->session->userdata('is_logged_in');
      $user_type = $this->session->userdata('usertype');
	  if($is_logged_in == true && $user_type == 'vendor'){

	  }else {
	  	redirect('login/', 'refresh');
	  }
      //session, url, satabase is set in auto load in the config
        $this->load->model('Vendor_model', 'vendor');
    }


    function index(){
    	redirect('vendor/manage_vendor/', 'refresh');
    	
    }

    function dashboard(){
        $data['total_order'] = $this->vendor->get_orders_count();
        $data['total_students'] = $this->vendor->get_students_count();
        $data['total_menus'] = $this->vendor->get_menu_count();
        $data['orders'] = $this->vendor->get_dashboard_orders();

        $this->load->view('vendor_dashboard', $data);
    }

    function manage_parent(){
    
    	//$this->load->view('vendor_manage_parent');
    }


    function manage_vendor(){
        $data['vendor'] = $this->vendor->get_venders();
        $this->load->view('vendor_manage_vendor', $data);
        
    }

    function edit_vendor(){

         $post_data['vendor_id']            =  $this->input->post('vendor_id');
         $post_data['vendor_name']        =  $this->input->post('vendor_name');
         $post_data['vendor_addr']         =  $this->input->post('vendor_addr');
         $post_data['vendor_email']          =  $this->input->post('vendor_email');
         $post_data['vendor_phone']         =  $this->input->post('vendor_phone');
         $post_data['vendor_cell']         =  $this->input->post('vendor_cell');
         $post_data['vendor_admin']  =  $this->input->post('vendor_admin');

         //must add parent id and school in drop down

        if(!$this->input->post('vendor_password') == ""){
            $post_data['vendor_password']    =  md5($this->input->post('vendor_password'));
        }
        $this->vendor->update_vendor($post_data);

        redirect('vendor/manage_vendor/', 'refresh');
    }

    function get_single_vendor(){
        $vendor_id = $this->input->post('vendor_id');
        $single_vendor= $this->vendor->get_single_vendor_details($vendor_id);
        echo json_encode(array( 'total'=> $single_vendor));
    }

    function delete_vender(){
        $id =  $this->uri->segment(3);
        $this->vendor->delete_single_vendor($id);
        redirect('vendor/manage_vendor/', 'refresh');
    }





    function add_menu(){
        
        $post_data['menuname']  =  $this->input->post('menuname');

            if($post_data['menuname']){

                $inserted_id = $this->vendor->insert_menu($post_data);

                    for($k=1; $k<50; $k++){
                            $data['menu_id'] = $inserted_id;

                            $data['item_name'] = $this->input->post('item_name'.$k);
                            $data['category'] = $this->input->post('category'.$k);
                            $data['price'] = $this->input->post('price'.$k);
                            $data['cost'] = $this->input->post('cost'.$k);
                                                      
                           if($data['item_name'] && $data['price']){

                            $result = $this->vendor->insert_item($data);

                           }
                    }
                    redirect('vendor/manage_menu/', 'refresh');

            } else{
                $data['category'] = $this->vendor->get_all_categories();
                $this->load->view('vendor_add_menu', $data);

            }
    }


    function manage_menu(){
        $data['menus'] = $this->vendor->get_all_menus();
        $size = sizeof($data['menus']);
            for($k=0; $k< $size; $k++){
            $noof_items = $this->vendor->no_of_items_per_menu($data['menus'][$k]->menu_id);
                if(!$noof_items == 0){
                $data['menus'][$k]->items = $noof_items;
                }
            }

        $this->load->view('vendor_manage_menu', $data);
    }

    function get_items_single_menu(){
        $menu_id = $this->input->post('menu_id');
        $menu= $this->vendor->get_items_for_menu($menu_id);
        echo json_encode(array( 'total'=> $menu));

    }

    function delete_menu(){
        $id =  $this->uri->segment(3);
        $this->vendor->delete_single_menu($id);
        redirect('vendor/manage_menu/', 'refresh');
    }


    function manage_order(){
        $data['orders'] = $this->vendor->get_all_orders();

        $this->load->view('vendor_manage_order', $data);
    }

    function edit_order(){
        $id =  $this->uri->segment(3);
        $data['order_dels'] = $this->vendor->get_single_order_detls($id);
        $data['menu_items'] = $this->vendor->get_items_for_sin_order($id);
 
        $this->load->view('vendor_edit_order_dtls', $data);
    }

    function get_single_order(){
        $order_id = $this->input->post('order_id');
        $single_order= $this->vendor->get_single_order_details($order_id);
        echo json_encode(array( 'total'=> $single_order));
    }

    function logout(){
    	$this->session->set_userdata('is_logged_in', false);
        $this->session->unset_userdata('usertype');
        $this->session->unset_userdata('user');
        
        redirect('login/', 'refresh');
    }
}
?>