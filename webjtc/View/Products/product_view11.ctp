<br><br>
<div class="container">
<div class="row">

<figure class="right-banner-boy2">
   <?php echo $this->html->image('banner-rightside-boy.png',array('class'=>'img-responsive'))?>
</figure>     
</div>
</div>

<div class="container">
      <?php if(!empty($list)){ ?> 
<div class="row">
<?php foreach ($list as $result) { ?>
    <?php if(!empty($result['ProductSize'])){ ?>
<div class="col-md-12">

<div class="up-to"><?php echo $result['Size']['product_size']?></div>

<div class="col-md-12 product-container2">

<!--productrow1-->
<div class="row">
<?php foreach($result['ProductSize'] as $product){ ?>  
   
<div class="col-md-3 product-box1 text-center">

    <?php //pr($product);?>
<a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$product['Product']['id']))?>"><?php echo $this->html->image('product/'.$product['Product']['ProductImage'][0]['image'],array('height'=>'100','width'=>'100'));?></a>
<a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$product['Product']['id']))?>"><h4 class="heading4"><?php echo $product['Product']['product_type']?></h4></a>
<h5 class="heading5"><?php echo $product['Product']['product_title']?></h5>
<?php if(!empty($userId)) { ?>
<h4 class="heading4">£&nbsp;<?php echo $product['Product']['product_price']?></h4>
<?Php } else { ?>
<?php } ?>
<div class="prod-number"><p class="idnum"><strong><?php echo $product['Product']['product_code']?></strong></p></div>
</div>
    <figure class="redirect-btn">
 <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productList',$result['ProductSize'][0]['product_size'],$result['ProductSize'][0]['product_size']))?>"><?php echo $this->html->image('redirect3.png',array('class'=>''))?></a>   
</figure>
    <?php } ?>


</div>
</div>
</div>
<?php  } }?> 
 </div>
  <?php } else { ?>
  <div class="product-container detail">
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;">No Products Available.</div> 
    </div>
  <?php } ?>
</div>
<style>
        .message1{

        font-size: 29px;
        margin-top: 150px;
        min-height: 300px;
        text-align: center;
        }
    </style>




