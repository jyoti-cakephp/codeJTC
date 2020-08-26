<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Sub Category
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"><?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('SubCategory', array('id' => 'property', 'class' => 'form-horizontal','type'=>'file')); ?>
                  <div class="form-body">
                         <div class="form-group">
                          <label class="col-md-3 control-label">Super Category Name:</label>
                          <div class="col-md-3">
                              <select style="width: 210px;" name="data[SubCategory][super_id]" id="superid" onchange="getcatname();">
                 <option value="<?php echo $SubCategory['SubCategory']['super_id'];?>"><?php echo $SubCategory['SuperCategory']['super_name'];?></option>
                                  <?php foreach ($super as $key => $val) { ?>
                                     <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                  <?php } ?>

                              </select> 
                          </div>
                      </div>
                        <div id="catList">
                    <div class="form-group">
                       <label class="col-md-3 control-label">Category Name:</label>
                       <div class="col-md-3">                            
                            <select style="width: 210px;" name="data[SubCategory][category_id]">
           <option value="<?php echo $SubCategory['SubCategory']['category_id'];?>"><?php echo $SubCategory['Category']['category_name'];?></option>
                               <?php foreach ($Category as $key => $val) { ?>
                                   <option value="<?php echo $key; ?>"> <?php echo $val; ?></option>
                               <?php } ?>

                            </select> 
                       </div>
                    </div>
                              </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Sub Category Name:</label>
                        <div class="col-md-3">
                        <?php echo $this->Form->text('sub_category_name', array('class' =>'form-control','name'=>'data[SubCategory][sub_category_name]','value'=>$SubCategory['SubCategory']['sub_category_name'])); ?>
                           
                        </div>
                    </div>
                      </div>
                

                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_subcategoryListing')); ?>">
                            Cancel</a>
                    </div>
                </div>
              </div>
                       
                
                <?php echo $this->form->end(); ?>
            
        </div>
</div>

        <!-- END SAMPLE TABLE PORTLET-->
    </div>

<script type="text/javascript">
    var validator = $("#property").validate({
        rules: {
             'data[SubCategory][sub_category_name]': {
                required: true
            },
             
        },
        messages: {
             'data[SubCategory][sub_category_name]': {
                required: " sub category name should not be blank."
            },
             
          }
    });
</script>
<script type="text/javascript">
     function getcatname() {
        var sid = $("#superid").val();
        //alert(sid);
        $.ajax({
            url: SITEPATH + "admin/categories/addCat",
            data: {
                sid: sid,
            },
            type: "POST",
            success: function(result) {
                $("#catList").empty().append(result);
            }

        });
    }
</script>


