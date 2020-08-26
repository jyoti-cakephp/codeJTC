<br><br>
<div class="container">
<div class="row">

<figure class="right-banner-boy2">
     <?php echo $this->html->image('banner-rightside-boy.png',array('class'=>'img-responsive'))?>
</figure>     

</div>
</div>

<!--content-->
<div class="container">
     <div class="col-md-12" id="printdivcontent">
<div class="row">
<div class="col-md-12 product-container detail">

<div class="order-details-top">
<div class="row">
    <p class="col-md-6 confirm-head"><strong class="processing">Order# - &nbsp;</strong><strong><?php echo $orderDetails['Order']['order_number'] ?></strong>  <span class="processing"> <?php if($orderDetails['Order']['order_status']=="0") { ?>
<?php echo "Pending" ?>
        <?php } else { ?>
 <?php echo "Completed" ?>
  <?php } ?>      
    </span></p>
<div class="col-md-6">
<p class="text-right processing shownum pull-right">
<!--    <a href="<?php //echo $this->html->url(array('controller'=>'carts','action'=>'editIndex',$orderDetails['Order']['id']));?>">Edit Order</a> | -->
    <a href="javascript:void(0)" onclick="PrintDiv();">Print Order</a></p>
</div>
</div>
</div>

<div class="row">
<p class="col-md-12 order-date">ORDER DATE : <?php echo date('d-m-Y',strtotime($orderDetails['Order']['created']));?></p>
<div class="address_holder">
<div class="address_box col-md-6">
<h1>Shipping Address:
 <!--<a href="shipping-edit.html"> 
  <div class="edit">Edit</div></a>  -->
 </h1><?php if(!empty($shipping)) { ?>                       
<?php echo $shipping['Shipping']['company']?><br><?php echo $shipping['Shipping']['first_name']." " .$shipping['Shipping']['last_name']?><br><?php echo $shipping['Shipping']['address']."," .$shipping['Shipping']['post_code']?><br><?php echo $shipping['Shipping']['city']."," .$shipping['Shipping']['country']?>
         <?php } else { ?>
 <?php echo $orderDetails['User']['company_name']?><br><?php echo $orderDetails['User']['first_name']." " .$orderDetails['User']['last_name']?><br><?php echo $orderDetails['User']['address']."," .$orderDetails['User']['post_code']?><br><?php echo $orderDetails['User']['city']."," .$orderDetails['User']['country']?>
               <?php } ?>
 </div>

<div class="ch_address_box col-md-6">
<h1>Billing Address:
 <!-- <a href="billing-edit.html"> <div class="edit">Edit</div></a> -->
</h1>
 <?php if(!empty($billing)) { ?>                     
  <?php echo $billing['Billing']['company']?><br><?php echo $billing['Billing']['first_name']." " .$billing['Billing']['last_name']?><br><?php echo $billing['Billing']['address']."," .$billing['Billing']['post_code']?><br><?php echo $billing['Billing']['city']."," .$billing['Billing']['country']?>
         <?php } else { ?>
   <?php echo $orderDetails['User']['company_name']?><br><?php echo $orderDetails['User']['first_name']." " .$orderDetails['User']['last_name']?><br><?php echo $orderDetails['User']['address']."," .$orderDetails['User']['post_code']?><br><?php echo $orderDetails['User']['city']."," .$orderDetails['User']['country']?>
               <?php } ?>
</div>
</div>
</div>
<br/>
<div class="order-details-top">
<div class="row">
<p class="col-md-12 confirm-head"><strong>Items Ordered</strong></p>
</div>
</div>
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:40%" class="cart-fields-txt">Product</th>
<!--              <th style="width:20%" class="text-center cart-fields-txt">Price</th>-->
              <th style="width:20%" class="cart-fields-txt text-center">Quantity</th>
<!--              <th style="width:20%" class="text-center cart-fields-txt">Subtotal</th>-->
            </tr>
          </thead>
          <tbody>
               <?php  $total = 0; foreach($productName as $result) { ?>
                <?php $total = $total +  $result['Basket']['price']*$result['Basket']['quentity'];?>
                <?php $subtotal = $total + 5;?> 
            <tr>
              <td data-th="Product">
                  
                <div class="row">
               
                  <div class="col-md-12">
                    <h4 class="nomargin"><?php echo $result['Product']['product_title']; ?></h4>
                  </div>
                </div>
                 
              </td>
<!--              <td data-th="Price" class="text-center">
                 £<?php //echo $result['Basket']['price'];?>
              </td>-->
              <td data-th="Quantity" class="text-center">
               <?php echo $result['Basket']['quentity']; ?>
              </td>
<!--              <td data-th="Subtotal" class="text-center">  <?php 
//                                      $price = $result['Basket']['price'];
//                                      $quentity = $result['Basket']['quentity'];
//                                      $totalprice = $price * $quentity ;
                                  ?> 
                  
                £<?php //echo $totalprice;?>  </td>-->
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
         </tfoot>
        </table>
<a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'myOrder'));?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Back to My Orders</a>
</div>
</div> 
</div>          
</div>
<script>
        function PrintDiv() {
        var divToPrint = document.getElementById('printdivcontent');
        var popupWin = window.open('', '_blank', 'width=500,height=400,bottom=200');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>

