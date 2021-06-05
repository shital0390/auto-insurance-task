<?php
  
   class Registration extends CI_Controller {
   
      public function __construct() { 
        parent::__construct(); 
        $this->load->helper(array('form', 'url')); 
        $this->load->library('upload');
        $this->load->helper('captcha');

        if ( $this->session->userdata('validated'))
        { 
            redirect('home');
        }
      } 

        
      public function index() {
		
        

        /* Load form validation library */ 
        $this->load->library('form_validation');
			
        /* Validation rule */
        $this->form_validation->set_rules('name', 'Name', 'required|callback_validatename');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_check_customer');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[15]');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|max_length[10]');	
        //$this->form_validation->set_rules('captcha', 'captcha', 'required|callback_check_captcha');
        //$this->form_validation->set_rules('user_img', 'User image', 'callback_upload');	 
		
        // If captcha form is submitted
        if($this->input->post('submit')){
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){
                echo 'Captcha code matched.';
            }else{
                echo 'Captcha code does not match, please try again.';
            }
        }
         // Captcha configuration
        /* $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     =>  __DIR__ . 'system/fonts/texb.TTF',
            'img_width'     => '160',
            'img_height'    => 60,
            'word_length'   => 5,
            'font_size'     => 20
        );
        $captcha = create_captcha($config);

          // Unset previous captcha and set new captcha word
          $this->session->unset_userdata('captchaCode');
          $this->session->set_userdata('captchaCode', $captcha['word']);
          $sessnCaptcha = $this->session->userdata('captchaCode');
        
          $data['captchaImg'] = $captcha['image'];*/
          $data = '';
          // Load the view
          //$this->load->view('reg_form', $data);


        if ($this->form_validation->run() == FALSE) { 
        $this->load->view('reg_form', $data); 
        } 
        else { 
            $this->load->model('reg_model');
            $this->reg_model->saveUser();
            $success = "Your account has been successfully created!";
            $this->load->view('reg_form', compact('success')); 
        } 
      }
	  public function check_customer($email)
	   {
	        //$this->load->database('auto_insurance');    
            $query = $this->db->where('email', $email)->get("tbl_users");
		 if ($query->num_rows() > 0)
		    {
			 $this->form_validation->set_message('check_customer','The '.$email.' belongs to an existing account');
		        return FALSE;
		    }
		  else 
			  return TRUE;
	  }

     public function check_captcha($captcha){
        $inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');
        if($captcha === $sessCaptcha){
            echo 'Captcha code matched.';
            //$this->session->unset_userdata('captchaCode');
            return TRUE;
            
        }else{
            $this->form_validation->set_message('check_captcha','Captcha code does not matched.');
            return FALSE;
        }
     }
      
      public function upload() 
	{
        $data['user_img'] = $this->input->post('user_img', TRUE);

        $config['upload_path'] = './user_imgs/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('user_img')) 
		{
            $error = array('error' => $this->upload->display_errors());
           // print_r($error);
           $this->form_validation->set_message('user_img',$error);
           $this->load->view('reg_form', $error);
		        return FALSE;
        } 
		else 
		{
            /*//file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();
                //get the uploaded file name
                $data['user_img'] = $upload_data['file_name'];
                //store pic data to the db
                $this->reg_model->store_pic_data($data);
                $this->load->view('reg_form', $error);*/
            return true;
        }
    }

    public function refresh(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     =>  __DIR__ . 'system/fonts/texb.TTF',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 18
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }

    public function validatename($name) {
        if ( !preg_match('/^[a-z A-Z 0-9.]+$/i',$name) ) {
            $this->form_validation->set_message('validatename','Name must contain alpha-numeric and dot only');
            return FALSE;
          }else{
              return TRUE;
          }
    }
   }
?>