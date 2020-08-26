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
<div class="row">

<p class="col-md-12 confirm-head">Confirm your order (accept terms and conditions)</p>

<div class="address_box col-md-6">
<h1>Shipping Address:</h1>
    <?php if(!empty($shipping)) { ?>
 <?php echo $shipping['Shipping']['company']?><br><?php echo $shipping['Shipping']['first_name']." " .$shipping['Shipping']['last_name']?><br><?php echo $shipping['Shipping']['address']."," .$shipping['Shipping']['post_code']?><br><?php echo $shipping['Shipping']['city']."," .$shipping['Shipping']['country']?>
    <?php } else { ?>
<?php echo $user['User']['company_name']?><br><?php echo $user['User']['first_name']." " .$user['User']['last_name']?><br><?php echo $user['User']['address']?><br><?php echo $user['User']['country']?>
    <?php } ?>
</div>
<div class="ch_address_box col-md-6">
<h1>Billing Address</h1>
<?php if(!empty($billing)) { ?>
 <?php echo $billing['Billing']['company']?><br><?php echo $billing['Billing']['first_name']." " .$billing['Billing']['last_name']?><br><?php echo $billing['Billing']['address']."," .$billing['Billing']['post_code']?><br><?php echo $billing['Billing']['city']."," .$billing['Billing']['country']?>
    <?php } else { ?>
<?php echo $user['User']['company_name']?><br><?php echo $user['User']['first_name']." " .$user['User']['last_name']?><br><?php echo $user['User']['address']?><br><?php echo $user['User']['country']?>
    <?php } ?>
</div>
</div>

<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Order summary</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed confirm">
                <thead>
                                <tr>
                      <td><strong>Item</strong></td>
<!--                      <td class="text-center"><strong>Tax %</strong></td>-->
                      <td class="text-center"><strong>Quantity</strong></td>
                     
                                </tr>
                </thead>
                <tbody>
                 <?php  $total = 0; foreach($basketdetail as $result) { ?>
                <?php $total = $total +  $result['Basket']['price']*$result['Basket']['quentity'];?>
                <?php $subtotal = $total + 5;?>    
                  <tr>
                    <td><?php echo $result['Product']['product_title'];?></td>
                     <?php 
                                      $price = $result['Basket']['price'];
                                      $quentity = $result['Basket']['quentity'];
                                      $totalprice = $price * $quentity ;
                                  ?>
<!--                    <td class="text-center">0</td>-->
<!--                    <td class="text-center">£<?php echo $totalprice;?></td>-->
                   <td class="text-center"><?php echo $result['Basket']['quentity'];?></td>  
                  </tr>
                 <?php } ?>        
                     
<!--                  <tr>
                    <td class="thick-line"></td>
                  <td class="thick-line text-center"><strong>Subtotal</strong></td>
                  
                   <td class="thick-line text-center"><strong>£ <?php //echo $total;?></strong></td>  
                  </tr>-->
<!--                  <tr>
                    <td class="no-line"></td>
                      <td class="no-line text-center shipping"><strong>Shipping</strong></td>
                  
                      <td class="no-line text-center shipping"><strong>£ 5</strong></td>
                    
                  </tr>-->
<!--                  <tr>
                    <td class="no-line"></td>
                      <td class="no-line text-center"><strong>Total</strong></td>
                       <td class="no-line text-center"><strong>£ <?php //echo $subtotal;?></strong></td>
                  
                   
                  </tr>-->
                 
                </tbody>
              </table>

              <p class="termsandcondition">
               I have read the conditions of use and I agree to them.
               <input type="checkbox" id="chk">
                <div id="messagechk1" style="color:red; font-size:18px;"></div>
               </p>

              <div class="col-md-12">
                  
                  
                  
                  <a href="javascript:void(0)" class="btn btn-warning cont-shop-btn pull-right" onclick="submitOrder();"><i class="fa fa-angle-left"></i> Confirm Order</a>
<a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'shipping'));?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i> Back</a>
</div>

            </div>
          </div>
        </div>
      </div>
    </div>

</div>



</div>
</div>
<input type="hidden" id="price" value="<?php echo $subtotal;?>">

<script>
    function submitOrder() {
    var price = $("#price").val();   
    //alert(price);   
    //var product = window.document.getElementById("product").textContent;
    //alert(product);
    var checked = $('#chk').is(":checked");
    //alert(checked);
     if (checked == 0) {
            $('#messagechk1').html('You must agree to the terms & conditions.').fadeIn().delay(3000).fadeOut();
            return false;
        }
     $.ajax({
               url: SITEPATH +"carts/addOrder/",
               data:{
                 price:price,
                // product:product
               },
               type:"POST",
               success:function(result){
               //alert(result);
               window.location.href =  SITEPATH + "carts/thankYou/" + result;
                   }
              
           });    
        

    }
   
</script>






