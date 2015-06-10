<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class administrator extends CI_Controller {


    function __construct() {
        parent::__construct();
        
    $is_logged_in = $this->session->userdata('is_logged_in');
      $user_type = $this->session->userdata('usertype');
      if($is_logged_in == true && $user_type == 'administrator'){

      }else {
        redirect('login/', 'refresh');
      }

      //session, url, satabase is set in auto load in the config
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Mail_model', 'mail');
        $this->load->library('pagination');
       
    }

    function index(){
        redirect('administrator/dashboard/', 'refresh');
    }


    function add_school(){

         $post_data['school_name'] =  $this->input->post('scl_name');
         $post_data['email']       =  $this->input->post('scl_email');
         $post_data['phone']       =  $this->input->post('scl_Phonenumber');
         $post_data['address']     =  $this->input->post('scl_Address');
         $post_data['password']    =  md5($this->input->post('scl_password'));
         $post_data['time_lunch']  =  $this->input->post('scl_TimeofLunch');
         $post_data['tno_student'] =  $this->input->post('scl_TotalNumberOfStudent');
         $post_data['admin_name']  =  $this->input->post('scl_admin_name');
       

        if($post_data['school_name']){

            $config['upload_path'] = './school_image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '6000';
            $config['file_name'] = 'lunch'.md5(time());
            $config['overwrite'] = false;

            $this->load->library('upload', $config);
            $this->upload->do_upload('avatar');

            $image_data = array('upload_data' => $this->upload->data());
            $post_data['image']    =$image_data["upload_data"]["file_name"];

            $inserted = $this->admin->insert_school($post_data);

            //redirect here
            redirect('administrator/manage_school/', 'refresh');

        }else {
            $this->load->view('add_school');
        }
    }

    function manage_school(){
        $data['schools'] = $this->admin->get_all_schools();
        $this->load->view('manage_school', $data);
    }


    function get_single_school(){
        $school_id = $this->input->post('school_id');
        $single_school= $this->admin->get_single_school_details($school_id);
        echo json_encode(array( 'total'=> $single_school));
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

            $this->admin->update_school($post_data);

           redirect('administrator/manage_school/', 'refresh');
    }

    function delete_school(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_school($id);
        redirect('administrator/manage_school/', 'refresh');

    }

    function add_parent(){

        $post_data['firstname'] =  $this->input->post('par_firstname');
         $post_data['lastname']       =  $this->input->post('par_lastname');
         $post_data['email']       =  $this->input->post('par_email');
         $post_data['phone']     =  $this->input->post('par_phone');
         $post_data['password']    =  md5($this->input->post('par_password'));
         $post_data['address']  =  $this->input->post('par_address');
       

        if($post_data['firstname']){

            $config['upload_path'] = './parent_image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '6000';
            $config['file_name'] = 'lunch'.md5(time());
            $config['overwrite'] = false;

            $this->load->library('upload', $config);
            $this->upload->do_upload('avatar');

            $image_data = array('upload_data' => $this->upload->data());
            $post_data['image']    =$image_data["upload_data"]["file_name"];

            $inserted_id = $this->admin->insert_parent($post_data);

            for($k=1; $k<10; $k++){
                $data['parent_id'] = $inserted_id;

                $data['std_fname'] = $this->input->post('std_first_name'.$k);
                $data['school_id'] = $this->input->post('std_scl_name'.$k);
                $data['class_id'] = $this->input->post('std_class_room'.$k);
               
               if($data['std_fname'] && $data['school_id']){

                $result = $this->admin->insert_student($data);

               }


            }


            //redirect here
            redirect('administrator/manage_parent', 'refresh');

        }else {
            $data['schools'] = $this->admin->get_all_schools();
            $data['classromm'] = $this->admin->get_all_classroom();
            $this->load->view('add_parent', $data);
        }

   }


    function manage_parent(){
        $data['schools'] = $this->admin->get_all_schools();
        $data['parent'] = $this->admin->get_all_parent();
        $size = sizeof($data['parent']);
            for($k=0; $k< $size; $k++){
            $noof_student = $this->admin->no_of_std_per_parent($data['parent'][$k]->par_id);
                if(!$noof_student == 0){
                $data['parent'][$k]->student = $noof_student;
                }
            }
        $this->load->view('manage_parent', $data);
    }

    function get_single_parent(){
        $parent_id = $this->input->post('parent_id');
        $single_parent= $this->admin->get_single_parent_details($parent_id);
        echo json_encode(array( 'total'=> $single_parent));

    }

    function get_student_single_parent(){
        $parent_id = $this->input->post('parent_id');
        $students= $this->admin->get_students_for_parent($parent_id);
        echo json_encode(array( 'total'=> $students));
    }

    function edit_parent(){

         $post_data['parent_id'] =  $this->input->post('par_id');
         $post_data['firstname'] =  $this->input->post('par_firstname');
         $post_data['lastname']  =  $this->input->post('par_lastname');
         $post_data['email']     =  $this->input->post('par_email');
         $post_data['phone']     =  $this->input->post('par_phone');
         $post_data['address']   =  $this->input->post('par_address');


            if($this->input->post('par_password') !== ""){
                $post_data['password']    =  md5($this->input->post('par_password'));
            }

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $config['upload_path'] = './parent_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '6000';
                $config['file_name'] = 'lunch'.md5(time());
                $config['overwrite'] = false;

                $this->load->library('upload', $config);
                $this->upload->do_upload('avatar');

                $image_data = array('upload_data' => $this->upload->data());
                $post_data['image']    =$image_data["upload_data"]["file_name"];
            }

            $this->admin->update_parent($post_data);

           redirect('administrator/manage_parent/', 'refresh');
    }

    function delete_parent(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_parent($id);
        redirect('administrator/manage_parent/', 'refresh');
    }

    //students

    function manage_students(){
        $data['student'] = $this->admin->get_all_students();
        $data['school'] = $this->admin->get_all_schools();
        $data['classrom'] = $this->admin->get_all_classroom();
        $this->load->view('manage_student', $data);
    }

    function get_single_student(){
        $student_id = $this->input->post('student_id');
        $single_student= $this->admin->get_single_student_details($student_id);
        echo json_encode(array( 'total'=> $single_student));

    }

    function edit_student(){

         $post_data['std_id']               =  $this->input->post('std_id');
         $post_data['stu_firstname']        =  $this->input->post('stu_firstname');
         $post_data['stu_lastname']         =  $this->input->post('stu_lastname');
         $post_data['classroom']            =  $this->input->post('class_id');
         $post_data['stu_schoolid']         =  $this->input->post('stu_schoolid');
         $post_data['food_allergy']         =  $this->input->post('food_allergy');
         $post_data['allergy_description']  =  $this->input->post('allergy_description');
         $post_data['school']  =  $this->input->post('sch_id');

         

         //must add parent id and school in drop down

         
        $this->admin->update_student($post_data);

        redirect('administrator/manage_students/', 'refresh');

    }

    function delete_student(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_student($id);
        redirect('administrator/manage_students/', 'refresh');
    }

    function delete_student_parent(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_student($id);
        redirect('administrator/manage_parent/', 'refresh');
    }


    //vendor

    function add_vendor(){
         $post_data['vendor_name']      =  $this->input->post('vendor_name');
         $post_data['vendor_addr']      =  $this->input->post('vendor_addr');
         $post_data['vendor_email']     =  $this->input->post('vendor_email');
         $post_data['vendor_phone']     =  $this->input->post('vendor_phone');
         $post_data['vendor_password']  =  md5($this->input->post('vendor_password'));
         $post_data['vendor_cell']      =  $this->input->post('vendor_cell');
         $post_data['vendor_admin']     =  $this->input->post('vendor_admin');
       
        if($post_data['vendor_name']){

            $inserted_id = $this->admin->insert_vendor($post_data);

            //redirect here
            redirect('administrator/manage_vendor/', 'refresh');

        }else {
            $this->load->view('add_vendor');
        }
    }


    function manage_vendor(){
        $data['vendor'] = $this->admin->get_all_venders();
        $this->load->view('manage_vendor', $data);
        
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
        $this->admin->update_vendor($post_data);

        redirect('administrator/manage_vendor/', 'refresh');
    }

    function get_single_vendor(){
        $vendor_id = $this->input->post('vendor_id');
        $single_vendor= $this->admin->get_single_vendor_details($vendor_id);
        echo json_encode(array( 'total'=> $single_vendor));
    }

    function delete_vender(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_vendor($id);
        redirect('administrator/manage_vendor/', 'refresh');
    }


    //menu

    function add_menu(){
        
        $post_data['menuname']  =  $this->input->post('menuname');

            if($post_data['menuname']){

                $inserted_id = $this->admin->insert_menu($post_data);

                    for($k=1; $k<50; $k++){
                            $data['menu_id'] = $inserted_id;

                            $data['item_name'] = $this->input->post('item_name'.$k);
                            $data['category'] = $this->input->post('category'.$k);
                            $data['price'] = $this->input->post('price'.$k);
                            $data['cost'] = $this->input->post('cost'.$k);
                            $data['description'] = $this->input->post('description'.$k); 

                           if($data['item_name'] && $data['price']){

                            $result = $this->admin->insert_item($data);

                           }
                    }
                    redirect('administrator/manage_menu/', 'refresh');

            } else{
                $data['category'] = $this->admin->get_all_categories();
                $this->load->view('add_menu', $data);

            }
    }


    function manage_menu(){
        $data['menus'] = $this->admin->get_all_menus();
        $size = sizeof($data['menus']);
            for($k=0; $k< $size; $k++){
            $noof_items = $this->admin->no_of_items_per_menu($data['menus'][$k]->menu_id);
                if(!$noof_items == 0){
                $data['menus'][$k]->items = $noof_items;
                }
            }

        $this->load->view('manage_menu', $data);
    }

    function edit_menu(){
      $id =  $this->uri->segment(3);
      if ($id) {
        $data['menu'] = $this->admin->get_single_menu_dtls($id);
        $data['items'] = $this->admin->get_items_for_menu($id);
        $data['category'] = $this->admin->get_all_categories();
        $this->load->view('edit_menu_dtls', $data);
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
                $result = $this->admin->insert_item($data);
               }
          }
      }
      redirect('administrator/edit_menu/'.$data['menu_id'].'', 'refresh');

    }

    function delete_edit_item(){
      $menu_id =  $this->uri->segment(3);
      $item_id =  $this->uri->segment(4);
      $this->admin->delete_single_item($item_id);
      redirect('administrator/edit_menu/'.$menu_id.'', 'refresh');
    }

    function get_items_single_menu(){
        $menu_id = $this->input->post('menu_id');
        $menu= $this->admin->get_items_for_menu($menu_id);
        echo json_encode(array( 'total'=> $menu));

    }

    function delete_menu(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_menu($id);
        redirect('administrator/manage_menu/', 'refresh');
    }

    function delete_item(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_item($id);
        redirect('administrator/manage_menu/', 'refresh');
    }

    function mail_newsletter($data){

        $dat['to'] = $data['to'];
        $dat['subject'] = $data['subject'];
        $dat['message'] = $data['message'];

        $send = $this->mail->send_mail($dat);
    
    }

    function newsletter(){

         $post_data['to']            =  $this->input->post('recipent');
         $post_data['subject']       =  $this->input->post('subject');
         $post_data['message']       =  $this->input->post('message');

         if($post_data['to'] && $post_data['subject'] && $post_data['message']){
            
            $this->mail_newsletter($post_data);

            $data['schools'] = $this->admin->get_all_schools();
            $data['parent'] = $this->admin->get_all_parent();

            $this->load->view('news_letter', $data);
         }else{

            $data['schools'] = $this->admin->get_all_schools();
            $data['parent'] = $this->admin->get_all_parent();
            $data['vendor'] = $this->admin->get_all_venders();

            $this->load->view('news_letter', $data);
         }

        
    }

    //order
    function dashboard(){
        $data['total_order'] = $this->admin->get_orders_count();
        $data['total_students'] = $this->admin->get_students_count();
        $data['total_school'] = $this->admin->get_school_count();
        $data['orders'] = $this->admin->get_dashboard_orders();

        $this->load->view('dashboard', $data);
    }

    function manage_orders(){
        $data['orders'] = $this->admin->get_all_orders();

        $this->load->view('manage_orders', $data);
    }

    function get_single_order(){
        $order_id = $this->input->post('order_id');
        $single_order= $this->admin->get_single_order_details($order_id);
        echo json_encode(array( 'total'=> $single_order));
    }

    function edit_order(){
        $id =  $this->uri->segment(3);
        $data['order_dels'] = $this->admin->get_single_order_detls($id);
        $data['menu_items'] = $this->admin->get_items_for_sin_order($id);
 
        $this->load->view('edit_ordered_menu', $data);
    }

    function get_all_items_for_single_order(){
        $order_id = $this->input->post('order_id');
        $single_order= $this->admin->get_items_for_sin_order($order_id);
        echo json_encode(array( 'total'=> $single_order));
    }

    function delete_order(){
        $id =  $this->uri->segment(3);
        $this->admin->delete_single_order($id);
        redirect('administrator/manage_orders/', 'refresh');
    }

    function edit_order_paid_delivary(){
         $post_data['order_id']         =  $this->input->post('order_id');
         $post_data['date']             =  $this->input->post('date');
         $post_data['paid_status']      =  $this->input->post('paid_status');
         $post_data['delivary_status']  =  $this->input->post('delivary_status');

         if($post_data['paid_status'] && $post_data['delivary_status']){
                $result = $this->admin->update_delivary_status($post_data);
                redirect('administrator/manage_orders/', 'refresh');
         }else{
                redirect('administrator/manage_orders/', 'refresh');
         }
    }

    function delete_order_item(){

    }


    //sms
    function sms_newsletter(){
        
        $post_data['to']         =  $this->input->post('recipentno');
        $post_data['body']       =  $this->input->post('message');


        if($post_data['to'] && $post_data['body']){

                $result = $this->admin->insert_send_sms($post_data);
                $this->send_sms($post_data);
                redirect('administrator/sms_newsletter/', 'refresh');

        }else {
            $data['schools'] = $this->admin->get_all_schools();
            $data['parent'] = $this->admin->get_all_parent();
            $data['vendor'] = $this->admin->get_all_venders();
               
            $this->load->view('sms_news_letter', $data);
        }
    }

    function get_all_sms(){
        $pon_number = $this->input->post('number');
        $single_sms= $this->admin->get_all_sms_for_number($pon_number);
        echo json_encode(array( 'total'=> $single_sms));
    }

    function send_sms($data){
        include_once(APPPATH.'libraries/Services/Twilio.php');
 
 
        $account_sid = 'AC0bdc527ce2f5121c1f39bb1e9e952683'; 
        $auth_token = '07d82e2575a1c1bc7157757a137d8ae0'; 
        $client = new Services_Twilio($account_sid, $auth_token); 
         
        $client->account->messages->create(array( 
            'To' => $data['to'], 
            'From' => "+12264555597", 
            'Body' => $data['body'],   
        ));
    }

    function paypal_settings(){

        $data['name']         =  $this->input->post('pay_name');
        $pay_data['username']         =  $this->input->post('username');
        $pay_data['password']  =  $this->input->post('password');
        $pay_data['signature'] =  $this->input->post('signature');
        $pay_data['currency']  =  $this->input->post('currency');
        $cost['perItemFee'] =  $this->input->post('perItemFee');
        $cost['perOrderFee']  =  $this->input->post('perOrderFee');

        if ($data['name'] && $pay_data['username']) {
          $data['result'] =  json_encode($pay_data);
          $data['cost'] =  json_encode($cost);

          $this->admin->update_payment_settings($data);
          redirect('administrator/settings/', 'refresh');
        } else {
          redirect('administrator/settings/', 'refresh');
        }
    }


    function settings(){

        $post_data['smtp_host']   =  $this->input->post('smtp_host');
        $post_data['email']       =  $this->input->post('email');
        $post_data['password']    =  $this->input->post('password');


        if($post_data['smtp_host'] && $post_data['email'] && $post_data['password']){
          $this->admin->update_email_settings($post_data);
          redirect('administrator/settings/', 'refresh');
        } else {
          $data['email'] = $this->admin->get_email_settings();
          $data['payment'] = $this->admin->get_payment_settings();


          $value = $data['payment'][0]->json;
          $value=json_decode($value,true);

          $data['username'] = $value['username'];
          $data['password'] = $value['password'];
          $data['signature'] = $value['signature'];
          $data['currency'] = $value['currency'];

          $value2 = $data['payment'][1]->json;
          $value2=json_decode($value2,true);

          $data['perItemFee'] = $value2['perItemFee'];
          $data['perOrderFee'] = $value2['perOrderFee'];

          $this->load->view('email_settings', $data);
        }
      
    }



    function excel_write($school_id){

      $data['classroom'] = $this->admin->get_all_classroom_for_school($school_id);
      $size = sizeof($data['classroom']);
  
      //load our new PHPExcel library
      $this->load->library('excel');



      $objPHPExcel = new PHPExcel();

      for($k=0; $k< $size; $k++){
        
      // Add some data to the second sheet, resembling some different data types
      $objPHPExcel->setActiveSheetIndex($k);
      $objPHPExcel->getActiveSheet()->setCellValue('A1', $data['classroom'][$k]->teacher_name);

         $data['avali'] = $this->admin->get_menu_dates_perschool();
         $avaliable_size = sizeof($data['avali']);
         $row = 1;
         for($j=0; $j< $avaliable_size; $j++){
          
         $item_total = $this->admin->no_of_items_per_menu($data['avali'][$j]->menu_id);
         $col = 6;
         $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data['avali'][$j]->available_date);
         $col++;
         //$objPHPExcel->getActiveSheet()->setCellValue('B1', $data['avali'][$j]->available_date);
        
        }


      // Rename 2nd sheet
      $objPHPExcel->getActiveSheet()->setTitle($data['classroom'][$k]->classroom_name);
      $objPHPExcel->createSheet();
      }


      // Redirect output to a client’s web browser (Excel5)
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="name_of_file.xls"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $objWriter->save('php://output');

    }




    function reports(){

        $post_data['shool_id']   =  $this->input->post('School');
        $post_data['datestart']  =  $this->input->post('datestart');
        $post_data['dateend']    =  $this->input->post('dateend');

        if($post_data['shool_id'] && $post_data['datestart'] && $post_data['dateend']){

            $data['reports'] = $this->admin->get_reports($post_data);
            $size = sizeof($data['reports']);
            for($k=0; $k< $size; $k++){
            $noof_items = $this->admin->no_of_items_per_order($data['reports'][$k]->order_id);

                if(!$noof_items == 0){
                $data['reports'][$k]->item_count = $noof_items;
                }
            }
           // $this->excel_write($post_data['shool_id']);
            $data['classroom'] = $this->admin->get_all_classroom_for_school($post_data['shool_id']);
            $data['schools'] = $this->admin->get_all_schools();
            $this->load->view('report_filter', $data);

            // print_r('<pre>');
            // var_dump($data['reports']);
            // print_r('</pre>');
        }else{
          $data['schools'] = $this->admin->get_all_schools();
          $this->load->view('report_filter', $data);
        }
      
    }

    function get_class_orders(){
        
          $class = $this->input->post('classroom_id');
          $class_orders= $this->admin->get_orders_for_cls_room($class);
           $size = sizeof($class_orders);
            for($k=0; $k< $size; $k++){
            $noof_items = $this->admin->no_of_items_per_order($class_orders[$k]->order_id);

                if(!$noof_items == 0){
                $class_orders[$k]->item_count = $noof_items;
                }
            }
          echo json_encode(array( 'total'=> $class_orders));
        
    }

    function logout(){
        $this->session->set_userdata('is_logged_in', false);
        $this->session->unset_userdata('usertype');
        $this->session->unset_userdata('user');
        
        redirect('login/', 'refresh');
    }







}

?>
