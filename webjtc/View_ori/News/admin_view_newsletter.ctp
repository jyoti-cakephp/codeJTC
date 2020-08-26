
<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Newsletter view
                        </div>
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:green">   <?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
<!--                            <tr>
                                <td style="width:200px;">Product Name</td>
                                <td align = "left"><?php echo $productview['Product']['product_name'] ?></td>
                            </tr>-->
                             <tr>
                                <td style="width:200px;">Message</td>
                                <td align = "left"><?php echo $newsview['Newsletter']['message'] ?></td>
                            </tr>
                            
              </table>
                        
                    </div>                    
                </div>
            </div>
        </div>

