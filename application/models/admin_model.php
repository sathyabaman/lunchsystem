<?php

class Admin_model extends CI_Model {

	
    function __construct()
    {
    	parent::__construct();
    }

    //school
    function insert_school($data){
    	 $school['sch_name']        =$data['school_name'];
         $school['sch_addr']        =$data['address'];
         $school['sch_phone']       =$data['phone'];
         $school['sch_email']       =$data['email'];
         $school['sch_password']    =$data['password'];
         $school['sch_admin']       =$data['admin_name'];
         $school['lunch_time']   	=$data['time_lunch'];
         $school['no_of_students']  =$data['tno_student'];
         $school['school_pic']      =$data['image'];
         
         $results = $this->db->insert('school', $school); 
         return $results;
    }


    function get_all_schools(){
      $this->db->select('*');
      $this->db->order_by("sch_name", "asc"); 
      $this->db->from('school'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_single_school_details($id){

      $where = array('sch_id' => $id);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('school'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function update_school($data){

      $fields = array('sch_name'=>$data['school_name'],
      				  'sch_addr'=>$data['address'],
      				  'sch_phone'=>$data['phone'],
      				  'sch_email'=>$data['email'],
      				  'sch_admin'=>$data['admin_name'],
      				  'lunch_time'=>$data['time_lunch'],
      				  'no_of_students'=>$data['tno_student']
       				  );
      if(isset($data['image'])){
      		$fields['school_pic']= $data['image'];
      }
      if(isset($data['password'])){
      		$fields['sch_password']= $data['password'];
      }

      $this->db->where('sch_id', $data['school_id']);
      $this->db->update('school', $fields); 

    }

    function delete_single_school($id){
      $this->db->where('sch_id', $id);
      $this->db->delete('school');

    }

    //parent

    function insert_parent($data){
    	 $parent['par_firstname']  	=$data['firstname'];
         $parent['par_lastname']    =$data['lastname'];
         $parent['par_phone']       =$data['phone'];
         $parent['par_email']       =$data['email'];
         $parent['par_password']    =$data['password'];
         $parent['par_address']     =$data['address'];
         $parent['par_pic']   	    =$data['image'];
         $parent['account_balance'] =0;

       
      $this->db->trans_start();
      $this->db->insert('Parent', $parent); 
      $insert_id = $this->db->insert_id();
      $this->db->trans_complete();
      return  $insert_id;
    }


    function insert_student($data){

    	 $student['stu_firstname']  	=$data['std_fname'];
         $student['stu_lastname']    	="";
         $student['stu_schoolid']       ="";
         $student['food_allergy']    	="";
         $student['allergy_description']="";
         $student['sch_id']   	    	=$data['school_id'];
         $student['par_id'] 			=$data['parent_id'];
         $student['classroom_id']       =$data['class_id'];



         $results = $this->db->insert('Student', $student); 
         return $results;

    }

    function get_all_parent(){

      $this->db->select('*'); 
      $this->db->from('Parent'); 
      $this->db->order_by("par_firstname", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;

    }


    function get_students_for_parent($id){
      $where = array('p.par_id' => $id);
      $this->db->select('s.*, p.par_firstname, sc.sch_name, cr.classroom_name');
      $this->db->from('Student s'); 
      $this->db->join('Parent p', 'p.par_id=s.par_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
      $this->db->join('Classroom cr', 'cr.classroom_id=s.classroom_id', 'left');
      $this->db->where($where); 
      $this->db->group_by('s.stu_firstname','asc'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function no_of_std_per_parent($id){

      $where = array('par_id' => $id);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('Student'); 
      $query = $this->db->get();
	    $rowcount = $query->num_rows();
      return $rowcount;

    }

    function delete_single_parent($id){
      $this->db->where('par_id', $id);
      $this->db->delete('Parent');

      $this->db->where('par_id', $id);
      $this->db->delete('Student');

    }

    function get_single_parent_details($id){

      $where = array('par_id' => $id);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('Parent'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    function update_parent($data){

      $fields = array('par_firstname'=>$data['firstname'],
      				  'par_lastname'=>$data['lastname'],
      				  'par_phone'=>$data['phone'],
      				  'par_email'=>$data['email'],
      				  'par_address'=>$data['address'],
       				  );
      if(isset($data['image'])){
      		$fields['par_pic']= $data['image'];
      }
      if(isset($data['password'])){
      		$fields['par_password']= $data['password'];
      }

      $this->db->where('par_id', $data['parent_id']);
      $this->db->update('Parent', $fields); 

    }

    function get_all_students(){
	  $this->db->select('s.*, p.par_firstname, sc.sch_name, cr.classroom_name');
	  $this->db->from('Student s'); 
	  $this->db->join('Parent p', 'p.par_id=s.par_id', 'left');
	  $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
    $this->db->join('Classroom cr', 'cr.classroom_id=s.classroom_id', 'left');
	  $this->db->order_by('s.stu_firstname','asc');        
	  $query = $this->db->get();
	  $result = $query->result();
      return $result;

    }

    function delete_single_student($id){

      $this->db->where('stu_id', $id);
      $this->db->delete('Student');

    }

    function get_single_student_details($id){

    $where = array('s.stu_id' => $id);
    $this->db->select('s.*, p.par_firstname, sc.sch_name, sc.sch_id, p.par_id, cr.classroom_id');
	  $this->db->from('Student s'); 
	  $this->db->join('Parent p', 'p.par_id=s.par_id', 'left');
	  $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
    $this->db->join('Classroom cr', 'cr.classroom_id=s.classroom_id', 'left');
	  $this->db->where($where);    
	  $query = $this->db->get();
	  $result = $query->result();
      return $result;

    }

    function update_student($data){
    	$fields = array('stu_firstname'=>$data['stu_firstname'],
      				  'stu_lastname'=>$data['stu_lastname'],
      				  'stu_schoolid'=>$data['stu_schoolid'],
      				  'food_allergy'=>$data['food_allergy'],
      				  'allergy_description'=>$data['allergy_description'],
                'sch_id'=>$data['school'],
                'classroom_id'=>$data['classroom'],
       				  );

      $this->db->where('stu_id', $data['std_id']);
      $this->db->update('Student', $fields); 
    }


    //vendor

    function insert_vendor($data){
         $vendor['vendor_name']      = $data['vendor_name'];
         $vendor['vendor_addr']      = $data['vendor_addr'];
         $vendor['vendor_email']     = $data['vendor_email'];
         $vendor['vendor_phone']     = $data['vendor_phone'];
         $vendor['vendor_password']  = $data['vendor_password'];
         $vendor['vendor_cell']      = $data['vendor_cell'];
         $vendor['vendor_admin']     = $data['vendor_admin'];

         $results = $this->db->insert('Vendor', $vendor); 
         return $results;
    }

    function get_all_venders(){
      $this->db->select('*'); 
      $this->db->from('Vendor'); 
      $this->db->order_by("vendor_name", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_single_vendor_details($id){

      $where = array('vendor_id' => $id);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('Vendor'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function update_vendor($data){
      $fields = array('vendor_name'=>$data['vendor_name'],
                'vendor_addr'=>$data['vendor_addr'],
                'vendor_email'=>$data['vendor_email'],
                'vendor_phone'=>$data['vendor_phone'],
                'vendor_cell'=>$data['vendor_cell'],
                'vendor_admin'=>$data['vendor_admin'],
                );
  
      if(isset($data['vendor_password'])){
          $fields['vendor_password']= $data['vendor_password'];
      }

      $this->db->where('vendor_id', $data['vendor_id']);
      $this->db->update('Vendor', $fields); 
    }

    function delete_single_vendor($id){

      $this->db->where('vendor_id', $id);
      $this->db->delete('Vendor');

    }

    //menu

    function get_all_categories(){
      $this->db->select('*'); 
      $this->db->from('Category'); 
      $this->db->order_by("category_name", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    function insert_menu($data){

         $vendor['menu_name']    =$data['menuname'];
         $vendor['vendor_id']    =0;
         //change vendor name 
       
          $this->db->trans_start();
          $this->db->insert('Menu', $vendor); 
          $insert_id = $this->db->insert_id();
          $this->db->trans_complete();
          return  $insert_id;
    }

    function insert_item($data){

         $iten['menu_id']     =$data['menu_id'];
         $iten['item_name']   =$data['item_name'];
         $iten['category_id'] =$data['category'];
         $iten['item_price']  =$data['price'];
         $iten['item_cost']   =$data['cost'];
         $iten['description']   =$data['description'];
               
          $result = $this->db->insert('Item', $iten); 
          return  $result;
    }

    function get_all_menus(){

    $this->db->select('m.*, v.vendor_name');
    $this->db->from('Menu m'); 
    $this->db->join('Vendor v', 'v.vendor_id=m.vendor_id', 'left');
    $query = $this->db->get();
    $result = $query->result();
    return $result;

    }

    function get_all_classroom(){
      $this->db->select('*');
      $this->db->from('Classroom');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function no_of_items_per_menu($id){

      $where = array('menu_id' => $id);
      $this->db->select('*');
      $this->db->from('Item'); 
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;

    }

    function get_items_for_menu($id){
      $where = array('i.menu_id' => $id);
      $this->db->select('*, m.menu_name, ca.category_name');
      $this->db->from('Item i'); 
      $this->db->join('Menu m', 'm.menu_id=i.menu_id', 'left');
      $this->db->join('Category ca', 'ca.category_id=i.category_id', 'left');
      $this->db->where($where);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function delete_single_menu($id){
      $this->db->where('menu_id', $id);
      $this->db->delete('Item');

      $this->db->where('menu_id', $id);
      $this->db->delete('Menu');
    }

    function delete_single_item($id){
        $this->db->where('item_id', $id);
        $this->db->delete('Item');
    }


    function get_dashboard_orders(){
      $this->db->select('ord.*, st.stu_firstname, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->limit(100);
      $this->db->order_by("ord.order_id", "desc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_orders_count(){

      $this->db->select('order_id');
      $this->db->from('Order'); 
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_students_count(){

      $this->db->select('stu_id');
      $this->db->from('Student'); 
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_school_count(){

      $this->db->select('sch_id');
      $this->db->from('school'); 
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_all_orders(){
      $this->db->select('ord.*, st.stu_firstname, sc.sch_name, cr.classroom_name, cr.teacher_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->join('Classroom cr', 'cr.classroom_id=st.classroom_id', 'left');
      $this->db->order_by("ord.order_id", "desc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
      
    }

    function get_single_order_details($id){
      $where = array ('order_id' => $id);
      $this->db->select('ord.*, st.stu_firstname, st.stu_schoolid,  
        st.food_allergy, st.allergy_description, cr.classroom_name, cr.teacher_name, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->join('Classroom cr', 'cr.classroom_id=st.classroom_id', 'left');
      $this->db->where($where); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_single_menu_dtls($id){
      $where = array ('menu_id' => $id);
      $this->db->select('*'); 
      $this->db->from('Menu'); 
      $this->db->where($where); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    function delete_single_order($id){
      $this->db->where('order_id', $id);
      $this->db->delete('Order');

      $this->db->where('order_id', $id);
      $this->db->delete('Order_Item');
    }

    function get_single_order_detls($id){
      $where =array ('order_id'=>$id);
      $this->db->select('*'); 
      $this->db->from('Order');
      $this->db->where($where);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_items_for_sin_order($id){
      //category name, menu name, item name, vendor name

      $where = array ('ord.order_id' => $id);
      $this->db->select('ord.*, ca.category_name, me.menu_name, it.item_name, it.item_price, it.item_cost, it.description, ve.vendor_name, oit.item_id as order_item_id');
      $this->db->from('Order ord'); 
      $this->db->join('Order_Item oit', 'oit.order_id=ord.order_id', 'left');
      $this->db->join('Item it', 'it.item_id=oit.item_id', 'left');
      $this->db->join('Menu me', 'me.menu_id=it.menu_id', 'left');
      $this->db->join('Category ca', 'ca.category_id=it.category_id', 'left');
      $this->db->join('Vendor ve', 've.vendor_id=me.vendor_id', 'left');
      $this->db->where($where); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;

    }

    function update_delivary_status($data){
      $fields = array(
                'paid_status'=>$data['paid_status'],
                'delivery_status'=>$data['delivary_status']
                );

      $this->db->where('order_id', $data['order_id']);
      $this->db->update('Order', $fields); 
    }


    function get_all_sms_for_number($number){
      $where = array('pone_number' => $number);

      $this->db->select('*');
      $this->db->order_by("id", "asc"); 
      $this->db->from('Sms_message'); 
      $this->db->where($where);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function insert_send_sms($data){

         $sms['pone_number']    = $data['to'];
         $sms['message_type']   = 1;
         $sms['body']           = $data['body'];
       
         $results = $this->db->insert('Sms_message', $sms); 
         return $results;

    }

    function get_email_settings(){

      $this->db->select('*');
      $this->db->from('Email_settings'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_payment_settings(){
      $this->db->select('*');
      $this->db->from('admin_config'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function update_email_settings($data){
      $fields = array(
                'smtp_host'=>$data['smtp_host'],
                'email'=>$data['email'],
                'password'=>$data['password']
                );

      $this->db->update('Email_settings', $fields); 
    }

    function update_payment_settings($data){
      $fields = array(
                'name'=>$data['name'],
                'json'=>$data['result'],
                );

      $this->db->where('id', 1);
      $this->db->update('admin_config', $fields); 

      $fields2 = array(
                'json'=>$data['cost'],
                );

      $this->db->where('id', 2);
      $this->db->update('admin_config', $fields2); 
    }


    function get_reports($data){
      $this->session->set_userdata('filter_reports', $data);

      $this->db->select('ord.*, st.stu_firstname, sc.sch_name, cr.classroom_id, cr.classroom_name, cr.teacher_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->join('Classroom cr', 'cr.classroom_id=st.classroom_id', 'left');
      $this->db->where('ord.order_date >=', $data['datestart']);
      $this->db->where('ord.order_date <=', $data['dateend']);
      $this->db->where('sc.sch_id', $data['shool_id']);
      $this->db->order_by("ord.order_id", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;

    }

    function get_all_classroom_for_school($school){
      $this->db->select('*');
      $this->db->from('Classroom');
      $this->db->where('sch_id', $school);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_orders_for_cls_room($id){
      $data = $this->session->userdata('filter_reports');

      $this->db->select('ord.*, st.stu_firstname, sc.sch_name, cr.classroom_id, cr.classroom_name, cr.teacher_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->join('Classroom cr', 'cr.classroom_id=st.classroom_id', 'left');
      $this->db->where('ord.order_date >=', $data['datestart']);
      $this->db->where('ord.order_date <=', $data['dateend']);
      $this->db->where('cr.classroom_id', $id);
      $this->db->order_by("ord.order_id", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function no_of_items_per_order ($id){
      $where = array('order_id' => $id);
      $this->db->select('*');
      $this->db->from('Order_Item'); 
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_menu_dates_perschool(){
      $data = $this->session->userdata('filter_reports');

      $this->db->select('av.*, sm.school_menu_id as school_men, sm.menu_id');
      $this->db->from('Available av');
      $this->db->join('School_menu sm', 'sm.menu_id = av.school_menu_id', 'left');
      $this->db->where('sm.sch_id', $data['shool_id']);
      $query = $this->db->get();
      $result = $query->result();
      return $result;

    }

    

}

?>