<br><br>
<div class="container">
<div class="row">
<figure class="right-banner-boy2">
     <?php echo $this->html->image('banner-rightside-boy.png', array('class' => 'img-responsive')) ?>
</figure>     

</div>
</div>

<div class="container">
    <?php if(!empty($myorder)) { ?>
<div class="row">
   <div class="col-md-12 product-container detail">

<p class="col-md-6 confirm-head"><strong>My Orders</strong></p>
<!--<div class="col-md-6">
<div class="pull-right selectshow pull-right">
<select>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
</div>
<p class="text-right processing shownum pull-right"> Show </p>

</div>-->
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="" class="text-center cart-fields-txt">Order#</th>
              <th style="" class="text-center cart-fields-txt">Order Date</th>
<!--              <th style="width:20%" class="cart-fields-txt text-center">Order Total</th>-->
              <th style="" class="text-center cart-fields-txt">Order Status</th>
              <th style="width:1%" class="text-left cart-fields-txt">View</th>
            </tr>
          </thead>
            <tbody>
              <?php $i=1; foreach($myorder as $result) { ?>
            <tr>
              <td data-th="Product">
                <div class="row">
                  
                  <div class="col-sm-12 text-center">
                    <h4 class="nomargin"><?php echo $result['Order']['order_number'];?></h4>
                   
                  </div>
                </div>
              </td>
              <td data-th="Price" class="text-center"><?php echo date('d-m-Y',strtotime($result['Order']['created']));?></td>
<!--              <td data-th="Quantity" class="text-center">
              £&nbsp;<?php //echo $result['Order']['total_price'];?>
              </td>-->
                <?php if($result['Order']['order_status']=="0") { ?>
              <td data-th="Subtotal" class="text-center"><span class="processing"><?php echo "Pending" ?></span>
              </td>
              <?php } else { ?>
              <td data-th="Subtotal" class="text-center"><span class="processing"> <?php echo "Completed" ?> </span>
              </td>
              <?php } ?>
              <td class="actions text-center" data-th="">
                <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'viewOrder', $result['Order']['id']))?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-search order-search" aria-hidden="true"></span></a>   
<!--                 <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>              -->
              </td>
            </tr>
                <?php $i++;} ?>
          </tbody>
          <tfoot>
            <tr class="visible-xs">
              <td class="text-center"><strong>Total 3.98</strong></td>
            </tr>
            <tr>
              <td><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'userAccount')); ?>" class="btn btn-warning cont-shop-btn"><i class="fa fa-angle-left"></i>Back</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong></strong></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
<!--<div class="col-md-12 text-right">
<div class="pull-right selectshow pull-right">
<select>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
</div>
<p class="text-right processing shownum pull-right"> Show </p>

</div>-->

</div>
</div> 
    <?php }else{ ?>
   <div class="message1"> There is no product available in order list</div>
            <?php } ?>
</div>
 <style>
        .message1{

        font-size: 29px;
        margin-top: 150px;
        min-height: 300px;
        text-align: center;
       }
    </style>



