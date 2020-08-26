
<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i> View Content Details
                        </div>
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:green"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <tr>
                                <td style="width:200px;">Page Title:</td>
                                <td align = "left"><?php echo $contentDetail['Content']['page_title']?></td>
                            </tr>
                            <tr>
                                <td style="width:200px;">Description:</td>
                                <td align = "left"><?php echo $contentDetail['Content']['description']?></td>
                            </tr>

                        </table>                        
                    </div>                    
                </div>
            </div>
        </div>


