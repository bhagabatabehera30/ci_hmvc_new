  <script src="<?=ASSETS?>plugins/ckeditor/ckeditor.js"></script>              
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->View=="Y"){ ?>
            <a href="<?=Adminpath?>CmsList">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Cms List</button>    </a>
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
                                    
                                    <form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>CmsEdit/<?=$edit_cms_details->cmsid;?>" onSubmit="return PostSearchForm()">
                                
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Page Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="page_title" class="form-control"  placeholder="page title" value="<?=$edit_cms_details->page_title;?>">  
                                            <p class="help-block"><?=form_error('page_title')?></p>
                                        </div>
                                    </div>
                                    
                                   
                                   <div class="form-group">
                                        <label class="col-sm-4 control-label">Category:</label>
                                        <div class="col-sm-6"> 
                                          
				<?=(isset($get_categories)) ? $get_categories: ''; ?>   
				<p class="help-block"><?=form_error('category_id')?></p> 
			
                                        </div>
                                    </div>
                                   
                                   
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Editors</label>
                                        <div class="col-sm-6">
                                           	
				  <select name="CMS_Editor_Type" class="form-control" onchange="ChooseEditor(this.value,<?=$edit_cms_details->cmsid;?>)">
				  <option value="WYSIWYG" <?php if($edit_cms_details->CMS_Editor_Type=='WYSIWYG'){echo "selected";} ?>>Web(WYSIWYG) Editor</option>
				  <option value="Custom" <?php if($edit_cms_details->CMS_Editor_Type=='Custom'){echo "selected";} ?>>Your Custom Html</option>
				  </select>	
				
                                        </div>
                                    </div>
                              
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Content</label>
                                        <div class="col-sm-10">
                                         <div id="Choose_Editor">
                       <textarea name="Description"  class="form-control" id="Cms_Description1" placeholder="Description/Content" rows="10" cols="80"><?php echo (html_entity_decode($edit_cms_details->Description)); ?></textarea>
                                           </div> 
                                        </div>
                                    </div> 
                                    
                                    
                                     
									
									
									  <div class="form-group">
                                        <label class="col-sm-4 control-label">Meta Title</label>
                                        <div class="col-sm-6">
                                            <textarea name="MetaTitle"  class="form-control" placeholder="Meta Title" rows="2"><?=$edit_cms_details->MetaTitle; ?></textarea>
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Meta description</label>
                                        <div class="col-sm-6">
                                            <textarea name="MetaDescription"  class="form-control" placeholder="Meta description" rows="2"><?=$edit_cms_details->MetaDescription;?></textarea>
                                        </div>
                                    </div>
									
                                    
                                    
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">SEO Keywords</label>
                                        <div class="col-sm-6">
                                            <textarea name="SEOKeyword"  class="form-control" placeholder="SEO Keywords" rows="2"><?=$edit_cms_details->SEOKeyword; ?></textarea>
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Left sidebar/navigation</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox"  name="LeftSideBar"  value="Y"  <?php if($edit_cms_details->LeftSideBar=='Y'){echo "checked";} ?> id="switch1" data-switch="bool">
                                             <label for="switch1" data-on-label="Yes"
                                                           data-off-label="No"></label>
                                        </div>
                                    </div>
									
                                    
                                    
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Right sidebar/navigation</label>
                                        <div class="col-sm-6">
                                            
                                            <input type="checkbox" name="RightSideBar" value="Y"  <?php if($edit_cms_details->LeftSideBar=='Y'){echo "checked";} ?> id="switch2" data-switch="bool">
                                             <label for="switch2" data-on-label="Yes"
                                                           data-off-label="No"></label>
                                            
                                        </div>
                                    </div>
									
									
									
									
                                    
                                    
                                    
                                    
                                  
	                 
                                             
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-6">
                                           	
				  <select name="Status" class="form-control">
				  <option value="Y" <?php if($edit_cms_details->Status=='Y'){echo "selected";} ?>>Active</option>
				  <option value="N" <?php if($edit_cms_details->Status=='N'){echo "selected";} ?>>Inactive</option>
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
                
