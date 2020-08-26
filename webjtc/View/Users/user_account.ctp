<?php //echo $this->Html->script('jquery.js'); ?>
<?php //echo $this->Html->script('jquery.validate.min.js'); ?>
<?php //echo $this->Html->script('jquery.additional.js'); ?>
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
        <?php if (!empty($userId)) { ?> 
            <div class="col-md-12 product-container detail">


                <div class="col-md-3">
                    <aside class="left-box">
                        <h3 class="head2">View Profile</h3>
                        <ul class="left-side-bar">
                            <li><?php echo $this->html->image('small-butterfly-icon.png', array('class' => '')) ?><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'userAccount')); ?>">Account Information</a></li>
                            <li><?php echo $this->html->image('small-butterfly-icon.png', array('class' => '')) ?><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'myOrder')); ?>">My Order</a></li>
                            <li><?php echo $this->html->image('small-butterfly-icon.png', array('class' => '')) ?><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'changePassword')); ?>">Change Password</a></li>
                        </ul>
                    </aside> 
                </div>

 <div style="color:red; text-align:center; margin-top:-20px; margin-left:214px;"><?php echo $this->Session->flash(); ?></div>
                <div class="col-md-9 right-detail">
                   
                    <div class="detail-top">
                        <h3 class="heading-user no-marg text-left">My Account Information</h3>
                    </div>


                    <div class="details">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="address_holder">
                                    <div class="address_box col-md-12">
                                        <?php echo $this->Form->create('User', array("id" => "accountid")); ?> 
                                        <div class="form-group col-md-12 account">
                                            <label  class="col-sm-4 control-label">First Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="data[User][first_name]" value="<?php echo ucfirst($userDetails['User']['first_name']); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12  account">
                                            <label  class="col-sm-4 control-label">Last Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="data[User][last_name]" value="<?php echo ucfirst($userDetails['User']['last_name']); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12  account">
                                            <label class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="data[User][email]"  value="<?php echo $userDetails['User']['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12  account">
                                            <label class="col-sm-4 control-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="data[User][mobile_no]" value="<?php echo $userDetails['User']['mobile_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12  account">
                                            <label  class="col-sm-4 control-label">Company Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="data[User][company_name]" value="<?php echo $userDetails['User']['company_name']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12  account">
                                            <label  class="col-sm-4 control-label">Company Reg. Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="data[User][company_reg_num]" value="<?php echo $userDetails['User']['company_reg_num']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12  account">
                                            <label  class="col-sm-4 control-label">Vat Reg. Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="data[User][vat_reg_number]" value="<?php echo $userDetails['User']['vat_reg_number']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="col-sm-4"></div>
         <div class="col-sm-8" style="padding-left: 6px;">                               
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
        <?php } else { ?>
      <div class="product-container detail">
       <div style="color:red;text-align:center;margin-left:-30px;  font-size: 30px;">At this time user not login</div> 
    </div>
        <?php } ?>
    </div> 
</div>
<style>
    .error{
        color:red;
        font-weight:normal; 

    }
</style>

<style>
    .message1{

        font-size: 29px;
        margin-top: 150px;
        min-height: 300px;
        text-align: center;
    }
</style>



