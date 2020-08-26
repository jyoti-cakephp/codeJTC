<?php $cat = $this->requestAction(array('controller' => 'categories', 'action' => 'category')); ?>
<?php $countryList = $this->requestAction(array('controller' => 'homes', 'action' => 'countryList')); ?>
<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->Html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('jquery.additional.js'); ?>
<!--<script>
 var dd = $.noConflict();
</script>-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 footer-logo-cen">
                <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index')) ?>"><?php echo $this->html->image('foot-logo.png', array('class' => 'foot-logo')); ?></a>
            </div>
            <div class="col-md-3 no-pad">
                <div class="col-md-12">
                    <p class="footer-txt">We're Available 24/7</p>
                    <p class="footer-txt2"><?php echo $this->html->image('foot-phone.png', array('class' => 'foot-phone')); ?>+44 (0)7802 795548</p>
                </div>

            </div>
            <div class="col-md-3"><p class="footer-txt3"><?php echo $this->html->image('foot-phone2.png', array('class' => 'foot-phone')); ?>+44 (0)121 333 7374</p></div>

        </div>
    </div>
</footer>
<div class="footer2">
    <div class="container">
        <?php echo $this->element('newsletter'); ?>
        <div class="row">

            <ul class="col-md-4 footer-list col-xs-6">
                <h3 class="heading3">Information</h3>
                <li><?php echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow')); ?> <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'aboutUs')) ?>">About Us</a></li>
                <li><?php echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow')); ?><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'orderDel')) ?>">Delivery Information</a></li>
                <li><?php echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow')); ?><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'privacyPolicy')) ?>">Privacy Policy</a></li>
                <li><?php echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow')); ?><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'termCondition')) ?>">Terms & Conditions</a></li>
                <li><?php echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow')); ?><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'faq')) ?>">FAQ</a></li>
            </ul>

            <!--            <ul class="col-md-3 footer-list">
                            <h3 class="heading3">Customer Service</h3>
                            <li><?php //echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow'));  ?> <a href="">About Us</a></li>
                            <li><?php //echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow'));  ?><a href="">Delivery Information</a></li>
                            <li><?php //echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow'));  ?><a href="">Privacy Policy</a></li>
                            <li><?php //echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow'));  ?><a href="">Terms & Conditions</a></li>
                        </ul>-->

            <ul class="col-md-4 col-xs-6 footer-list category">
                <h3 class="heading3">Categories</h3>
                <?php foreach ($cat as $result) { ?>
                    <li><?php echo $this->html->image('footer-arrow.png', array('class' => 'footer-arrow')); ?><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'categoryDetail', $result['Category']['id'])) ?>"><?php echo $result['Category']['category_name'] ?></a></li>                    
                <?php } ?>         
            </ul>

            <div class="col-md-4 col-offset-xs-6">
                <ul class="footer-list category">
                    <h3 class="heading3">Get In Touch</h3>
                    <li><?php echo $this->html->image('footer-mail.png', array('class' => 'footer-arrow')); ?><a href="mailto:inf@jtc.com">inf@jtc.com</a></li>
                    <li><?php echo $this->html->image('fph.png', array('class' => 'footer-arrow')); ?><a href="javascript:void(0)">+44 (0)121 333 7374</a></li>
                    <ul class="list-unstyle list-inline social">
                        <li><a href="http://www.facebook.com"><?php echo $this->html->image('fbfoot.png'); ?></a></li>
                        <li><a href="http://www.twitter.com"><?php echo $this->html->image('fbtw.png'); ?></a></li>
                        <li><a href="http://www.gmail.com"><?php echo $this->html->image('fbgoogle.png'); ?></a></li>
                    </ul>
                </ul>

            </div>






        </div>

        <div class="row">
            <div class="col-md-12 copy text-center">
                <p class="copyright">© 2016 www.jtc.co.uk all rights reserved, web design by<a href="http://www.sdssoftwares.co.uk"><font color="white">SDSSoftwares.co.uk</font></a></p>
            </div>
        </div>
    </div>
</div>


<!--footer-ends-->

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                
            
                <h4 class="modal-title" id="myModalLabel">Sign In or Register at <?php echo $this->html->image('register-logo.png'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 border-form">
                        <h4 class="modal-title left signin-reg text-center" id="myModalLabel">Sign In</h4><br>
                        <form class="form-horizontal">         
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Email Id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  onkeypress="return runnewsScript(event);" id="username" autocomplete="off"  name="data[User][username]"  value="<?php
                                    if (isset($_COOKIE['username'])) {
                                        echo $_COOKIE['username'];
                                    }
                                    ?>"  placeholder="Email Id">
                                </div>
                                <div id="uname" style="color:red;margin-left:20%"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" onkeypress="return runnewsScript(event);" id="password" autocomplete="off"  name="data[User][password]" value="<?php
                                    if (isset($_COOKIE['password'])) {
                                        echo $_COOKIE['password'];
                                    }
                                    ?>" placeholder="Password">
                                </div>
                                <div id="pwd" style="color:red;margin-left:20%"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <?php //echo $this->form->input('rememberMe', array('label' => false, 'div' => false, 'type' => 'checkbox','id'=>'remberme')); ?>
                                            <input type="checkbox" id="remberme">
                                            Remember me    

                                            <span class="forget-pass"><a type="submit" data-toggle="modal" data-target="#myModal3">Forgot password?</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
     <input type="hidden" id="action" name="data[User][act]" value="<?php echo $this->params['action']; ?>">
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" onclick="chekquery();" class="btn btn-default">Submit</button>                   
                                    <div  id="loader_login" style='display:none;'>
                                        <?php echo $this->html->image('ajax-loader.gif', array('class' => 'loaderapply')); ?>
                                    </div> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="modal-title signin-reg2 text-center" id="myModalLabel">New User Here</h4><br>
                        <form class="form-horizontal">
                            <p class="text-left reg-free">Registration is free and easy!</p>
                            <ul class="new-user">
                                <li>Faster checkout</li>
                                <li>View and track orders and more</li>
                            </ul>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <a type="submit" class="btn btn-default reg" data-toggle="modal" data-target="#myModal2" data-dismiss="modal"> Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal register -->
<a style="display:none;" id="popup" href="javascript:void(0);" data-toggle="modal" data-target="#myModal2"></a>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title reg-form" id="myModalLabel">Register at <?php echo $this->html->image('register-logo.png'); ?></h4>
            </div>

            <div class="modal-body">
                <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'id' => 'UserRegisterForm')); ?>          
              <!--  <p class="text-center existing-user"><strong>New User</strong></p> -->
                <div id="successemail" style='color:red'></div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][first_name]"   placeholder="First Name">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][last_name]" placeholder="Last Name">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Email Id</label>
                    <div class="col-sm-6">
                        <input type="Email" class="form-control"  name="email" placeholder="Email Id">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Mobile Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][mobile_no]" placeholder="Mobile Number">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Company Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][company_name]" placeholder="Company Name">
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Company Reg. Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][company_reg_num]" placeholder="Company Reg. Number">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Vat Reg. Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][vat_reg_number]" placeholder="Vat Reg. Number">
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Street Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][address]" placeholder="Address">
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][city]" placeholder="City">
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Post Code</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="data[User][post_code]" placeholder="Post Code">
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label for="" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-6">
                        <select name="data[User][country]" class="form-control">
                            <option value="">Select Country</option>
                            <?php foreach ($countryList as $key => $val) { ?>
                                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-sm-2"></div>
                </div>

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
                        <div id="loader" style='display:none;'>
                            <?php echo $this->html->image('ajax-loader.gif', array('class' => 'loader')); ?>
                        </div> 
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <!--  <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
             </div> -->
        </div>
    </div>
</div>
<!-- Modal forget password -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title reg-form" id="myModalLabel">Reset Password at <?php echo $this->html->image('register-logo.png'); ?></h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal">         
             <!--  <p class="text-center existing-user"><strong>New User</strong></p> -->
                    <div class="form-group">
                        <div id="successemail1" style='color:red'></div>
                        <div class="col-sm-1"></div>
                        <label for="" class="col-sm-3 control-label">Email Id</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ResetEmail" name="data[User][email]" placeholder="Enter Your Email">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div id="emptyemail" style="color:red;margin-left:35%"></div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-7">
                            <button type="button" onclick="return resetPassword();" class="btn btn-default">Submit</button>
                            <div id="spinner" style='display:none;'>
                                <?php echo $this->html->image('ajax-loader.gif', array('class' => 'loaderapply')); ?>
                            </div> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var validator = $("#UserRegisterForm").validate({
            rules: {
                "data[User][first_name]": {
                    required: true,
                    lettersonly: true
                },
                "data[User][last_name]": {
                    required: true,
                    lettersonly: true
                },
                "email": {
                    required: true,
                    email: true,
                    remote: {url: SITEPATH + 'users/checkEmail', type: "post"}
                },
                "data[User][mobile_no]": {
                    required: true,
                    number: true
                },
                "data[User][company_name]": {
                    required: true

                },
                "data[User][address]": {
                    required: true

                },
                "data[User][city]": {
                    required: true

                },
                "data[User][post_code]": {
                    required: true

                },
                "data[User][company_reg_num]": {
                    required: true

                },
                "data[User][vat_reg_number]": {
                    required: true

                },
                "data[User][country]": {
                    required: true

                },
                "data[User][password]": {
                    required: true,
                    minlength: 6
                },
                "data[User][cpassword]": {
                    required: true,
                    equalTo: "#UserPassword"
                },
            },
            messages: {
                "data[User][first_name]": {
                    required: "First Name should not be blank.",
                },
                "data[User][last_name]": {
                    required: "Last Name should not be blank.",
                },
                "email": {
                    required: "Email should not be blank.<br/>",
                    remote: "This Email is already in Use. Please Use Another."
                },
                "data[User][mobile_no]": {
                    required: "Mobile number should not be blank.",
                },
                "data[User][company_name]": {
                    required: "Company name should not be blank",
                },
                "data[User][address]": {
                    required: "Address should not be blank",
                },
                "data[User][city]": {
                    required: "City should not be blank",
                },
                "data[User][post_code]": {
                    required: "Post code should not be blank",
                },
                "data[User][company_reg_num]": {
                    required: "Company Reg Number should not be blank",
                },
                "data[User][vat_reg_number]": {
                    required: "Vat Reg Number should not be blank",
                },
                "data[User][country]": {
                    required: "Please select country",
                },
                "data[User][password]": {
                    required: "Password should not be blank",
                    minlength: "Please enter at least 6 characters."
                },
                "data[User][cpassword]": {
                    required: "Confirm password should not be blank.",
                    equalTo: "Both password must match."

                },
            },
            submitHandler: function() {
                $("#loader").css('display', 'block');
                $.post(SITEPATH + "users/register/",
                        $('#UserRegisterForm').serialize(),
                        function(result) {
                            $("#loader").css('display', 'none');
                            document.getElementById("UserRegisterForm").reset();
                            if (result == 0) {
                                alert("you have successfully registered.");
                                window.location.href = SITEPATH;
                                $('#myModal').trigger('click');

                            } else
                            if (result == 1) {
                                $('#successemail').html('Something Went Worng.').addClass('errormsg').fadeIn().delay(5000).fadeOut();
                            }

                        })

            }

        });
    });

</script> 
<script type="text/javascript">
    $(document).ready(function() {
        var validator = $("#myformId1").validate({
            rules: {
                "data[Contact][name]": {
                    required: true,
                    lettersonly: true
                },
                "data[Contact][email]": {
                    required: true,
                    email: true
                },
                "data[Contact][message]": {
                    required: true
                }
            },
            messages: {
                "data[Contact][name]": {
                    required: "Name should not be blank.<br/>"
                },
                "data[Contact][email]": {
                    required: "Email Id should not be blank.<br/>"

                },
                "data[Contact][message]": {
                    required: "Message should not be blank.<br/>"
                }
            }
        });
    });

</script>
<script type="text/javascript">
    var validator = $("#accountid").validate({
        rules: {
            'data[User][first_name]': {
                required: true,
                lettersonly: true
            },
            'data[User][last_name]': {
                required: true,
                lettersonly: true

            },
            'data[User][email]': {
                required: true,
                email: true

            },
            'data[User][mobile_no]': {
                required: true

            },
            'data[User][company_name]': {
                required: true

            },
            'data[User][company_reg_num]': {
                required: true

            },
            'data[User][vat_reg_number]': {
                required: true

            }
        },
        messages: {
            'data[User][first_name]': {
                required: "First name should not be blank.<br/>"
            },
            'data[User][last_name]': {
                required: "Last name should not be blank.<br/>"

            },
            'data[User][email]': {
                required: "Email id should not be blank.<br/>"

            },
            'data[User][mobile_no]': {
                required: "Mobile number should not be blank.<br/>"

            },
            'data[User][company_name]': {
                required: "Company name should not be blank.<br/>"

            },
            'data[User][company_reg_num]': {
                required: "Company reg number should not be blank.<br/>"

            },
            'data[User][vat_reg_number]': {
                required: "Vat reg number should not be blank.<br/>"

            }
        }
    });

</script>
<script type="text/javascript">
    var validator = $("#changeid").validate({
        rules: {
            'data[User][old_password]': {
                required: true
            },
            'data[User][new_password]': {
                required: true,
                minlength: 6
            },
            'data[User][confirm_password]': {
                required: true,
                equalTo: "#password2"
            }
        },
        messages: {
            'data[User][old_password]': {
                required: "Old password  should not be blank.</br>"
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
<script type="text/javascript">
    $(document).ready(function() {
        var validator = $("#billing").validate({
            rules: {
                "data[Billing][first_name]": {
                    required: true,
                    lettersonly: true
                },
                "data[Billing][last_name]": {
                    required: true,
                    lettersonly: true
                },
                "data[Billing][company]": {
                    required: true
                },
                "data[Billing][address]": {
                    required: true
                },
                "data[Billing][email]": {
                    required: true,
                    email: true
                },
                "data[Billing][city]": {
                    required: true
                },
                "data[Billing][post_code]": {
                    required: true
                },
                "data[Billing][country]": {
                    required: true
                },
            },
            messages: {
                "data[Billing][first_name]": {
                    required: "First name should not be blank.",
                },
                "data[Billing][last_name]": {
                    required: "Last name should not be blank.",
                },
                "data[Billing][company]": {
                    required: "Company name should not be blank.",
                },
                "data[Billing][address]": {
                    required: "Address should not be blank.",
                },
                "data[Billing][email]": {
                    required: "Email should not be blank.",
                },
                "data[Billing][city]": {
                    required: "City should not be blank.",
                },
                "data[Billing][post_code]": {
                    required: "Post code should not be blank.",
                },
                "data[Billing][country]": {
                    required: "Country should not be blank.",
                },
            },
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var validator = $("#shipping").validate({
            rules: {
                "data[Shipping][first_name]": {
                    required: true,
                    lettersonly: true
                },
                "data[Shipping][last_name]": {
                    required: true,
                    lettersonly: true
                },
                "data[Shipping][company]": {
                    required: true
                },
                "data[Shipping][address]": {
                    required: true
                },
                "data[Shipping][email]": {
                    required: true,
                    email: true
                },
                "data[Shipping][city]": {
                    required: true
                },
                "data[Shipping][post_code]": {
                    required: true
                },
                "data[Shipping][country]": {
                    required: true
                },
            },
            messages: {
                "data[Shipping][first_name]": {
                    required: "First name should not be blank.",
                },
                "data[Shipping][last_name]": {
                    required: "Last name should not be blank.",
                },
                "data[Shipping][company]": {
                    required: "Company name should not be blank.",
                },
                "data[Shipping][address]": {
                    required: "Address should not be blank.",
                },
                "data[Shipping][email]": {
                    required: "Email should not be blank.",
                },
                "data[Shipping][city]": {
                    required: "City should not be blank.",
                },
                "data[Shipping][post_code]": {
                    required: "Post code should not be blank.",
                },
                "data[Shipping][country]": {
                    required: "Country should not be blank.",
                },
            },
        });

    });
</script>
<script>
    function runnewsScript(e) {
        if (e.keyCode === 13) {
            chekquery();
        }
    }
    function chekquery() {
        var user = $("#username").val();
        var pass = $("#password").val();
        
        var act = $("#action").val();
        // var remember = $("#remberme").val();
        var remember = $('#remberme').is(":checked");
        if (user == '') {
            $("#uname").html('Email Id should not be blank').fadeIn().delay(3000).fadeOut();
            return false;
        }
        if (pass == '') {
            $("#pwd").html('Password should not be blank').fadeIn().delay(3000).fadeOut();
            return false;
        }

        $.ajax({
            url: SITEPATH + "users/login/",
            data: {
                user: user,
                pass: pass,
                remember: remember,
                action : act
            },
            type: "POST",
            beforeSend: function() {
                $('#loader_login').css('display', 'block');
            },
            complete: function() {
                $('#loader_login').css('display', 'none');
            },
            success: function(result) {
                
                if (result == 0) {
                    alert("please enter valid username and password");
                } else if(result ==4){
                   // window.location.reload();
                   window.location.href = SITEPATH+"contents/dashboard";
                }else if (result == 5) {
                   window.location.reload(); 
                }else if(result == 2) {
                    alert("User account is not activated by admin");  
                }                
               
            }
        });
    }


</script> 
<script>
    function resetPassword() {
        var email = $("#ResetEmail").val();
        //alert(email);
        if (email == '') {
            $('#emptyemail').html('Email should not be blank.').addClass('error').fadeIn().delay(3000).fadeOut();
            return false;
        } else {
            apos = email.indexOf("@");
            dotpos = email.lastIndexOf(".");
            if (email != '') {
                var eml = 1;
                if (apos < 1 || dotpos < 2)
                {
                    $("#emptyemail").html("Please enter valid email.").addClass('error').fadeIn().delay(3000).fadeOut();

                    var eml = 0;
                    return false;
                }
            }
        }
        $.ajax({
            url: SITEPATH + "users/resetPassword/",
            data: "data[email]=" + email,
            type: "POST",
            beforeSend: function() {
                $('#spinner').css('display', 'block');
            },
            complete: function() {
                $('#spinner').css('display', 'none');
            },
            success: function(result) {
                if (result == 1) {
                    alert("Please check your Email to reset your password.");
                    window.location.reload();
                }
                if (result == 2) {
                    $('#successemail1').html('Incorrect email please try again.').addClass('error').fadeIn().delay(3000).fadeOut();
                }
            }
        });

    }

</script>

<style>
    .error{
        color: red !important;
    }
    .well {
        background: none repeat scroll 0 0 #fff;
        margin: 0;
    }
    .loader{
        float: left;
        margin-left: 22%;
        margin-top: -30px;
        position: absolute;
        width: 25px;
    }

</style>
