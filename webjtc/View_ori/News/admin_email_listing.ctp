<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Email Listing
                </div>
            </div>
            <div class="table" style="margin-top:30px;">
                 <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>

                        <tr>
                            <th style="text-align:center" >S.No.</th>
                            <th style="text-align:center" >Email</th>
                           <th style="text-align:center" colspan="2">Action</th>
                        </tr>

                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                           foreach ($emaillists as $result) { ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['SubcribeEmail']['email'] ?></td>
<td><?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>',
                                                array(
                                                    'controller' => 'news',
                                                    'action' => 'deleteemail',
                                                    $result['SubcribeEmail']['id']
                                               ), array(
                                                    'escape' => false,
                                                    'confirm' => 'Are you sure?',
                                                   'title'=>'Delete'
                                               )); ?>
                                      
                                      </td>
                                      
                            </tr>
    <?php $i++;} ?>

                    </tbody>
                </table>

            </div>                    
        </div>
    </div>
</div>




