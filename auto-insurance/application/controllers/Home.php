<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
        $this->check_isvalidated();
       
    }
    
    public function index(){
        // If the user is validated, then below functions will run
        $data['user_count'] = $this->getUserCount();
        $data['last_user_login'] = $this->getUserLastLogin($this->session->userdata('id'));
        $this->load->view('login_user_details',$data); 
        $this->load->model('login_model');
        $this->login_model->createLogs($this->session->userdata());

      
    }
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            echo 'not valid user';
            redirect('login/');
        }
    }

    public function do_logout(){
        $this->session->sess_destroy();
        redirect('login/');
        $this->load->model('login_model');
    }

    public function getUserCount(){
        $this->load->model('Report_model');
        $result=$this->Report_model->display_records();
        return count($result);
    }

    public function getUserLastLogin($id){
        $this->load->model('Report_model');
        return $last_login = $this->Report_model->getLastLogin($id);
    }
 }
 ?>