<div class="keyfeat size-qty">
                                <div class="col-md-6 prod-name">Product Size</div>
                                <div class="col-md-6 prod-name">Quantity</div>
                                 <?php foreach($size as $key=>$val){ ?>
                                <div class="col-md-6 size"><?php echo $val;?></div>
                                  <div class="col-md-6">
                                   <input type="text" name="pname[]" class="form-control text-center pls-min det-pls-min2" value="1" id="num<?php echo $key;?>" onkeyup="chekquentity(<?php echo $key;?>)">
   <a href="javascript:void(0)" onclick='subtract(<?php echo $key;?>)'><?php echo $this->html->image('minus.png', array('class' => 'plus-img3')); ?></a>                   <a href="javascript:void(0)" onclick='add(<?php echo $key;?>)'><?php echo $this->html->image('plus.png', array('class' => 'plus-img4')); ?></a>
                                  </div>
                                 <?php } ?>     
                                  
                            </div>
