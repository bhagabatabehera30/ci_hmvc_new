                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->View=="Y"){ ?>
            <a href="<?=Adminpath?>adminUserList">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Admin Users List</button>    </a>
    <?php  } ?>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                              <?php if(!empty($_SESSION['sessionMsg'])){ ?>
    <div class="alert alert-success">
    <?php echo display_session_msg();?>
    </div>
     <?php } ?>
                                <div class="card-box table-responsive">
                                    <!--<h4 class="m-t-0 header-title"><b><?=$page_title;?></b></h4>-->
                                    
<form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>adminUserCreate" onSubmit="return PostSearchForm()" enctype="multipart/form-data">
                                
                                    
                                  <h5 class="box-title hd_dashed">Your LogIn Id/Password</h5>
                                  
                                  
                                  
                                  <div class="form-group">
                                        <label class="col-sm-4 control-label">LogIn Id/User Id<span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="SecondaryLogId" class="form-control" id="" placeholder=" LogIn Id/User Id" value="">
                                            <p class="help-block"><?=form_error('SecondaryLogId')?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Password
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="SecondaryPassword"  class="form-control" id="" placeholder=" Password" value="">                                    <p class="help-block"><?=form_error('SecondaryPassword')?></p>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label">Confirm Password
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="CSecondaryPassword"  class="form-control" id="" placeholder=" Password" value="">
                                            <p class="help-block"><?=form_error('CSecondaryPassword')?></p>
                                        </div>
                                    </div>
                                  
                                   <h5 class="box-title hd_dashed">Your Other Details</h5>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Name
                                        </label>
                                        <div class="col-sm-6">
                                        
                                        <input name="adm_name" type="text"  class="form-control" value="" placeholder="Name">
                                        <p class="help-block"><?=form_error('adm_name')?></p>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Email Id
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                        
                                        <input name="adm_email" type="text"  class="form-control" value="" placeholder="email id">
                                        <p class="help-block"><?=form_error('adm_email')?></p>
                                            
                                        </div>
                                    </div>
                                    
                            
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mobile Number
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                        
                                        <input name="adm_phone" type="text" class="form-control" value="" placeholder="mobile number">
                                         <p class="help-block"><?=form_error('adm_phone')?></p>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                        
                                        <textarea name="adm_address" class="form-control" cols="30" rows="4" placeholder="address"></textarea>
                                        
                                             <p class="help-block"><?=form_error('Address')?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">City
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input name="adm_city" type="text"  class="form-control" placeholder="city"  value="">
                                             <p class="help-block"><?=form_error('adm_city')?></p>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">State
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input name="adm_state" type="text"  placeholder="state" class="form-control"  value="">
                                            <p class="help-block"><?=form_error('adm_state')?></p>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pin Code
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                           <input name="adm_zipcode" type="text" placeholder="pincode" class="form-control" value="">
                                            <p class="help-block"><?=form_error('adm_zipcode')?></p>
                                        </div>
                                    </div>
                                    
                               
	                  
                         
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Privileges Or Permission
                                     </label>
                                        <div class="col-sm-6">
                                      <select multiple="multiple" class="multi-select" id="my_multi_select1" name="Privilege[]" data-plugin="multiselect">
                                            
                                         
                                            
                                              <?php  
		   if($AdminUserDetails->status=="O"){
	    $arrvalue=explode(",",$AdminUserDetails->adm_privi);  ?>
           <?php 
		       foreach($PermittedModules as $rsPermittedModules){ 
				   ?>
		<option value="<?php echo $rsPermittedModules['modulename'] ;?>"<?php if(in_array($rsPermittedModules['modulename'],$arrvalue)==true) echo "selected"; ?>><?php echo $rsPermittedModules['modulename'];?></option>
		<?php } } ?>
           <?php
		   
		    if($AdminUserDetails->status=="S"){
	    $arrvalue=explode(",",$AdminUserDetails->adm_privi);
		$arrtot=count($arrvalue);
		 ?>
		
        <?php 
		       for($i=0;$i<$arrtot; $i++)
			    { 
				   ?>
		<option value="<?php echo($arrvalue[$i]);?>"<?php if(in_array($arrvalue[$i],$arrvalue)==true) echo "selected"; ?>><?php echo($arrvalue[$i]);?></option>
		<?php 
		          
				}
			   }
			    
			
		 ?>
		      
		</select>	
        
          <p class="help-block"><?=form_error('Privilege[]')?></p>
                                            
                                        </div>
                                    </div>
                                    
                                    
                  
                                     
                     <div class="form-group">
                      <label class="col-sm-4 control-label">Choose Options For Accessing (add,edit,view,delete)</label>
                     <div class="col-sm-6">
                      <?php if($AdminUserDetails->status=="O"){ ?>
                    
                                                    <div class="checkbox checkbox-primary">
                                                        
                                                            <input type="checkbox" id="checkbox1" name="View" value="Y"><label for="checkbox1"> View</label>
                                                    </div>
                                                    <div class="checkbox checkbox-success">
                                                       
                                                            <input type="checkbox" id="checkbox2"  class="custom-checkbox" name="Generate" value="Y"><label for="checkbox2"> Add</label>
                                                    </div>
                                        <div class="checkbox checkbox-info">
                                                        
                                                            <input type="checkbox" id="checkbox3" class="custom-checkbox" name="Edit" value="Y"><label for="checkbox3"> Edit</label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger">
                                                        
                                                            <input type="checkbox" id="checkbox4"  class="custom-checkbox" name="Remove" value="Y" ><label for="checkbox4"> Delete</label>
                                                    </div>
                                               
                                                
                                        <?php } if($AdminUserDetails->status=="S"){ 
										
										
										  if($AdminUserDetails->View=="Y"){
										?>         
                                                
                                           <div class="checkbox checkbox-primary">
                                                        
                                                            <input type="checkbox" id="checkbox1" class="custom-checkbox"  name="View" value="Y"><label for="checkbox1"> View</label>
                                                    </div>
                                                    
                                                    <?php } 
													
												 if($AdminUserDetails->Generate=="Y"){ ?>
                                                    <div class="checkbox checkbox-success">
                                                        
                                                            <input type="checkbox" id="checkbox2"  class="custom-checkbox" name="Generate" value="Y"><label for="checkbox2"> Add</label>
                                                    </div>
                                                     <?php }  if($AdminUserDetails->Edit=="Y"){ ?>
                                                    <div class="checkbox checkbox-info">
                                                        
                                                            <input type="checkbox" id="checkbox3" class="custom-checkbox" name="Edit" value="Y"><label for="checkbox3"> Edit</label>
                                                    </div>
                                                     <?php }  if($AdminUserDetails->Remove=="Y"){ ?>
                                                    <div class="checkbox checkbox-danger">
                                                       
                                                            <input type="checkbox" id="checkbox4"  class="custom-checkbox" name="Remove" value="Y"><label for="checkbox4"> Delete</label>
                                                    </div>
                                               
                                                  
                                                                 
                                     <?php }  }
									 
									
									  ?>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                      <label class="col-sm-4 control-label">Account Created For
                      <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span></label>
                     <div class="col-sm-6">
                                       <?php  
									   if($AdminUserDetails->status=="O"){ 
										?>         
                                         <select name="status" class="form-control">
				  <option value="S">User</option>
				  <option value="O">Admin</option>
				  </select>	    
                  
                  <?php }  
				   if($AdminUserDetails->status=="S"){  ?>
				 <select name="status" class="form-control">
				  <option value="S">User/Employee</option>
				  </select> 	     
				  
				 <?php } ?> 
                                                    
                                    </div>               
                                    
                                    </div>
                                    
                                <div class="form-group">
                      <label class="col-sm-4 control-label">Role/Designation
                      </label>
                     <div class="col-sm-6">
                                             
                                         <input name="Role" class="form-control" value="" placeholder="Role/Designation">
				  
                  
                                                    
                                    </div>               
                                    
                                    </div>    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Profile Photo:
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6"> 
                                            
	<input name="user_image" type="file" />
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                           	
				  <select name="adm_status" class="form-control">
				  <option value="Active">Active</option>
				  <option value="Inactive">InActive</option>
				  </select>	
				
                                        </div>
                                    </div>
                                    
                                    
                                         
                                           
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> 
                                        
                                        </label>
                                        <div class="col-sm-6">
                                          <input type="hidden" name="flag" value="yes">
				                          <!--<input type="hidden" name="adm_id" value="<?php //echo $_REQUEST['adm_id'];?>">-->
                                           <input name="submit" type="submit" class="btn btn-success" value="Submit"> &nbsp; &nbsp; 
				<!--<input type="reset" name="reset" value="Reset" class=" btn btn-primary" >-->
                                        </div>
                                    </div>
                                    
                     
                                    
                                </form>
                                </div>
                            </div>
                        </div>


                        
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

                
<script type="text/javascript" language="javascript">

 
              
function PostSearchForm()
{
   
	if(document.forminput.SecondaryLogId.value=="")
	{
		alert("Please Enter LogIn Id !!");
		document.forminput.SecondaryLogId.style["border"]="solid thin red";
		document.forminput.SecondaryLogId.focus();
		return false;
	}
	if(document.forminput.SecondaryPassword.value=="")
	{
		alert("Please Enter Password !!");
		document.forminput.SecondaryPassword.style["border"]="solid thin red";
		document.forminput.SecondaryPassword.focus();
		return false;
	}
	
	if(document.forminput.CSecondaryPassword.value=="")
	{
		alert("Please Enter Confirm Password   !!");
		document.forminput.CSecondaryPassword.style["border"]="solid thin red";
		document.forminput.CSecondaryPassword.focus();
		return false;
	}
	
	if(document.forminput.CSecondaryPassword.value!=document.forminput.SecondaryPassword.value)
	{
		alert("Please Enter Correct Confirm Password  !!");
		document.forminput.CSecondaryPassword.style["border"]="solid thin red";
		document.forminput.CSecondaryPassword.focus();
		return false;
	}
	
	// new pass word------------------
	
	
	
	
	
	
					    if(document.forminput.adm_email.value==""){
						  alert("Please Enter Your email Id!");
						  document.forminput.adm_email.style["border"]="solid thin red";
						  document.forminput.adm_email.focus();
						  return false;
					  }
if(document.forminput.adm_email.value!="" && document.forminput.adm_email.value.indexOf('@')==-1 || document.forminput.adm_email.value.indexOf('.')==-1)
                     {
	                 alert("Please Enter Correct email-Id Syntax ( xxx@xx.xx)!!! ");
					 document.forminput.adm_email.style["border"]="solid thin red";
	                 document.forminput.adm_email.focus();
	                 return false;
	                 }
	
	 
					/* if(document.forminput.adm_phone.value==""){
						  alert("Please Enter Your  Mobile Number !");
						  document.forminput.adm_phone.style["border"]="solid thin red";
						  document.forminput.adm_phone.focus();
						  return false;
					  }
				var phoneno = /^\d{10}$/; 
				var xxxx=document.forminput.adm_phone.value.match(phoneno);
                if(!xxxx)  
                     { 
					   alert("Please Enter Correct  10 Digit Mobile Number !");
					   document.forminput.adm_phone.style["border"]="solid thin red";
						  document.forminput.adm_phone.focus();
						  return false;
					 }
	
	
	
	 if(document.forminput.adm_address.value==""){
						  alert("Please Enter Your  address !");
						  document.forminput.adm_address.style["border"]="solid thin red";
						  document.forminput.adm_address.focus();
						  return false;
					  }
					  
					  
		if(document.forminput.adm_city.value==""){
						  alert("Please Enter Your  city !");
						  document.forminput.adm_city.style["border"]="solid thin red";
						  document.forminput.adm_city.focus();
						  return false;
					  }
					  
		if(document.forminput.adm_state.value==""){
						  alert("Please Enter Your  adm_state !");
						  document.forminput.adm_state.style["border"]="solid thin red";
						  document.forminput.adm_state.focus();
						  return false;
					  }
					  
		 if(document.forminput.adm_zipcode.value==""){
						  alert("Please Enter Your Pin code !");
						  document.forminput.adm_zipcode.style["border"]="solid thin red";
						  document.forminput.adm_zipcode.focus();
						  return false;
					  }*/
					  
					  
	
	return true;
}
</script>
            