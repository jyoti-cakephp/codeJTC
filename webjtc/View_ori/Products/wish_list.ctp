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
<div class="row">
    <?php if(!empty($userId)){ ?> 
    <?php if(!empty($wishData)){ ?> 
<div class="col-md-12 product-container detail">
 <div style="color:red;text-align:center;margin-left:-30px;  font-size: 18px;"><?php echo $this->Session->flash(); ?></div>
<p class="col-md-12 confirm-head"><strong>My Wishlist</strong></p>

  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th  class=" cart-fields-txt">Product</th>
              <th  class=" cart-fields-txt"></th>
              <th  class="cart-fields-txt">No of Packs</th>
<!--              <th style="width:14%" class="text-center cart-fields-txt">Product Price</th>-->
              <th  class=" cart-fields-txt">Add to Cart</th>
              <th  class=" cart-fields-txt">Remove</th>
            </tr>
          </thead>
          <tbody>
              <?php  $total = 0; foreach($wishData as $result) { ?>
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-4 img-col"><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'productDetail',$result['Product']['id'],$result['Wishlist']['size'])) ?>" > <?php echo $this->html->image('product1/50_' . $result['Product']['ProductImage'][0]['image'], array('class'=>'img-responsive')); ?></a></div>
                  <div class="col-sm-8">
                    <h4 class="nomargin">
                  <a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'productDetail',$result['Product']['id'],$result['Wishlist']['size'])) ?>" >      
                        <?php echo $result['Product']['product_title'];?></a></h4>
                    <p><?php echo $result['Product']['short_description'];?></p>
                  </div>
                </div>
              </td>
            <td data-th="Price" class="">
              
                </td>
                  <input type="hidden" id="size_<?php echo  $result['Wishlist']['id'];?>" value=" <?php echo $result['Size']['id']?>">
<!--                 <td data-th="Size" class="text-center" id="size_<?php echo  $result['Wishlist']['id'];?>" style="display:none;">
              <?php //echo $result['Size']['id']?>
                </td>-->
               <td data-th="Quantity" class="text-center">
                <input type="text"  class="form-control text-center" style="width:20%;" readonly='true' value="<?php echo $result['Wishlist']['quentity'];?>" id="num_<?php echo  $result['Wishlist']['id'];?>">  
              </td>
<!--   <td data-th="Quantity" class="text-center">
<input type="number" class="form-control text-center" value="<?php //echo $result['Wishlist']['quentity'];?>" id="productnum_<?php echo $result['Wishlist']['id'];?>" onblur="updatequentity(<?php //echo $result['Wishlist']['id'];?>)" value="1"  min="1"/>          
 </td>            -->
<!--<td data-th="Price" class="text-center" id="price_<?php //echo  $result['Wishlist']['id'];?>"><?php //echo $result['Wishlist']['price'];?></td>-->
          <td data-th="Subtotal" class="text-center"><button type="submit" onclick="addBasket(<?php echo  $result['Wishlist']['id'];?>,<?php echo  $result['Product']['id'];?>);" class="btn btn-success btn-block check-out-btn">Add to Cart <i class="fa fa-angle-right"></i></button></td>
 <td class="actions text-center" data-th="">
                <a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'deleteItem', $result['Wishlist']['id']))?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>  
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
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong></strong></td>
              <td><i class="fa fa-angle-right"></i></td>
            </tr>
          </tfoot>
        </table>
</div>
    <?php }else{ ?>
    <div class="product-container detail">
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;">There is no product in wishlist</div> 
    </div>
      <?php } ?>
     <?php }else{ ?>
    <div class="product-container detail">
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;">At this time user not login</div> 
    </div>
   <?php } ?>
</div> 
    
</div>

<script>
        function addBasket(id,pid){
        var quentity = $("#num_"+id).val(); 
           //alert(quentity);
           //alert(pid);
                    var newval = isNaN(quentity);
       if (quentity < 1) {
       alert('Product quantity can not be 0');
      return false;
  }else if(newval){
      alert('Please enter only numbers');
      return false;
      
  }
        //   var price = window.document.getElementById("price_"+id).textContent;
           //alert(price);
        //   var size = window.document.getElementById("size_"+id).val;
           
           var size = $('#size_'+id).val();
           //alert(size);
            if(quentity==""){
              alert("Please select quentity");
              return false;
          }

        $.ajax({
               url: SITEPATH +"carts/addWish/"+pid,
               data:{
                quentity:quentity,   
               // price:price,
                size:size
               },
               type:"POST",
               success:function(result){
                   //alert(result);
                   if(result == 1){
                       alert('This product is saved in cart.');
                       window.location.href = SITEPATH + "carts/index/";
                     } else {
                    if (result == 2) {
                        alert('This product is already added in cart');
                        window.location.reload();
                    }   
                   }
               }
           });
        }
        
      function getPrice(){
            var price = $("#price").val();
            var number = $("#num").val();
            var total = price * number;
            $("#totalprice").html(total);
        }  
        
        function preproduct(){
            alert('This product is already added in cart');
            return false;
        }
        
        </script> 
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



