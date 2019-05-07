                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->View=="Y"){ ?>
            <a href="<?=Adminpath?>CategoryList">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Category List</button>    </a>
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
                                    <form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>CategoryEdit/<?=$edit_cat_details->category_id;?>" onSubmit="return PostSearchForm()">
                                
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Category Name<span class="text-transform-low font-red" style=" font-size:8px">&nbsp;&nbsp;<i class="glyph-icon icon-star"></i></span></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="category_name" class="form-control"  placeholder="Category Name" value="<?=$edit_cat_details->category_name;?>">
                                            <p class="help-block"><?=form_error('category_name')?></p>
                                        </div>
                                    </div>
                                 
				  
                                   
                                   
                                   
                                   <div class="form-group">
                                        <label class="col-sm-4 control-label">Parent Category:</label>
                                        <div class="col-sm-6"> 
                                          
				<?=(isset($get_categories)) ? $get_categories: ''; ?>   
				<p class="help-block"><?=form_error('parent_category_id')?></p> 
			
                                        </div>
                                    </div>
                                    
                              
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Category Short Name </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="catname_short"  class="form-control" id="" placeholder="Category short name" value="<?=$edit_cat_details->catname_short;?>">
                                            
                                        </div>
                                    </div>
									
                                    
									
									 <div class="form-group">
                                        <label class="col-sm-4 control-label">Url</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="url"  class="form-control"   value="<?=$edit_cat_details->url;?>">
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Top Navigation Bar</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox"  name="IsTopNav"  value="Y" <?php if($edit_cat_details->IsTopNav=='Y'){echo "checked";} ?> id="switch1" data-switch="bool">
                                             <label for="switch1" data-on-label="Yes"
                                                           data-off-label="No"></label>
                                        </div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Footer/Bottom</label>
                                        <div class="col-sm-6">
                                            
                                            <input type="checkbox" name="IsFooter" value="Y"  <?php if($edit_cat_details->IsFooter=='Y'){echo "checked";} ?> id="switch2" data-switch="bool">
                                             <label for="switch2" data-on-label="Yes"
                                                           data-off-label="No"></label>
                                            
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Footer/Bottom(Sections)</label>
                                        <div class="col-sm-2">
                                            
                                            <input type="checkbox"  name="CompanyInFooter" value="Y"  <?php if($edit_cat_details->CompanyInFooter=='Y'){echo "checked";} ?> id="switch3" data-switch="bool">
                                             <label for="switch3" data-on-label="Yes"
                                                           data-off-label="No"></label> <br />(In Company Section)
												</div><div class="col-sm-2">
                              <input type="checkbox"  name="SupportInFooter" value="Y"  <?php if($edit_cat_details->SupportInFooter=='Y'){echo "checked";} ?> id="switch4" data-switch="bool">
                                             <label for="switch4" data-on-label="Yes"
                                                           data-off-label="No"></label> <br />(In Help/Support Section) 
											</div><div class="col-sm-2">
											 <input type="checkbox"  name="MyAcInFooter"   
											value="Y"  <?php if($edit_cat_details->MyAcInFooter=='Y'){echo "checked";} ?> id="switch5" data-switch="bool"> 
                                             <label for="switch5" data-on-label="Yes"
                                                           data-off-label="No"></label> <br />(In Extra Section)
                                            
                                            
                                        </div>
                                    </div>
									
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> SortOrder</label>
                                        <div class="col-sm-6">
                                        
                                            <input type="text" id="touchspin-demo-1" name="SortOrder" class="vertical-spin"    placeholder="Sort Order  should be integer" value="<?=$edit_cat_details->SortOrder;?>">
                                        </div>
                                    </div>
                                    
                                    
                                  
	                 
                                             
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-6">
                                           	
				  <select name="Status" class="form-control">
				  <option value="Y" <?php if($edit_cat_details->Status=='Y'){echo "selected";} ?>>Active</option>
				  <option value="N" <?php if($edit_cat_details->Status=='N'){echo "selected";} ?>>Inactive</option>
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


<script type="text/javascript" language="javascript">

 
              
function PostSearchForm()
{
   
	if(document.forminput.category_name.value=="")
	{
		alert("Please Enter category name/title  !!");
		document.forminput.category_name.style["border"]="solid thin red";
		document.forminput.category_name.focus();
		return false;
	}
	
	
					  
	
	return true;
}
</script>
                
