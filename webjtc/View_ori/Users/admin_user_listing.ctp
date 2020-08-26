
<div class="row">
      <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                    					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								Search Traders
							</div>
							
						</div>
						<div class="portlet-body form">
                            <!-- BEGIN FORM-->
                                                         
 <?php echo $this->form->create('User',array('class'=>'form-inline'));?> 
      
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                        
                                        <?php $name = $this->Session->read('name'); ?> 
                                            <div class="form-group">
                                             <label for="email">Name:</label>
                                            <input type="text" class="form-control" name="data[name]" value="<?php echo $name;?>">
                                                   
                                                </div>
                                            <?php $email = $this->Session->read('email'); ?> 
                           <div class="form-group">
                                             <label for="email">Email:</label>
                                            <input type="text" class="form-control" name="data[email]" value="<?php echo $email;?>">
                                                   
                                                </div> 
                                          <?php $country = $this->Session->read('country'); ?>    
                   <div class="form-group">
                        <label for="email">Country:</label>
                                                <select class="form-control"  name="data[country]">
                                                     <option value="">Select Country</option>
                                                       <?php foreach ($countryList as $key => $val) { ?>
                                        <option value="<?php echo $val; ?>" <?php if($country==$val) { echo 'selected="selected"'; } ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                                   
                                                </select>        
                                            </div>                   
                                        
                                        
                                            </div>
                                        
                                    </div>
                                   
                                </div>
                                <div class="form-actions fluid">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                                <button type="submit" class="btn green">SEARCH</button>
                                        </div>
                                        
                                    </div>
                                </div>
                           <?php echo $this->form->end();?>
                            <!-- END FORM-->
                        </div>
					</div>
                    

                <!-- END SAMPLE TABLE PORTLET-->
                </div>
    
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Traders listing
                        </div>
                        <!--added by anup-->
                          <select class="form-control pull-right" style="width: 225px;  margin-left:25px;" id="sortdata1" onchange="selectsort()" >
                            <option value="">sort by Alphabet</option>
                                <option value="ASC" <?php echo ($value1 == 'ASC') ? "selected" : "" ?>>A to Z</option>
                               <option value="DESC" <?php echo ($value1 == 'DESC') ? "selected" : "" ?>>Z to A</option>
                        </select>
                       
                        <select class="form-control pull-right" id="sortdata2" style="width: 225px;" >
                            <option value="">sort by Name or Country</option>
                                <option value="first_name" <?php echo ($value == 'first_name') ? "selected" : "" ?>>Name</option>
                            <option value="country" <?php echo ($value == 'country') ? "selected" : "" ?>>Country</option>
                        </select>
                        
                   <label>&nbsp;&nbsp;</label>
                        <!--end-->
                    </div>
                    <div class="table-scrollable" style="margin-top:30px;">
                      <!--  <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
						 <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Name</th>
                                    <th style="text-align:center">Email</th>
                                    <th style="text-align:center">Mobile Number</th>
                                    <th style="text-align:center">Country</th>
                                    <th style="text-align:center" colspan="4">Action</th>

                                </tr>

                            </thead>
                             <tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                                <?php $i=1; foreach($userList as $result) { ?>
                              
                                <tr>
                                      <td><?php echo $i; ?></td>
                                    
                                      <td><?php echo $result['User']['first_name']." ".$result['User']['last_name']; ?></a></td>
                                   
                                      <td><?php echo $result['User']['email']; ?></td>
                                     <td><?php echo $result['User']['mobile_no']; ?></td>
                                      <td><?php echo $result['User']['country']; ?></td>
                                    <td><?php if ($result['User']['is_active'] == 1) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_active', $result['User']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Active')); ?></a>
                                    <?php } else if ($result['User']['is_active'] == 0) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_deactive', $result['User']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Deactive')); ?></a>
                                   <?php } ?></td>
                                     <td><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_viewUser', $result['User']['id'])); ?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td>
                                    <td><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_editUser', $result['User']['id'])); ?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td>
                                    
                                    <td><?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'users',
                                        'action' => 'deleteUser',
                                        $result['User']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Delete'
                                    ));
                                    ?></td>


                                      </td>
                                </tr>
                            
                           <?php $i++;} ?>
                                
                                   
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>
<!--code added by anup-->
<script>
       function selectsort() {
        var value = $("#sortdata1").val();
        //alert(value);
        var value1 = $("#sortdata2").val();
        if (value1 == "") {
            alert("Please select first sort by name or country");
            return false;
        }
       if (value == "ASC") {
            window.location.href = SITEPATH + "admin/users/userListing/" + value1 +'/'+ value;
        } else if (value == "DESC") {
            window.location.href = SITEPATH + "admin/users/userListing/" + value1 +'/'+ value;
        }
    }
</script>
