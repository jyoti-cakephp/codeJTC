<br><br>
<div class="container">
<div class="row">

<figure class="right-banner-boy2">
  <?php echo $this->html->image('banner-rightside-boy.png',array('class'=>'img-responsive'))?>
</figure>     
<!-- <div class="limited-offer text-center">
<p class="limited">Limited <br>Time Offer</p>
</div>

<div class="buyonebg"></div>
<div class="buy-one">
    Buy One Get One Free
</div>
 -->
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php foreach ($productList as $result) { ?>
    <?php if(!empty($result['ProductSize'])){ ?>
<div class="up-to"><?php echo $result['Size']['product_size']?></div>

<div class="col-md-12 product-container">

<!--productrow1-->
<div class="row">
    <?php foreach($result['ProductSize'] as $product){ ?> 
<div class="col-md-3 product-box1 text-center">
<a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$product['Product']['id'],$result['ProductSize'][0]['product_size']))?>"><?php echo $this->html->image('product1/230_'.$product['Product']['ProductImage'][0]['image']);?></a>   
<a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$product['Product']['id'],$result['ProductSize'][0]['product_size']))?>"><h4 class="heading4"><?php echo $product['Product']['product_type']?></h4></a>
<h5 class="heading5"><?php echo $product['Product']['product_title']?></h5>
<?php //if(!empty($userId)) { ?>
<!--<h4 class="heading4">£&nbsp;//<?php echo $product['Product']['product_price']?></h4>-->
<?Php //} else { ?>
<?php //} ?>
<div class="prod-number"><p class="idnum"><strong><?php echo $product['Product']['product_code']?></strong></p></div>
</div>
    <?php } ?>
<?php } } ?>
</div>

<div class="text-center">
       <tfoot>
                        <tr>
                        <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
</div>
<!--pagination-end-->

</div>

</div>
 </div>
</div>

<style>
 .portlet > .portlet-title > .pagination.pagination-sm {
  float: right !important;
  display: inline-block !important;
  margin: 0px;
  margin-top: -4px;
}
 ul.pagination li.current {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.428571429;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}   
    
    </style>
