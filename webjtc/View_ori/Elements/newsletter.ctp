<?php // echo $this->Html->script('jquery.js'); ?>
<?php //echo $this->Html->script('jquery.validate.min.js'); ?>
<!--<script>
 var dd = $.noConflict();
</script>-->
<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<div class="row">
<div class="col-md-12 subscribe-section">
<p class="subs-txt col-md-6">Subscribe to our mailing list for special offers and promotions.</p>
<div class="col-md-6">
    <div style="color:red;text-align:center;margin-left:-30px;  font-size: 18px;"> <?php echo $this->Session->flash(); ?></div>
<?php echo $this->form->create('News', array('controller' => 'news', 'action' => 'addEmail', 'class' => 'navbar-form navbar-left', 'role' => 'search', 'id' => 'myformId')); ?>     
<div class="form-group">
    <input type="text" class="form-control mailjoin" id="exampleInputAmount" name="email" placeholder="Enter email here">   
  </div>
    <button type="submit" class="cart2 text-center">
            Join
            </button>
     <label class="error" for="exampleInputAmount"></label>
   <?php echo $this->form->end(); ?>
</div>

 

</div>
</div>
<script type="text/javascript">
     $(document).ready(function() {
    var validator = $("#myformId").validate({
            rules: {
                 "email": {
                    required: true,
                    email:true,
                    remote: {url: SITEPATH + 'news/checkEmail', type: "post"}
                   },
                 
                 },



         messages: {
                
               "email": {
                  required: "Email Id should not be blank.<br/>",
                  remote: "This Email is already in Use. Please Use Another."

               },
            
         }
        });
});

</script>
