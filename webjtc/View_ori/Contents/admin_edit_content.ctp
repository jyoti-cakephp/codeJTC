<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Content
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("Content", array("id" => "contents", 'class' => 'form-horizontal')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Page Title:</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->text('page_title', array("class" => "form-control",'readonly'=>'true','value'=>$pageDetail['Content']['page_title'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description:</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->textarea('description', array('class' => 'ckeditor','id' => 'noticeMessage','name'=>'data[Content][description]','value'=>$pageDetail['Content']['description'])); ?>
                        </div>
                    </div>

                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_contentListing')); ?>">
                            Cancel</a>
                    </div>
                </div>
                <?php echo $this->form->end(); ?>
            </div>
        </div>


        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 
<script type="text/javascript">
    var validator = $("#contents").validate({
        rules: {
            'data[Content][page_title]': {
                required: true
            }
            
        },
        messages: {
            'data[Content][page_title]': {
                required: "Title page  should not be blank."
            }
            
             
        }
    });
</script>

<script type="text/javascript">
    $("form").submit( function() {
        var messageLength = CKEDITOR.instances['noticeMessage'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a description' );
            return false;
        }else{
            
        }
    });
</script>


