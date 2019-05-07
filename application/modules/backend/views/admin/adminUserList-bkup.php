                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->Generate=="Y"){ ?>
            <a href="<?=Adminpath?>adminUserCreate">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-plus"></i> Admin Users</button>    </a>
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
                                    
<form method="post" action="<?=Adminpath?>active_deactive_delete_all_adminuser">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                         <th><input name="check_all" type="checkbox" class="all" id="check_all" value="1"></th>
                                            <th>Name</th>
                                            <th>Log Id</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Added date</th>
                                            <th>Updated date</th>
                                            <th></th>
                                        </tr>
                                        </thead> 


                                        <tbody>
                                        <?php foreach($AdminUserLists as $result){ 
										if($result['adm_status']=="Inactive") { $css="disable_row"; /*$css="bg-orange";*/ } else {$css=" ";}
?>   <tr class="<?php echo $css?>">
<td><input name="arr_cat_ids[]" class="check" type="checkbox" id="arr_cat_ids[]" value="<?php echo $result['adm_id'];?>"></td> 
                                            <td><?=$result['adm_name'];?></td>
                                            <td><?=$result['adm_login_id'];?></td>
                                            <td><?=$result['adm_email'];?></td>
                                            <td><?=$result['adm_status'];?></td>
                                             <td><?=$result['Added_Date'];?></td>
                                             <td><?=$result['Updated_Date'];?></td>
                                         
                                            <td><?php if($AdminUserDetails->Edit == "Y"){ ?><a href="<?=Adminpath?>adminUserEdit/<?php echo $result['adm_id'];?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
    <?php  } ?><?php if($AdminUserDetails->Remove == "Y"){ ?>|&nbsp;<a onClick="Delete(<?php echo $result['adm_id'] ?>);" href="javascript:void(0);" title="Delete" style="color:#d73925;"><i class="fa fa-trash-o"></i></a>
    <?php  } ?></td>
                               </tr>
                                        <?php } ?>
                                        
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
              
                <td align="left" > <br> <span class="disable_row" style="height:20px;">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Disabled Users.  </td>
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
        url: "<?=Adminpath?>Delete/admin_user/adm_id/"+id+"",
        data: {"adm_id": id,"table": 'admin_user'},
        success: function(test)
        {
          // alert('Data Has been Deleted..');
          location.reload();
        }
      });
    }
  }
            
</script>
            