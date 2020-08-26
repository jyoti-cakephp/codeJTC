
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>View Contact Details</div>
					
			<div class="button-del">	<?php
                                    echo $this->Html->link('Delete', array(
                                        'controller' => 'contacts',
                                        'action' => 'admin_delete',
                                        $contactDetail['Contact']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure you want to delete this contact details?',
                                        'title' => 'Delete'
                                    ));
                                    ?>
					
			</div>		
                </div>
            </div>
            <div class="table" style="margin-top:30px;">
                <div style="color:green"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <tr>
                        <td style="width:200px;">Name:</td>
                        <td align = "left"><?php echo $contactDetail['Contact']['name'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Email Address:</td>
                        <td align = "left"><?php echo $contactDetail['Contact']['email'] ?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Date & Time</td>
                        <td align = "left"><?php $date = $contactDetail['Contact']['updated']; 
                                     echo date('d-m-y H:i',strtotime($date));
                                     ?></td>
                    </tr>

                                        <tr>
                        <td style="width:200px;">Message:</td>
                        <td align = "left"><?php echo $contactDetail['Contact']['message'] ?></td>
                    </tr>

                </table>                        
            </div>                    
        </div>
    </div>
</div>




<style>
    .button-del{ float: right;
    color: #fff;
    font-size: 18px;
    font-weight: 400;
    padding-bottom: 6px;
    }
    .button-del a{ color: #fff;}
    




</style>