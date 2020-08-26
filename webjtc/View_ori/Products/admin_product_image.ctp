<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Product Images</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
               
                <div class="form-body">
                    <div class="form-body">             
                       <div class="row">
                            <div class="col-md-12">
                            <div class="well well2 clearfix">
                               <?php if(!empty($productImage)){ ?> 
                                <?php foreach($productImage as $result){ ?>
                                <div class="row border2">
                                    <div class="col-md-1">
                                   <?php echo $this->html->image('product1/50_'.$result['ProductImage']['image']);?>
                                </div>
                                <div class="col-md-3 text-left">
                                    <br/>
                                    <?php echo $result['ProductImage']['image'];?>
                                </div>
                                </div>
                                <?php } ?>
                               <?php } else{ ?>
                               
                                
                                   
                                
                                    
                                <div style="text-align:center;">There is no image </div>
                              
                               
                                    
                               <?php } ?>
                                 
                                   
                                
                                
                            </div>
                        </div>
                        </div>
                         <?php echo $this->Form->create('ProductImage', array('id' => 'formid', 'class' => 'form-horizontal', 'type' => 'file')); ?>
                        <div class="form-group">
                            <label class="col-md-2 bg text-left">Upload images:</label>
                            <div class="col-md-3 bg">
                                <?php echo $this->Form->file('image', array("class" => "", 'name' => 'data[ProductImage][image]')); ?>
                            </div>
                            <div class="col-md-3 bg text-left">
                                <button class="btn btn-default btn-success green">Upload</button>
                            </div>
                        </div>
                         <?php echo $this->form->end(); ?>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-6">
                            <?php if(count($productImage)==0){ ?>
                            
                            <?php }else{ ?>
                            <a href="<?php echo $this->html->url(array('controller'=>'products','action'=>'productListing'));?>" class="btn green">Submit</a>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
               
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
                "data[ProductImage][image]": {
                    required: true
                },
                
                 },
            messages: {
                "data[ProductImage][image]": {
                    required: "Please select an image."
                },
                
              
              
            }
        });


    });
</script>

<style>
    .bg {
        background: #fff;
    }
    .well.well2 { max-height: 250px; overflow-y: auto; }
    .border2 { border-bottom: 1px solid #ccc; margin-bottom: 15px; padding-bottom: 15px;}
</style>



