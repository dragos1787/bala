<?php
class Users extends CI_Controller{
	public function register(){
		// reguli validare
		$this->form_validation->set_rules('first_name','First Name','trim|required'); 
		$this->form_validation->set_rules('last_name','Last Name','trim|required'); 
		$this->form_validation->set_rules('email','Email','trim|required|valid_email'); 
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[16]'); 
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]'); 
		$this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]'); 
		
		 if ($this->form_validation->run() == FALSE){
                
                       $data['main_content'] = 'register';
		               $this->load->view('layouts/main',$data);
                }
                else
                {
                     if($this->User_model->register()){
						 $this->session->set_flashdata('registered','You are now registerd amd can login');
						 redirect('products');
					 }
                }
		
	}
	public function login(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[16]'); 
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]'); 
		
		$username = $this->input->post('username');
	    $password = md5($this->input->post('password'));
		
		$user_id = $this->User_model->login($username, $password);
		
		// Validare user
		if($user_id){
			$data = array(
			'user_id' => $user_id,
			'username' => $username,
			'logged_in' => true
			);
			
			$this->session->set_userdata($data);
			
			$this->session->set_flashdata('pass_login','You are logged in');
			redirect('products');
		}
		    else{
				$this->session->set_flashdata('fail_login','Sorry,the login info is not true ');
				redirect('products');
			}
	}
	    
		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();
			
			redirect('products');
		}
	
}