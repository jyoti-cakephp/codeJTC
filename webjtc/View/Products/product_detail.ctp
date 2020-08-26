<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<?php echo $this->html->script('okzoom.js'); ?>

<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    
</script>
<script>
    var dd = $.noConflict();
</script>

<br><br>
<div class="container">

    <div class="row">

        <figure class="right-banner-boy2">
            <?php echo $this->html->image('banner-rightside-boy.png', array('class' => 'img-responsive')) ?>
        </figure>     
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-12">

<!--            <div class="up-to"><?php //echo $size['Size']['product_size'] ?></div>-->

            <div class="col-md-12 product-container detail">

                <!--productrow1-->
                <div class="row">

                    <div class="col-md-5 product-detail">
                        <div class="pin text-center">
                            <?php echo $this->html->image('pin.png'); ?>
                        </div>
                        <h1 class="heading1 text-center"><?php echo $productDetail['Product']['product_title'] ?></h1>
                        <div class="text-center">
                            <p class="prod-name"><?php echo $productDetail['Product']['product_type'] ?></p>
                            <p class="prod-id"><?php //echo $productDetail['Product']['product_code'] ?></p>
                            <div class="keyfeat"><?php echo $productDetail['Product']['description'] ?>
                            </div>
                            <p class="prod-id2"><span class="product-detail-price">Brand :<?php echo $productDetail['Brand']['brand_name'] ?></span></p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <label for="sel1" style="margin-top:5px; font-size:16px;">Select No of Packs:</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-control sell"  id="size">
                                            <option value="">Select No of packs</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <?php if (!empty($userId)) { ?>  
    <!--                                <p class="prod-id2"><span class="product-detail-price">Price :&nbsp;£<?php //echo $productDetail['Product']['product_price']  ?></span></p>-->
                            <?php } else { ?>
                            <?php } ?>


                            <?php if (!empty($userId)) { ?>
                                <?php if ($productDetail['Product']['new_flag'] == 0) { ?>
                                    <div class="col-md-12 cart text-center login-to-see-btn add-2-cart">
                                        <button type="button" onclick="addBasket(<?php echo $productDetail['Product']['id']; ?>,<?php echo $size['Size']['id']; ?>);" class="add-to-cart-btn"> <span class="glyphicon glyphicon-shopping-cart det"></span> ADD TO CART</button>

                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-12 cart text-center login-to-see-btn add-2-cart">
                                        <button type="button" onclick="addBasket1();" class="add-to-cart-btn"> <span class="glyphicon glyphicon-shopping-cart det"></span> ADD TO CART</button>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 cart text-center login-to-see-btn wish">
                                    <button type="button" onclick="addWish(<?php echo $productDetail['Product']['id']; ?>);" class="add-to-wishlist-btn"> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> ADD TO WHISHLIST</button>
                                </div>
                            <?php } else { ?> 
                                <div class="col-md-12 cart text-center login-to-see-btn add-2-cart">
                                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="$('#subid').val('<?php echo $productDetail['Product']['subcategory_id'] ?>');">LOG-IN</a>
                                </div>

                            <?php } ?>
                        </div>
                    </div>


                               
                    <div class="col-md-7"><!--right side slider-->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $i = 1;
                                foreach ($productDetail['ProductImage'] as $result) {
                                    ?>  
                                    <div class="item no-block <?php
                                    if ($i == 1) {
                                        echo "active";
                                    }
                                    ?>">
                                   <?php echo $this->html->image('product1/450_' . $result['image'], array('id' => 'example')); ?>
                    
                <pre style="display:none;">
$('img').okzoom({
  width: 2000,
  height: 2000,
  round: true,
  background: "#fff",
  backgroundRepeat: "repeat",
  shadow: "0 0 5px #000",
  border: "1px solid black"
});</pre>
           

                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control det-cont-left" href="#carousel-example-generic" role="button" data-slide="prev">
<?php echo $this->html->image('left-control-prod-detail.png', array('class' => 'glyphicon')); ?>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control det-cont-right" href="#carousel-example-generic" role="button" data-slide="next">
<?php echo $this->html->image('right-control-prod-detail.png', array('class' => 'glyphicon')); ?>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>


                </div><!--product-row-->
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="price" value="<?php echo $productDetail['Product']['product_price']; ?>">
<!--<input type="hidden" id="size1" value="<?php //echo $size['Size']['id'];   ?>">-->

<script>
    function addBasket(id, sid) {
        
        var price = $("#price").val();
         var quentity = $("#size").val();
         
        if (quentity == "") {
            alert("Please select No of packs");
            return false;
        }
        


        $.ajax({
            url: SITEPATH + "carts/addCart/" + id,
            data: {
                quentity: quentity,
                price: price,
               
            },
            type: "POST",
            success: function(result) {
                if (result == 1) {
                    window.location.href = SITEPATH + "carts/index/";
                } else {
                    if (result == 2) {
                        alert('This product is already added in cart');
                    }
                }
            }
        });
    }
   function addBasket1() {
        alert('This product is  out of stock');
        return false;
    }

    function getPrice() {
        var price = $("#price").val();
        var number = $("#num").val();
        var total = price * number;
        $("#totalprice").html(total);
    }



</script>
<script>
    function addWish(id) {
       var price = $("#price").val();
       var  quentity = $("#size").val();
     
        if (quentity == "") {
            alert("Please select no of packs");
            return false;
        }
       

        $.ajax({
            url: SITEPATH + "products/addWishlist/" + id,
            data: {
                quentity: quentity,
                price: price,
                
            },
            type: "POST",
            success: function(result) {
                if (result == 1) {
                    window.location.href = SITEPATH + "products/wishList/";
                } else {
                    if (result == 2) {
                        alert('This product is already saved in wishlist');
                    }
                }
            }
        });
    }


    dd(function() {

        dd('#example').okzoom({
            width: 300,
            height: 300,
            border: "1px solid black",
            shadow: "0 0 5px #000"
        });

    });


</script>       
<style>
    #size_ms {
        width:90% !important;

    }
    .item.no-block img { display: inline-block;}
</style>






