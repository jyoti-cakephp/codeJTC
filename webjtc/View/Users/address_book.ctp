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

<h4 class="address-book-entries">Address Book Entries</h4>
<div class="address_holder">
<div class="address_box col-md-12">
<p><strong>Primary Address</strong> This address is your default address, it will also be used for Tax calculations</p>
 <a href="javascript:void(0)"> 
 <div class="delete" onclick="primary()">Delete</div></a> 
 <a href="update-address.html"><div class="edit">Edit</div></a>
 <?php echo $userbook['User']['company_name']?><br><?php echo $userbook['User']['first_name']." " .$userbook['User']['last_name']?><br><?php echo $userbook['User']['address']."," .$userbook['User']['post_code']?><br><?php echo $userbook['User']['city']."," .$userbook['User']['country']?></div>
</div>
<div class="address_holder">
    <?php foreach ($addressbook as $result) { ?>
<div class="address_box col-md-12">
<a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'deleteAddress', $result['Address']['id']))?>" onclick="return confirm('Are you sure?');"> 
 <div class="delete">Delete</div></a> 
 <a href="update-address.html"><div class="edit">Edit</div></a>
 <?php echo $result['Address']['company']?><br><?php echo $result['Address']['first_name']." " .$result['Address']['last_name']?><br><?php echo $result['Address']['address']."," .$result['Address']['post_code']?><br><?php echo $result['Address']['city']."," .$result['Address']['country']?></div>
    <?php } ?>
</div>
<div class="address_holder">
  <div class="address_box col-md-12">
      <?php if($count >= 4){ ?>
      
      <?php }else{ ?>
<a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'addAddress')); ?>"  class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Add New Address</a>
      <?php } ?>
<Button class="btn btn-warning cont-shop-btn pull-right"><i class="fa fa-angle-left"></i> Back</Button>
<p class="text-center"><span class="note">Note : </span>A maximum of 5 address book entries allowed.
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
</div>
</div>
<script>
function primary(){
    alert("The primary address cannot be deleted. Please set another address as the primary address and try again.");
    return false;
}


</script>
