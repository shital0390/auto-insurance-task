

<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->helper('date');
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        

        // Prep the query
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        
        // Run the query
         $query = $this->db->get('tbl_users');
        // Let's check if there are any results
       // print_r($query);
       //print_r($query->result_id->num_rows);
        if($query->result_id->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            
            $data = array(
                    'id' => $row->id,
                    'name' => $row->name,
                    'email' => $row->email,
                    'mobile_no'=>$row->mobile_no,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        else{
            // If the previous process did not validate
            // then return false.
            return false;
        }
        
    }

    public function createLogs($sesssionData){
       
        $insert_data['user_id']     = $sesssionData['id'];
        $insert_data['email']       = $sesssionData['email'];
        $last_login                 =  mdate('%Y-%m-%d %h:%i %a', now());
        $insert_data['last_login']  = $last_login;
        $this->db->insert('tbl_user_login_logs', $insert_data);
    }
}
?>


