<div class="row">
            <div class="col-md-12">			
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								Refine Your Search
							</div>
							
						</div>
						<div class="portlet-body form">
                            <!-- BEGIN FORM-->
                                                         
 

  <?php echo $this->form->create('Product',array('class'=>'form-inline'));?>                          
  
      
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                        
                                        
                                            <div class="form-group">
								  <?php $name = $this->Session->read('name'); ?> 
												
                                                <label for="email">Product Title:</label>
									<?php if(!empty($name)) { ?>		
                                                <input type="text" class="form-control" name="data[name]" value="<?php echo $name ?>">
										<?php } else { ?>
												<input type="text" class="form-control" name="data[name]">
												<?php } ?>
                                    </div>
                                             
                                             <div class="clearfix"></div>                      
										</div>
  </div>
                                   
                                </div>
                                <div class="form-actions fluid">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                                <button type="submit" class="btn green">SEARCH</button>
                                        </div>
                                        
                                    </div>
                                </div>
                           <?php echo $this->form->end();?>
                            <!-- END FORM-->
                        </div>
					</div>
                    

                <!-- END SAMPLE TABLE PORTLET-->
                </div>
         
<div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Product Listing
                        </div>
                    
                     <select class="form-control pull-right" style="width: 225px;" id="sortdata1" onchange="selectsort()">
                            <option value="">sort by product title</option>
                                <option value="ASC" <?php echo ($value == 'ASC') ? "selected" : "" ?>>A to Z</option>
                            <option value="DESC" <?php echo ($value == 'DESC') ? "selected" : "" ?>>Z to A</option>
                        </select>
                        </div>
                    <div class="table-scrollable" style="margin-top:30px;">
<!--                        <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
                         <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Product Title</th>
                                    <th style="text-align:center" >Price</th>
                                     <th style="text-align:center">Stock</th>
                                    <th style="text-align:center">Featured </th>
                                    <th style="text-align:center" colspan="4">Action</th>

                                </tr>

                            </thead>
                             <tfoot>
	 				 <!--  <tr>
                         <td colspan="9" class="rounded-foot-left"><em><?php //echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>-->
                    </tfoot>
                            <tbody>
                           <?php $i=1; foreach($userList as $result) { ?>
                               
                                <tr>
                                     <td><?php echo $i; ?></td>
                                    
                                     <td><?php echo $result['Product']['product_title']; ?></a></td>
                                     <td><?php echo $result['Product']['product_price']; ?></a></td>
                     <?php if ($result['Product']['new_flag'] == 0) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_new_deactive', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Instock')); ?></a>
                                    <?php } else if ($result['Product']['new_flag'] == 1) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_new_active', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Out of stock')); ?></a>
                                <?php } ?>
                                </td> 
				                   <?php if ($result['Product']['is_active'] == 0) { ?>
                                  <?php if ($result['Product']['featured_flag'] == 1) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_is_deactive', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Featured')); ?></a>
                                    <?php } else if ($result['Product']['featured_flag'] == 0) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_is_active', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'UnFeatured')); ?></a>
									<?php } ?></td>
				                  <?php } else { ?>
				                  <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_is_deactive', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'UnFeatured')); ?></a>
									</td>
                                    <?php } ?>
				
		                          <?php if ($result['Product']['is_active'] == 0) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_deactive', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Active')); ?></a>
                                    <?php } else if ($result['Product']['is_active'] == 1) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_active', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Deactive')); ?></a>
                                <?php } ?>
                                </td> 
				<td><a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'admin_productDetail',$result['Product']['id']));?>"><?php echo $this->html->image('view.ico', array('title' => 'view')); ?></a>
                                       <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_editProduct', $result['Product']['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
                <td><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_duplicateProduct', $result['Product']['id'])); ?>" title="Duplicate"><?php echo $this->html->image('duplicate.jpg', array('width' => '16', 'height' => '16')); ?></a></td>
                                       <td> <?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>',
                                                array(
                                                    'controller' => 'products',
                                                    'action' => 'admin_delete',
                                                    $result['Product']['id']
                                               ), array(
                                                    'escape' => false,
                                                   'alt' =>'delete',
                                                   'title'=>'delete',
                                                    'confirm' => 'Are you sure?'
                                                   )); ?></td>								  
                                </tr>
                           <?php $i++;} ?>
</tbody>
                        </table>
                        
                    </div>  </div>
	<?php $f = count($userList) ?>
<?php if ($f > 9) { ?>
<div class="btn_box text-center"> 
<a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'admin_productListing', $val)); ?>"><button class="btn btn-primaryadmin add_btn">View More</button></a>
</div>
<?php } else { ?>
<?php } ?> 
            </div>
        </div>
<Script>
       function selectsort() {
        var value = $("#sortdata1").val();
        //alert(value);
        if (value == "ASC") {
            window.location.href = SITEPATH + "admin/products/productListing" +'?sort='+'ASC'; 
        } else if (value == "DESC") {
            window.location.href = SITEPATH + "admin/products/productListing" + '?sort='+'DESC';
        }

    }
</script>