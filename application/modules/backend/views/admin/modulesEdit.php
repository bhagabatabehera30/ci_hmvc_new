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
                                    
                                    <form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>modulesEdit/<?=$edit_module_details->module_id;?>" onSubmit="return PostSearchForm()">
                                
                                   <div class="form-group">
                                        <label class="col-sm-4 control-label">Module Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="modulename" class="form-control"  placeholder="module title" value="<?=$edit_module_details->modulename;?>">
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
                                            <input type="text" value="<?=$edit_module_details->url;?>" name="url"  class="form-control" placeholder="Url" />
                                             <p class="help-block"><?=form_error('url')?></p>
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Target</label>
                                        <div class="col-sm-6">
                                          <input type="text" value="<?=$edit_module_details->target;?>" name="target"  class="form-control" placeholder="Target" />
                                           
                                        </div>
                                    </div>
									
                           
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Has Sub Module</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox"  name="has_sub"  value="Y" id="switch1" data-switch="bool" <?php if($edit_module_details->has_sub=='Y'){ echo "checked";}?>>
                                             <label for="switch1" data-on-label="Yes"
                                                           data-off-label="No"></label>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">glyph_icon</label>
                                        <div class="col-sm-6">
                                         <input type="text" value='<?=$edit_module_details->glyph_icon;?>' name="glyph_icon"  class="form-control" placeholder="glyph_icon" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">fa_icon</label>
                                        <div class="col-sm-6">
                                        <input type="text" value='<?php echo $edit_module_details->fa_icon;?>' name="fa_icon"  class="form-control" placeholder="fa_icon" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">mdi_icon</label>
                                        <div class="col-sm-6">
                                      <input type="text" value='<?php echo $edit_module_details->mdi_icon;?>' name="mdi_icon"  class="form-control" placeholder="mdi_icon" />
                                           
                                        </div>
                                    </div>
                                  
									
                                    
                                    
                                    
                                    
                                  
	                 
                                             
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-6">
                                           	
				  <select name="Status" class="form-control">
				  <option value="Y" <?php if($edit_module_details->Status=='Y'){echo "selected";} ?>>Active</option>
				  <option value="N" <?php if($edit_module_details->Status=='N'){echo "selected";} ?>>Inactive</option>
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



                    </div> <!-- container -->

                </div> <!-- content -->

<script type="text/javascript">
var roxyFileman = '<?=CDN_PATH?>fileman/roxy-file-manager.html?integration=ckeditor';
$(function(){
  CKEDITOR.replace( 'Cms_Description1',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'}); 
});



	
</script>
<script type="text/javascript" language="javascript">

 function PostSearchForm()
{
	
	if(document.forminput.page_title.value=="")
	{
		alert("Please Enter page name/title  !!");
		document.forminput.page_title.style["border"]="solid thin red";
		document.forminput.page_title.focus();
		return false;
	}
   
	if(document.forminput.category_id.value=="")
	{
		alert("Please select category  !!");
		document.forminput.category_id.style["border"]="solid thin red";
		document.forminput.category_id.focus();
		return false;
	}

	return true;
}



 function ChooseEditor(val,id){
	
	 //alert(val + '---------' + id); 
	  $.ajax({
	   type: "POST",
        url: "<?=Adminpath?>chooseEditor/" + val + "/" + id, 
		 //data: {"id": id,"status": status,"table":table,"where":where},
       // data: {"val": val,"cmsid": '0'},
		// dataType: 'json',
            success: function(data)
			 {     //alert(data);
				$("#Choose_Editor").html(data);    
				
            }            
        });
	
	}         
</script>
                
