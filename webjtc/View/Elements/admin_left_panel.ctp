<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
        <!-- BEGIN SIDEBAR MENU -->

        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">

            </li>
            <li class="open active">
                <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Dashboard
                    </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        User Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
<li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_userListing')); ?>"><i class="fa fa-list"></i>Traders Listing</a></li>

                </ul>
            </li>
               <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Content Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
<li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_contentListing')); ?>"><i class="fa fa-list"></i>Content Listing</a></li>

                </ul>
            </li>
               <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Contact Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
<li><a href="<?php echo $this->html->url(array('controller' => 'contacts', 'action' => 'admin_contactList')); ?>"><i class="fa fa-list"></i>Contact Listing</a></li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Brand Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
<li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_addBrand')); ?>"><i class="fa fa-list"></i>Add Brand</a></li>
<li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_brandListing')); ?>"><i class="fa fa-list"></i>Brand Listing</a></li>

                </ul>
            </li>
            
      <li>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>
                <span class="title">
                    Supercategory Mgt.
                </span>
                <span class="arrow ">
                </span>
            </a>
            <ul class="sub-menu">
               <li> <a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_superListing')); ?>"><i class="fa fa-list"></i>Supercategory Listing</a></li>
            </ul>
        </li>      
            
            
<li>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>
                <span class="title">
                    Category Management
                </span>
                <span class="arrow ">
                </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_addCategory')); ?>"><i class="fa fa-list"></i>Add Category</a></li>
                <li> <a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_categoryListing')); ?>"><i class="fa fa-list"></i>Category Listing</a></li>
            </ul>
        </li>
           <li>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>
                <span class="title">
                   Subcategory Mgt.
                </span>
                <span class="arrow ">
                </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_addSubcategory')); ?>"><i class="fa fa-list"></i>Add Subcategory</a></li>
                <li> <a href="<?php echo $this->html->url(array('controller' => 'categories', 'action' => 'admin_subcategoryListing')); ?>"><i class="fa fa-list"></i>Subcategory Listing</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>
                <span class="title">
                    Size Management
                </span>
                <span class="arrow ">
                </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->html->url(array('controller' => 'sizes', 'action' => 'admin_addSize')); ?>"><i class="fa fa-list"></i>Add Size</a></li>
                <li> <a href="<?php echo $this->html->url(array('controller' => 'sizes', 'action' => 'admin_sizeListing')); ?>"><i class="fa fa-list"></i>Size Listing</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>
                <span class="title">
                    Product Management
                </span>
                <span class="arrow ">
                </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->html->url(array('controller' => 'images', 'action' => 'addProduct')); ?>"><i class="fa fa-list"></i>Add Product</a></li>
                 <li>
                    <a href="<?php echo $this->html->url(array('controller' => 'products', 'action' => 'productListing')); ?>"><i class="fa fa-list"></i>Product Listing</a></li>
            </ul>
        </li>
              <li>
                            <a href="javascript:;">
                                <i class="fa fa-building-o"></i>
                                <span class="title">
                                    Newsletter Mgt.
                                </span>
                                <span class="arrow ">
                                </span>
                            </a>
                            <ul class="sub-menu">
                              <li><a href="<?php echo $this->html->url(array('controller'=>'news','action'=>'admin_addNewsletter')); ?>"><i class="fa fa-list"></i>Add Newsletter</a></li>
                              <li><a href="<?php echo $this->html->url(array('controller'=>'news','action'=>'admin_listNewsletter')); ?>"><i class="fa fa-list"></i>Newsletter Listing</a></li>
                            <li><a href="<?php echo $this->html->url(array('controller'=>'news','action'=>'admin_emailListing')); ?>"><i class="fa fa-list"></i>Email Listing</a></li></ul>
                            </li>
                   <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Order Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
<li><a href="<?php echo $this->html->url(array('controller' => 'carts', 'action' => 'admin_orderListing')); ?>"><i class="fa fa-list"></i>Order Listing</a></li>

                </ul>
            </li>          
           <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        FAQ Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
 <li><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_addFaq')); ?>"><i class="fa fa-list"></i>Add FAQ</a></li>                   
<li><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_faqList')); ?>"><i class="fa fa-list"></i>FAQ Listing</a></li>

                </ul>
            </li>
             <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        POP-UP Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
 <li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_popUp')); ?>"><i class="fa fa-list"></i>POP-UP</a></li>                   
</ul>
            </li>

  <li>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>
                <span class="title">
                    Miscellaneous
                </span>
                <span class="arrow ">
                </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_changePassword')); ?>"><i class="fa fa-list"></i>Change Password</a></li>
            </ul>
        </li>



        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->