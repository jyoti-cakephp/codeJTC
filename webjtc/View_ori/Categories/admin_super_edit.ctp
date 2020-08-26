<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Super Category</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
               <?php echo $this->Form->create('SuperCategory',array('id' => 'formid','class' => 'form-horizontal'));?>
                <div class="form-body">

                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Super Category Name :</label>
                        <div class="col-md-6">
                           <input type='text' class = 'form-control' name='data[SuperCategory][super_name]' value='<?php echo $superDetail['SuperCategory']['super_name'] ; ?>'>
                        </div>
                    </div>
                    
                    
                    
                
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->Html->url(array('controller' => 'categories','action' => 'admin_superListing'));?>">Cancel</a>
                    </div>
                </div>
                <?php echo $this->form->end(); ?>
            </div>
        </div>


        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 
<script type="text/javascript">
var dd = $.noConflict();
    dd(document).ready(function() {
    var validator = dd("#formid").validate({
            rules: {
                "data[SuperCategory][super_name]" : {
                    required: true
                }

        },
            messages: {
                "data[SuperCategory][super_name]": {
                    required: "Super Category name Should not be blank."
                    
             
                }
                }
            
        });


    });
</script>




