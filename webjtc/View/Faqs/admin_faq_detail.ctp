<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>FAQ Detail
                </div>
            </div>

            <div class="table" style="margin-top:30px;">
                <div style="color:green">   <?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">

                    <tr>
                        <td style="width:200px;">Question</td>
                        <td align = "left"><?php echo $userData['Faq']['question']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Answer</td>
                        <td align = "left"><?php echo $userData['Faq']['answer']; ?></td>
                    </tr>

                </table>

            </div>                    
        </div>
    </div>
</div>