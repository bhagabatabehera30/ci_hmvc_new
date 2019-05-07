<?php 
function showsubcategory($id,$flag, $accessEdit, $accesssDel)
  {	
  $ci =& get_instance(); 
  //echo $id;
  // print_r($child_cat);
  	$child_cat = $ci->admin_model->FetchPerentOrChildCategoryListData('front_categories','parent_category_id',$id,'category_name','ASC');
  if(!empty($child_cat)){
  foreach($child_cat as $row_cat)
	{
	if($row_cat['Status']=="N") { $css="disable_row"; } else {$css=" ";}
		?>
   <tr class="<?php echo $css?>">
   <td><input name="arr_cat_ids[]" class="check" type="checkbox" id="arr_cat_ids[]" value="<?php echo $row_cat['category_id'];?>"></td> 
      	      <!--<td nowrap><?php echo $row_cat['category_id'];?> </td>-->
            <td><strong>
			<?php  for($i=1;$i<=$flag;$i++)
		     { if($i==$flag){ echo ""; } else echo "";  } 
			  echo (html_entity_decode($row_cat['category_name'])); ?></strong></td>
          <td> <?php  echo (html_entity_decode($row_cat['catname_short']));?></td> 
   <!--<td> <?php echo (html_entity_decode($row_cat['url']));?></td>-->
		<td> <?php echo $row_cat['SortOrder'];?></td>
	<td><?php if($row_cat['Status']=='Y') echo"Active";  if($row_cat['Status']=="N"){ echo "Inactive";}?> </td>
   <td><?=$row_cat['Added_Date'];?></td>
   <td><?=$row_cat['Updated_Date'];?></td>
         <td><?php if($accessEdit == "Y"){ ?><a href="<?=Adminpath?>CategoryEdit/<?php echo $row_cat['category_id'];?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
    <?php  } ?><?php if($accesssDel == "Y"){ ?>|&nbsp;<a onClick="Delete(<?php echo $row_cat['category_id'];?>);" href="javascript:void(0);" title="Delete" style="color:#d73925;"><i class="fa fa-trash-o"></i></a>
    <?php  } ?></td>    
            
         </tr>
	<?php
	   showsubcategory($row_cat['category_id'],$flag+1, $accessEdit,$accesssDel);
	}
  }
 }
?>               
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->Generate=="Y"){ ?>
            <a href="<?=Adminpath?>CategoryCreate">   
<button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-plus"></i> New Category</button>    </a>
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
                                    <h4 class="m-t-0 header-title"><b><?=$page_title;?></b></h4>
                                    
<form name="form1" method="post" action="<?=Adminpath?>active_deactive_delete_all_categories">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                         <th><input name="check_all" type="checkbox" class="all" id="check_all" value="1"></th>
                                            <th>Category</th>
                                            <th>Short Name</th>
                                            <th>SortOrder</th>
                                            <th>Status</th>
                                            <th>Added date</th>
                                            <th>Updated date</th>
                                            <th></th>
                                        </tr>
                                        </thead> 


                                        <tbody>
                                        <?php
										if(!empty($ParentCatLists)){
										 foreach($ParentCatLists as $result){ 
										if($result['Status']=="N") { $css="disable_row"; /*$css="bg-orange";*/ } else {$css=" ";}
?>   <tr class="<?php echo $css?>">
<td><input name="arr_cat_ids[]" class="check" type="checkbox" id="arr_cat_ids[]" value="<?php echo $result['category_id'];?>"></td> 
                                            <td><strong><?=$result['category_name'];?></strong></td>
                                            <td><?=$result['catname_short'];?></td>
                                            <td><?=$result['SortOrder'];?></td>
                                            <td><?php if($result['Status']=='Y') echo"Active";  if($result['Status']=="N"){ echo "Inactive";}?></td>
                                             <td><?=$result['Added_Date'];?></td>
                                             <td><?=$result['Updated_Date'];?></td>
                                         
                                            <td><?php if($AdminUserDetails->Edit == "Y"){ ?><a href="<?=Adminpath?>CategoryEdit/<?php echo $result['category_id'];?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
    <?php  } ?><?php if($AdminUserDetails->Remove == "Y"){ ?>|&nbsp;<a onClick="Delete(<?php echo $result['category_id'] ?>);" href="javascript:void(0);" title="Delete" style="color:#d73925;"><i class="fa fa-trash-o"></i></a>
    <?php  } ?></td>
                               </tr>
                                        <?php 
	 showsubcategory($result['category_id'],1, $AdminUserDetails->Edit, $AdminUserDetails->Remove); 
										}
										}?>
                                        
                                        
                                        </tbody>
                                    </table>
                                    <table width="98%" border="0" cellpadding="0" cellspacing="0" class="mrg10T mrg10B"><tr>
                               
                                           
                                              <td align="right">
                                              <input type="submit" name="Activate" value="Activate" class="btn btn-success btn-sm" onClick="return confact();"/>
      | <input type="submit" name="Deactivate" value="Deactivate" class="btn btn-success btn-sm Deactivate" 
        onclick="return confdeact();"/> 
        
        | <input name="Delete" type="submit" id="Delete" value="Delete" class="btn btn-danger btn-sm" onClick="return confdel();">        </td>
                                           
                                            </tr> 
                                            
                               
              <tr>
              
                <td align="left" > <br> <span class="disable_row" style="height:20px;">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Disabled Categories.  </td>
              </tr>
                    
                                            </table>
                                    </form>
                                </div>
                            </div>
                        </div>


                        
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

                
<script>
function Delete(id)
  {
    if(confirm('Are you sure you want to Delete?'))
    {
      $.ajax({
        type: "POST",
        url: "<?=Adminpath?>Delete/front_categories/category_id/"+id+"",
        data: {"category_id": id,"table": 'front_categories'},
        success: function(test)
        {
          // alert('Data Has been Deleted..');
          location.reload();
        }
      });
    }
  }
            
</script>
            