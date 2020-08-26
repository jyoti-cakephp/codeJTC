<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Brand</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Size', array('id' => 'formid', 'class' => 'form-horizontal', 'type' => 'file')); ?>
                <div class="form-body">
                    <div class="form-body">             
                        
                        
                        

                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Brand Name:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('brand_name', array("class" => "form-control", 'name' => 'data[Brand][brand_name]')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-6">
                            <button class="btn green" type="submit">Submit</button>
                            <a class="btn default" href="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'admin_brandListing')); ?>">Cancel</a>
                        </div>
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
                "data[Brand][brand_name]": {
                    required: true
                },
                
                 },
            messages: {
                "data[Brand][brand_name]": {
                    required: "Brand name Should not be blank."
                },
                
              
              
            }
        });


    });
</script>



