<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit FAQ
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("Faq", array("id" => "faqs", 'class' => 'form-horizontal')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Question:</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->text('question', array("class" => "form-control",'name'=>'data[Faq][question]','value'=>$userDetail['Faq']['question'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Answer:</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->textarea('answer', array('class' => 'ckeditor','id' => 'answer','name'=>'data[Faq][answer]','value'=>$userDetail['Faq']['answer'])); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_faqList')); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo $this->form->end(); ?>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 
<script type="text/javascript">
    var validator = $("faqs").validate({
        rules: {
            'data[Faq][question]':{
                required: true
            }  
        },
        messages: {
            'data[Faq][question]': {
             required: "question should not be blank."
            } 
        }
    });
</script>

<script type="text/javascript">
    $("form").submit( function() {
        var messageLength = CKEDITOR.instances['answer'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Answer should not be blank' );
            return false;
        }else{
            
        }
    });
</script>


