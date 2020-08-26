<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<div class="row">
<div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Sub Category Listing
                </div>
                  <select class="form-control pull-right" style="width: 225px;" id="sortdata1" onchange="selectsort()">
                            <option value="">sort by Category name</option>
                                <option value="ASC" <?php echo ($value == 'ASC') ? "selected" : "" ?>>A to Z</option>
                            <option value="DESC" <?php echo ($value == 'DESC') ? "selected" : "" ?>>Z to A</option>
                        </select>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
               <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align:center" >S.No.</th>
                           <th style="text-align:center" >Super Category Name</th>
                                <th style="text-align:center" >Category Name</th>
                            <th style="text-align:center" >Sub Category Name</th>
                            <th style="text-align:center" >Action</th>
                        </tr>
                        
                       
                    </thead>
                        <tfoot>
                        <tr>
                         <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>       
                    <tbody>
                        
                       
                      <?php  $i = 1;
                        foreach ($sublist as $result) { 
                           if(!empty($result['SubCategory'])) {
                            $count = count($result['SubCategory']); 
                            ?>

                            
                                <?php for($j=0;$j <= $count-1; $j++) { // pr($result['SubCategory'][$j]); die; ?>
                                <tr>
                                 <td><?php echo   $i; ?></td>
                                
                                 <td><?php echo $result['SubCategory'][$j]['SuperCategory']['super_name']; ?></td>
                                 <td><?php echo $result['Category']['category_name']; ?></a></td>
                                <td><?php echo $result['SubCategory'][$j]['sub_category_name']; ?></a></td>
                                  
                                <td><a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_editSubcategory', 
                                    $result['SubCategory'][$j]['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
                              
                                
                                <td> <?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'categories',
                                        'action' => 'admin_deleteSubcategory',
                                        $result['SubCategory'][$j]['id']
                                            ), array(
                                        'escape' => false,
                                        'alt' => 'delete',
                                        'title' => 'delete',
                                        'confirm' => 'Are you sure?' 
                                    ));
                                    ?></td>
                                </tr>
                                <?php  $i++; }   ?>
                            
                           <?php 
                           
                                } 
                        }
                         ?>
                      
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
            window.location.href = SITEPATH + "admin/categories/subcategoryListing" + "/ASC";
        } else if (value == "DESC") {
            window.location.href = SITEPATH + "admin/categories/subcategoryListing" + "/DESC";
        }

    }
</script>
