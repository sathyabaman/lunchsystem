<?php

class School_model extends CI_Model {

	
    function __construct()
    {
    	parent::__construct();
    }

    function get_schools($id){
      $this->db->select('*');
      $this->db->order_by("sch_name", "asc"); 
      $this->db->from('school'); 
      $this->db->where('sch_id', $id);
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


    function get_single_school_details($id){

      $where = array('sch_id' => $id);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('school'); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    function get_parent($id){

      $where = array('s.sch_id' => $id);
      $this->db->select('p.*');
      $this->db->from('Parent p'); 
      $this->db->join('Student s', 's.par_id=p.par_id', 'left');
      $this->db->where($where);
      $this->db->group_by('par_firstname');
      $this->db->order_by("par_firstname", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    function no_of_std_per_parent($data){

      $where = array('par_id' => $data['parent'], 'sch_id'=>$data['school']);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('Student'); 
      $query = $this->db->get();
	  $rowcount = $query->num_rows();
      return $rowcount;

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


    function get_students_for_parent($data){
      $where = array('p.par_id' => $data['parent'], 'sc.sch_id'=>$data['school']);
      $this->db->select('s.*, p.par_firstname, sc.sch_name, cr.classroom_name, cr.teacher_name');
      $this->db->from('Student s'); 
      $this->db->join('Parent p', 'p.par_id=s.par_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
      $this->db->join('Classroom cr', 'cr.classroom_id=s.classroom_id', 'left');
      $this->db->where($where); 
      $this->db->order_by('s.stu_firstname','asc');        
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_students($id){

    $this->db->select('s.*, p.par_firstname, sc.sch_name, cr.classroom_name, cr.teacher_name ');
	  $this->db->from('Student s'); 
	  $this->db->join('Parent p', 'p.par_id=s.par_id', 'left');
	  $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
    $this->db->join('Classroom cr', 'cr.classroom_id=s.classroom_id', 'left');
	  $this->db->order_by('s.stu_firstname','asc'); 
	  $this->db->where('sc.sch_id', $id);       
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

    function insert_school_menu($data){

         $Sc_menu['sch_id']    =$data['school'];
         $Sc_menu['menu_id']   =$data['menu'];
       
          $this->db->insert('School_menu', $Sc_menu); 
         
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

    

    function get_all_categories(){
      $this->db->select('*'); 
      $this->db->from('Category'); 
      $this->db->order_by("category_name", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function insert_item($data){

         $iten['menu_id']     =$data['menu_id'];
         $iten['item_name']   =$data['item_name'];
         $iten['category_id'] =$data['category'];
         $iten['item_price']  =$data['price'];
         $iten['item_cost']   =$data['cost'];
         $iten['description'] =$data['description'];
               
          $result = $this->db->insert('Item', $iten); 
          return  $result;
    }
    
    function get_all_menus($id){
    $where = array('sc.sch_id' => $id);
    $this->db->select('m.*, s.sch_name');
    $this->db->from('Menu m'); 
    $this->db->join('School_menu sc', 'sc.menu_id=m.menu_id', 'left');
    $this->db->join('school s', 's.sch_id=sc.sch_id', 'left');
    $this->db->where($where);
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

    function get_orders_count(){
      $school  = $this->session->userdata('user');
      $where = array('sc.sch_id' => $school[0]->sch_id);

      $this->db->select('od.order_id');
      $this->db->from('Order od'); 
      $this->db->join('Student s', 's.stu_id=od.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }


    function get_students_count(){
      $school  = $this->session->userdata('user');
      $where = array('sc.sch_id' => $school[0]->sch_id);

      $this->db->select('stu_id');
      $this->db->from('Student s'); 
      $this->db->join('school sc', 'sc.sch_id=s.sch_id', 'left');
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }


    function get_menu_count(){
      $school  = $this->session->userdata('user');
      $where = array('sch_id' => $school[0]->sch_id);

      $this->db->select('school_menu_id');
      $this->db->from('School_menu'); 
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_dashboard_orders(){
      $school  = $this->session->userdata('user');
      $where = array('sc.sch_id' => $school[0]->sch_id);

      $this->db->select('ord.*, st.stu_firstname, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->where($where);
      $this->db->limit(100);
      $this->db->order_by("ord.order_id", "desc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_all_orders(){
      $school  = $this->session->userdata('user');
      $where = array('sc.sch_id' => $school[0]->sch_id);

      $this->db->select('ord.*, st.stu_firstname, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->where($where);
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
      $this->db->select('ord.*, ca.category_name, me.menu_name, it.item_name, it.item_price, it.item_cost, ve.vendor_name, oit.item_id as order_item_id');
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


    function inser_smd($data){

         $smd['available_date']             = $data['date'];
         $smd['school_menu_id']   = $data['menu'];
        
               
          $result = $this->db->insert('Available', $smd); 
          return  $result;
    }

    function get_menu_dates($id){

    $where = array('sc.sch_id' => $id);
    $this->db->select('sm.*, sm.available_date as date, m.menu_id, s.sch_name, m.menu_name');
    $this->db->from('Available sm');
    $this->db->join('School_menu sc', 'sc.menu_id=sm.school_menu_id', 'left');
    $this->db->join('school s', 's.sch_id=sc.sch_id', 'left');
    $this->db->join('Menu m', 'm.menu_id=sm.school_menu_id', 'left');
    $this->db->where($where);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    }

    function delete_single_menu_date($data){
      $where = array('available_id'=> $data['avaliableid']);
      $this->db->where($where);
      $this->db->delete('Available');
    }

 }

 ?>