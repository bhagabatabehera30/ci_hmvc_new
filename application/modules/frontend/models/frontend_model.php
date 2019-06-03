<?php 

/**
* User Model
*/
class frontend_model extends CI_Model   
{  
	//-------category--options---------------------------------------------
	
    function get_category_options($tableName, $field1, $value1, $category_id, $category_name, $parent_category_id, $select_name, $select_label='',$selected=0, $select_class='form-control', $select_id=''){
    $query = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id='0'  order by  $category_name ASC ");
	$totalRowsUnique = $query->num_rows();
     $select = '<select name="'.$select_name.'" class="'.$select_class.'" id="'.$select_id.'">'; 

	$select.= '<option value="">-:Please Choose '.$select_label.':-</option>';

   if($totalRowsUnique > 0)
        {
           foreach($query->result_array() as $row){
           	$selected_option = ($selected==$row[$category_id]) ? ' selected="selected" ':' ';
   $select.='<option value="'.$row[$category_id].'" '. $selected_option.'>'.ucwords($row[$category_name]).'</option>';
    
		// level2---------------
		$query2 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique2 = $query2->num_rows();
		if($totalRowsUnique2>0){	
		foreach($query2->result_array() as $row2){
			  	$selected_option2 = ($selected==$row2[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row2[$category_id].'" '. $selected_option2.'>';
				  $select.= '|__'.ucwords($row2[$category_name]).'</option>'; 
				  
				  // level3---------------
		$query3 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row2[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique3 = $query3->num_rows();
		if($totalRowsUnique3>0){	
		foreach($query3->result_array() as $row3){
			  	$selected_option3 = ($selected==$row3[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row3[$category_id].'" '. $selected_option3.'>';
				  $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.ucwords($row3[$category_name]).'</option>'; 
				  
				  // level4---------------
		$query4 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row3[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique4 = $query4->num_rows();
		if($totalRowsUnique4>0){	
		foreach($query4->result_array() as $row4){
			  	$selected_option4 = ($selected==$row4[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row4[$category_id].'" '. $selected_option4.'>';
				  $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.ucwords($row4[$category_name]).'</option>'; 
				  
				  // level5---------------
		$query5 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row4[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique5 = $query5->num_rows();
		if($totalRowsUnique5>0){	
		foreach($query5->result_array() as $row5){
			  	$selected_option5 = ($selected==$row5[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row5[$category_id].'" '. $selected_option5.'>';
				 $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				 $select.= '|__'.ucwords($row5[$category_name]).'</option>'; 
				  
				 // level6---------------
		$query6 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row5[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique6 = $query6->num_rows();
		if($totalRowsUnique6>0){	
		foreach($query6->result_array() as $row6){
			  	$selected_option6 = ($selected==$row6[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row6[$category_id].'" '. $selected_option6.'>';
				 $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				 $select.= '|__'.ucwords($row6[$category_name]).'</option>'; 
				 
				 // level7---------------
		$query7 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row6[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique7 = $query7->num_rows();
		if($totalRowsUnique7>0){	
		foreach($query7->result_array() as $row7){
			  	$selected_option7 = ($selected==$row7[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row7[$category_id].'" '. $selected_option7.'>';
				 $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				 $select.= '|__'.ucwords($row7[$category_name]).'</option>'; 
				 
				 // level8---------------
		$query8 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row7[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique8 = $query8->num_rows();
		if($totalRowsUnique8>0){	
		foreach($query8->result_array() as $row8){
			  	$selected_option8 = ($selected==$row8[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row8[$category_id].'" '. $selected_option8.'>';
				 $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				 $select.= '|__'.ucwords($row8[$category_name]).'</option>';  
				 
				 // level9---------------
		$query9 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row8[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique9 = $query9->num_rows();
		if($totalRowsUnique9>0){	
		foreach($query9->result_array() as $row9){
			  	$selected_option9 = ($selected==$row9[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row9[$category_id].'" '. $selected_option9.'>';
				 $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				 $select.= '|__'.ucwords($row9[$category_name]).'</option>'; 
				 
				 // level10---------------
		$query10 = $this->db->query("Select * from $tableName where $field1='".$value1."' and  $parent_category_id=$row9[$category_id]  order by  $category_name ASC ");			
        $totalRowsUnique10 = $query10->num_rows();
		if($totalRowsUnique10>0){	
		foreach($query10->result_array() as $row10){
			  	$selected_option10 = ($selected==$row10[$category_id]) ? ' selected="selected" ':' '; 
				 $select.='<option value="'.$row10[$category_id].'" '. $selected_option10.'>';
				 $select.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				 $select.= '|__'.ucwords($row10[$category_name]).'</option>';  
				   }   
		         } 
		// level10--------------- 
				   }   
		         } 
		// level9---------------
				   }   
		         } 
		// level8--------------- 
				   }   
		         } 
		// level7--------------- 
				   }   
		         }
		// level6---------------
				   }   
		         }
		// level5---------------
				  
				   }   
		         }
		// level4--------------- 
				   }   
		         }
		// level3---------------
			}   
		}
		// level2---------------
           }
        }
		
		$select.='</select>'; 
	  return $select;
    }
	

	//-------category--options---------------------------------------------
	function get_select_option_dist($table,$id,$name, $selected=0){
		$this->db->distinct();
		// $this->db->select('rid');
		$this->db->select($name,'*');
		$this->db->from($table);		
		$query = $this->db->get();
		
		$select = '<option value="">--- Please Choose ---</option>';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$selected_option = ($selected==$row[$name]) ? ' selected="selected" ':' ';
				$select.='<option value="'.$row[$name].'" '. $selected_option.'>'.strtoupper($row[$name]).'</option>';
			}
		}
		return $select;
	}
	
	function get_select_option($table,$id,$name, $selected=0){
		
		$query = $this->db->get($table);
		$select = '<option value="">--- Please Choose ---</option>';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$selected_option = ($selected==$row[$id]) ? ' selected="selected" ':' ';
				$select.='<option value="'.$row[$id].'" '. $selected_option.'>'.strtoupper($row[$name]).'</option>';
			}
		}
		return $select;
	}
	function get_select_option_where($table,$id,$name,$where,$selected=0){
		$query = $this->db->query("SELECT * FROM ".$table." WHERE ".$where); 
		$select = '<option value="">--- Please Choose ---</option>';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$selected_option = ($selected==$row[$id]) ? ' selected="selected" ':' ';
				$select.='<option value="'.$row[$id].'" '. $selected_option.'>'.strtoupper($row[$name]).'</option>';
			}
		}
		return $select;
	}
	function insert($table, $data=array())
	{
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function PlaceOrder($table, $data=array())
	{
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0)
		{
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		else
		{
			return false;
		}
	}

	function userlogin($username, $password)
	{
		$this->db->select('*');
		$this->db->where('email', $username);
		$this->db->where('password', $password);
		// $this->db->where('status','True');
		$this->db->from('usermaster');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			$userdetails = $result->row();
			$userdata['userdetails'] = array('username' =>$userdetails->fname,
				'uid' =>$userdetails->uid,'lname'=>$userdetails->lname,'email'=>$userdetails->email,'role'=>$userdetails->role);
			$this->session->set_userdata($userdata);
			return true;
		}
		else
		{
			return false;
		}
	}

//-----------------------------Updated start------------------------------------------
	function admin_user_login($username, $password)
	{    $adm_login_id=$username; 
		$this->db->select('*');
		$this->db->where('adm_login_id',$adm_login_id);
		// $this->db->where('adm_password', $adm_password);
		$this->db->where('adm_status','Active');  
		 $this->db->from('admin_user');
		$result = $this->db->get();
		// echo $result->num_rows();
		if($result->num_rows() == 1) 
		{     $admuserdetails = $result->row();
		
			 if(password_verify($password, $admuserdetails->adm_password))  
                     { 
					// $admuserdetails->adm_conpwd; die(); 
			$userdata['admindetails'] = array('username' =>$admuserdetails->adm_login_id,
				'admuser_id' =>$admuserdetails->adm_id,'adm_email'=>$admuserdetails->adm_email,'Role'=>$admuserdetails->Role,'adm_privi'=>$admuserdetails->adm_privi,'status'=>$admuserdetails->status,'View'=>$admuserdetails->View,'Generate'=>$admuserdetails->Generate,'Edit'=>$admuserdetails->Edit,'Remove'=>Remove);
			$this->session->set_userdata($userdata);
			return true;
					 }
				 else{
				return false;		 
						 
					}
		}
		else
		{
			return false;
		}
	}
	
function get_admin_user_details_byid($adm_id){
	if($adm_id!=''){
	$this->db->select('*');
		$this->db->where('adm_id',$adm_id);
		 $this->db->from('admin_user');
		 $result = $this->db->get();
		// echo $result->num_rows();
		if($result->num_rows() > 0) 
		{    
		return $result->row(); 
		}else{ return false;} 
	}
	}
// WebSettings------------------
function MyAppSettings($tableName, $where_status, $orderByFieldName){
	$query = $this->db->query("Select * from $tableName where $where_status='Y' order by $orderByFieldName desc limit 1 ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();  
        }
	
	}
	
	function get_Cat_By_Id($tableName, $where_status, $id, $value){
	$query = $this->db->query("Select * from $tableName where $where_status='Y' and  $id='".$value."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();   
        }  
	
	}
	
function get_CMS_By_Id($tableName, $where_status, $id, $value){
	$query = $this->db->query("Select * from $tableName where $where_status='Y' and  $id='".$value."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();   
        }  
	
	}
function get_CMS_By_PageTitle($tableName, $where_status, $pageTitle, $value){
	$query = $this->db->query("Select * from $tableName where $where_status='Y' and  $pageTitle='".$value."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();  
        }
	
	}
function get_CMS_By_CatId($tableName, $where_status, $cat_id, $value){
	$query = $this->db->query("Select * from $tableName where $where_status='Y' and  $cat_id='".$value."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();   
        }
	
	}
	
// fetch admin lists data  data ---------------------------

function FetchAdminListData($tableName,$PermissionStatus,$adm_id,$adm_idValue,$Orderby,$AscDesc){
	if($PermissionStatus=='O'){
	 $query = $this->db->query("Select * from $tableName where 1  order by  $Orderby $AscDesc   ");
	}
	if($PermissionStatus=='S'){
	 $query = $this->db->query("Select * from $tableName where $adm_id='".$adm_idValue."'  order by  $Orderby $AscDesc   ");
	}
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
	
	}
	//-----------------------------------------------------------------
	
	function FetchPerentOrChildCategoryListData($tableName,$Field1, $Value1, $Orderby,$AscDesc){
$query = $this->db->query("Select * from $tableName where $Field1='".$Value1."'  order by  $Orderby $AscDesc   ");
$totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
	
	}
//-----------FetchAllListData by where 1------------------------------------------
	function FetchAllListData($tableName,$Orderby,$AscDesc){
$query = $this->db->query("Select * from $tableName where 1  order by  $Orderby $AscDesc   ");
$totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
	
	}
	
	
	
	
	//======================delete all data id in====================
	
	
	public function deleteAll($tableName,$fieldName,$fieldValue){
		 $sql="delete from $tableName  where  $fieldName in ( $fieldValue) ";
		 $query = $this->db->query($sql);
		 if($query){
			 return true;
		 }else{
			 return false;
			 }
	}
	
	public function active_or_dactiveAll($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2){
		$sql = "update  $tableName  set  $fieldName = '".$fieldValue."'  where $fieldName2 in ( $fieldValue2) ";
		//die();
		 $query = $this->db->query($sql);
		 if($query){
			 return true;
		 }else{
			 return false;
			 }
	}
	
	public function getAllPermittedModules(){
		$query = $this->db->query("select * from  module_managements  where ModuleStatus!='0'  and  Status='Y'  order  by  modulename asc"); 
		return $query->result_array();
		}
	
	
	
	// $sql = "update admin_user set adm_status = 'Active' where  adm_id in ($str_adm_ids)";
	
	//$sql = "update admin_user set adm_status = 'Inactive' where adm_id in ($str_adm_ids)";
	
	
	
/*======== field culumn data fetch Admin Modues ===============*/
	function FetchDataByTwoFieldByOrderBy($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2,$Orderby,$AscDesc)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' order by  $Orderby $AscDesc   ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
  
 }


	function select_all_data_from_table_by_status($tablename,$Status)
	{
		$query = $this->db->query("SELECT * FROM  $tablename  where Status='".$Status."'"); 
		return $query->result_array();
			//return $this->db->get()->result_array();
	}
	/*======== exact one row data fetch===============*/
	function FetchOneRowDataByOneField($tableName,$fieldName,$fieldValue)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();
        }
  
 }
 /*======== exact one row data fetch===============*/
	function FetchOneRowDataByTwoField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."' and  $fieldName2='".$fieldValue2."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->row();
        }
  
 }
/*========one field culumn data fetch===============*/
	function FetchDataByOneField($tableName,$fieldName,$fieldValue)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
  
 }
 /*========Two field culumn data fetch===============*/
	function FetchDataByTwoField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
  
 }
 
 /*========Three field culumn data fetch===============*/
	function FetchDataByThreeField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2,$fieldName3,$fieldValue3)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' and  $fieldName3='".$fieldValue3."' ");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
  
 }
 
 /*========Four field culumn data fetch===============*/
	function FetchDataByFourField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2,$fieldName3,$fieldValue3,$fieldName4,$fieldValue4)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' and  $fieldName3='".$fieldValue3."' and  $fieldName4='".$fieldValue4."'");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique > 0)
        {
      return $query->result_array();
        }
  
 }
	
	
	
/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/
function checkUniquenessOfString($tableName,$fieldName,$fieldValue)
{
    $query = $this->db->query("Select $fieldName from $tableName where $fieldName='".$fieldValue."'");
    $totalRowsUnique = $query->num_rows();
   if($totalRowsUnique!=0)
        {
            
            return true;
        }
    else
        {
           
            return false; 
        }
 }
	
/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/

function checkUniquenessOfString1($tableName,$fieldName,$fieldValue,$fieldName1,$fieldValue1)
{
    
     $query = $this->db->query("Select $fieldName from $tableName where $fieldName='$fieldValue' and $fieldName1!='$fieldValue1'");
	$totalRowsUnique =$query->num_rows();
     if($totalRowsUnique!=0)
        {            
          return true;
        }
    else
        {           
          return false;
        }
}	
	
	
	
	//-----------------------------Updated End------------------------------------------
	
	
	function SetStatus($table,$user_details,$where, $id)
	{
		$this->db->where($where, $id);
		if($this->db->update($table, $user_details))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function get_id($table,$id){
		$query = $this->db->get($table);
		$select = '';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$select.=$row[$id];
			}
			
		}
		return $select;
	}

	function update($tablename,$user_details,$where, $id)
	{
		$this->db->where($where, $id);
		if($this->db->update($tablename, $user_details))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function edit_user($user_details, $id)
	{
		$this->db->where('uid', $id);
		if($this->db->update('usermaster', $user_details))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function UpdateOrder($oid)
	{
		$this->db->where('oid', $oid);
		if($this->db->update("order_master",array('status'=>1)))
		{
			return true;
		}
		else{
			return false;
		}
		
	}
	//------select all data-----------------
	function dbselect ($tablename)
	{
		$query = $this->db->query("SELECT * FROM $tablename"); 
		return $query->result_array();
			//return $this->db->get()->result_array();
	}
	function dbselect_where ($tablename)
	{
		$query = $this->db->query("$tablename"); 
		// return $query->result_array();
		return $this->db->get()->row();
	}
	function getUsers()
	{
		$this->db->select('*'); 
		$this->db->from('usermaster');
		return $this->db->get()->result_array();
	}
	function getRests()
	{
		$this->db->select('*'); 
		$this->db->from('rest_master');
		return $this->db->get()->result_array();
	}
	function getRestsById($id)
	{
		$this->db->select('*'); 
		$this->db->from('rest_master');
		$this->db->where('rid', $id);
		return $this->db->get()->row();
	}
	function getRowbyId($table,$where,$id)
	{
		$this->db->select('*'); 
		$this->db->from($table);
		$this->db->where($where, $id);
		return $this->db->get()->row();
	}
	function getEnqCount()
	{
		$this->db->select('count(*) as ecount'); 
		$this->db->from('enquiry_master');
		return $this->db->get()->row()->ecount;
	}
	function getSliderCount()
	{
		$this->db->select('count(*) as scount'); 
		$this->db->from('slider_master');
		return $this->db->get()->row()->scount;
	}
	function getOfferCount()
	{
		$this->db->select('count(*) as ocount'); 
		$this->db->from('offer_master');
		return $this->db->get()->row()->ocount;
	}
	function getActiveSliders()
	{
		$this->db->select('*'); 
		$this->db->from('slider_master');
		$this->db->where('status', 'True');
		return $this->db->get()->result_array();
	}
	function getSlidersById($id)
	{
		$this->db->select('*'); 
		$this->db->from('slider_master');
		$this->db->where('sid', $id);
		return $this->db->get()->row();
	}
	function getSpecialOffers()
	{
		$this->db->select('*'); 
		$this->db->from('products');
		$this->db->where('isSpcl', 1);
		return $this->db->get()->result_array();
	}
	function getPopularRest()
	{
		$this->db->select('*'); 
		$this->db->from('rest_master');
		$this->db->where('status', 'True');
		return $this->db->get()->result_array();
	}
	function getEnquiries()
	{
		$this->db->select('*'); 
		$this->db->from('enquiry_master');
		return $this->db->get()->result_array();
	}
	function getUser($id)
	{
		$this->db->select('*'); 
		$this->db->from('usermaster');
		$this->db->where('uid', $id);
		$user_details = $this->db->get()->row();
		return $user_details;
	}

	function deleterecord($tablename='', $fieldname='', $indexid=0)
	{
		$this->db->where($fieldname, $indexid);
		$this->db->delete($tablename);
	}

	//Dependent Dropdown List using AJAX
	function getCity()
	{	
		$this->db->distinct();
		// $this->db->select('rest_city');
		// $this->db->from('rest_master');
		// $city = $this->db->get()->result_array();
		$city = $this->db->get('rest_master')->result();
		$id = array('0');
		$name = array('Select City');
		for ($i = 0; $i < count($city); $i++)
		{
			array_push($id, $city[$i]->rid);
            array_push($name, $city[$i]->rest_city);
		}
		return array_combine($id,$name);
	}

	function getRestaurant($cid=NULL){

		$result = $this->db->where('rest_city',$cid)->get('rest_master')->result();
		$id = array(0);
		$name = array('Select Restaurant');
		// print_r($result);
		for ($i=0; $i<count($result); $i++)
		{
			array_push($id, $result[$i]->rid);
			array_push($name, $result[$i]->rest_name);
		}
		return array_combine($id, $name);
	}
//End of User Model
}
?>