<!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->Generate=="Y"){ ?>
            <a href="<?=Adminpath?>productsCreate">   
<button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-plus"></i> Create New Product</button>    </a>
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
                                    
<form name="form1" method="post" action="<?=Adminpath?>active_deactive_delete_all_products">
                                     <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                         <th><input name="check_all" type="checkbox" class="all" id="check_all" value="1"></th>
                                            <th>Product Title</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Added date</th>
                                            <th>Updated date</th>
                                            <th></th>
                                        </tr>
                                        </thead> 

                                        <tbody>
                                        <?php
										if(!empty($ProductLists)){
										 foreach($ProductLists as $result){ 
										if($result['Status']=="N") { $css="disable_row"; /*$css="bg-orange";*/ } else {$css=" ";}
?>   <tr class="<?php echo $css?>">
<td><input name="arr_cat_ids[]" class="check" type="checkbox" id="arr_cat_ids[]" value="<?php echo $result['product_id'];?>"></td> 
                                            <td><strong><?php echo  contents_readmore2(html_entity_decode($result['ProductTitle']),30);?></strong></td>
                  <td><?php  $category_id=$result['category_id'];if($category_id > 0){
$get_category=$this->admin_model->getRowbyId('front_categories','category_id',$category_id);	echo $get_category->category_name;}else{ echo "not found";}?></td>
                                            <td><?php echo $result['Currency'];?> &nbsp;<?php echo $result['Price'];?></td>
                                            <td>
                                        <?php
	   $imageThumbnail=$result['imageThumbnail'];
	  $imageThumbnail=explode(",",$imageThumbnail);
	if($result['imageThumbnail']!='' && file_exists("./cdn/productImage/thumbnail/$imageThumbnail[0]"))
	{ ?>
	<img src="<?=CDN_PATH?>productImage/thumbnail/<?php  echo $imageThumbnail[0]?>" height="80" width="80">

	<?php } 
else {  ?>
<img src="<?=CDN_PATH?>productImage/thumbnail/no-image.png" height="80" width="80">
<?php } 	?> 
											</td>
                                               
                                            
                                            <td><?php if($result['Status']=='Y') echo"Active";  if($result['Status']=="N"){ echo "Inactive";}?></td>
                                             <td><?=$result['Added_Date'];?></td>
                                             <td><?=$result['Updated_Date'];?></td>
                                         
                                            <td><?php if($AdminUserDetails->Edit == "Y"){ ?><a href="<?=Adminpath?>productsEdit/<?php echo $result['product_id'];?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
    <?php  } ?><?php if($AdminUserDetails->Remove == "Y"){ ?>|&nbsp;<a onClick="Delete(<?php echo $result['product_id'] ?>);" href="javascript:void(0);" title="Delete" style="color:#d73925;"><i class="fa fa-trash-o"></i></a>
    <?php  } ?></td>
                               </tr>
                                        <?php 
										}}?>
                                    
                                        
                                        </tbody>
                                    </table>
                                    <table width="98%" border="0" cellpadding="0" cellspacing="0" class="mrg10T mrg10B"><tr><td align="right">
                                              <input type="submit" name="Activate" value="Activate" class="btn btn-success btn-sm" onClick="return confact();"/>
      | <input type="submit" name="Deactivate" value="Deactivate" class="btn btn-success btn-sm Deactivate" 
        onclick="return confdeact();"/> 
        
        | <input name="Delete" type="submit" id="Delete" value="Delete" class="btn btn-danger btn-sm" onClick="return confdel();">        </td>
                                           
                                            </tr> 
                                            
                               
              <tr>
              
                <td align="left" > <br> <span class="disable_row" style="height:20px;">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Disabled Products.  </td>
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
        url: "<?=Adminpath?>Delete/front_product/product_id/"+id+"",
        // data: {"cmsid": id,"table": 'front_cms'},
        success: function(test)
        {
          // alert('Data Has been Deleted..');
          location.reload();
        }
      });
    }
  }
   
  
</script>
            