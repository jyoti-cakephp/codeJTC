  <div class="form-group">
                            <label class="col-md-3 control-label">Sub Category:</label>
                            <div class="col-md-3">
                                <select style="width: 210px;" name="data[Product][subcategory_id]" >
                                    <option value="">Sub Category</option>
                                    <?php foreach ($subList as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div> 
