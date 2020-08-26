<?php // echo $this->Html->script('jquery.js'); ?>
<?php //echo $this->Html->script('jquery.validate.min.js'); ?>
<?php //echo $this->Html->script('jquery.additional.js'); ?>
<!--<script>
 var dd = $.noConflict();
</script>-->
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
<div class="product-container detail">
<div class="row">
<div class="col-md-12">
<div class="ourcontacts">
<h3 class="contactform"> Our Contacts </h3>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.180865318499!2d-1.9018473845554418!3d52.493965545911244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc960cb159d7%3A0x1aa7a499b940eaa1!2s228+Bridge+St+W%2C+Birmingham+B19%2C+UK!5e0!3m2!1sen!2sin!4v1470354892471" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

</div><!--col-md-12-->
</div> <!--row-->

<div class="form1">
<div class="row">
<div class="col-md-9">
<div class="heading">
<h4 class="contactform"><b>Contact Form</b></h4>
</div>
<div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
<br/>
 <?php echo $this->form->create('Contact',array('id'=>'myformId1','onsubmit'=>"return validateform()"));?>

Name
<br/>
<input type="text" class="name"  name="data[Contact][name]">
<br/>
<br/>
Company Name
<br/>
<input type="text" class="name"  name="data[Contact][c_name]">
<br/>
<br/>
Phone Number
<br/>
<input type="text" class="name"  name="data[Contact][phone]">
<br/>
<br/>
Email
<br/>
<input type="text" class="email1"  name="data[Contact][email]">
<br/>
<br/>
Enquiry
<br/>
<textarea rows="6" cols="100" name="data[Contact][message]" class="message" style="margin:0px;width:500px;height:92px;resize: none;"></textarea>
<br/>
<br/>
<div class="g-recaptcha" data-sitekey="6LdeW14UAAAAAJiGw6lVs8eX94XePEDfc9pvfE1f" data-callback="recaptchaCallback"></div>
<div id="captcha" style='color:red'></div>
<br/>
<br/>
<div class="messagebutton">
<button type="submit" class="send">Send Message</button>
</div>
<?php echo $this->form->end();?>
</div><!--col-md-9-->

<div class="col-md-3">
<div class="heading">
<h4 class="contactform"><b> Contacts </b></h4>
</div>

<br/>
<span class="glyphicon glyphicon-home pink" aria-hidden="true"></span>  228 Bridge St W, Birmingham B19 2YU
<br/>
<br/>
<span class="glyphicon glyphicon-envelope pink" aria-hidden="true"> </span><a href="mailto:info@jtcbabywear.co.uk"> info@jtcbabywear.co.uk</a>
<br/>
<br/>
<span class="glyphicon glyphicon-earphone pink" aria-hidden="true"> </span> +44 (0)121 333 7374
<br/>
<br/>
<span class="glyphicon glyphicon-globe pink" aria-hidden="true"> </span><a href="http://jtcbabywear.co.uk">http://jtcbabywear.co.uk</a>
</div><!--col-md-3-->
</div><!--row-->
</div>

</div>
</div>
<script>
function validateform(){
var captcha_response = grecaptcha.getResponse();
if(captcha_response.length == 0)
{
     $('#captcha').html('Please validate captcha');
    return false;
}
else
{
return true;
}
}
</script>
<style>
    .error{
        color:red;
        font-weight:normal; 
        
    }
</style>



