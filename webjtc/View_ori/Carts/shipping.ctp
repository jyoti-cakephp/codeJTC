<br><br>
<div class="container">
<div class="row">

<figure class="right-banner-boy2">
      <?php echo $this->html->image('banner-rightside-boy.png',array('class'=>'img-responsive'))?>
</figure>     

</div>
</div>

<div class="container">
<div class="row">
<div class="col-md-12 product-container detail">
<div style="color:red;text-align:center;margin-left:-30px;  font-size: 18px;"><?php echo $this->Session->flash(); ?></div>

<p class="col-md-12 confirm-head delivery"><strong>Shipping Method</strong></p>
<form>
<div class="address_holder">
<div class="address_box col-md-6">
<h1>Shipping Address:
 <a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'editShipping'));?>"> 
 <div class="edit">Edit</div></a> 
 </h1>
    <?php if(!empty($shipping)) { ?>
 <?php echo $shipping['Shipping']['company']?><br><?php echo $shipping['Shipping']['first_name']." " .$shipping['Shipping']['last_name']?><br><?php echo $shipping['Shipping']['address']."," .$shipping['Shipping']['post_code']?><br><?php echo $shipping['Shipping']['city']."," .$shipping['Shipping']['country']?>
    <?php } else { ?>
<?php echo $user['User']['company_name']?><br><?php echo $user['User']['first_name']." " .$user['User']['last_name']?><br><?php echo $user['User']['address']."," .$user['User']['post_code']?><br><?php echo $user['User']['city']."," .$user['User']['country']?>
    <?php } ?>
</div>
<div class="ch_address_box col-md-6">
<h1>Billing Address
 <a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'editBilling'));?>"> <div class="edit">Edit</div></a>
</h1>
 <?php if(!empty($billing)) { ?>
 <?php echo $billing['Billing']['company']?><br><?php echo $billing['Billing']['first_name']." " .$billing['Billing']['last_name']?><br><?php echo $billing['Billing']['address']."," .$billing['Billing']['post_code']?><br><?php echo $billing['Billing']['city']."," .$billing['Billing']['country']?>
    <?php } else { ?>
<?php echo $user['User']['company_name']?><br><?php echo $user['User']['first_name']." " .$user['User']['last_name']?><br><?php echo $user['User']['address']."," .$user['User']['post_code']?><br><?php echo $user['User']['city']."," .$user['User']['country']?>
    <?php } ?>
</div></div>

<div class="sc_row col-md-12">
<p class="prod-name">Shipping Cost</p>
<p>UK Delivery, Mainland WARNING: Invalid post code, delivery charge may vary: <span class="product-detail-price"> £ 18</span></p><br>
<p>Consignment Discount available for orders over <span class="product-detail-price"> £ 100.00</span></p>
</div>
<!--<div class="sc_row col-md-12">
<p class="prod-name">Payment Method</p>
<p>We do not take payment on-line at present, we will pick your order and contact you by e-mail when the order is ready for payment.</p>
<br>
<input type="checkbox"> Credit/Debit card via the telephone.<br>
<input type="checkbox"> Paypal.<br>
<input type="checkbox"> Bank Transfer<br>

</div>-->

<!--<div class="sc_row col-md-12">
<p class="prod-name">Message</p>
<textarea rows="6" cols="100"></textarea>
</div>-->

<div class="col-md-12">
<a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'checkoutConfirm'));?>" class="btn btn-warning cont-shop-btn pull-right"><i class="fa fa-angle-left"></i>Continue Checkout </a>
<a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'index'))?>"class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Back </a>
</div>
</form>
</div>
</div><!--col-md-12-->
</div> <!--row-->
</div><!--container-->



