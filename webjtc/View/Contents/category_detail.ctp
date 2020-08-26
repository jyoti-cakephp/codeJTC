<div class="container">
    <div class="row">

        <figure class="right-banner-boy2">
           <?php echo $this->html->image('banner-rightside-boy.png', array('class' => 'img-responsive')); ?>
        </figure>     

    </div>
</div>
<div class="container">
    <div class="row">

        <div class="col-md-12">
              <?php foreach($sizeName as $result) { ?>
            <div class="up-to"><?php echo $result['Size']['product_size'];?></div>
              <?php } ?>

            <div class="col-md-12 product-container2">

                <?php if(!empty($productDetails)){ ?>
                <div class="row">
                <?php foreach($productDetails as $result){ ?>
                    <div class="col-md-3 product-box1 text-center">
                        <?php $coverImage = $this->requestAction(array('controller'=>'products','action'=>'productCoverImage',$result['Product']['id']));?>
                        <?php if(!empty($coverImage)){ ?>
                        
                        <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']))?>"><?php echo $this->html->image('product1/230_'.$coverImage['ProductImage']['image']);?></a>
                        <?php }else{ ?>
                         <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']))?>"><?php echo $this->html->image('product1/230_'.$result['ProductImage'][0]['image']);?></a>
                        <?php } ?>
                         <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']))?>"><h4 class="heading4"><?php echo $result['Product']['product_type'];?></h4></a>
                         <h5 class="heading5"><?php echo $result['Product']['product_title'];?></h5>
                         <div class="prod-number"><p class="idnum"><strong><?php echo $result['Product']['product_code'];?></strong></p></div>
                       </div>
                <?php } ?>
                    

                    

                    

<!--                    <figure class="redirect-btn">
                        <a href="#"><?php echo $this->html->image('redirect3.png');?></a>
                    </figure>-->

                </div>
                <?php }else{ ?>
                
                
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;">No Product Available.</div> 
      
                <?php } ?>
            </div>
        </div>
    </div>

    <br><br>
    <br><br>
    <br><br>
</div>