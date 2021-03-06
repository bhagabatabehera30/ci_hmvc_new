<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_Page extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper(array('form', 'url','file','custom_helper'));
		$this->load->database();
		$this->load->model('frontend_model');
		// define constants here if required-------------------
		 
		
	}
	 
	public function index() 
	{
		$data=array();
		$data['getCMS']=$this->frontend_model->get_CMS_By_Id('myapp_cms','Status','cmsid',1);   
		$data['MyAppSettings']=$this->frontend_model->MyAppSettings('myapp_application_settings','Status','setting_id');   
		$data['page']='front_page';
		$this->load->view('main',$data);
		
	}  
}
