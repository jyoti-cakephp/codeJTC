<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Product Detail
                </div>
            </div>
            
            <div class="table" style="margin-top:30px;">
                <div style="color:green">   <?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
              
                    <tr>
                        <td style="width:200px;">Category Name</td>
                        <td align = "left"><?php echo $userData['Category']['category_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Sub Category</td>
                        <td align = "left"><?php echo $userData['SubCategory']['sub_category_name']; ?></td>
                    </tr>

                     <tr>
                    <td style="width:200px;">Product Size</td>
                                <td align = "left">
                               <?php foreach ($productSize as $result) {?>

                                    <?php echo $result['Size']['product_size']; ?>
                                     <br/>

                               <?php }?>
                                
                              </br>
                                </td>
                             </tr> 
                             
                             
                    <tr>
                        <td style="width:200px;">Product title</td>
                        <td align = "left"><?php echo $userData['Product']['product_title']; ?></td>
                    </tr>
                     <tr>
                        <td style="width:200px;">Product Size</td>
                        <td align = "left"><?php echo $userData['Product']['product_type']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Price</td>
                        <td align = "left"><?php echo $userData['Product']['product_price']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Brand</td>
                        <td align = "left"><?php echo $userData['Brand']['brand_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Short Description</td>
                        <td align = "left"><?php echo $userData['Product']['short_description']; ?></td>
                    </tr>
            
                    <tr>
                        <td style="width:200px;">Description</td>
                        <td align = "left"><?php echo $userData['Product']['description']; ?></td>
                    </tr>
            
                       <?php foreach($userData['ProductImage']  as $image): ?>
                           <tr>
             <td align="left" colspan="2">
      <?php echo $this->Html->image('product1/50_'.$image['image']);?></td>
        </tr>
                            <?php endforeach; ?>
                   
                   

                </table>

            </div>                    
        </div>
    </div>
</div>

