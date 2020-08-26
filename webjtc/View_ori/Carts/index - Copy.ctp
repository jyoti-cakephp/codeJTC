<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<br><br>
<div class="container">
<div class="row">
<figure class="right-banner-boy2">
  <?php echo $this->html->image('banner-rightside-boy.png',array('class'=>'img-responsive'))?>
</figure>     
</div>
</div>
<div class="container">
    <?php if(!empty($basketData)){ ?> 
<div class="row">
<div class="col-md-12 product-container detail">
 <div style="color:red;text-align:center;margin-left:-30px;  font-size: 18px;"><?php echo $this->Session->flash(); ?></div>
<p class="col-md-12 confirm-head"><strong>My Cart</strong></p>

  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th  class=" cart-fields-txt">Product</th>
               <th  class=" cart-fields-txt">Size</th>
              <th  class="cart-fields-txt">Quantity</th>
<!--              <th style="width:14%" class="text-center cart-fields-txt">Product Price</th>
              <th style="width:18%" class="text-center cart-fields-txt">Subtotal</th>-->
              <th  class=" cart-fields-txt">Remove</th>
            </tr>
          </thead>
          <tbody>
               <?php  $total = 0; foreach($basketData as $result) { ?>
                <?php $total = $total +  $result['Basket']['price']*$result['Basket']['quentity'];?>
            <tr>
              <td data-th="Product">
                <div class="row">
               <div class="col-sm-4 img-col"><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'productDetail',$result['Product']['id'],$result['Basket']['size'])) ?>" ><?php echo $this->html->image('product1/50_' . $result['Product']['ProductImage'][0]['image'], array('class'=>'img-responsive')); ?></a></div>
                     
                  <div class="col-sm-8">
                    <h4 class="nomargin"><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'productDetail',$result['Product']['id'],$result['Basket']['size'])) ?>" ><?php echo $result['Product']['product_title'];?></a></h4>
                    <p><?php echo $result['Product']['short_description'];?></p>
                  </div>
                </div>
              </td>
                <td data-th="Price" class="">
              <?php echo $result['Size']['product_size']?>
                </td>
            <td data-th="Quantity" class="text-center">
                <a href="javascript:void(0)" class = "plus-img" onclick='subtract(this,<?php echo $result['Basket']['id'];?>)'><?php echo $this->html->image('minus.png'); ?></a>    
                <input type="text" class="form-control text-center pls-min" id="productnum_<?php echo $result['Basket']['id'];?>"  value ='<?php echo $result['Basket']['quentity'];?>' onblur="updatequentity(<?php echo $result['Basket']['id'];?>)">
               
                <a href="javascript:void(0)" class = "plus-img2" onclick='add(this,<?php echo $result['Basket']['id'];?>)'><?php echo $this->html->image('plus.png', array('class' => '')); ?></a>
              
             </td>  
<!--   <div  id="loader_login" style='display:none;'>
                                        <?php //echo $this->html->image('ajax-loader.gif', array('class' => 'loaderapply')); ?>
                                    </div> -->
          
<!--      <td data-th="Price" class="text-center">£<?php //echo $result['Basket']['price'];?></td>        -->
                 <?php 
                                      $price = $result['Basket']['price'];
                                      $quentity = $result['Basket']['quentity'];
                                      $totalprice = $price * $quentity ;
                                  ?>
              
<!--              <td data-th="Subtotal" class="text-center">£<?php //echo $totalprice;?></td>-->
            
<td class="actions" data-th="">
                <a href="<?php echo $this->html->url(array('controller' => 'carts', 'action' => 'deleteItem', $result['Basket']['id']))?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>  
              </td> 
              
              
              
            </tr>
<?php } ?>
             
          </tbody>
          <tfoot>
<!--            <tr class="visible-xs">
              <td class="text-center"><strong>Total 3.98</strong></td>
            </tr>-->
            <tr>
              <td><a href="<?php echo $this->html->url(array('controller'=>'contents','action'=>'dashboard'));?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td class="hidden-xs"></td>
              <td></td>
<!--                <td class="text-center"><strong>Total £<?php //echo $total;?></strong></td>-->
    <td><a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'shipping')); 
       ?>" class="btn btn-success btn-block check-out-btn">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>



</div><!--col-md-12-->
</div> <!--row-->
         <?php }else{ ?>
  <div class="product-container detail">
      <?php if(!empty($basketData)) { ?>
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;"><?php echo $this->Session->flash(); ?></div>
      <?php } else { ?>
        <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;">Your shopping cart is empty.</div>
      <?php } ?>
    </div>
            <?php } ?>
</div>
<script>
    function add(obj,id){
 var val = $("#productnum_"+id).val();
  val++;
   $.ajax({
   url: '<?php echo SITEPATH; ?>' + "carts/increaseQuantity/" + id,
   data: {
       val:val,
   },
   type: "POST",
   success: function(result) {
       if(result == 1){
            window.location.reload();
       }
  }
     });
}

function subtract(obj,id){
 var val = $("#productnum_"+id).val();
  val--;
  if (val < 1) {
      return false;
  }else{
    $.ajax({
   url: '<?php echo SITEPATH; ?>' + "carts/decreaseQuantity/" + id,
   data: {
       val:val,
   },
   type: "POST",
   success: function(result) {
       if(result == 1){
            window.location.reload();
       }
  }
     });  
  }
}
    
    function updatequentity(id){
    var val = $("#productnum_"+id).val();
    var newval = isNaN(val);
       if (val < 1) {
     alert('Product quantity can not be 0');
      return false;
  }else if(newval){
      alert('Please enter only numbers');
      return false;
      
  }else{
    $.ajax({
        url:SITEPATH+"carts/updateQuentity/"+id,
        data:"data[que]="+val,
        type:"POST",
         beforeSend: function() {
                $('#loader_login').css('display', 'block');
            },
            complete: function() {
                $('#loader_login').css('display', 'none');
            },
        success:function(result){
            if(result == 1){
                window.location.reload();
            }
        }
    });
    }
    }
    </script>
<style>
        .message1{

        font-size: 29px;
        margin-top: 150px;
        min-height: 300px;
        text-align: center;
        }
        .form-control.text-center.pls-min {width: 48%; float: left; margin-left: 0;  margin-top: 10px; }
 </style>



