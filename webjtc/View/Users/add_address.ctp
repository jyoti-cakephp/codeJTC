<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->Html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('jquery.additional.js'); ?>
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
<div class="col-md-12 product-container detail">


<div class="col-md-3">
<aside class="left-box">
<h3 class="head2">View Profile</h3>
<ul class="left-side-bar">
   <li><?php echo $this->html->image('small-butterfly-icon.png', array('class' => '')) ?><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'userAccount')); ?>">Account Information</a></li>
                            <li><?php echo $this->html->image('small-butterfly-icon.png', array('class' => '')) ?><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'addressBook')); ?>">Address Book</a></li>
                            <li><?php echo $this->html->image('small-butterfly-icon.png', array('class' => '')) ?><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'changePassword')); ?>">Change Password</a></li>
</ul>
</aside> 
</div>


<div class="col-md-9 right-detail">

<div class="detail-top">
<h3 class="heading-user no-marg text-left">My Address Book</h3>
</div>


<div class="details">
<div class="row">
<div class="col-md-12">

<h4 class="address-book-entries">Create New Address</h4>

 <?php echo $this->Form->create('User', array("id" => "addressid")); ?> 

<div class="address_holder  name-column">
<div class="address_box col-md-12">
  <div class="form-group col-md-6">
    <label>First Name</label>
  <input type="text" class="form-control" name="data[Address][first_name]">
  </div>
  <div class="form-group col-md-6">
    <label>Last Name</label>
    <input type="text" class="form-control" name="data[Address][last_name]">
  </div>
    <div class="form-group col-md-6">
    <label>E-mail</label>
    <input type="text" class="form-control" name="data[Address][email]">
  </div>
   <div class="form-group col-md-6">
    <label>Company</label>
    <input type="text" class="form-control" name="data[Address][company]">
   <br>
  </div>


<p class="col-md-12 confirm-head"><strong>Address</strong></p>
  <div class="form-group col-md-6">
    <label>Street Address</label>
    <input type="text" class="form-control" name="data[Address][address]">
  </div>
  <div class="form-group col-md-6">
    <label>City</label>
    <input type="text" class="form-control" name="data[Address][city]">
  </div>
   <div class="form-group col-md-6">
    <label>County/Region</label>
  <input type="text" class="form-control" name="data[Address][country]">
  </div>
  <div class="form-group col-md-6">
    <label>Postal Code</label>
    <input type="text" class="form-control" name="data[Address][post_code]">
   <br>
  </div>


<Button type="submit"  class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Create New Address</Button>
<Button class="btn btn-warning cont-shop-btn pull-right"><i class="fa fa-angle-left"></i> Back</Button>

</div>

</div>
</div>

 <?php echo $this->form->end(); ?>


</div>
</div>
</div>




</div>
</div> 
</div>
<script type="text/javascript">
     $(document).ready(function() {
    var validator = $("#addressid").validate({
            rules: {
                "data[Address][first_name]": {
                    required: true,
                    lettersonly: true
                },
                "data[Address][last_name]": {
                    required: true,
                    lettersonly: true
                },
                     "data[Address][company]": {
                    required: true
                    },
                     "data[Address][address]": {
                    required: true
                    },
                     "data[Address][email]": {
                    required: true,
                    email:true
                    },
                     "data[Address][city]": {
                    required: true
                    },
                      "data[Address][post_code]": {
                    required: true
                    },
                     "data[Address][country]": {
                    required: true
                    },
                 },
messages: {
             "data[Address][first_name]": {
                   required: "First name should not be blank.",
                   
                },
                "data[Address][last_name]": {
                    required: "Last name should not be blank.",
                   
                },
                     "data[Address][company]": {
                    required: "Company name should not be blank.",
                    },
                     "data[Address][address]": {
                     required: "Address should not be blank.",
                    },
                     "data[Address][email]": {
                    required: "Email should not be blank.",
                    },
                     "data[Address][city]": {
                    required: "City should not be blank.",
                    },
                      "data[Address][post_code]": {
                    required: "Post code should not be blank.",
                    },
                     "data[Address][country]": {
                    required: "Country should not be blank.",
                    },
                    
                    
                 },
              
               });

});
</script>



