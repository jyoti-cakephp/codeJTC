<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Order Details
                        </div>
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:green">   <?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                        <tr>
                    <td style="width:50px;">Customer Name</td>
                   <td style="width:300px;" align = "left"><?php echo $orderDetails['User']['first_name']." ".$orderDetails['User']['last_name'] ?></td>
                            </tr>
                           
                  <tr>
                 <td style="width:150px;">Product Name</td>

                 <td align = "left" style='width:50px;'>
                 <?php $i=0; foreach($productName as $result) { ?>
                 <?php echo $result['Product']['product_title']; ?>(<?php echo $result['Basket']['quentity'];;?>),
                <?php $i++;} ?>
                  </td>
              </tr>
                         
                         <tr>
                                <td style="width:150px;">Order #</td>
                               
                                <td align = "left" style='width:50px;'><?php echo $orderDetails['Order']['order_number'] ?></td>
                            </tr>
<!--                                <tr>
                                <td style="width:150px;">Total Price</td>
                               
                                <td align = "left" style='width:50px;'>£&nbsp;<?php //echo $orderDetails['Order']['total_price'] ?></td>
                            </tr>-->
                                 <tr>
                                <td style="width:150px;">Order Date</td>
                         <td align = "left" style='width:50px;'> <?php echo date('d-m-Y',strtotime($orderDetails['Order']['created']));?></td>
                            </tr>
                            <tr>
                                <td style="width:150px;">Order Status</td>
                               
                               
                                     <?php if($orderDetails['Order']['order_status']=="0") { ?> 
                                     <td align = "left" style='width:50px;'>
                                      <?php echo "Pending" ?> 
                                    </td>
                                    <?php } else { ?>
                                   <td align = "left" style='width:50px;'>
                                      <?php echo "Completed" ?> 
                                    </td>
                                    <?php } ?>
                                
                            </tr>
                              
                  <tr>
                                <td style="width:150px;">Shipping Address</td>
         <?php if(!empty($shipping)) { ?>                       
                         <td align = "left" style='width:50px;'><?php echo $shipping['Shipping']['company']?><br><?php echo $shipping['Shipping']['first_name']." " .$shipping['Shipping']['last_name']?><br><?php echo $shipping['Shipping']['address']."," .$shipping['Shipping']['post_code']?><br><?php echo $shipping['Shipping']['city']."," .$shipping['Shipping']['country']?></td>
         <?php } else { ?>
     <td align = "left" style='width:50px;'><?php echo $orderDetails['User']['company_name']?><br><?php echo $orderDetails['User']['first_name']." " .$orderDetails['User']['last_name']?><br><?php echo $orderDetails['User']['address']."," .$orderDetails['User']['post_code']?><br><?php echo $orderDetails['User']['city']."," .$orderDetails['User']['country']?></td>
               <?php } ?>
                            </tr>
              <tr>
                                <td style="width:150px;">Billing Address</td>
        <?php if(!empty($billing)) { ?>                     
                         <td align = "left" style='width:50px;'><?php echo $billing['Billing']['company']?><br><?php echo $billing['Billing']['first_name']." " .$billing['Billing']['last_name']?><br><?php echo $billing['Billing']['address']."," .$billing['Billing']['post_code']?><br><?php echo $billing['Billing']['city']."," .$billing['Billing']['country']?></td>
         <?php } else { ?>
     <td align = "left" style='width:50px;'><?php echo $orderDetails['User']['company_name']?><br><?php echo $orderDetails['User']['first_name']." " .$orderDetails['User']['last_name']?><br><?php echo $orderDetails['User']['address']."," .$orderDetails['User']['post_code']?><br><?php echo $orderDetails['User']['city']."," .$orderDetails['User']['country']?></td>
               <?php } ?>
                            </tr>               
                            
             </table>
                        
                    </div>                    
                </div>
            </div>
        </div>




