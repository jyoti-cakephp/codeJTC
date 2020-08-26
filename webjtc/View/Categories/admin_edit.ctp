<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Category</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;"> <?php echo $this->Session->flash(); ?></div>
               <?php echo $this->Form->create('Category',array('id' => 'formid','class' => 'form-horizontal'));?>
                <div class="form-body">
                  <div class="form-group">
                          <label class="col-md-3 control-label">Super Category Name:</label>
                          <div class="col-md-3">
                              <select style="width: 210px;" name="data[Category][super_id]">
              <option value="<?php echo $userDetail['Category']['super_id'];?>"><?php echo $userDetail['SuperCategory']['super_name'];?></option>
               <?php foreach ($super as $key => $val) { ?>
                                     <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                  <?php } ?>

                              </select> 
                          </div>
                      </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Name :</label>
                        <div class="col-md-6">
                           <input type='text' class = 'form-control' name='data[Category][category_name]' value='<?php echo $userDetail['Category']['category_name'] ; ?>'>
                        </div>
                    </div>
                    
                    
                    
                
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->Html->url(array('controller' => 'categories','action' => 'admin_categoryListing'));?>">Cancel</a>
                    </div>
                </div>
                <?php echo $this->form->end(); ?>
            </div>
        </div>


        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 
<script type="text/javascript">

    var validator = $("#formid").validate({
            rules: {
                 "data[Category][super_id]" : {
                    required: true
                },
                "data[Category][category_name]" : {
                    required: true
                }

        },
            messages: {
                 "data[Category][super_id]" : {
                     required: "Super Category name Should not be blank."
                },
                "data[Category][category_name]": {
                    required: "Category name Should not be blank."
                    
             
                }
                }
            
     }); 


</script>



