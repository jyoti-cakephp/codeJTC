<br><br>
<meta http-equiv="refresh" content="10;url=http://jtc.sdssoftltd.co.uk/" />
<div class="container">
<div class="row">

<figure class="right-banner-boy2">
   <?php echo $this->html->image('banner-rightside-boy.png',array('class'=>'img-responsive'))?>
</figure>     

</div>
</div>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="product-container detail">
<div class="ourcontacts3 text-center order-receive">
<h3 class="order-receive-txt"> YOUR ORDER HAS BEEN RECEIVED   <?php echo $this->html->image('tick_green.png',array('height'=>'32px','width'=>'32px','class'=>'tickimg'))?></h3>
</div>
<h3 class="text-center thank"> THANK YOU FOR YOUR PURCHASE </h3>
<p class="text-center ordernois">Your Order # is : <span class="ord-no"><?php echo $orderDetails['Order']['order_number'];?></span></p>
<div class="text-center cont-shping"><a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index')) ?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Continue Shopping</a></div>
</div>
</div>
</div> 
</div>
   



