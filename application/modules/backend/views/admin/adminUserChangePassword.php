                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->View=="Y"){ ?>
            <!--<a href="<?=Adminpath?>adminUserList">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Admin Users List</button>    </a>-->
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
                                    
<form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>adminUserChangePassword" onSubmit="return PostSearchForm()" enctype="multipart/form-data">
                                
                                
                                   <h5 class="box-title hd_dashed">Your LogIn Id/Password</h5>
                                
                                    
                                     <div class="form-group">
                                        <label class="col-sm-4 control-label"> Secondary LogIn Id/User Id<span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="SecondaryLogId" class="form-control" id="" placeholder=" LogIn Id/User Id" value="<?php echo $AdminUserDetails->adm_login_id; ?>">
                                            <p class="help-block"><?=form_error('SecondaryLogId')?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Secondary Password
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="SecondaryPassword"  class="form-control" id="" placeholder="Current Password"><p class="help-block"><?=form_error('SecondaryPassword')?></p>
                                        </div>
                                    </div>
                                    
                                   
                                    
                           
                                  
                                  <h5 class="box-title hd_dashed">New Password</h5>
                                 
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Secondary Password
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="password" name="NewSecondaryPassword"  class="form-control" id="" placeholder="New  Password"><p class="help-block"><?=form_error('NewSecondaryPassword')?></p>
                                        </div>
                                    </div>
                                           
                                          <div class="form-group">
                                        <label class="col-sm-4 control-label"> Confirm New Secondary Password
                                        <span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                        <input type="password" name="CNewSecondaryPassword"  class="form-control" id="" placeholder="Confirm New  Password"><p class="help-block"><?=form_error('CNewSecondaryPassword')?></p>    
                                        </div>
                                    </div> 
                                           
                                           
                                    <input type="hidden" value="yes" name="change" >
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> 
                                        
                                        </label>
                                        <div class="col-sm-6">
                                           <input name="submit" type="submit" class="btn btn-success" value="Submit"> &nbsp; &nbsp; 
				<input type="reset" name="reset" value="Reset" class=" btn btn-primary" >
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
		alert("Please Enter Current  LogIn Id !!");
		document.forminput.SecondaryLogId.style["border"]="solid thin red";
		document.forminput.SecondaryLogId.focus();
		return false;
	}
	if(document.forminput.SecondaryPassword.value=="")
	{
		alert("Please Enter Current  Password !!");
		document.forminput.SecondaryPassword.style["border"]="solid thin red";
		document.forminput.SecondaryPassword.focus();
		return false;
	}
	
	// new pass word------------------
	
	
	if(document.forminput.NewSecondaryPassword.value=="")
	{
		alert("Please Enter  Password !!");
		document.forminput.NewSecondaryPassword.style["border"]="solid thin red";
		document.forminput.NewSecondaryPassword.focus();
		return false;
	}
	
	
	
	
	if(document.forminput.CNewSecondaryPassword.value=="")
	{
		alert("Please Enter Confirm New Password !!");
		document.forminput.CNewSecondaryPassword.style["border"]="solid thin red";
		document.forminput.CNewSecondaryPassword.focus();
		return false;
	}
	
	
	if(document.forminput.CNewSecondaryPassword.value!=document.forminput.NewSecondaryPassword.value)
	{
		alert("Please Enter Correct Password !!");
		document.forminput.CNewSecondaryPassword.style["border"]="solid thin red";
		document.forminput.CNewSecondaryPassword.focus();
		return false;
	}
	
	
	
	
	return true;
}
</script>
            
