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
<div class="product-container detail">

<div class="ourcontacts2">
<h3 class="contactform"> FAQ's </h3>
</div>

<!---Collapsable faq's --->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php $i=1; foreach($faq as $result){ ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne<?php echo $result['Faq']['id'];?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $result['Faq']['id'];?>" aria-expanded="<?php if($i==1){ echo"true";}else{ echo "false";}?>" aria-controls="collapseOne">
           <strong><?php echo $result['Faq']['question'];?></strong>
        </a>
      </h4>
    </div>
    <div id="collapseOne<?php echo $result['Faq']['id'];?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne<?php echo $result['Faq']['id'];?>">
      <div class="panel-body">
        <?php echo $result['Faq']['answer'];?>
      </div>
    </div>
  </div>
  <?php $i++; } ?>
  
</div>  <!---Collapsable faq's end --->
  
  
</div>
</div><!--col-md-12-->
</div> <!--row-->
</div><!--container-->



