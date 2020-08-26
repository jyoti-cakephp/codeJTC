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
<div class="col-md-12">
<!--<div class="up-to"><?php //echo $productDetail['Size']['product_size']?></div>-->
<div class="col-md-12 product-container detail">

<div class="row">
<div class="col-md-4 product-detail">
<div class="pin text-center"> <?php echo $this->html->image('pin.png');?>
</div>
<h1 class="heading1 text-center"><?php echo $productDetail['Product']['product_type']?></h1>
<div class="text-center">
<p class="prod-name"><?php echo $productDetail['Product']['product_title']?></p>
<p class="prod-id"><?php echo $productDetail['Product']['product_code']?></p>
<?php echo $productDetail['Product']['description']?>
<p class="prod-id2">Sky (Pack Of &nbsp;<?php echo $countproduct ?>)
<?php if(!empty($userId)) { ?>    
    <span class="product-detail-price"> =&nbsp;£<?php echo $productDetail['Product']['product_price']?></span>
 <?php } else { ?>
  <?php } ?>
</p>
<?php if(!empty($userId)) { ?>
 <div class="row">
 <div class="col-md-2"></div>
 <p class="col-md-4 text-right .cart-fields-txt"><strong class="qty">Quantity</strong></p>
 <div class="col-md-4">
 <input type="number"  class="form-control text-center" value="1" id="num" min="1"/>   
</div>
  <div class="col-md-2"></div>
 </div>
<?php } else { ?>
  <?php } ?>
<br>
<br>
<div class="col-md-9 col-md-offset-3 cart text-center login-to-see-btn">
          <?php if(!empty($userId)) { ?>
    <a href="javascript:void(0)"  onclick="addBasket(<?php echo $productDetail['Product']['id'];?>);"><span class="glyphicon glyphicon-shopping-cart det"></span> ADD TO CART</a>
  <?php } else { ?>   
      <a href="#" data-toggle="modal" data-target="#mylogin" onclick="$('#subid').val('<?php echo $productDetail['Product']['subcategory_id']?>');">LOG-IN TO SEE PRICES</a>
    <?php } ?>
            </div>
</div>
</div>
<div class="col-md-7 col-md-offset-1">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 <div class="carousel-inner" role="listbox">
      <?php $i=1; foreach($productDetail['ProductImage'] as $result) { ?>
    <div class="item <?php if($i == 1){ echo "active";}?>">
        <?php echo $this->html->image('product/'.$result['image'],array('class'=>'img-responsive'));?>
    </div>
    <?php $i++; } ?>
  </div>

<a class="left carousel-control det-cont-left" href="#carousel-example-generic" role="button" data-slide="prev">
   <?php echo $this->html->image('left-control-prod-detail.png',array('class'=>'glyphicon'));?>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control det-cont-right" href="#carousel-example-generic" role="button" data-slide="next">
  <?php echo $this->html->image('right-control-prod-detail.png',array('class'=>'glyphicon'));?>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>
</div>
 </div>
</div>
  <input type="hidden" id="price" value="<?php echo $productDetail['Product']['product_price'];?>">
<div class="modal fade" id="mylogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Sign In or Register at <?php echo $this->html->image('register-logo.png'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 border-form">
                        <h4 class="modal-title left signin-reg text-center" id="myModalLabel">Sign In</h4><br>
                        <form class="form-horizontal">         
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username"  name="data[User][username]"  value="<?php
                                    if (isset($_COOKIE['username'])) {
                                        echo $_COOKIE['username'];
                                    }
                                    ?>"  placeholder="Email Id">
                                </div>
                                <div id="uname" style="color:red;margin-left:20%"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password"  name="data[User][password]" value="<?php
                                    if (isset($_COOKIE['password'])) {
                                        echo $_COOKIE['password'];
                                    }
                                    ?>" placeholder="Password">
                                </div>
                                <input type="hidden" id="subid" >
                                <div id="pwd" style="color:red;margin-left:20%"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $this->form->input('rememberMe', array('label' => false, 'div' => false, 'type' => 'checkbox', 'id' => 'remberme')); ?>
                                            Remember me    

                                    <span class="forget-pass"><a type="submit" data-toggle="modal" data-target="#myModal3">Forgot password?</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" onclick="chekquery1(<?php echo $id?>);" class="btn btn-default">Submit</button>                   <div  id="loader_login" style='display:none;'>
                                        <?php echo $this->html->image('ajax-loader.gif', array('class' => 'loaderapply')); ?>
                                    </div> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="modal-title signin-reg2 text-center" id="myModalLabel">New User Here</h4><br>
                        <form class="form-horizontal">
                            <p class="text-left reg-free">Registration is free and easy!</p>
                            <ul class="new-user">
                                <li>Faster checkout</li>
                                <li>Save multiple shipping addresses</li>
                                <li>View and track orders and more</li>
                            </ul>

                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <a type="submit" class="btn btn-default reg" data-toggle="modal" data-target="#myModal2"> Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function chekquery1(id) {
   //alert("hello");
        var user = $("#username").val();
        var pass = $("#password").val();
        var remember = $("#remberme").val();
        var subid = $("#subid").val();
        //alert(subid);
        if (user == '') {
            $("#uname").html('Email Id should not be blank').fadeIn().delay(3000).fadeOut();
            return false;
        }
        if (pass == '') {
            $("#pwd").html('Password should not be blank').fadeIn().delay(3000).fadeOut();
            return false;
        }

        $.ajax({
            url: SITEPATH + "users/login/",
            data: {
                user: user,
                pass: pass,
                remember: remember,
            },
            type: "POST",
            beforeSend: function() {
                $('#loader_login').css('display', 'block');
            },
            complete: function() {
                $('#loader_login').css('display', 'none');
            },
            success: function(result) {
                //alert(result);
             if (result == 0) {
                    alert("please enter valid username and password");
                } else {
                    window.location.href = SITEPATH + "products/productView/"+subid;
                }
				if (result == 2) {
                  alert("User account is not activated by admin");
               } 
            }
        });
    }


</script> 
    <script>
        function addBasket(id){
           var quentity = $("#num").val(); 
           //alert(quentity);
           var price = $("#price").val();
           //alert(price);
            if(quentity==""){
              alert("Please select quentity");
              return false;
          }
         
    
        $.ajax({
               url: SITEPATH +"carts/addCart/"+id,
               data:{
                quentity:quentity,   
                price:price
               },
               type:"POST",
               success:function(result){
                   if(result == 1){
                       window.location.href = SITEPATH +"carts/index/";
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
        
      
        
        </script>

