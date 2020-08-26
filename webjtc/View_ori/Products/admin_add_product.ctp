<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Product</div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <?php echo $this->Form->create('Category', array('id' => 'formid', 'class' => 'form-horizontal', 'type' => 'file')); ?>
                <div class="form-body">
                    <div class="form-body">
                          <div class="form-group">
                          <label class="col-md-3 control-label">Super Category Name:</label>
                          <div class="col-md-3">
                              <select style="width: 210px;" name="data[Product][super_id]" id="superid" onchange="getcatname();">
                                  <option value="">Select Super Category Name</option>
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
                                <select style="width: 210px;" name="data[Product][category_id]" id="catid" onchange="getsubname();" >
                                    <option value="">Select Category</option>
                                    <?php foreach ($category as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div> 
                              </div>
                        <div id="subList">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sub Category:</label>
                            <div class="col-md-3">
                                <select style="width: 210px;" name="data[Product][subcategory_id]" >
                                    <option value="">Sub Category</option>
                                    <?php foreach ($subcategory as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div> 
                             </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Size:</label>
                            <div class="col-md-3">
                                <select style="width: 210px;" multiple='true' name="data[ProductSize][size][]">
                                    <option value="">Select Size</option>
                                    <?php foreach($size as $key=>$val){ ?>
                                    <option value="<?php echo $key;?>"><?php echo $val;?></option>
                                    <?php } ?>
                                </select> 
                           <p>Press Ctrl to select more than one product size</p>       
                         
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Brand:</label>
                            <div class="col-md-3">
                                <select style="width: 210px;" name="data[Product][brand_id]" >
                                    <option value="">Select Brand</option>
                                    <?php foreach ($brand as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('product_title', array("class" => "form-control", 'name' => 'data[Product][product_title]')); ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-3 control-label">Product Type:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('product_type', array("class" => "form-control", 'name' => 'data[Product][product_type]')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Code:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('product_code', array("class" => "form-control", 'name' => 'data[Product][product_code]')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Price:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->text('product_price', array("class" => "form-control", 'name' => 'data[Product][product_price]')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Short Description:</label>
                            <div class="col-md-6">
                                <?php echo $this->Form->textarea('short_description', array( "class" => "form-control",'name' => 'data[Product][short_description]')); ?>
                            </div>
                        </div>
                       
                 <div class="form-group">
                        <label class="col-md-3 control-label">Description:</label>
                        <div class="col-md-9">      
                          <?php //echo $this->Form->textarea('description', array('class' => 'ckeditor','id' => 'noticeMessage','name'=>'data[Product][description]')); ?>
                          <?php echo $this->Form->textarea('description', array('class' => 'ckeditor','id' => 'noticeMessage','name'=>'data[Product][description]')); ?>  
                        </div>
                    </div>       
  
                        <div class="form-group"> 

                            <label class="col-md-3 control-label"> Upload Images :</label>
                            <div class="col-md-3">
                                <span id="add2" class="btn btn-file" > <input style=" margin-top:0px; " id="upload_image" class="image" type="file" name="data[ProductImage][image][]" multiple="true">
                                    <div id="error" style="color:red;"></div>
                                    <p>Note: Press ctrl for select multiple images.</p>
                                </span>

                            </div>

                        </div>

                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-6">
                            <button class="btn green" type="submit">Submit</button>
                            <a class="btn default" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'admin_productListing')); ?>">Cancel</a>
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
                "data[Product][category_id]": {
                    required: true
                },
                "data[Product][subcategory_id]": {
                    required: true
                },
                "data[ProductSize][size][]": {
                    required: true
                },
                "data[Product][product_title]": {
                    required: true
                },
                 "data[Product][product_type]": {
                    required: true
                },
                "data[Product][product_code]": {
                    required: true
                },
                "data[Product][product_price]": {
                    required: true,
                    number:true
                },
		"data[ProductImage][image][]": {
                    required: true
                 },
                "data[Product][short_description]": {
                    required: true
                 },
                 "data[Product][description]":{
                     required: true
                 }
              },
            messages: {
                "data[Product][category_id]": {
                    required: "Please Select Category."
                },
                "data[Product][subcategory_id]": {
                    required: "Please Select Sub Category."
                },
                "data[ProductSize][size][]": {
                    required: "Please Select Size."
                },
                "data[Product][product_title]": {
                    required: "Product Title Should not be blank."
                },
                 "data[Product][product_type]": {
                    required: "Product Type Should not be blank."
                },
                "data[Product][product_code]": {
                    required: "Product Code Should not be blank."
                },
                "data[Product][product_price]": {
                    required: "Price Should not be blank."
                },
		"data[ProductImage][image][]": {
                    required: "Please select image."
                },
                "data[Product][short_description]": {
                    required: "Short description Should not be blank."
                },
                "data[Product][description]": {
                    required: " description Should not be blank."
                }
            }
        });


    });
</script>
<script type="text/javascript">
    $('form').submit( function() {
        var messageLength = CKEDITOR.instances['noticeMessage'].getData().replace(/<[^>]*>/gi, '').length;
        if(!messageLength) {
            alert('Description Should not be blank.');
            return false;
        }else{
            
        }
    });
</script>
   <script type="text/javascript">
     function getcatname() {
        var sid = $("#superid").val
        alert(sid);
        $.ajax({
            url: SITEPATH + "products/addCat",
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
<script type="text/javascript">
     function getsubname() {
        var cid = $("#catid").val
        //alert(cid);
        $.ajax({
            url: SITEPATH + "products/addSub",
            data: {
                cid: cid,
            },
            type: "POST",
            success: function(result) {
                $("#subList").empty().append(result);
            }

        });
    }
</script>
 
<script>
    $(document).ready(function() {
        $("#upload_image").change(function() {
            var val = $(this).val();
            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                case 'gif':
                case 'jpg':
                case 'png':
                case 'jpeg':
                    

                    break;
                default:
                    {
                        $(this).val('');
                        // error message here
                        $("#error").html('<br>Please select .jpg,.jpeg,.gif,.png files only!').fadeIn().delay(3000).fadeOut();;
                    }
                    break;
            }
        });
    });

</script>



