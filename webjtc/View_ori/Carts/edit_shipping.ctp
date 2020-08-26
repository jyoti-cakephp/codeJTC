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

<p class="col-md-12 confirm-head"><strong>Delivery Information</strong></p>
<?php echo $this->Form->create('Cart',array('id'=>'shipping'));?>
<div class="address_holder">
<div class="address_box col-md-12">
<p>This is the currently selected shipping address where the items in this order will be delivered to:</p>
<strong>
 <?php if(!empty($shippingDetails)) { ?>   
 <?php echo $shippingDetails['Shipping']['company']?><br><?php echo $shippingDetails['Shipping']['first_name']." " .$shippingDetails['Shipping']['last_name']?><br><?php echo $shippingDetails['Shipping']['address']."," .$shippingDetails['Shipping']['post_code']?><br><?php echo $shippingDetails['Shipping']['city']."," .$shippingDetails['Shipping']['country']?>
<?php } else { ?>
<?php echo $user['User']['company_name']?><br><?php echo $user['User']['first_name']." " .$user['User']['last_name']?><br><?php echo $user['User']['address']."," .$user['User']['post_code']?><br><?php echo $user['User']['city']."," .$user['User']['country']?>
 <?php } ?>
</strong></div>
</div>
<div class="address_holder  name-column">
<div class="address_box col-md-12">
  <div class="form-group col-md-6">
    <label>First Name</label>
<input type="text" class="form-control"  name="data[Shipping][first_name]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['first_name']?><?php } else { ?><?php echo $user['User']['first_name']?><?php } ?>"> 
 </div>
  <div class="form-group col-md-6">
    <label>Last Name</label>
 <input type="text" class="form-control"  name="data[Shipping][last_name]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['last_name']?><?php } else { ?><?php echo $user['User']['last_name']?><?php } ?>">
  </div>
    <div class="form-group col-md-6">
    <label>E-mail</label>
   <input type="text" class="form-control"  name="data[Shipping][email]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['email']?><?php } else { ?><?php echo $user['User']['email']?><?php } ?>">
  </div>
   <div class="form-group col-md-6">
    <label>Company</label>
    <input type="text" class="form-control"  name="data[Shipping][company]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['company']?><?php } else { ?><?php echo $user['User']['company_name']?><?php } ?>">
   <br>
  </div>


<p class="col-md-12 confirm-head"><strong>Address</strong></p>
  <div class="form-group col-md-6">
    <label>Street Address</label>
     <input type="text" class="form-control"  name="data[Shipping][address]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['address']?><?php } else { ?><?php echo $user['User']['address']?><?php } ?>">
  </div>
  <div class="form-group col-md-6">
    <label>City</label>
    <input type="text" class="form-control"  name="data[Shipping][city]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['city']?><?php } else { ?><?php echo $user['User']['city']?><?php } ?>">
  </div>
   <div class="form-group col-md-6">
    <label>County/Region</label>
    <input type="text" class="form-control"  name="data[Shipping][country]"  value="<?php if(!empty($shippingDetails)) { ?><?php echo $shippingDetails['Shipping']['country']?><?php } else { ?><?php echo $user['User']['country']?><?php } ?>">
  </div>
  <div class="form-group col-md-6">
    <label>Postal Code</label>
    <input type="text" class="form-control"  name="data[Shipping][post_code]"  value="<?php if(!empty($shippingDetails)) { ?> <?php echo $shippingDetails['Shipping']['post_code']?><?php } else { ?><?php echo $user['User']['post_code']?><?php } ?>">
  </div>

</div>
</div>

<div class="col-md-12">

<a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'shipping'));?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i> Back</a>
<button type="submit" class="btn btn-warning cont-shop-btn pull-right"><i class="fa fa-angle-left"></i>Continue Checkout</button>
</div>
<?php echo $this->form->end();?>
</div>
</div> 
</div>




