<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>POP-UP
                </div>


                <label>&nbsp;&nbsp;</label>
                <!--end-->
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
              <!--  <div style="color:green">   <?php //echo $this->Session->flash();   ?> </div>-->
                <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead></thead>
                    <tfoot>

                    </tfoot>
                    <tbody>


                        <tr>
                            <td>POP-UP</td>
                            <td><?php if ($result['User']['pop_up'] == 1) { ?>
                                <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_activepop', 1)); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Active')); ?></a>
                                <?php } else if ($result['User']['pop_up'] == 0) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_deactivepop', 1)); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Deactive')); ?></a>
                                <?php } ?></td>

                        </tr>
                    </tbody>
                </table>

            </div>                    
        </div>
    </div>
</div>

