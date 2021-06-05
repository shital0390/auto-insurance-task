<?php
class Reg_model extends CI_Model
{
    public function saveUser()
    {
	   
       $data['name'] = $this->input->post('name');
	   $data['email'] = $this->input->post('email');
	   $data['password'] = md5($this->input->post('password'));
	   $data['mobile_no'] = $this->input->post('mobile_no');
       //$data['captcha'] = $this->input->post('captcha');
     
   
	   $this->db->insert('tbl_users', $data);
    }

    function store_pic_data($data){
        $insert_data['user_img'] = $data['user_img'];
        $this->db->insert('tbl_users', $insert_data);
    }
}