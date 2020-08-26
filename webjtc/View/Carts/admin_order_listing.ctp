<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Order Listing
                        </div>
                        <!--code added by anup-->
                          <select class="form-control pull-right" id="sortdata2" style="width: 270px;" onchange="selectdata()" >
                            <option value="">sort by Status</option>
                                <option value="0" <?php echo ($value == 'pending') ? "selected" : "" ?>>Pending</option>
                            <option value="1" <?php echo ($value == 'completed') ? "selected" : "" ?>>Completed</option>
                        </select>
                        
                        <select class="form-control pull-right" style="width: 225px;" id="sortdata1" onchange="selectsort()">
                            <option value="">sort by Customer name</option>
                            <option value="ASC" <?php echo ($value == 'ASC') ? "selected" : "" ?>>A to Z</option>
                            <option value="DESC" <?php echo ($value == 'DESC') ? "selected" : "" ?>>Z to A</option>
                        </select>
                        <!--end-->
                    </div>

                    <div class="table-scrollable" style="margin-top:30px;">
                        <div style="color:green;font-size:20px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Customer Name</th>
                                   <th style="text-align:center">Order #</th>
<!--                                    <th style="text-align:center" >Total Price</th>-->
                                    <th style="text-align:center">Status</th>
                                    <th style="text-align:center" colspan="2">Action</th>
                                </tr>

                            </thead>
          <tfoot>
                        <tr>
                         <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>

                           <?php $i=1; foreach($orderList as $result) { ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                     <td><?php echo $result['User']['first_name']." ".$result['User']['last_name'];?></td>
                                     <td><?php echo $result['Order']['order_number'];?></td>
<!--                                     <td>£&nbsp;<?php //echo $result['Order']['total_price'];?></td>-->
                                     <?php if($result['Order']['order_status']=="0") { ?> 
                                     <td>
                                      <?php echo "Pending" ?> 
                                    </td>
                                    <?php } else { ?>
                                    <td>
                                      <?php echo "Completed" ?> 
                                    </td>
                                    <?php } ?>
<td><a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'admin_viewOrder',$result['Order']['id']));?>"><?php echo $this->html->image('view.ico',array('title'=>'View'));?></a>
</td>
<td><?php if ($result['Order']['order_status'] == 1) { ?>
                                    <a href="javascript:void(0)"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Accept')); ?></a>
                                    <?php } else if ($result['Order']['order_status'] == 0) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'carts', 'action' => 'admin_is_active', $result['Order']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Reject')); ?></a>
                                   <?php } ?></td>
                                </tr>
                           <?php $i++;} ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
<!--code added by anup-->
<Script>
       function selectsort() {
        var value = $("#sortdata1").val();
        //alert(value);
        if (value == "ASC") {
            window.location.href = SITEPATH + "admin/carts/orderListing" + "/ASC";
        } else if (value == "DESC") {
            window.location.href = SITEPATH + "admin/carts/orderListing" + "/DESC";
        }

    }
</script>
<Script>
       function selectdata() {
        var value1 = $("#sortdata2").val();
        //alert(value1);
        if (value1 == "0") {
            window.location.href = SITEPATH + "admin/carts/orderListing" + "/pending";
        } else if (value1 == "1") {
            window.location.href = SITEPATH + "admin/carts/orderListing" + "/completed";
        }

    }
</script>