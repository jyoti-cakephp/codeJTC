<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Trader Details
                </div>
            </div>
            
            <div class="table" style="margin-top:30px;">
                <div style="color:green">   <?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
              
                    <tr>
                        <td style="width:200px;">First Name</td>
                        <td align = "left"><?php echo $userDetail['User']['first_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Last Name</td>
                        <td align = "left"><?php echo $userDetail['User']['last_name']; ?></td>
                    </tr>
                     <tr>
                        <td style="width:200px;">Mobile No</td>
                        <td align = "left"><?php echo $userDetail['User']['mobile_no']; ?></td>
                    </tr>
                       <tr>
                        <td style="width:200px;">Email</td>
                        <td align = "left"><?php echo $userDetail['User']['email']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Company Name</td>
                        <td align = "left"><?php echo $userDetail['User']['company_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Address</td>
                        <td align = "left"><?php echo $userDetail['User']['address']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">City</td>
                        <td align = "left"><?php echo $userDetail['User']['city']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Post Code</td>
                        <td align = "left"><?php echo $userDetail['User']['post_code']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Company Reg. Number</td>
                        <td align = "left"><?php echo $userDetail['User']['company_reg_num']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Vat Reg. Number</td>
                        <td align = "left"><?php echo $userDetail['User']['vat_reg_number']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Country</td>
                        <td align = "left"><?php echo $userDetail['User']['country']; ?></td>
                    </tr>
                     <tr>
                        <td style="width:200px;">Date & Time</td>
                        <td align = "left"><?php $date = $userDetail['User']['updated']; 
                                     echo date('d-m-y H:i',strtotime($date));
                                     ?></td>
                    </tr>
                  
                  </table>

            </div>                    
        </div>
    </div>
</div>

