  <div class="form-group">
                            <label class="col-md-3 control-label">Category Name:</label>
                            <div class="col-md-3">
                                <select style="width: 210px;" name="data[Product][category_id]" id="catid" onchange="getsubname();" >
                                    <option value="">Select Category</option>
                                    <?php foreach ($catList as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div>
