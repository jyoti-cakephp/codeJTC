<?php echo $this->Html->script('jquery.js'); ?> 
<?php echo $this->Html->script('jquery.validate.min.js'); ?> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title reg-form" id="myModalLabel">Reset Password<?php echo $this->html->image('register-logo.png'); ?></h4>
            </div>
<div class="modal-body">
    <?php echo $this->Form->create(array('controller' => 'users', 'action' => 'setForgotPassword', 'class' => 'form-horizontal', 'id' => 'setformid',)); ?>
          <input type="hidden" id="email" name="email" value="<?php echo $userDetails['User']['email']; ?>">
          <input type="hidden"  name="data[User][id]" value="<?php echo $userDetails['User']['id']; ?>">
                      <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="UserPassword" name="data[User][password]" placeholder="Enter Your Password">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control"  name="data[User][cpassword]" placeholder="Enter Your Password">   
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                        <button type="submit"  class="btn btn-default sign-in">Submit</button>
                     </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            
        </div>
    </div>
 <script type="text/javascript">
var validator = $("#setformid").validate({
            rules: {

                "data[User][password]" : {
                    required: true,
                    minlength: 6
                   
                },
                 "data[User][cpassword]" : {
                    required: true,
                    equalTo: "#UserPassword"
                    
                   
                }
            },
            messages: {

				
               "data[User][password]": {
					required: "New password should not be blank.",
                                        minlength: "Please enter at least 6 characters."

				},
		"data[User][cpassword]": {
					required: "confirm password should not be blank.",
					 equalTo: "Both password must match."
				}
			}
          
            
        });

</script>
<style>
        .error{
            color: red !important;
        }
        .well {
            background: none repeat scroll 0 0 #fff;
            margin: 0;
        }

    </style>

