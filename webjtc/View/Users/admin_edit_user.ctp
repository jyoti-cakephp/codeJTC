<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Trader Details</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('User', array('id' => 'formid', 'class' => 'form-horizontal', 'type' => 'file')); ?>
                <div class="form-body">
                    <div class="form-body">             
                        
                        
                        

                        <div class="form-group">
                            <label class="col-md-3 control-label">First Name:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('first_name', array("class" => "form-control", 'name' => 'data[User][first_name]','value'=>$userDetail['User']['first_name'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Last Name:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('last_name', array("class" => "form-control", 'name' => 'data[User][last_name]','value'=>$userDetail['User']['last_name'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mobile No:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('mobile_no', array("class" => "form-control", 'name' => 'data[User][mobile_no]','value'=>$userDetail['User']['mobile_no'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Company Name:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('company_name', array("class" => "form-control", 'name' => 'data[User][company_name]','value'=>$userDetail['User']['company_name'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('address', array("class" => "form-control", 'name' => 'data[User][address]','value'=>$userDetail['User']['address'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Company Reg. Number:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('company_reg_num', array("class" => "form-control", 'name' => 'data[User][company_reg_num]','value'=>$userDetail['User']['company_reg_num'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Vat Reg Number:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('vat_reg_number', array("class" => "form-control", 'name' => 'data[User][vat_reg_number]','value'=>$userDetail['User']['vat_reg_number'])); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Country:</label>
                            <div class="col-md-6">
                               <select name="data[User][country]" class="form-control">
                            <option value="">Select Country</option>
                            <?php foreach($countryList as $key=>$val){?>
                            <option value="<?php echo $val;?>"<?php echo ($userDetail['User']['country'] == $val) ? "selected" : "" ?> ><?php echo $val;?></option>
                           <?php } ?>
                        </select>
                            </div>
                        </div>
                        
                        

                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-6">
                            <button class="btn green" type="submit">Submit</button>
                            <a class="btn default" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_userListing')); ?>">Cancel</a>
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
                "data[User][first_name]": {
                    required: true
                },
                "data[User][last_name]": {
                    required: true
                },
                "data[User][mobile_no]": {
                    required: true
                },
                "data[User][company_name]": {
                required: true
               
            },
            "data[User][address]": {
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
                
                 },
            messages: {
                "data[User][first_name]": {
                    required: "First name Should not be blank."
                },
                "data[User][last_name]": {
                    required: "Last name Should not be blank."
                },
                "data[User][mobile_no]": {
                    required: "Mobile number Should not be blank."
                },
                
               "data[User][company_name]": {
                required: "Company name should not be blank",
               
            },
            "data[User][address]": {
                required: "Address should not be blank",
            },
            "data[User][company_reg_num]": {
                required: "Company Reg Number should not be blank",
                
            },
            "data[User][vat_reg_number]": {
                required: "Vat Reg Number should not be blank",
                
            },
            "data[User][country]": {
                required: "Country should not be blank",
                
            },
              
            }
        });


    });
</script>



