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
<div class="col-md-12 product-container detail">


<div class="col-md-3">
<aside class="left-box">
<h3 class="head2">View Profile</h3>
<ul class="left-side-bar">
 <li><?php echo $this->html->image('small-butterfly-icon.png',array('class'=>''))?><a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'userAccount'));?>">Account Information</a></li>
  <li><?php echo $this->html->image('small-butterfly-icon.png',array('class'=>''))?><a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'myOrder'));?>">My Order</a></li>
  <li><?php echo $this->html->image('small-butterfly-icon.png',array('class'=>''))?><a href="<?php echo $this->html->url(array('controller'=>'users','action'=>''));?>">Change Password</a></li>
</ul>
</aside> 
</div>
<div class="col-md-9 right-detail">
<div style="color:red;text-align: center;"><?php echo $this->Session->flash(); ?></div>
<div class="detail-top">
<h3 class="heading-user no-marg text-left">Change Password</h3>
</div>
<div class="details">
<div class="row">
<div class="col-md-12">
<div class="address_holder">
  <div class="address_box col-md-12">
 <?php echo $this->Form->create("User", array("id" => "changeid")); ?>
<div class="form-group col-md-12">
    <label  class="col-sm-4 control-label cpass">Old Password</label>
    <div class="col-sm-8">
      <input type="password" name="data[User][old_password]" class="form-control">
    </div>
  </div>
  

  <div class="form-group col-md-12">
    <label  class="col-sm-4 control-label cpass">New Password</label>
    <div class="col-sm-8">
      <input type="password" name="data[User][new_password]" id="password2" class="form-control">
    </div>
  </div>

  <div class="form-group col-md-12">
    <label  class="col-sm-4 control-label cpass">Confirm Password</label>
    <div class="col-sm-8">
      <input type="password"  name="data[User][confirm_password]" class="form-control">
    </div>
  </div>
  
  
  
  
 
   <div class="col-md-12">
                                        <div class="col-sm-4"></div>
         <div class="col-sm-8">                               
        <a href="<?php echo $this->html->url(array('controller'=>'homes','action'=>'index'))?>"class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Back</a>                                     
     <button type="submit" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Save Details</button>
     
                                        </div>
                                        </div>
     <?php echo $this->form->end(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
</div>
<style>
    .error{
        color:red;
        font-weight:normal; 
        
    }
</style>



