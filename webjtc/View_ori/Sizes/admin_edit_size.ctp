<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor.js'); ?>


<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Product Size</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Size', array('id' => 'formid', 'class' => 'form-horizontal', 'type' => 'file')); ?>
                <div class="form-body">
                    <div class="form-body">             
                        
                        
                        

                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Size:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('product_size', array("class" => "form-control", 'name' => 'data[Size][product_size]','value'=>$sizeDetail['Size']['product_size'])); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-6">
                            <button class="btn green" type="submit">Submit</button>
                            <a class="btn default" href="<?php echo $this->Html->url(array('controller' => 'sizes', 'action' => 'admin_sizeListing')); ?>">Cancel</a>
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
                "data[Size][product_size]": {
                    required: true
                },
                
                 },
            messages: {
                "data[Size][product_size]": {
                    required: "Product size Should not be blank."
                },
                
              
              
            }
        });


    });
</script>



