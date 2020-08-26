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
 <div style="color:red;text-align:center;margin-left:-30px;  font-size: 18px;"> <?php echo $this->Session->flash(); ?></div>
<p class="col-md-12 confirm-head"><strong>My Cart</strong></p>

  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%" class="text-center cart-fields-txt">Product</th>
              <th style="width:14%" class="text-center cart-fields-txt">Price</th>
              <th style="width:8%" class="cart-fields-txt">Quantity</th>
              <th style="width:18%" class="text-center cart-fields-txt">Subtotal</th>
              <th style="width:10%" class="text-left cart-fields-txt">Remove</th>
            </tr>
          </thead>
          <tbody>
               <?php  $total = 0; foreach($basketData as $result) { ?>
                <?php $total = $total +  $result['Basket']['price']*$result['Basket']['quentity'];?>
            <tr>
              <td data-th="Product">
                <div class="row">
               <div class="col-sm-4 img-col"> <?php echo $this->html->image('product/' . $result['Product']['ProductImage'][0]['image'], array('class'=>'img-responsive','height'=>'136','width'=>'150')); ?></div>
                     
                  <div class="col-sm-8">
                    <h4 class="nomargin"><?php echo $result['Product']['product_title'];?></h4>
                    <p><?php echo $result['Product']['short_description'];?></p>
                  </div>
                </div>
              </td>
              <td data-th="Price" class="text-center">£<?php echo $result['Basket']['price'];?></td>
              <td data-th="Quantity" class="text-center">
<input type="number" class="form-control text-center" value="<?php echo $result['Basket']['quentity'];?>" id="productnum_<?php echo $result['Basket']['id'];?>" onblur="updatequentity(<?php echo $result['Basket']['id'];?>)"  min="0"/>          
                
                
              </td>
                 <?php 
                                      $price = $result['Basket']['price'];
                                      $quentity = $result['Basket']['quentity'];
                                      $totalprice = $price * $quentity ;
                                  ?>
              
              <td data-th="Subtotal" class="text-center">£<?php echo $totalprice;?></td>
            
<td class="actions text-center" data-th="">
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
              <td><a href="<?php echo $this->html->url(array('controller'=>'homes','action'=>'index'));?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>Total £<?php echo $total;?></strong></td>
    <td><a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'shipping')); 
       ?>" class="btn btn-success btn-block check-out-btn">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>



</div><!--col-md-12-->
</div> <!--row-->
         <?php }else{ ?>
   
    <div class="product-container detail">
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 18px;"> <?php echo $this->Session->flash(); ?></div> 
    </div>
            <?php } ?>
</div><!--container-->
<script>
    function updatequentity(id){
    var val = $("#productnum_"+id).val();
    var newval = isNaN(val);
       if (val < 1) {
       alert('Please enter value must be greater than 1');
      return false;
  }else if(newval){
      alert('Please enter only numbers');
      return false;
      
  }else{
    $.ajax({
        url:SITEPATH+"carts/updateQuentity/"+id,
        data:"data[que]="+val,
        type:"POST",
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
        
 </style>




