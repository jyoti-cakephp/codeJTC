<?php echo $this->html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Newsletter
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("News", array("id" => "news", 'class' => 'form-horizontal','type'=>'file')); ?>
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Subject:</label>
                        <div class="col-md-6">
                           <?php echo $this->Form->text('title', array("class" => "form-control",'name'=>'data[Newsletter][email_title]')); ?>
                        </div>
                    </div>
<div class="form-group">
                        <label class="col-md-3 control-label">Message:</label>
                        <div class="col-md-9">
                      <?php echo $this->Form->textarea('message', array('class' => 'ckeditor','id' => 'noticeMessage','name'=>'data[Newsletter][message]')); ?>
                        </div>
                    </div>
                   </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'news', 'action' => 'admin_listNewsletter')); ?>">
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
    var validator = $("#news").validate({
        rules: {
            "data[Newsletter][email_title]": {
                required: true
            }
           
},
        messages: {
            "data[Newsletter][email_title]": {
                required: "Subject should not be blank."
            }
         
}
    });
</script>
<script type="text/javascript">
    $("form").submit( function() {
        var messageLength = CKEDITOR.instances['noticeMessage'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a message' );
            return false;
        }else{
            
        }
    });
</script>





