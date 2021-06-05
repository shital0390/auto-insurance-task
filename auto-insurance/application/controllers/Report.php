<?php  
class Report extends CI_Controller 
{
    public function __construct(){
        /*call CodeIgniter's default Constructor*/
        parent::__construct();
        $this->load->helper('url'); 
        /*load Model*/
        $this->load->model('Report_model');
    
    }
   
    public function index(){
        $result['data']=$this->Report_model->display_records();
        $this->load->view('users_list',$result);
    }

    public function edit_data($edit_id)
	{
		$data=$this->Report_model->edit_record($edit_id);

		$dataToPass = array('e_data' => $data );

		$this->load->view('edit_form',$dataToPass);

	}

    public function update_data()
	{
		$uid=$this->input->post('id');
		$name=$this->input->post('name');
        $email=$this->input->post('email');

		$capsule = array('name' =>$name, 'email'=> $email );

		$data= $this->Report_model->update($capsule,$uid);
        redirect('report');
		//echo $data;

		//$this->show_data();
	}

    public function show_logs($user_id = NULL){
        //$user_id = $this->input->get('id', TRUE);

        $data_logs = $this->Report_model->get_user_logs($user_id);

        $data = array('user_data' => $data_logs );

        $this->load->view('show_logs',$data);

    }

   
	
}
?>