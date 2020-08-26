<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Newsletter Listing
                </div>
            </div>
            <div class="table" style="margin-top:30px;">
                <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>

                        <tr>
                            <th style="text-align:center" >S.No.</th>
                            <th style="text-align:center" >Subject</th>
                           <th style="text-align:center" >Message</th>
                           <th style="text-align:center" colspan="4">Action</th>
                        </tr>

                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                           foreach ($newslist as $result) { ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['Newsletter']['email_title'] ?></td>
                                 <td><?php echo substr($result['Newsletter']['message'],0,50 ); ?></td>
  <td><a href="<?php echo $this->html->url(array('controller' => 'news', 'action' => 'viewNewsletter', $result['Newsletter']['id'])); ?>"><?php echo $this->html->image('view.ico', array('width' => '16', 'height' => '16', 'title' => 'view')); ?></a></td>
 <td><a href="<?php echo $this->html->url(array('controller' => 'news', 'action' => 'editNewsletter', $result['Newsletter']['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
 <td><a href="<?php echo $this->html->url(array('controller' => 'news', 'action' => 'sendNewsLetter', $result['Newsletter']['id'])) ?>"><?php echo $this->html->image('send.png', array('title' => 'Send')); ?></a></td>
<td><?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>',
                                                array(
                                                    'controller' => 'news',
                                                    'action' => 'deletenewsletter',
                                                    $result['Newsletter']['id']
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





