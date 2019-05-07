<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class administrator extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		//$this->load->helper('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','file','custom_helper'));
        $this->load->database();
        $this->load->model('admin_model');
        define('Adminpath', base_url().'administrator/');
		//define('Adminpath', base_url().'index.php/administrator/');
        define('ASSETS2', base_url().'assets/admin/');
		define('ASSETS2_ADMIN', base_url().'assets/admin/');
		define('CDN_PATH', base_url().'cdn/');
        define('administrator', base_url().'administrator/');
		//define('administrator', base_url().'index.php/administrator/');
        define('PATH', base_url());
		//define('PATH', base_url().'index.php');
		// --------load extra css and js  for specific pages/methods-------------------
      if((($this->router->method) == "adminUserList")  )
		{
		 define('css_for_list_pages','Y');
		 define('js_for_list_pages','Y');		
		}
    }
    function index()
    {
      $data = array();
      $this->load->view('admin/login', $data);
  }

  function login()
  {
    $data = array();
    if(isset($_POST['submit']))
    {
        $this->form_validation->set_rules('username', 'Usernameme', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
        }
        else
        {
		 $this->load->helper('cookie');
			//---save admuser and password in cookies for local browser------------- 
			$cookie_username = $this->input->cookie('remember_username'); // get cookie value---- same as get_cookie()
			$cookie_password = $this->input->cookie('remember_password'); // get cookie value---- same as get_cookie()
		   if (($cookie_username!="") && ($cookie_password!="")) {
                 $uname = $this->input->post('username');
                 $password = $this->input->post('password');

             }
          elseif (($this->input->post('username'))!='') {
                 $uname = $this->input->post('username');
                 $password = $this->input->post('password');
              }
			  //------set cookies--------------------------
        $remember = $this->input->post('remember_me');
         if($remember) {
		  // $month =  - 1;
            $month = time() + (60 * 60 * 24 * 30); // set cookie for 30 days---------
            setcookie('remember_username', $uname, $month,'','/');
            setcookie('remember_password', $password , $month);
			
			$cookie_uname = array(
			                                   'name'   => 'remember_username',
											   'value'  => $uname,
											   'expire' => $month,
											   'domain' => $this->config->item('cookie_domain'),
											   'path'   => $this->config->item('cookie_path'),
											   'prefix' => ''
										   );
	        $cookie_password2 = array(
			                                   'name'   => 'remember_password',
											   'value'  => $password,
											   'expire' => $month, 
											   'domain' => $this->config->item('cookie_domain'),
											   'path'   => $this->config->item('cookie_path'),
											   'prefix' => ''
										   );
							
		$cookie_user_pass=$this->input->set_cookie($cookie_uname);		  //-------set cookie-- same as set_cookie($cookie);
		$cookie_user_pass2=$this->input->set_cookie($cookie_password2);
			
           }
		   //------------unset kookies--------------------------
	   if (!$remember) {
           $cookie_uname = array(
			                                   'name'   => 'remember_username',
											   'domain' => $this->config->item('cookie_domain'),
											   'path'   => $this->config->item('cookie_path'),
											   'prefix' => ''
										   );
	        $cookie_password2 = array(
			                                   'name'   => 'remember_password',
											   'domain' => $this->config->item('cookie_domain'),
											   'path'   => $this->config->item('cookie_path'),
											   'prefix' => ''
										   );
							
		delete_cookie($cookie_uname);		  //-------set cookie-- same as delete_cookie($name, $domain, $path, $prefix);;
		delete_cookie($cookie_password2);
        }
        //---save admuser and password in cookies for local browser-------------   
			 
			$adm_login_id=trim($uname);
            $adm_password=trim($password); 
            $adm_login_id=removeBadChars($adm_login_id);
            $adm_login_id=stripQuotes($adm_login_id);
            $adm_password=removeBadChars($adm_password);
            $adm_password=stripQuotes($adm_password);
			
            if($this->admin_model->admin_user_login($adm_login_id, $adm_password))
            {

                redirect(base_url().'admin/dashboard');
                //redirect(base_url().'index.php/admin/dashboard');
                // echo "Hi";
                // $data['page'] = 'dashboard';
                // $this->load->view('admin/login', $data);
                //exit;
                //$this->load->view('user/content', $data);
            }
            else
            {
                $data['error'] = 'Wrong Username/password combination, please try again !';
                    // $data['page'] = 'login';
                $this->load->view('admin/login', $data);
            }
        }
    }
    else{
        $data['page'] = 'login';
        $this->load->view('admin/login', $data);
    }
}

function Register()
{
    $data = array();
    if (isset($_POST['submit'])) {
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'confirm Password', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('email', 'email Address', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
        }
        else
        {
            $user_detail = array('fname'=>$this->input->post('username'),
                'lname'=>$this->input->post('fname'),
                'email'=>$this->input->post('email'),
                'password'=>$this->input->post('password'),'role'=>'User','date'=>date('d-M-Y'));
           if($this->admin_model->insert('usermaster',$user_detail))
            {
                $data['success'] = 'User Registration successfully !';
                redirect(base_url().'index.php/admin');  
            }
            else
            {
                $data['error']   = 'An error occurred while Register User, please try again !';
            }
        }
    }
    $data['page'] = 'admin/register';
    $this->load->view('admin/register', $data);
}
function logout()
{
    $this->session->unset_userdata('admindetails');
    $this->index();
		//redirect(base_url().'index.php/admin/login');
}
}