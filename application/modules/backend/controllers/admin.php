<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_adminlogged_in();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper(array('form', 'url','file','custom_helper'));
		$this->load->database();
		$this->load->model('admin_model');
		define('ASSETS', base_url().'assets/');
		define('ASSETS2', base_url().'assets/admin/');
		define('ASSETS2_ADMIN', base_url().'assets/admin/');
		define('CDN_PATH', base_url().'cdn/');
		define('administrator', base_url().'administrator/');
		define('Adminpath', base_url().'admin/');   
		define('PATH', base_url());
		//define('administrator', base_url().'index.php/administrator/');
		//define('Adminpath', base_url().'index.php/admin/');
		//define('PATH', base_url().'index.php');

		if((($this->router->method) == "ViewOffers")  )
		{
			define('link', 'https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css');
		}
		else{
			define('link', ASSETS2.'css/bootstrap.min.css');	
		}  
		
		// --------load extra css and js for only dashboard-------------------
      if((($this->router->method) == "dashboard")  )
		{
		 define('css_for_dashboard','Y');
		 define('js_for_dashboard','Y');		
		}else{  define('css_for_dashboard','N');
		 define('js_for_dashboard','N');	 }

		
		// --------load extra css and js  for specific list pages/methods------------------- 
      if((($this->router->method) == "adminUserList") || (($this->router->method) == "CategoryList") || (($this->router->method) == "CmsList")  || (($this->router->method) == "productsList") || (($this->router->method) == "modulesList")) 
		{
		 define('css_for_list_pages','Y');
		 define('js_for_list_pages','Y');		
		}else{  define('css_for_list_pages','N');
		 define('js_for_list_pages','N');	 }
		 
		 // --------load extra css and js  for specific ad/edit pages/methods------------------- CategoryCreate
      if((($this->router->method) == "adminUserCreate") || (($this->router->method) == "adminUserEdit") || (($this->router->method) == "CategoryCreate") || (($this->router->method) == "CategoryEdit") || (($this->router->method) == "CmsCreate") || (($this->router->method) == "CmsEdit") || (($this->router->method) == "productsCreate") || (($this->router->method) == "productsEdit") || (($this->router->method) == "modulesCreate") || (($this->router->method) == "modulesEdit")) 
		{
		 define('css_for_add_edit_pages','Y');
		 define('js_for_add_edit_pages','Y');		
		}else{  define('css_for_add_edit_pages','N');
		 define('js_for_add_edit_pages','N');	 }

	}
	public function index()
	{	$data=array();
		$data['page']='admin/login';
		$this->load->view('admin/login',$data);
	}
	public function dashboard()
	{
		// print_r(get_session_details());
		//$ssss=$this->session->userdata('admindetails');
		// print_r($ssss);
		
		$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='dashboard';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
        $data['page']='admin/index';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	}
	
//-------add/edit/update/delete/change status admin user------------------------------------------	
public function adminUserList(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='admin user list';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
 $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	$adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
$data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
	$data['page']='admin/adminUserList';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}
public function active_deactive_delete_all_adminuser(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$AccessPermission=$this->admin_model->get_admin_user_details_byid($adm_id);
	if(is_post_back()) {
	$arr_adm_ids=$this->input->post('arr_cat_ids');	 //print_r($arr_adm_ids);
	$Delete=$this->input->post('Delete');
	$Activate=$this->input->post('Activate');
	$Deactivate=$this->input->post('Deactivate');
	if(is_array($arr_adm_ids)) { 
		$str_adm_ids = implode(',', $arr_adm_ids);	
		 if($Delete!='') {
			if($AccessPermission->Remove=="Y"){ //  permission for delete 
			 $this->admin_model->deleteAll('admin_user','adm_id',$str_adm_ids);  
			$sess_msg="Records Deleted Successfully";;
			} else{ $sess_msg="Permission for delete is not granted...?"; }
			$_SESSION['sessionMsg']=$sess_msg; 
			
		} else if($Activate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('admin_user','adm_status','Active','adm_id',$str_adm_ids);  
			$sess_msg="Records have Activated Successfully";
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			 $_SESSION['sessionMsg']=$sess_msg;
			
		} else if($Deactivate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('admin_user','adm_status','Inactive','adm_id',$str_adm_ids);  
			$sess_msg="Records have deactivated/inactivated Successfully"; 
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			$_SESSION['sessionMsg']=$sess_msg; 
		}
	}
	
}
redirect('admin/adminUserList');

		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}	
	
public function adminUserCreate(){
	$data = array();
    if (isset($_POST['submit'])) {
		//print_r($_POST);
		// die();
        $this->form_validation->set_rules('SecondaryLogId', 'Login Id', 'trim|required');
        $this->form_validation->set_rules('SecondaryPassword', 'Password', 'trim|required');
        $this->form_validation->set_rules('CSecondaryPassword', 'confirm Password', 'trim|required');
		 $this->form_validation->set_rules('adm_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('adm_email', 'Email Id', 'trim|required');
        $this->form_validation->set_rules('adm_phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('adm_address', 'address', 'trim|required'); 
		$this->form_validation->set_rules('adm_city', 'city', 'trim|required');
		$this->form_validation->set_rules('adm_state', 'state', 'trim|required');
		$this->form_validation->set_rules('adm_zipcode', 'zipcode', 'trim|required');
		$this->form_validation->set_rules('Privilege[]', 'Privilege', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
        }
        else
        { 
		 $error=''; 
		 if($this->admin_model->checkUniquenessOfString('admin_user','adm_login_id',$this->input->post('SecondaryLogId'))){
					$error='<span class="fielderror">Duplicate Login Id. Please use another login id</span>';
					} 	
if($_FILES['user_image']['name']!=''){		
				$config['upload_path']   = './cdn/UserImage/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2048; // 2MB 
				$config['file_name']	= time()."-".$_FILES['user_image']['name'];
				$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('user_image')) {
					// $error = array('error' => $this->upload->display_errors());
					if($error!=""){
					$error .='<br><span class="fielderror">Upload (jpg|png|jpeg) type image file and file size should be less than 2MB</span>';
					}else{$error='<span class="fielderror">Upload (jpg|png|jpeg) type image file and file size should be less than 2MB</span>';}
					
				}
}
if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{ if($_FILES['user_image']['name']!=''){	
			  $gallery = $this->upload->data();
			  $user_image=$gallery['file_name'];
 }else{ $user_image=$_FILES['user_image']['name']; } 
			  $Added_Date=date("Y-m-d H:i:s A");
			  
			  $Privilege=$this->input->post('Privilege[]');
			  //print_r($Privilege);
			  if($Privilege!=''){ echo $pri=implode(',',$Privilege); }
			  //die();
			  // password_hash('ON@lIn#3E@dE9l}S[O6)2', PASSWORD_BCRYPT);
			  $adm_password=$this->input->post('SecondaryPassword');
			 $adm_conpwd=$adm_password;
			 $adm_password=password_hash($adm_password, PASSWORD_BCRYPT);
			 $View=$this->input->post('View'); if($View!=""){$View=$View;}else{$View='N';}
			 $Generate=$this->input->post('Generate'); if($Generate!=""){$Generate=$Generate;}else{$Generate='N';}
			 $Edit=$this->input->post('Edit'); if($Edit!=""){$Edit=$Edit;}else{$Edit='N';}
			 $Remove=$this->input->post('Remove'); if($Remove!=""){$Remove=$Remove;}else{$Remove='N';}
			  
	 $adm_detail = array('adm_login_id'=>$this->input->post('SecondaryLogId'),
                'adm_password'=>$adm_password,
                'adm_conpwd'=>$adm_conpwd,
                'adm_name'=>$this->input->post('adm_name'),
				'user_image'=>$user_image,
				'adm_status'=>$this->input->post('adm_status'),
				'adm_privi'=>$pri, 
				'adm_email'=>$this->input->post('adm_email'), 
				'adm_address'=>$this->input->post('adm_address'),
				'adm_city'=>$this->input->post('adm_city'),
				'adm_state'=>$this->input->post('adm_state'),
				'adm_zipcode'=>$this->input->post('adm_zipcode'),
				'adm_phone'=>$this->input->post('adm_phone'), 
				'status'=>$this->input->post('status'),
				'Added_Date'=>$Added_Date,
				'View'=>$View,
				'Generate'=>$Generate,
				'Edit'=>$Edit,
				'Remove'=>$Remove,
				'Role'=>$this->input->post('Role')  );
				
				
				
				
           if($this->admin_model->insert('admin_user',$adm_detail))
            {
               $sess_msg="Data inserted successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/adminUserList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserCreate';
		$sess_msg="An error occurred while insert data, please try again !"; 
		$_SESSION['sessionMsg']=$sess_msg; 
		//$data['error']   = 'An error occurred while Register User, please try again !';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
               
            }
        }
		}
    }else{
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	}
	}	
	
	
public function adminUserEdit($id){
	$data = array();
    if (isset($_POST['submit'])) {
		//print_r($_POST);
		// die();
        $this->form_validation->set_rules('SecondaryLogId', 'Login Id', 'trim|required');
        $this->form_validation->set_rules('SecondaryPassword', 'Password', 'trim|required');
        $this->form_validation->set_rules('CSecondaryPassword', 'confirm Password', 'trim|required');
		$this->form_validation->set_rules('adm_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('adm_email', 'Email Id', 'trim|required');
        $this->form_validation->set_rules('adm_phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('adm_address', 'address', 'trim|required'); 
		$this->form_validation->set_rules('adm_city', 'city', 'trim|required');
		$this->form_validation->set_rules('adm_state', 'state', 'trim|required');
		$this->form_validation->set_rules('adm_zipcode', 'zipcode', 'trim|required');
		$this->form_validation->set_rules('Privilege[]', 'Privilege', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
		$data['adm_user_details']=$this->admin_model->getRowbyId('admin_user','adm_id',$id);
	    $data['page']='admin/adminUserEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
        }
        else
        {
			$error=''; 
		 if($this->admin_model->checkUniquenessOfString1('admin_user','adm_login_id',$this->input->post('SecondaryLogId'),'adm_id',$id)){
					$error='<span class="fielderror">Duplicate Login Id. Please use another login id</span>';
					} 	
					
if($_FILES['user_image']['name']!=''){
	
@unlink_file($_POST['user_image2'],"./cdn/UserImage/");	
				$config['upload_path']   = './cdn/UserImage/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2048; // 2MB 
				$config['file_name']	= time()."-".$_FILES['user_image']['name'];
				$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('user_image')) {
					// $error = array('error' => $this->upload->display_errors());
					if($error!=""){
					$error .='<br><span class="fielderror">Upload (jpg|png|jpeg) type image file and file size should be less than 2MB</span>';
					}else{$error='<span class="fielderror">Upload (jpg|png|jpeg) type image file and file size should be less than 2MB</span>';}
					
				}
}
if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
		$data['adm_user_details']=$this->admin_model->getRowbyId('admin_user','adm_id',$id);
	    $data['page']='admin/adminUserEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{         if($_FILES['user_image']['name']!=''){ $gallery = $this->upload->data(); $user_image=$gallery['file_name']; }else{$user_image=$_POST['user_image2'];}
			  
			  $Updated_Date=date("Y-m-d H:i:s A");
			  
			  $Privilege=$this->input->post('Privilege[]');
			  //print_r($Privilege);
			  if($Privilege!=''){ echo $pri=implode(',',$Privilege); }
			  //die();
			  // password_hash('ON@lIn#3E@dE9l}S[O6)2', PASSWORD_BCRYPT);
			  $adm_password=$this->input->post('SecondaryPassword');
			 $adm_conpwd=$adm_password;
			 $adm_password=password_hash($adm_password, PASSWORD_BCRYPT);
			 $View=$this->input->post('View'); if($View!=""){$View=$View;}else{$View='N';}
			 $Generate=$this->input->post('Generate'); if($Generate!=""){$Generate=$Generate;}else{$Generate='N';}
			 $Edit=$this->input->post('Edit'); if($Edit!=""){$Edit=$Edit;}else{$Edit='N';}
			 $Remove=$this->input->post('Remove'); if($Remove!=""){$Remove=$Remove;}else{$Remove='N';}
			  
	 $adm_detail = array('adm_login_id'=>$this->input->post('SecondaryLogId'),
                'adm_password'=>$adm_password,
                'adm_conpwd'=>$adm_conpwd,
                'adm_name'=>$this->input->post('adm_name'),
				'user_image'=>$user_image,
				'adm_status'=>$this->input->post('adm_status'),
				'adm_privi'=>$pri, 
				'adm_email'=>$this->input->post('adm_email'), 
				'adm_address'=>$this->input->post('adm_address'),
				'adm_city'=>$this->input->post('adm_city'),
				'adm_state'=>$this->input->post('adm_state'),
				'adm_zipcode'=>$this->input->post('adm_zipcode'),
				'adm_phone'=>$this->input->post('adm_phone'), 
				'status'=>$this->input->post('status'),
				'Updated_Date'=>$Updated_Date,
				'View'=>$View,
				'Generate'=>$Generate,
				'Edit'=>$Edit,
				'Remove'=>$Remove,
				'Role'=>$this->input->post('Role')  );
				
				
				
			if($this->admin_model->update('admin_user',$adm_detail,'adm_id',$id))	
            {
               $sess_msg="Data Updated successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/adminUserList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
		$data['adm_user_details']=$this->admin_model->getRowbyId('admin_user','adm_id',$id);
	    $data['page']='admin/adminUserEdit';
		$sess_msg="An error occurred while update this data, please try again !"; 
		$_SESSION['sessionMsg']=$sess_msg; 
		//$data['error']   = 'An error occurred while Register User, please try again !';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
               
            }
        }
		}
    }else{
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create a admin user';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
//  $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	// $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
// $data['AdminUserLists']=$this->admin_model->FetchAdminListData('admin_user',$admPermissionStatus,'adm_id',$adm_id,'adm_id','desc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
		$data['adm_user_details']=$this->admin_model->getRowbyId('admin_user','adm_id',$id);
	    $data['page']='admin/adminUserEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	}
	}	
	
	
	//----------change admin password----------------------------
	
	public function adminUserChangePassword(){
	$data = array();
    if (isset($_POST['submit']) && $_POST['change']=="yes" ) {
		// print_r($_POST);
		// die();
        $this->form_validation->set_rules('SecondaryLogId', 'Login Id', 'trim|required');
        $this->form_validation->set_rules('SecondaryPassword', 'Password', 'trim|required');
        $this->form_validation->set_rules('NewSecondaryPassword', 'new password', 'trim|required');
		$this->form_validation->set_rules('CNewSecondaryPassword', 'confirm new password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Change Password';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');

        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserChangePassword';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}  
			 
        }
        else
        { 
		 $error=''; 
		$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$getAdmPass=$this->admin_model->get_admin_user_details_byid($adm_id);
		$password=$this->input->post('SecondaryPassword');
		   if(password_verify($password, $getAdmPass->adm_password))  // verify current password-----
                 { 
					 $error="";
				 }else{
						 $error='<span class="fielderror">Please enter your valid current password</span>';
					 }
		}

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Change Password';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');

        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserChangePassword';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{     $Added_Date=date("Y-m-d H:i:s A");
			  // password_hash('ON@lIn#3E@dE9lS[O6)2', PASSWORD_BCRYPT);
			  $adm_password=$this->input->post('NewSecondaryPassword');
			 $adm_conpwd=$adm_password;
			 $adm_password=password_hash($adm_password, PASSWORD_BCRYPT);
			
			  
	 $adm_detail = array('adm_password'=>$adm_password,
                'adm_conpwd'=>$adm_conpwd,
                'Updated_Date'=>$Added_Date);
				
				
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];	
				
          if($this->admin_model->update('admin_user',$adm_detail,'adm_id',$adm_id)) 	
            {
               $sess_msg="Your password is successfully changed.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/adminUserChangePassword');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Change Password';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');

        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserChangePassword';
		$sess_msg="An error occurred while change password, please try again !"; 
		$_SESSION['sessionMsg']=$sess_msg; 
		//$data['error']   = 'An error occurred while Register User, please try again !';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
               
            }
        }
		}
    }else{
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Change Password';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
        $data['PermittedModules']=$this->admin_model->getAllPermittedModules();
	    $data['page']='admin/adminUserChangePassword';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	}
	}	
	
	
//-------add/edit/update/delete/change status admin user end------------------------------------------	


//-------add/edit/update/delete/change status Category start------------------------------------------

public function CategoryList(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Category List';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
 $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
	$adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
$data['ParentCatLists']=$this->admin_model->FetchPerentOrChildCategoryListData('front_categories','parent_category_id','0','category_name','ASC');
	$data['page']='admin/CategoryList';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}
public function active_deactive_delete_all_categories(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$AccessPermission=$this->admin_model->get_admin_user_details_byid($adm_id);
	if(is_post_back()) {
	$arr_category_ids=$this->input->post('arr_cat_ids');	 //print_r($arr_adm_ids);
	$Delete=$this->input->post('Delete');
	$Activate=$this->input->post('Activate');
	$Deactivate=$this->input->post('Deactivate');
	if(is_array($arr_category_ids)) { 
		$arr_category_ids = implode(',', $arr_category_ids);	
		 if($Delete!='') {
			if($AccessPermission->Remove=="Y"){ //  permission for delete 
			 $this->admin_model->deleteAll('front_categories','category_id',$arr_category_ids);  
			$sess_msg="Records Deleted Successfully";;
			} else{ $sess_msg="Permission for delete is not granted...?"; }
			$_SESSION['sessionMsg']=$sess_msg; 
			
		} else if($Activate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('front_categories','Status','Y','category_id',$arr_category_ids);  
			$sess_msg="Records have Activated Successfully";
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			 $_SESSION['sessionMsg']=$sess_msg;
			
		} else if($Deactivate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('front_categories','Status','N','category_id',$arr_category_ids);  
			$sess_msg="Records have deactivated/inactivated Successfully"; 
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			$_SESSION['sessionMsg']=$sess_msg; 
		}
	}
	
}
redirect('admin/CategoryList');

		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}	
		

public function CategoryCreate(){
	$data = array();
    if (isset($_POST['submit'])) {
		//print_r($_POST);
		// die();
        $this->form_validation->set_rules('category_name', 'Category Name/Title', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category','0','form-control','CreareCat');
	    $data['page']='admin/CategoryCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
        }
        else
        { 
		 $error=''; 
		 if($this->admin_model->checkUniquenessOfString('front_categories','category_name',$this->input->post('category_name'))){
					$error='<span class="fielderror">Duplicate category name. Please use another category name/title</span>';
					} 	

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category','0','form-control','CreareCat');
	    $data['page']='admin/CategoryCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{ 
			  $Added_Date=date("Y-m-d H:i:s A");
			 $parent_category_id=$this->input->post('parent_category_id');
			 $catname_short=$this->input->post('catname_short');
			 $url=$this->input->post('url');
			 $parent_category_id=$this->input->post('parent_category_id');
			 $parent_category_id=$this->input->post('parent_category_id');
			 $IsTopNav=$this->input->post('IsTopNav'); if($IsTopNav!=""){$IsTopNav=$IsTopNav;}else{$IsTopNav='N';}
			 $IsFooter=$this->input->post('IsFooter'); if($IsFooter!=""){$IsFooter=$IsFooter;}else{$IsFooter='N';}
			 $CompanyInFooter=$this->input->post('CompanyInFooter'); if($CompanyInFooter!=""){$CompanyInFooter=$CompanyInFooter;}else{$CompanyInFooter='N';}
			 $SupportInFooter=$this->input->post('SupportInFooter'); if($SupportInFooter!=""){$SupportInFooter=$SupportInFooter;}else{$SupportInFooter='N';} 
			  $MyAcInFooter=$this->input->post('MyAcInFooter'); if($MyAcInFooter!=""){$MyAcInFooter=$MyAcInFooter;}else{$MyAcInFooter='N';}  
			  
			 $SortOrder=$this->input->post('SortOrder'); if($SortOrder!=""){$SortOrder=$SortOrder;}else{$SortOrder='0';}  
			  
	 $adm_detail = array('category_name'=>$this->input->post('category_name'),
                'url'=>$url,
				'IsTopNav'=>$IsTopNav,
				'IsFooter'=>$IsFooter,
				'parent_category_id'=>$parent_category_id,
				'SortOrder'=>$SortOrder,
				'CompanyInFooter'=>$CompanyInFooter, 
				'SupportInFooter'=>$SupportInFooter, 
				'MyAcInFooter'=>$MyAcInFooter,
                'catname_short'=>$catname_short,
				'Status'=>$this->input->post('Status'),
				'Added_Date'=>$Added_Date  );
				
				
				
				
           if($this->admin_model->insert('front_categories',$adm_detail))
            {
               $sess_msg="Data inserted successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/CategoryList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category','0','form-control','CreareCat');
	    $data['page']='admin/CategoryCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
			}
        }
		}
    }else{
		$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category','0','form-control','CreareCat');
	    $data['page']='admin/CategoryCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);  
			}
			}
	}	
	
	
	public function CategoryEdit($id){
	$data = array();
    if (isset($_POST['submit'])) {
		 $this->form_validation->set_rules('category_name', 'Category Name/Title', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			
		$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cat_details']=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_cat_parent_id=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_parent_category_id=$get_cat_parent_id->parent_category_id;
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category',$get_parent_category_id,'form-control','CreareCat');
	    $data['page']='admin/CategoryEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
			
        }
        else
        {
			$error=''; 
		 if($this->admin_model->checkUniquenessOfString1('front_categories','category_name',$this->input->post('category_name'),'category_id',$id)){
					$error='<span class="fielderror">Duplicate category name/title. Please use another name</span>';
					} 	
					

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cat_details']=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_cat_parent_id=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_parent_category_id=$get_cat_parent_id->parent_category_id;
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category',$get_parent_category_id,'form-control','CreareCat');
	    $data['page']='admin/CategoryEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{         
			  
			  $Updated_Date=date("Y-m-d H:i:s A");
			 $parent_category_id=$this->input->post('parent_category_id');
			 $catname_short=$this->input->post('catname_short');
			 $url=$this->input->post('url');
			 $parent_category_id=$this->input->post('parent_category_id');
			 $parent_category_id=$this->input->post('parent_category_id');
			 $IsTopNav=$this->input->post('IsTopNav'); if($IsTopNav!=""){$IsTopNav=$IsTopNav;}else{$IsTopNav='N';}
			 $IsFooter=$this->input->post('IsFooter'); if($IsFooter!=""){$IsFooter=$IsFooter;}else{$IsFooter='N';}
			 $CompanyInFooter=$this->input->post('CompanyInFooter'); if($CompanyInFooter!=""){$CompanyInFooter=$CompanyInFooter;}else{$CompanyInFooter='N';}
			 $SupportInFooter=$this->input->post('SupportInFooter'); if($SupportInFooter!=""){$SupportInFooter=$SupportInFooter;}else{$SupportInFooter='N';} 
			  $MyAcInFooter=$this->input->post('MyAcInFooter'); if($MyAcInFooter!=""){$MyAcInFooter=$MyAcInFooter;}else{$MyAcInFooter='N';}  
	$SortOrder=$this->input->post('SortOrder'); if($SortOrder!=""){$SortOrder=$SortOrder;}else{$SortOrder='0';}  
			   
			   $adm_detail = array('category_name'=>$this->input->post('category_name'),
                'url'=>$url,
				'IsTopNav'=>$IsTopNav,
				'IsFooter'=>$IsFooter,
				'parent_category_id'=>$parent_category_id,
				'SortOrder'=>$SortOrder,
				'CompanyInFooter'=>$CompanyInFooter, 
				'SupportInFooter'=>$SupportInFooter, 
				'MyAcInFooter'=>$MyAcInFooter,
                'catname_short'=>$catname_short,
				'Status'=>$this->input->post('Status'),
				'Updated_Date'=>$Updated_Date  );
				
			if($this->admin_model->update('front_categories',$adm_detail,'category_id',$id))	
            {
               $sess_msg="Data Updated successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/CategoryList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cat_details']=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_cat_parent_id=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_parent_category_id=$get_cat_parent_id->parent_category_id;
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category',$get_parent_category_id,'form-control','CreareCat');
	    $data['page']='admin/CategoryEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
               
            }
        }
		}
    }else{
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Category';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cat_details']=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_cat_parent_id=$this->admin_model->getRowbyId('front_categories','category_id',$id);
$get_parent_category_id=$get_cat_parent_id->parent_category_id;
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','parent_category_id','Parent Category',$get_parent_category_id,'form-control','CreareCat');
	    $data['page']='admin/CategoryEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
	}
	}	
	


	
//-------add/edit/update/delete/change status Category end------------------------------------------	

//-------add/edit/update/delete/change status Cms start------------------------------------------

public function CmsList(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Cms List';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
 $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
 $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
 $data['CmsLists']=$this->admin_model->FetchAllListData('front_cms','cmsid','ASC');
	$data['page']='admin/CmsList'; 
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}
public function active_deactive_delete_all_cms(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$AccessPermission=$this->admin_model->get_admin_user_details_byid($adm_id);
	if(is_post_back()) {
	$arr_all_ids=$this->input->post('arr_cat_ids');	 //print_r($arr_adm_ids);
	$Delete=$this->input->post('Delete');
	$Activate=$this->input->post('Activate');
	$Deactivate=$this->input->post('Deactivate');
	if(is_array($arr_all_ids)) { 
		$arr_all_ids = implode(',', $arr_all_ids);	
		 if($Delete!='') {
			if($AccessPermission->Remove=="Y"){ //  permission for delete 
			 $this->admin_model->deleteAll('front_cms','cmsid',$arr_all_ids);  
			$sess_msg="Records deleted successfully";;
			} else{ $sess_msg="Permission for delete is not granted...?"; }
			$_SESSION['sessionMsg']=$sess_msg; 
			
		} else if($Activate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('front_cms','Status','Y','cmsid',$arr_all_ids);  
			$sess_msg="Records have activated successfully";
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			 $_SESSION['sessionMsg']=$sess_msg;
			
		} else if($Deactivate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('front_cms','Status','N','cmsid',$arr_all_ids);  
			$sess_msg="Records have deactivated/inactivated successfully";
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";} 
			$_SESSION['sessionMsg']=$sess_msg;  
		}
	}
	
}
redirect('admin/CmsList');

		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}	
		

public function CmsCreate(){
	$data = array();
    if (isset($_POST['submit'])) {
		//print_r($_POST);
		// die(); 
        $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category','0','form-control','all_cats');
	    $data['page']='admin/CmsCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
        }
        else
        { 
		 $error=''; 
		 if($this->admin_model->checkUniquenessOfString('front_cms','page_title',$this->input->post('page_title'))){
					$error='<span class="fielderror">Duplicate page title. Please use another page title.</span>';
					} 	

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category','0','form-control','all_cats');
	    $data['page']='admin/CmsCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{ 
			  $Added_Date=date("Y-m-d H:i:s A");
			  // page_title category_id CMS_Editor_Type Description MetaTitle MetaDescription SEOKeyword LeftSideBar RightSideBar 
			 $page_title=$this->input->post('page_title');
			 $category_id=$this->input->post('category_id');
			 $CMS_Editor_Type=$this->input->post('CMS_Editor_Type');
			 $Description=$this->input->post('Description');
			 $MetaTitle=$this->input->post('MetaTitle');
			 $MetaDescription=$this->input->post('MetaDescription');
			 $SEOKeyword=$this->input->post('SEOKeyword');
			 $LeftSideBar=$this->input->post('LeftSideBar'); if($LeftSideBar!=""){$LeftSideBar=$LeftSideBar;}else{$LeftSideBar='N';}
			 $RightSideBar=$this->input->post('RightSideBar'); if($RightSideBar!=""){$RightSideBar=$RightSideBar;}else{$RightSideBar='N';}
			 
			  
	 $cms_detail = array('page_title'=>$this->input->post('page_title'),
                'category_id'=>$category_id,
				'CMS_Editor_Type'=>$CMS_Editor_Type,
				'Description'=>$Description,
				'MetaTitle'=>$MetaTitle,
				'MetaDescription'=>$MetaDescription,
				'SEOKeyword'=>$SEOKeyword, 
				'LeftSideBar'=>$LeftSideBar, 
				'RightSideBar'=>$RightSideBar,
				'Status'=>$this->input->post('Status'),
				'Added_Date'=>$Added_Date  ); 
				
				
           if($this->admin_model->insert('front_cms',$cms_detail))
            {
               $sess_msg="Data inserted successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/CmsList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category','0','form-control','all_cats');
	    $data['page']='admin/CmsCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
			}
        }
		}
    }else{
		$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category','0','form-control','all_cats');
	    $data['page']='admin/CmsCreate';
		$this->load->view('admin/main',$data);  
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
			}
	}	
	
	
	public function CmsEdit($id){
	$data = array();
    if (isset($_POST['submit'])) {
		 $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cms_details']=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_cms=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_category_id=$get_cms->category_id; 
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category',$get_category_id,'form-control','CreareCat');
	    $data['page']='admin/CmsEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
			
        }
        else
        {
			$error=''; 
		 if($this->admin_model->checkUniquenessOfString1('front_cms','page_title',$this->input->post('page_title'),'cmsid',$id)){
					$error='<span class="fielderror">Duplicate page title. Please use another page title</span>';
					} 	
					

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cms_details']=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_cms=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_category_id=$get_cms->category_id; 
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category',$get_category_id,'form-control','CreareCat');
	    $data['page']='admin/CmsEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
	} 
 else{         
			  
			  $Updated_Date=date("Y-m-d H:i:s A");
			 $page_title=$this->input->post('page_title');
			 $category_id=$this->input->post('category_id');
			 $CMS_Editor_Type=$this->input->post('CMS_Editor_Type');
			 $Description=$this->input->post('Description');
			 $MetaTitle=$this->input->post('MetaTitle');
			 $MetaDescription=$this->input->post('MetaDescription');
			 $SEOKeyword=$this->input->post('SEOKeyword');
			 $LeftSideBar=$this->input->post('LeftSideBar'); if($LeftSideBar!=""){$LeftSideBar=$LeftSideBar;}else{$LeftSideBar='N';}
			 $RightSideBar=$this->input->post('RightSideBar'); if($RightSideBar!=""){$RightSideBar=$RightSideBar;}else{$RightSideBar='N';}
			 
			  
	 $cms_detail = array('page_title'=>$this->input->post('page_title'),
                'category_id'=>$category_id,
				'CMS_Editor_Type'=>$CMS_Editor_Type,
				'Description'=>$Description,
				'MetaTitle'=>$MetaTitle,
				'MetaDescription'=>$MetaDescription,
				'SEOKeyword'=>$SEOKeyword, 
				'LeftSideBar'=>$LeftSideBar, 
				'RightSideBar'=>$RightSideBar,
				'Status'=>$this->input->post('Status'),
				'Updated_Date'=>$Updated_Date  ); 
				
				
           if($this->admin_model->update('front_cms',$cms_detail,'cmsid',$id)) 
            {
               $sess_msg="Data updated successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/CmsList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cms_details']=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_cms=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_category_id=$get_cms->category_id; 
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category',$get_category_id,'form-control','CreareCat');
	    $data['page']='admin/CmsEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
			}
        }
		}
    }else{
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Cms';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_cms_details']=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_cms=$this->admin_model->getRowbyId('front_cms','cmsid',$id);
$get_category_id=$get_cms->category_id; 
$data['get_categories'] = $this->admin_model->get_category_options('front_categories','Status','Y','category_id','category_name','parent_category_id','category_id','Category',$get_category_id,'form-control','CreareCat');
	    $data['page']='admin/CmsEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
	}
	}	

//----get ajax editor---------------------------

public function chooseEditor($val='',$cmsid=0){ 
	if($cmsid!=0){
	$getcmsdetails=$this->admin_model->getRowbyId('front_cms','cmsid',$cmsid);
	$Description=$getcmsdetails->Description; 
	$Description=html_entity_decode($Description);  
	}
	if($cmsid==0){
	$Description='';
	}
	if($val=='Custom'){ 
	
    $editorhtml='<textarea name="Description"  class="form-control"  placeholder="Description/Content" rows="10" cols="80" style="border:2px solid red;">'.$Description.'</textarea>';
	echo $editorhtml;
	}
	 if($val=='WYSIWYG'){ 
      $editorhtml='<textarea name="Description"  class="form-control" id="Cms_Description1" placeholder="Description/Content" rows="10" cols="80" style="border:2px solid blue;">'.$Description.'</textarea>';
	 
	  //-----------cke editor---
	  $editorhtml.='<script type="text/javascript">
var roxyFileman = "'.CDN_PATH.'fileman/roxy-file-manager.html?integration=ckeditor";
$(function(){
  CKEDITOR.replace( "Cms_Description1",{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+"&type=image",
                               removeDialogTabs: "link:upload;image:upload"}); 
});
</script>'; 
	  //--------------------cke editor---
	   echo $editorhtml;
     }
	 
}	



//-------add/edit/update/delete/change status Cms end------------------------------------------	

//-------add/edit/update/delete/change status Modules start------------------------------------------

public function modulesList(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Modules List';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
 $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
 $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
 $data['ParentModulesLists']=$this->admin_model->FetchPerentOrChildCategoryListData('module_managements','ModuleStatus','0','modulename','ASC');
// $data['ModulesLists']=$this->admin_model->FetchAllListData('module_managements','module_id','ASC');
	$data['page']='admin/modulesList'; 
		$this->load->view('admin/main',$data); 
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);     
			}
	
	}
public function active_deactive_delete_all_modules(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$AccessPermission=$this->admin_model->get_admin_user_details_byid($adm_id);
	if(is_post_back()) {
	$arr_all_ids=$this->input->post('arr_cat_ids');	 //print_r($arr_adm_ids);
	$Delete=$this->input->post('Delete');
	$Activate=$this->input->post('Activate');
	$Deactivate=$this->input->post('Deactivate');
	if(is_array($arr_all_ids)) { 
		$arr_all_ids = implode(',', $arr_all_ids);	
		 if($Delete!='') {
			if($AccessPermission->Remove=="Y"){ //  permission for delete 
			 $this->admin_model->deleteAll('module_managements','module_id',$arr_all_ids);  
			$sess_msg="Records deleted successfully";;
			} else{ $sess_msg="Permission for delete is not granted...?"; }
			$_SESSION['sessionMsg']=$sess_msg; 
			
		} else if($Activate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('module_managements','Status','Y','module_id',$arr_all_ids);  
			$sess_msg="Records have activated successfully";
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			 $_SESSION['sessionMsg']=$sess_msg;
			
		} else if($Deactivate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('module_managements','Status','N','module_id',$arr_all_ids);  
			$sess_msg="Records have deactivated/inactivated successfully"; 
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			$_SESSION['sessionMsg']=$sess_msg;   
		}
	}
	
}
redirect('admin/modulesList');

		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}	
		

public function modulesCreate(){
	$data = array();
    if (isset($_POST['submit'])) {
		//print_r($_POST);
		// die(); 
        $this->form_validation->set_rules('modulename', 'Module Title', 'trim|required');
		//$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module','0','form-control','all_modules');

	    $data['page']='admin/modulesCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
        }
        else
        { 
		 $error=''; 
		 if($this->admin_model->checkUniquenessOfString('module_managements','modulename',$this->input->post('modulename'))){
					$error='<span class="fielderror">Duplicate Module Title. Please use another Module Title.</span>';
					} 	

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module','0','form-control','all_modules');
	    $data['page']='admin/modulesCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	} 
 else{ 
			  $Added_Date=date("Y-m-d H:i:s A");
			  // modulename ModuleStatus url target has_sub glyph_icon fa_icon mdi_icon
			 $modulename=$this->input->post('modulename');
			 $ModuleStatus=$this->input->post('ModuleStatus');
			 $url=$this->input->post('url');
			 $target=$this->input->post('target');
			 $has_sub=$this->input->post('has_sub');
			 $glyph_icon=$this->input->post('glyph_icon');
			 $fa_icon=$this->input->post('fa_icon');
			 $mdi_icon=$this->input->post('mdi_icon');
			 if($has_sub!=""){$has_sub=$has_sub;}else{$has_sub='N';}
			
			 
			  
	 $module_detail = array('modulename'=>$modulename,
                'ModuleStatus'=>$ModuleStatus,
				'url'=>$url,
				'target'=>$target,
				'has_sub'=>$has_sub,
				'glyph_icon'=>$glyph_icon,
				'fa_icon'=>$fa_icon, 
				'mdi_icon'=>$mdi_icon, 
				'Status'=>$this->input->post('Status'),
				'Added_Date'=>$Added_Date  ); 
				
				
           if($this->admin_model->insert('module_managements',$module_detail))
            {
               $sess_msg="Data inserted successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'admin/modulesList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module','0','form-control','all_modules');
	    $data['page']='admin/modulesCreate';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
			}
        }
		}
    }else{
		$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Create New Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module','0','form-control','all_modules');
	    $data['page']='admin/modulesCreate';
		$this->load->view('admin/main',$data);  
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
			}
	}	
	
	
	public function modulesEdit($id){
	$data = array();
    if (isset($_POST['submit'])) {
		 $this->form_validation->set_rules('modulename', 'module name', 'trim|required'); 
		//$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
			
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_module_details']=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$get_ModuleStatus=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$ModuleStatus=$get_ModuleStatus->ModuleStatus;
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module',$ModuleStatus,'form-control','All_Mudule');

	    $data['page']='admin/modulesEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
			
        }
        else
        {
			$error=''; 
		 if($this->admin_model->checkUniquenessOfString1('module_managements','modulename',$this->input->post('modulename'),'module_id',$id)){
					$error='<span class="fielderror">Duplicate module name. Please use another module name</span>';
					} 	
					

if($error!=""){
	                $_SESSION['sessionMsg']=$error;	
					$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_module_details']=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$get_ModuleStatus=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$ModuleStatus=$get_ModuleStatus->ModuleStatus;
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module',$ModuleStatus,'form-control','All_Mudule');
	    $data['page']='admin/modulesEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
	} 
 else{         
			  
			  $Updated_Date=date("Y-m-d H:i:s A");
			  // modulename ModuleStatus url target has_sub glyph_icon fa_icon mdi_icon
			 $modulename=$this->input->post('modulename');
			 $ModuleStatus=$this->input->post('ModuleStatus');
			 $url=$this->input->post('url');
			 $target=$this->input->post('target');
			 $has_sub=$this->input->post('has_sub');
			 $glyph_icon=$this->input->post('glyph_icon');
			 $fa_icon=$this->input->post('fa_icon');
			 $mdi_icon=$this->input->post('mdi_icon');
			 if($has_sub!=""){$has_sub=$has_sub;}else{$has_sub='N';}
			
			 
			  
	 $module_detail = array('modulename'=>$modulename,
                'ModuleStatus'=>$ModuleStatus,
				'url'=>$url,
				'target'=>$target,
				'has_sub'=>$has_sub,
				'glyph_icon'=>$glyph_icon,
				'fa_icon'=>$fa_icon, 
				'mdi_icon'=>$mdi_icon, 
				'Status'=>$this->input->post('Status'),
				'Added_Date'=>$Added_Date  ); 
				
				
           if($this->admin_model->update('module_managements',$module_detail,'module_id',$id)) 
            {
               $sess_msg="Data updated successfully.!"; 
		       $_SESSION['sessionMsg']=$sess_msg; 
                redirect(base_url().'index.php/admin/modulesList');  
            }
            else
            {
				$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_module_details']=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$get_ModuleStatus=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$ModuleStatus=$get_ModuleStatus->ModuleStatus;
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module',$ModuleStatus,'form-control','All_Mudule');
	    $data['page']='admin/modulesEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);  
			} 	
			}
        }
		}
    }else{
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Edit Module';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
$data['PermittedModules']=$this->admin_model->getAllPermittedModules();
$data['edit_module_details']=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$get_ModuleStatus=$this->admin_model->getRowbyId('module_managements','module_id',$id);
$ModuleStatus=$get_ModuleStatus->ModuleStatus;
$data['get_parentmodules'] = $this->admin_model->get_category_options('module_managements','Status','Y','module_id','modulename','ModuleStatus','ModuleStatus','Parent Module',$ModuleStatus,'form-control','All_Mudule');
	    $data['page']='admin/modulesEdit';
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			} 	
	}
	}	  





//-------add/edit/update/delete/change status Modules end------------------------------------------	



//-------add/edit/update/delete/change status Products starts------------------------------------------ productsList productsDetails productsEdit productsCreate



public function productsList(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$data['AdminUserDetails']=$this->admin_model->get_admin_user_details_byid($adm_id);
		$data['WebSettings']=$this->admin_model->WebSettings();
		$data['page_title']='Products List';
$data['NavModules']= $this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus','0','Status','Y','modulename','asc');
 $admDetails=$this->admin_model->get_admin_user_details_byid($adm_id);
 $adm_id=$admDetails->adm_id; $admPermissionStatus=$admDetails->status;
 $data['ProductLists']=$this->admin_model->FetchAllListData('front_product','product_id','DESC');
	$data['page']='admin/productsList';  
		$this->load->view('admin/main',$data);
		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}
public function active_deactive_delete_all_products(){
	
	$adm_id=$this->session->userdata['admindetails']['admuser_id'];
		if($adm_id!=""){
		$AccessPermission=$this->admin_model->get_admin_user_details_byid($adm_id);
	if(is_post_back()) {
	$arr_all_ids=$this->input->post('arr_cat_ids');	 //print_r($arr_adm_ids);
	$Delete=$this->input->post('Delete');
	$Activate=$this->input->post('Activate');
	$Deactivate=$this->input->post('Deactivate');
	if(is_array($arr_all_ids)) { 
		$arr_all_ids = implode(',', $arr_all_ids);	
		 if($Delete!='') {
			if($AccessPermission->Remove=="Y"){ //  permission for delete 
			 $this->admin_model->deleteAll('front_product','product_id',$arr_all_ids);   
			$sess_msg="Records deleted successfully";;
			} else{ $sess_msg="Permission for delete is not granted...?"; }
			$_SESSION['sessionMsg']=$sess_msg; 
			
		} else if($Activate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('front_product','Status','Y','product_id',$arr_all_ids);  
			$sess_msg="Records have activated successfully";
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			 $_SESSION['sessionMsg']=$sess_msg;
			
		} else if($Deactivate!='') {
			if($AccessPermission->Edit=="Y"){
			 $this->admin_model->active_or_dactiveAll('front_product','Status','N','product_id',$arr_all_ids);  
			$sess_msg="Records have deactivated/inactivated successfully"; 
			}else{ $sess_msg="Permission for Active/Deactive is not granted...?";}
			$_SESSION['sessionMsg']=$sess_msg;  
		}
	}
	
}
redirect('admin/productsList');

		}else{
			$data['page']='admin/login';
		    $this->load->view('admin/login',$data);
			}
	
	}	
			
//-------add/edit/update/delete/change status Products end------------------------------------------	
	
	
	
	
	
	
	
	
	
	public function viewUsers()
	{
		$data['page']='admin/viewUsers';
		$data['userlist']=$this->admin_model->dbselect("usermaster");
		$this->load->view('admin/main',$data);
	}
	public function ViewOffers()
	{
		$data['page']='admin/ViewOffers';
		$data['offers_list']=$this->admin_model->getOffers();
		// $data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main',$data);
	}
	public function viewRests()
	{
		$data['page']='admin/viewRests';
		$data['offers_list']=$this->admin_model->getRests();
		// $data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main',$data);
	}
	public function ViewProducts()
	{
		$data['page']='admin/ViewProducts';
		$data['offers_list']=$this->admin_model->dbselect("products");
		// $data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main',$data);
	}
	public function viewOrders()
	{
		$data['page']='admin/viewOrders';
		$data['products']=$this->admin_model->dbselect("order_master");
		$data['city']=$this->admin_model->getCity();
		$data['restaurant']=$this->admin_model->getRestaurant();

		$this->load->view('admin/main',$data);
	}

	function populate_rest()
	{
		$id = $this->input->post('city');
		echo(json_encode($this->admin_model->getRestaurant($id)));
	}

	public function viewUser(){
		$data= array();
		$data['page']='view_users';
		$users = $this->CEIT_model->getUsers();
		$data['users'] = $users;
		$this->load->view('admin/main',$data);
	}
	public function ViewEnquiry(){
		$data= array();
		$data['page']='admin/ViewEnquiry';
		$ViewEnquiry = $this->admin_model->dbselect("enquiry_master");
		$data['ViewEnquiry'] = $ViewEnquiry;
		$this->load->view('admin/main',$data);
	}

	// function SetStatus($tablename,$status,$id)
	// {
	// 	// $tablename=$this->input->post('table');
	// 	// $where=$this->input->post('where');
	// 	// $id=$this->input->post('sid');
	// 	$user_detail = array('status'=> $this->input->post('status'));
	// 	$this->admin_model->SetStatus($tablename,$user_detail, $id,$id);
	// }
	function SetStatus()
	{
		$tablename=$this->input->post('table');
		$where=$this->input->post('where');
		$id=$this->input->post('id');
		$user_detail = array('status'=> $this->input->post('status'));
		$this->admin_model->SetStatus($tablename,$user_detail, $where,$id);
	}
	function Delete($tablename='', $fieldname='', $indexid=0)
	{
		$this->admin_model->deleterecord($tablename, $fieldname, $indexid);
	}

	public function AddRest(){
		$data = array();
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('rest_name', 'restaurant Name', 'trim|required');
			$this->form_validation->set_rules('rest_address', 'restaurant Address', 'trim|required');
			$this->form_validation->set_rules('rest_phone', 'Phone Name', 'trim|required');
			$this->form_validation->set_rules('rest_city', 'City Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/rest_logo/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('rest_name'=>$this->input->post('rest_name'),
						'rest_address'=>$this->input->post('rest_address'),
						'rest_phone'=>$this->input->post('rest_phone'),
						'rest_logo'=>$gallery['file_name'],
						'rest_city'=>$this->input->post('rest_city'),'status'=>'False',
						'createdate'=>date('d-m-Y'));
					if($this->admin_model->insert('rest_master',$offer_detail))
					{
						$data['success'] = 'One restaurant saved successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding restaurant, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'admin/AddRest';
		$this->load->view('admin/main', $data);
	}
	public function addProduct(){
		$data = array();
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('pname', 'Product Name', 'trim|required');
			$this->form_validation->set_rules('pdetail', 'Product description', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			// $this->form_validation->set_rules('offerdetail', 'Offer description', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/products/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				// $fname=str_replace(preg_replace("/[^a-zA-Z0-9.]/", "", $file_name), '_', $_FILES['file-upload']['name']);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('resid'=>$this->input->post('restid'),'name'=>$this->input->post('pname'),
						'details'=>$this->input->post('pdetail'),
						'picture'=>$gallery['file_name'],
						'price'=>$this->input->post('price'),'proprice'=>$this->input->post('price'),
						'status'=>'0','isSpcl'=>$this->input->post('isSpcl'),'spclprice'=>$this->input->post('spclprice'),'validaty'=>$this->input->post('spcldate'));
					if($this->admin_model->insert('products',$offer_detail))
					{
						$data['success'] = 'Offer saved successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding Offer upload, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'admin/addOffer';
		$data['restname'] = $this->admin_model->get_select_option('rest_master','rid','rest_name');
		$this->load->view('admin/main', $data);
	}

	public function EditProduct($id){
		$data = array();
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('pname', 'Product Name', 'trim|required');
			$this->form_validation->set_rules('pdetail', 'Product description', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/products/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				// $fname=str_replace(preg_replace("/[^a-zA-Z0-9.]/", "", $file_name), '_', $_FILES['file-upload']['name']);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('resid'=>$this->input->post('restid'),'name'=>$this->input->post('pname'),
						'details'=>$this->input->post('pdetail'),
						'picture'=>$gallery['file_name'],
						'price'=>$this->input->post('price'),'proprice'=>$this->input->post('price'),
						'status'=>'0');
					if($this->admin_model->update('products',$offer_detail,'id',$id))
					{
						$data['success'] = 'Offer saved successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding Offer upload, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'admin/EditProduct';

		$data['offer_detail'] = $this->admin_model->getRowbyId('products','id',$id);
		$data['restname'] = $this->admin_model->get_select_option('rest_master','rid','rest_name',$data['offer_detail']->resid);

		$this->load->view('admin/main', $data);
	}	
	public function EditRest($id){
		$data = array();
		$file='';
		if(isset($_POST['submit']))
		{
			unset($config);
			$this->form_validation->set_rules('rest_name', 'restaurant Name', 'trim|required');
			$this->form_validation->set_rules('rest_address', 'restaurant Address', 'trim|required');
			$this->form_validation->set_rules('rest_phone', 'Phone Name', 'trim|required');
			$this->form_validation->set_rules('rest_city', 'City Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/rest_logo/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('rest_name'=>$this->input->post('rest_name'),
						'rest_address'=>$this->input->post('rest_address'),
						'rest_phone'=>$this->input->post('rest_phone'),
						'rest_logo'=>$gallery['file_name'],
						'rest_city'=>$this->input->post('rest_city'),'status'=>'False',
						'createdate'=>date('d-m-Y'));
					if($this->admin_model->update('rest_master',$offer_detail,'rid',$id))
					{
						$data['success'] = 'One restaurant Updated successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding restaurant, please try again !';
					}
				} 	
			}
		}
		$data['offer_detail'] = $this->admin_model->getRestsById($id);
		$data['page'] = 'admin/EditRest';
		$this->load->view('admin/main', $data);
	}

	public function AddVideo(){
		$data = array();
		if(isset($_POST['submit']))
		{
			if($this->form_validation->run() == TRUE) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/videos/'; 
				$config['allowed_types'] = 'mp4|mpeg|avi|flv|wmv|png|jpg|gif|jpeg'; 
				$config['file_name']	= $_FILES['video']['name'];
				$config['remove_spaces']=TRUE;
				$fname=$_FILES['video']['name'];
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('video')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$videos_detail = array('vname'=>$this->input->post('vtitle'),
						'description'=>$this->input->post('vdescription'),
						'length'=>($_FILES['video']['size']),
						'uploaddate'=>date('d-m-Y'),
						'vpath'=>'');

					if($this->CEIT_model->insert('videos',$videos_detail))
					{
						$data['success'] = 'Video upload successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding Video upload, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'video';
		$data['videos_detail'] = $this->CEIT_model->getVideo();
		$data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main', $data);
	}

	function logout()
	{
		$this->session->unset_userdata('admindetails');
		redirect(base_url());  

	}



//end Of Admin Controller
}
