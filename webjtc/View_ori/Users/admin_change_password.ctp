<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>

<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Change Password
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("User", array("id" => "userid",'class' => 'form-horizontal','autocomplete'=>'off')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Old Password:</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->password('old_password', array("class" => "form-control",'name'=>'data[User][old_password]')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">New Password:</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->password('new_password', array("class" => "form-control",'id'=>'inputEmail3','name'=>'data[User][new_password]')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm Password:</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->password('confirm_password', array("class" => "form-control",'reaadonly'=>'true','name'=>'data[User][confirm_password]')); ?>
                        </div>
                    </div>
                    

                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_changePassword')); ?>">
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
    var validator = $("#userid").validate({
        rules: {
            'data[User][old_password]': {
                required: true
            },
            'data[User][new_password]': {
                required: true,
                minlength:6
            },
            'data[User][confirm_password]': {
                required: true,
                equalTo:"#inputEmail3"
            }
        },
        messages: {
            'data[User][old_password]': {
                required: "Old password  should not be blank</br>"
            },
            'data[User][new_password]': {
                required: "New password should not be blank"
            },
            
            'data[User][confirm_password]': {
                required: "Confirm password should not be blank",
                equalTo: jQuery.format("Both password must match.")
            }
        }
    });
</script>




