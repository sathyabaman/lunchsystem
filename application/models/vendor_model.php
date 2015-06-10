<?php

class Vendor_model extends CI_Model {

	
    function __construct()
    {
    	parent::__construct();
    }


    function get_orders_count(){
      $vendor  = $this->session->userdata('user');
      $where = array('ve.vendor_id' => $vendor[0]->vendor_id);

      $this->db->select('ord.*, ve.vendor_name, st.stu_firstname, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Order_Item oi', 'oi.order_id=ord.order_id', 'left');
      $this->db->join('Item ite', 'ite.item_id=oi.item_id', 'left');
      $this->db->join('Menu me', 'me.menu_id=ite.menu_id', 'left');
      $this->db->join('Vendor ve', 've.vendor_id=me.vendor_id', 'left');
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->where($where);
      $this->db->group_by('ord.order_id'); 
      $this->db->order_by("ord.order_id", "desc");
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;

    }

    function get_students_count(){
      $this->db->select('*');
      $this->db->from('Student'); 
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_menu_count(){
      $vendor  = $this->session->userdata('user');
      $where = array('vendor_id' => $vendor[0]->vendor_id);

      $this->db->select('menu_id');
      $this->db->from('Menu'); 
      $this->db->where($where);
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
    }

    function get_dashboard_orders(){
      $vendor  = $this->session->userdata('user');
      $where = array('ve.vendor_id' => $vendor[0]->vendor_id);

      $this->db->select('ord.*, ve.vendor_name, st.stu_firstname, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Order_Item oi', 'oi.order_id=ord.order_id', 'left');
      $this->db->join('Item ite', 'ite.item_id=oi.item_id', 'left');
      $this->db->join('Menu me', 'me.menu_id=ite.menu_id', 'left');
      $this->db->join('Vendor ve', 've.vendor_id=me.vendor_id', 'left');
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->where($where);
      $this->db->limit(50);
      $this->db->group_by('ord.order_id'); 
      $this->db->order_by("ord.order_id", "desc");
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


    function insert_menu($data){

    	$data1  = $this->session->userdata('user');

         $vendor['menu_name']    =$data['menuname'];
         $vendor['vendor_id']    =$data1[0]->vendor_id;
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
               
          $result = $this->db->insert('Item', $iten); 
          return  $result;
    }

    function get_all_categories(){
      $this->db->select('*'); 
      $this->db->from('Category'); 
      $this->db->order_by("category_name", "asc"); 
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function get_all_menus(){
    
    $vendor  = $this->session->userdata('user');
	$id = $vendor[0]->vendor_id;

    $where = array('m.vendor_id' => $id);
    $this->db->select('m.*, v.vendor_name');
    $this->db->from('Menu m'); 
    $this->db->join('Vendor v', 'v.vendor_id=m.vendor_id', 'left');
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
      $this->db->select('*, m.menu_name');
      $this->db->from('Item i'); 
      $this->db->join('Menu m', 'm.menu_id=i.menu_id', 'left');
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

    function get_venders(){
    	$vendor  = $this->session->userdata('user');
		$id = $vendor[0]->vendor_id;
		
      $where = array('vendor_id' => $id);
      $this->db->select('*');
      $this->db->where($where); 
      $this->db->from('Vendor'); 
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

    function delete_single_vendor($id){

      $this->db->where('vendor_id', $id);
      $this->db->delete('Vendor');

    }

    function get_all_orders(){
      $vendor  = $this->session->userdata('user');
      $where = array('ve.vendor_id' => $vendor[0]->vendor_id);

      $this->db->select('ord.*, ve.vendor_name, st.stu_firstname, sc.sch_name');
      $this->db->from('Order ord'); 
      $this->db->join('Order_Item oi', 'oi.order_id=ord.order_id', 'left');
      $this->db->join('Item ite', 'ite.item_id=oi.item_id', 'left');
      $this->db->join('Menu me', 'me.menu_id=ite.menu_id', 'left');
      $this->db->join('Vendor ve', 've.vendor_id=me.vendor_id', 'left');
      $this->db->join('Student st', 'st.stu_id=ord.stu_id', 'left');
      $this->db->join('school sc', 'sc.sch_id=st.sch_id', 'left');
      $this->db->where($where);
      $this->db->group_by('ord.order_id'); 
      $this->db->order_by("ord.order_id", "desc");
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


 }

 ?>