<script src="<?=ASSETS?>plugins/ckeditor/ckeditor.js"></script> 
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->View=="Y"){ ?>
            <a href="<?=Adminpath?>modulesList">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Module List</button>    </a>
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
                                    
                               <form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>modulesCreate" onSubmit="return PostSearchForm()">
                                
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Module Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="modulename" class="form-control"  placeholder="module title" value="">
                                            <p class="help-block"><?=form_error('modulename')?></p>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                   
                                   <div class="form-group">
                                        <label class="col-sm-4 control-label">Parent Module:</label>
                                        <div class="col-sm-6"> 
                                          
				<?=(isset($get_parentmodules)) ? $get_parentmodules: ''; ?>   
				<!--<p class="help-block"><?=form_error('ModuleStatus')?></p>-->  
			
                                        </div>
                                    </div>
                                   
									  <div class="form-group">
                                        <label class="col-sm-4 control-label">Url(Controler)</label> 
                                        <div class="col-sm-6">
                                            <input type="text" value="" name="url"  class="form-control" placeholder="Url" />
                                             <p class="help-block"><?=form_error('url')?></p>
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Target</label>
                                        <div class="col-sm-6">
                                          <input type="text" value="" name="target"  class="form-control" placeholder="Target" />
                                           
                                        </div>
                                    </div>
									
                           
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Has Sub Module</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox"  name="has_sub"  value="Y" id="switch1" data-switch="bool">
                                             <label for="switch1" data-on-label="Yes"
                                                           data-off-label="No"></label>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">glyph_icon</label>
                                        <div class="col-sm-6">
                                         <input type="text" value="" name="glyph_icon"  class="form-control" placeholder="glyph_icon" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">fa_icon</label>
                                        <div class="col-sm-6">
                                        <input type="text" value="" name="fa_icon"  class="form-control" placeholder="fa_icon" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">mdi_icon</label>
                                        <div class="col-sm-6">
                                      <input type="text" value="" name="mdi_icon"  class="form-control" placeholder="mdi_icon" />
                                           
                                        </div>
                                    </div>
                                  
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-6">
                                           	
				  <select name="Status" class="form-control">
				  <option value="Y">Active</option>
				  <option value="N">Inactive</option>
				  </select>	
				
                                        </div>
                                    </div>
                                    
                                    
                                         
                                           
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> 
                                        
                                        </label>
                                        <div class="col-sm-6">
                                         
                                           <input name="submit" type="submit" class="btn btn-success" value="Submit"> &nbsp; &nbsp; 
				
                                        </div>
                                    </div>
                                    
                     
                                    
                                </form>     
                                    
                                    

                                </div>
                            </div>
                        </div>


                        
                        <!-- end row -->

</div>

                    </div> <!-- container -->

                </div> <!-- content -->

 
                
<script>

 
              
function PostSearchForm()
{
	
	if(document.forminput.modulename.value=="")
	{
		alert("Please Enter module name/title  !!");
		document.forminput.modulename.style["border"]="solid thin red";
		document.forminput.modulename.focus();
		return false;
	}
   
	/*if(document.forminput.category_id.value=="")
	{
		alert("Please select category  !!");
		document.forminput.category_id.style["border"]="solid thin red";
		document.forminput.category_id.focus();
		return false;
	}
	*/ 
	
					  
	
	return true;
}



 function ChooseEditor(val){
	
	// alert(val); 
	  $.ajax({
	   type: "POST",
        url: "<?=Adminpath?>chooseEditor/" + val + "/0", 
		 //data: {"id": id,"status": status,"table":table,"where":where},
       // data: {"val": val,"cmsid": '0'},
		// dataType: 'json',
            success: function(data)
			 {     // alert(data);
				$("#Choose_Editor").html(data);    
				
            }            
        });
	
	}        


</script>
           
            
            