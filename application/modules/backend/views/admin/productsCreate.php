<script src="<?=ASSETS?>plugins/ckeditor/ckeditor.js"></script> 

                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"><?=$page_title;?> </h4>
                                    <div align="right"><?php if($AdminUserDetails->View=="Y"){ ?>
            <a href="<?=Adminpath?>productsList">   

              <button type="button" class="btn-sm  btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Product List</button>    </a>
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
                                    
                               <form name="forminput" class="row form-horizontal" method="post" action="<?=Adminpath?>CmsCreate" onSubmit="return PostSearchForm()">
                               <div align="right">
<button type="submit" class="btn-sm  btn btn-success">Save</button><div class="clearfix"></div> <br /></div>
                               
                                    <ul class="nav nav-tabs navtab-bg protab">
                                        <li class="active">
                                            <a href="#ProTabGeneral" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                <span class="hidden-xs">General</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#ProTabData" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <span class="hidden-xs">Data</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#ProTabLinks" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                                <span class="hidden-xs">Links</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#ProTabAttribute" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Attribute</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabOption" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Option</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabRecurring" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Recurring</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabDiscount" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Discount</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabSpecial" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Special</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabImage" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Image</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabRewardPoints" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Reward Points</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabSEO" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">SEO</span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="#ProTabDesign" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Design</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="ProTabGeneral">
                                        
                                        <div class="form-group">
                                        <label class="col-sm-4 control-label">Page Title <span class="required-stars">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="product_description[1][name]" value="" placeholder="Product Name" id="input-name1" class="form-control">
                                            <p class="help-block"><?=form_error('page_title')?></p>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                   
                                   
                              
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                         
                       <textarea class="form-control" name="product_description[1][description]" placeholder="Description" id="input-description1" rows="10" cols="80"></textarea>
                                        
                                        </div>
                                    </div> 
                                    
                                    
                                     
									
									
									  <div class="form-group">
                                        <label class="col-sm-4 control-label">Meta Title</label>
                                        <div class="col-sm-6">
                                          <input type="text" name="product_description[1][meta_title]" value="" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control">
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">Meta description</label>
                                        <div class="col-sm-6">
                                          
                                            <textarea name="product_description[1][meta_description]" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"></textarea>
                                        </div>
                                    </div>
									
                                    
                                    
                                    
									<div class="form-group">
                                        <label class="col-sm-4 control-label">SEO Keywords</label>
                                        <div class="col-sm-6">
                                           <textarea name="product_description[1][meta_keyword]" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                    <label class="col-sm-4 control-label" for="input-tag1">
                    <span id="tooltip-animation1"  title="Comma separated">Product Tags <span class="infoq">?</span></span></label>
                    <div class="col-sm-6">
                      <input type="text" name="product_description[1][tag]" value="" placeholder="Product Tags Like:- mobile,ear phone,laptop" id="input-tag1" class="form-control">
                    </div>
                  </div>
                                    
                                    
                                           
                                        </div>
                                        <div class="tab-pane" id="ProTabData">
                                        
                                      
                                     
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-model">Model</label>
                <div class="col-sm-10">
                  <input type="text" name="model" value="" placeholder="Model" id="input-model" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sku">
                <span id="tooltip-animation2"  title="Stock Keeping Unit">SKU <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="sku" value="" placeholder="SKU" id="input-sku" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-upc">
                <span id="tooltip-animation3"  title="Universal Product Code">UPC <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="upc" value="" placeholder="UPC" id="input-upc" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-ean">
                <span id="tooltip-animation4"  title="European Article Number">EAN <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="ean" value="" placeholder="EAN" id="input-ean" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-jan">
                <span id="tooltip-animation5"  title="Japanese Article Number">JAN <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="jan" value="" placeholder="JAN" id="input-jan" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-isbn">
               <span id="tooltip-animation6"  title="International Standard Book Number">ISBN <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="isbn" value="" placeholder="ISBN" id="input-isbn" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-mpn">
             <span id="tooltip-animation7"  title="Manufacturer Part Number">MPN <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="mpn" value="" placeholder="MPN" id="input-mpn" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-location">Location</label>
                <div class="col-sm-10">
                  <input type="text" name="location" value="" placeholder="Location" id="input-location" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-price">Price</label>
                <div class="col-sm-10">
                  <input type="text" name="price" value="" placeholder="Price" id="input-price" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-tax-class">Tax Class</label>
                <div class="col-sm-10">
                  <select name="tax_class_id" id="input-tax-class" class="form-control">
                    <option value="0"> --- None --- </option>
                    <option value="9">Taxable Goods</option>
                    <option value="10">Downloadable Products</option> 
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
                <div class="col-sm-10">
                  <input type="text" name="quantity" value="1" placeholder="Quantity" id="input-quantity" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-minimum">
       <span id="tooltip-animation8"  title="Force a minimum ordered amount">Minimum Quantity <span class="infoq">?</span></span>
              </label>
                <div class="col-sm-10">
                  <input type="text" name="minimum" value="1" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-subtract">Subtract Stock</label>
                <div class="col-sm-10">
                  <select name="subtract" id="input-subtract" class="form-control">
                    <option value="1" selected="selected">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-stock-status">
                <span id="tooltip-animation9"  title="Status shown when a product is out of stock">Out Of Stock Status <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <select name="stock_status_id" id="input-stock-status" class="form-control">
                 
                    <option value="6">2-3 Days</option>
                    
                    <option value="7">In Stock</option>
                    
                    <option value="5">Out Of Stock</option>
                    
                    <option value="8">Pre-Order</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Requires Shipping</label>
                <div class="col-sm-10">
                  <label class="radio-inline">                     <input type="radio" name="shipping" value="1" checked="checked">
                    Yes
                     </label>
                  <label class="radio-inline">                     <input type="radio" name="shipping" value="0">
                    No
                     </label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-date-available">Date Available</label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <input type="text" name="date_available" value="2018-12-23" placeholder="Date Available" data-date-format="YYYY-MM-DD" id="input-date-available" class="form-control">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                    </span></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-length">Dimensions (L x W x H)</label>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-sm-4">
                      <input type="text" name="length" value="" placeholder="Length" id="input-length" class="form-control">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="width" value="" placeholder="Width" id="input-width" class="form-control">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="height" value="" placeholder="Height" id="input-height" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-length-class">Length Class</label>
                <div class="col-sm-10">
                  <select name="length_class_id" id="input-length-class" class="form-control">
                    
                    <option value="1" selected="selected">Centimeter</option>
                    
                    <option value="2">Millimeter</option>
                    
                    <option value="3">Inch</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-weight">Weight</label>
                <div class="col-sm-10">
                  <input type="text" name="weight" value="" placeholder="Weight" id="input-weight" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-weight-class">Weight Class</label>
                <div class="col-sm-10">
                  <select name="weight_class_id" id="input-weight-class" class="form-control">
                   
                    <option value="1" selected="selected">Kilogram</option>
                    
                    <option value="2">Gram</option>
                    
                    <option value="5">Pound </option>
                    
                    <option value="6">Ounce</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                  <select name="Status" id="input-status" class="form-control">
				  <option value="Y">Active</option>
				  <option value="N">Inactive</option>
				  </select>	
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                <div class="col-sm-10">
                  <input type="text" name="sort_order" value="1" placeholder="Sort Order" id="input-sort-order" class="form-control">
                </div>
              </div>
            
                                        
                                        
                                            
                                        </div>
                                        <div class="tab-pane" id="ProTabLinks">
                                           
                                           
                                           <div class="form-group">
                <label class="col-sm-2 control-label" for="input-manufacturer">
                <span id="tooltip-animation10"  title="(Autocomplete/Autosuggest)">Manufacturer <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="manufacturer" value="" placeholder="Manufacturer" id="input-manufacturer" class="form-control" autocomplete="off"><ul class="dropdown-menu" style="top: 36px; left: 15px; display: none;"><li data-value="0"><a href="#"> --- None --- </a></li><li data-value="8"><a href="#">Apple</a></li><li data-value="9"><a href="#">Canon</a></li><li data-value="5"><a href="#">HTC</a></li><li data-value="7"><a href="#">Hewlett-Packard</a></li><li data-value="6"><a href="#">Palm</a></li></ul>
                  <input type="hidden" name="manufacturer_id" value="8">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-category">
                <span id="tooltip-animation11"  title="(Autocomplete/Autosuggest)">Categories <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="category" value="" placeholder="Categories" id="input-category" class="form-control" autocomplete="off"><ul class="dropdown-menu" style="top: 36px; left: 15px; display: none;"><li data-value="33"><a href="#">Cameras</a></li><li data-value="25"><a href="#">Components</a></li><li data-value="29"><a href="#">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Mice and Trackballs</a></li><li data-value="28"><a href="#">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Monitors</a></li><li data-value="35"><a href="#">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Monitors&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 1</a></li></ul>
                  <div id="product-category" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-filter">
                <span id="tooltip-animation12"  title="(Autocomplete/Autosuggest)">Filters <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="filter" value="" placeholder="Filters" id="input-filter" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                  <div id="product-filter" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Stores</label>
                <div class="col-sm-10">
                  <div class="well well-sm" style="height: 150px; overflow: auto;">                     <div class="checkbox">
                      <label>                         <input type="checkbox" name="product_store[]" value="0" checked="checked">
                        Default
                         </label>
                    </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-download">
                <span id="tooltip-animation13"  title="(Autocomplete/Autosuggest)">Downloads <span class="infoq">?</span></span>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="download" value="" placeholder="Downloads" id="input-download" class="form-control" autocomplete="off"><ul class="dropdown-menu" style="display: none;"></ul>
                  <div id="product-download" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-related">
                <span id="tooltip-animation14"  title="(Autocomplete/Autosuggest)">Related Products <span class="infoq">?</span></span>
                
                </label>  
                <div class="col-sm-10">
                  <input type="text" name="related" value="" placeholder="Related Products" id="input-related" class="form-control" autocomplete="off"><ul class="dropdown-menu" style="top: 36px; left: 15px; display: none;"><li data-value="42"><a href="#">Apple Cinema 30"</a></li><li data-value="30"><a href="#">Canon EOS 5D</a></li><li data-value="47"><a href="#">HP LP3065</a></li><li data-value="28"><a href="#">HTC Touch HD</a></li><li data-value="41"><a href="#">iMac</a></li></ul>
                  <div id="product-related" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                </div>
                                           
                                           
                                        </div>
                                        <div class="tab-pane" id="ProTabAttribute">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabOption">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabRecurring">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabDiscount">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabSpecial">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabImage">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabRewardPoints">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabSEO">
                                           
                                        </div>
                                         <div class="tab-pane" id="ProTabDesign">
                                           
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

<script type="text/javascript">
var roxyFileman = '<?=CDN_PATH?>fileman/roxy-file-manager.html?integration=ckeditor';
$(function(){
  CKEDITOR.replace( 'input-description1',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'}); 
});



	
</script> 
                
<script>

 
              
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


 


</script>
           
            
            