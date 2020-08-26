<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Contact Listing
                        </div>
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Name</th>
                                    <th style="text-align:center">Email Address</th>
									<th style="text-align:center">Date & Time</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                                     <tfoot>
                        <tr>
                         <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                           <?php $i=1; foreach($contactList as $result) { ?>
                                <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['Contact']['name']; ?></td>
                                      <td><?php echo $result['Contact']['email']; ?></td>
									  <td><?php $date = $result['Contact']['updated']; 
                                     echo date('d-m-y H:i',strtotime($date));
                                     ?>
                                     </td>
                                      <td><a href="<?php echo $this->html->url(array('controller'=>'Contacts','action'=>'admin_contactView',$result['Contact']['id']));?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td>  
                                </tr>
                           <?php $i++;} ?>                                
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>