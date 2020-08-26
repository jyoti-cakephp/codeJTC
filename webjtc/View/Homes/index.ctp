<div class="container">
       <div style="color:red;text-align:center;margin-left:-30px; font-size: 18px;"> <?php echo $this->Session->flash(); ?></div>
     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
 <!--  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol> -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active"><?php echo $this->html->image('banner1.jpg', array('class' => 'img-responsive banner-img')); ?>
    </div>
    <div class="item">
     <?php echo $this->html->image('banner1.jpg', array('class' => 'img-responsive banner-img')); ?>
    
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <!--<?php //echo $this->html->image('left-butterfly-control.png', array('class' => 'left-cntl img-responsive')); ?>-->
 <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
   <!--<?php //echo $this->html->image('right-butterfly-control.png', array('class' => 'right-cntl img-responsive')); ?>-->
   <span class="sr-only">Next</span>
  </a>
</div>
</div>
      <!--slider-ends-->
 <div class="container">
<div class="row">

<figure class="right-banner-boy">
  <?php echo $this->html->image('banner-rightside-boy.png', array('class' => 'img-responsive')); ?>
 </figure>     
<!--<div class="limited-offer text-center">
<p class="limited">Limited <br>Time Offer</p>
</div>-->

<!--<div class="buyonebg"></div>-->
<!--<div class="buy-one">
    Buy One Get One Free
</div>-->

</div>
</div>

<div class="container">
<div class="row cat-sect">
           <div class="col-md-3" >
               
               <div class="">
                   
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel">
    <div class="" role="tab" id="headingOne1">
      <h2 class="heading2">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
             <?php foreach($super as $result){ ?>
          <?php echo $result['SuperCategory']['super_name'];?>
             <?php } ?>
        </a>
      </h2>
    </div>
    <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
      <div class="left-sidebar">
       <ul class="left-bar" id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
        <?php foreach($super as $result){ ?>
            <?php foreach($result['Category'] as $cat){ ?> 
     <li class="dropdown"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'categoryDetail', $cat['id'])) ?>" ><?php echo $cat['category_name'];?><span class="glyphicon glyphicon-menu-right pull-right"></span></a>
     <?php if(!empty($cat['SubCategory'])){?>
         <ul class="dropdown-menu">
         
          <?php foreach($cat['SubCategory'] as $subcat){ ?>
        
          <li class="dropdown dropdown-submenu"><a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productView',$subcat['id']))?>"><?php echo $subcat['sub_category_name'];?></a>
               
        </li>
         <?php } ?>
         
       
         
        </ul>
     <?php } ?>
         <?php } ?>
    </li>
        <?php } ?>
    </ul>
      </div>
    </div>
  </div>
    <div class="panel">
    <div class="" role="tab" id="headingOne">
      <h2 class="heading2">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
         <?php foreach($super1 as $result){ ?>
          <?php echo $result['SuperCategory']['super_name'];?>
             <?php } ?>
        </a>
      </h2>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="left-sidebar">
       <ul class="left-bar" id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <?php foreach($super1 as $result){ ?>
            <?php foreach($result['Category'] as $cat){ ?>
     <li class="dropdown"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'categoryDetail', $cat['id'])) ?>" ><?php echo $cat['category_name'];?><span class="glyphicon glyphicon-menu-right pull-right"></span></a>
     <?php if(!empty($cat['SubCategory'])){?>
         <ul class="dropdown-menu">
         
          <?php foreach($cat['SubCategory'] as $subcat){ ?>
        
          <li class="dropdown dropdown-submenu"><a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productView',$subcat['id']))?>"><?php echo $subcat['sub_category_name'];?></a>
               
        </li>
         <?php } ?>
         
       
         
        </ul>
     <?php } ?>
           <?php } ?>
    </li>
        <?php } ?>
    </ul>
      </div>
    </div>
  </div>                     
                       
  <div class="panel">
    <div class="" role="tab" id="headingTwo">
      <h2 class="heading2">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Brands
        </a>
      </h2>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="left-sidebar">
        <ul class="left-bar" id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <?php foreach($brand as $result){  ?>
     <li class="dropdown"><a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'brandDetail', $result['Brand']['id'])) ?>" ><?php echo $result['Brand']['brand_name'];?></a>
   <?php } ?>
    </li>
      
    </ul>
      </div>
    </div>
  </div>
  
</div>
                   
                   
    
    
               </div>
               <br/>
              
    </div>
 <div class="col-md-9"> 
        <?php if(!empty($featureProduct)) { ?>
        <?php $i=1; foreach ($featureProduct as $result) { ?>
   
     <div class="col-md-6">
         <div class="pad-bot">
             <?php $coverImage = $this->requestAction(array('controller'=>'products','action'=>'productCoverImage',$result['Product']['id']));?>
    <?php if(!empty($coverImage)){ ?>
            <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']));?>"><?php echo $this->html->image('product1/230_'.$coverImage['ProductImage']['image']);?></a>
   <div><a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']));?>"><?php //echo $result['Product']['product_title']?></a></div>
             
    <?php }else{ ?>
            <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']));?>"><?php echo $this->html->image('product1/230_'.$result['ProductImage'][0]['image']);?></a>
   <div><a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productDetail',$result['Product']['id'],$result['ProductSize'][0]['product_size']));?>"><?php //echo $result['Product']['product_title']?></a></div>
             
             
    <?php } ?>
              
     
         </div>
         
         </div>

      <?php $i++;} ?>
        <?php } else { ?>
        <?php } ?>
    
    </div>
</div>
</div>
 <style>
    .panel {
        background: none;
    }
    .heading2 a{ color: #fff;}
</style>