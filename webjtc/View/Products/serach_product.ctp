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

<div class="col-md-12 product-container">

<!--productrow1-->
<div class="row">
 <?php if (!empty($searchproduct)) { ?>  
    <?php foreach ($searchproduct as $result) { ?>
<div class="col-md-3 product-box1 text-center">
<a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id']))?>"><?php echo $this->html->image('product/'.$result['ProductImage'][0]['image'],array('height'=>'100','width'=>'100'));?></a>
<a href="#"><h4 class="heading4"><?php echo $result['Product']['product_type']?></h4></a>
<h5 class="heading5"><?php echo $result['Product']['product_title']?>(Newborn-6 Months)</h5>
<?php if(!empty($userId)) { ?>
<h4 class="heading4">£&nbsp;<?php echo $result['Product']['product_price']?></h4>
<?Php } else { ?>
<?php } ?>
<div class="prod-number"><p class="idnum"><strong><?php echo $result['Product']['product_code']?></strong></p></div>
</div>
    <?php } ?>
 <?php } ?>
   <?php if (!empty($searchcat)) { ?>  
    <?php foreach ($searchcat as $result) { ?>
<div class="col-md-3 product-box1 text-center">
<a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id']))?>"><?php echo $this->html->image('product/'.$result['ProductImage'][0]['image'],array('height'=>'100','width'=>'100'));?></a>
<a href="#"><h4 class="heading4"><?php echo $result['Product']['product_type']?></h4></a>
<h5 class="heading5"><?php echo $result['Product']['product_title']?>(Newborn-6 Months)</h5>
<?php if(!empty($userId)) { ?>
<h4 class="heading4">£&nbsp;<?php echo $result['Product']['product_price']?></h4>
<?Php } else { ?>
<?php } ?>
<div class="prod-number"><p class="idnum"><strong><?php echo $result['Product']['product_code']?></strong></p></div>
</div>
    <?php } ?>
 <?php } ?>
    <?php
if( count($searchproduct) <= 0 && count($searchcat) <= 0){
?>
<div class="message" style="height: 400px;"> There is no matching records avaliable</div>
<?php } ?>
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
  <style>
        .message{

        font-size: 29px;
        margin-top: 150px;
        min-height: 300px;
        text-align: center;
        height: 400px;
    }
</style>