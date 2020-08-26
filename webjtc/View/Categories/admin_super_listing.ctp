
<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Super Category Listing

                </div>
<!--                <select class="form-control pull-right" style="width: 225px;" id="sortdata1" onchange="selectsort()">
                    <option value="">Sort by category name</option>
                    <option value="ASC" <?php //echo ($value == 'ASC') ? "selected" : "" ?>>A to Z</option>
                    <option value="DESC" <?php //echo ($value == 'DESC') ? "selected" : "" ?>>Z to A</option>
                </select>-->
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
<!--                        <div style="color:green">   <?php //echo $this->Session->flash();  ?> </div>-->
                <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>

                        <tr>
                            <th style="text-align:center" >S.No.</th>
                            <th style="text-align:center" >Super Category Name</th>
                            <th style="text-align:center" colspan="2">Action</th>

                        </tr>

                    </thead>
<!--                    <tfoot>
                        <tr>
                            <td colspan="9" class="rounded-foot-left"><em><?php //echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        <?php $i = 1;
                        foreach ($superList as $result) { ?>

                            <tr>
                                <td><?php echo $i; ?></td>

                                <td><?php echo $result['SuperCategory']['super_name']; ?></a></td>


                                <td><a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_superEdit', $result['SuperCategory']['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
                        </tr>
    <?php $i++;
} ?>

                    </tbody>
                </table>

            </div>                    
        </div>
    </div>
</div>
<Script>
       function selectsort() {
        var value = $("#sortdata1").val();
        //alert(value);
        if (value == "ASC") {
            window.location.href = SITEPATH + "admin/categories/categoryListing" + "/ASC";
        } else if (value == "DESC") {
            window.location.href =  SITEPATH + "admin/categories/categoryListing" + "/DESC";
        }

    }
</script>
