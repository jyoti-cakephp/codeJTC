<?php if($this->params['controller']=='homes' && $this->params['action']=='index'){ ?>
<title>jtc</title>
<?php } ?>

<header class="container-fluid header_bg">
    <section class="container">
        <article class="top_bar">
            <article class="row">
                <article class="col-lg-6">
                    <p>Feel free to phone us on  +44 (0)121 333 7374</p>
                </article>
                <article class="col-lg-6">
                    <ul class="list-unstyled list-inline text-right">
                        <li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'aboutUs')) ?>">About Us</a></li>
                        <li><a href="<?php echo $this->html->url(array('controller' => 'contacts', 'action' => 'contactUs')) ?>">Contact</a></li>
                        <li class="dropdown"><a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop4" href="#">Account <span class="caret"></span></a>
                            <ul aria-labelledby="drop4" class="dropdown-menu account" id="menu2">
                                <li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'userAccount')) ?>">My Account</a></li>
                                <li><a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'wishList')) ?>">My Wishlist</a></li>
                            </ul>
                            </li>
                        <?php if ($this->Session->read('Auth.User.username') == '') { ?>
                            <li><a href="#" data-toggle="modal" data-target="#myModal">Register/Login</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'signout')) ?>">Logout</a></li>
                        <?php } ?>
                    </ul>
                </article>
            </article>
        </article><!--/article top bar -->

        <div class="row">

            <div class="col-md-3 footer-logo-cen">
                <?php if($this->Session->read('Auth.User.username') == ''){?>
                
          <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index')) ?>"><?php echo $this->html->image('logo.png'); ?></a>
                <?php } else { ?>
       <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'dashboard')) ?>"><?php echo $this->html->image('logo.png'); ?></a>     
                    
             <?php   } ?>
            </div>

            <div class="col-md-6 search">
             
              <!--  <div class="col-md-4">
                    <select class="form-control search-select">
                        <option>Baby Clothes</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>-->
                <div class="col-md-12">

 <?php echo $this->form->create('Product', array('controller' => 'products', 'action' => 'searchProduct', 'class'=>'input-group stylish-input-group' , 'id' => 'searchId')); ?>                                

<input type="text" class="form-control" Placeholder="Search for a Category or Product" name="data[name]" onkeypress="return runnewsScript(event);" value="<?php echo isset($_REQUEST['data']['name']) ? $_REQUEST['data']['name'] : ''?>">    
       
       

                                        <span class="input-group-addon">
                                            
     <a href="javascript:void(0)" >  <span onclick="search();" class="glyphicon glyphicon-search"></span></a>                                              
            <!-- code Ends here-->                                   
                                            
                                        </span>
  <?php echo $this->form->end(); ?>       
                                    </div>
            </div>
 <div class="col-md-2 col-md-offset-1 cart text-center">
   <?php $basketData = $this->requestAction(array('controller' => 'homes', 'action' => 'countItem')); ?>
            <?php if(!empty($basketData)){ ?>
                <?php  //$total = 0; foreach($basketData as $result) { ?>
                   <?php //$total = $total +  $result['Basket']['price']*$result['Basket']['quentity'];?>
                    <?php //} ?>     
      <a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'index'))?>">       
     <span class=" glyphicon glyphicon-shopping-cart"></span><span class="cart-txt"> CART :</span> <span><?php echo count($basketData);?>(Items)<strong> <?php //echo $total;?>
              </strong></span></a>
<?php }else{ ?> 
     <a href="<?php echo $this->html->url(array('controller'=>'carts','action'=>'index'))?>">  <span class=" glyphicon glyphicon-shopping-cart"></span><span class="cart-txt"> CART :</span> <span>0(Items)<strong></strong></span></a>
<?php } ?>
            </div>           
            </div>

        </div>




        <nav class="navbar navbar-inverse">
            <article class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </article>
            <article id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
           <li class="<?php if($this->params['controller'] == 'homes' &&  $this->params['action'] == 'index'){ echo "active";};?>">
               <?php if($this->Session->read('Auth.User.username') == ''){ ?>
                <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index')); ?>">Home</a>
               <?php }else{  ?> 
               <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'dashboard')); ?>">Home</a>
              <?php } ?>
               
          </li>
          
          
        <li class ="<?php if($this->params['controller'] == 'contents' &&  $this->params['action'] == 'aboutUs'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'aboutUs')); ?>">About</a></li>
        <li class ="<?php if($this->params['controller'] == 'contacts' &&  $this->params['action'] == 'contactUs'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contacts', 'action' => 'contactUs')); ?>">Contact</a></li>
        <li class ="<?php if($this->params['controller'] == 'contents' &&  $this->params['action'] == 'orderDel'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'orderDel')); ?>">Orders & Delivery</a></li> 
         <li class ="<?php if($this->params['controller'] == 'contents' &&  $this->params['action'] == 'termCondition'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'termCondition')); ?>">Terms & Conditions</a></li> 
   <li class ="<?php if($this->params['controller'] == 'contents' &&  $this->params['action'] == 'privacyPolicy'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'privacyPolicy')); ?>">Privacy Policy</a></li>  
   <li class ="<?php if($this->params['controller'] == 'faqs' &&  $this->params['action'] == 'faq'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'faq')); ?>">F.A.Q's</a></li>  
                     
                     
                     
                </ul>
            </article><!--/.nav-collapse -->
        </nav>
    </section>
</header>
<script>
 function search(){
    $("#searchId").submit();
}
</script>
<script>
     function runnewsScript(e) {
        if (e.keyCode === 13) {
            search();
        }
    }
    
    </script>

