<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>FAQ Listing
                </div>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
                <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>

                        <tr>
                            <th style="text-align:center" >S.No.</th>
                            <th style="text-align:center" >Question</th>
                            <th style="text-align:center" >Answer</th>
                            <th style="text-align:center" colspan="3">Action</th>

                        </tr>

                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($userList as $result) {
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['Faq']['question']; ?></td>
                                <td><?php echo substr($result['Faq']['answer'],0,50 ); ?></td>
                                <td><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_faqDetail', $result['Faq']['id'])); ?>"><?php echo $this->html->image('view.ico', array('title' => 'view')); ?></a></td>
                                <td><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_editFaq', $result['Faq']['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
                                <td> <?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'faqs',
                                        'action' => 'admin_delete',
                                        $result['Faq']['id']
                                            ), array(
                                        'escape' => false,
                                        'alt' => 'delete',
                                        'title' => 'delete',
                                        'confirm' => 'Are you sure?'
                                    ));
                                    ?>
                                </td>						   
                            </tr>
                            <?php $i++;
                        }
                        ?>

                    </tbody>
                </table>

            </div>                    
        </div>
    </div>
</div>
