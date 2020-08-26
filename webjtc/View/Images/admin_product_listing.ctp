<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Product Listing
                        </div>
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
                        <tr>
                         <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                           <?php $i=1; foreach($userList as $result) { ?>
                               
                                <tr>
                                     <td><?php echo $i; ?></td>
                                    
                                     <td><?php echo $result['Product']['product_title']; ?></a></td>
                                     <td><?php echo $result['Product']['product_price']; ?></a></td>
                     <?php if ($result['Product']['new_flag'] == 0) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'admin_new_deactive', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Instock')); ?></a>
                                    <?php } else if ($result['Product']['new_flag'] == 1) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'admin_new_active', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Out of stock')); ?></a>
                                <?php } ?>
                                </td>                    
                                  <?php if ($result['Product']['featured_flag'] == 1) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'admin_is_deactive', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Activate')); ?></a>
                                    <?php } else if ($result['Product']['featured_flag'] == 0) { ?>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'admin_is_active', $result['Product']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Deactivate')); ?></a>
    <?php } ?>
                                </td>
                                    
                                     <td><a href="<?php echo $this->html->url(array('controller'=>'images','action'=>'admin_productDetail',$result['Product']['id']));?>"><?php echo $this->html->image('view.ico', array('title' => 'view')); ?></a>
                                       <td><a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'admin_editProduct', $result['Product']['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
                <td><a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'admin_duplicateProduct', $result['Product']['id'])); ?>" title="Duplicate"><?php echo $this->html->image('duplicate.jpg', array('width' => '16', 'height' => '16')); ?></a></td>
                                       <td> <?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>',
                                                array(
                                                    'controller' => 'images',
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
                        
                    </div>                    
                </div>
            </div>
        </div>
