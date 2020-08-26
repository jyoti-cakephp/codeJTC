<?php

class ProductsController extends AppController {

    var $uses = array('Product', 'ProductImage', 'SubCategory', 'Category', 'User', 'Size', 'ProductSize', 'Wishlist', 'Basket', 'Brand','SuperCategory');
    
    function beforeFilter() {
        $this->Auth->allow('productView', 'productList', 'productDetail',
                  'searchProduct', 'addWishlist', 'wishList', 'deleteItem', 
                   'updateQuentity','compressImage','getExtension','productCoverImage');
    }
    
    function admin_addProduct($id = NULL) {
        $this->layout = "admin";
        $category = $this->Category->find('list', array('fields' => array('Category.category_name')));
        $brand = $this->Brand->find('list', array('fields' => array('Brand.brand_name')));
        //pr($brand);exit;
        $this->set(compact('category', 'brand'));
        $subcategory = $this->SubCategory->find('list', array('fields' => array('SubCategory.sub_category_name')));
        $size = $this->Size->find('list', array('fields' => array('Size.product_size')));
        $this->set(compact('subcategory', 'size'));

        if (!empty($this->request->data)) {

          //   pr($this->request->data);exit;

            $productsize = $this->request->data['ProductSize']['size'];
            //pr($productsize);exit;
            $categoryId = $this->request->data['Product']['category_id'];
            $subcategoryId = $this->request->data['Product']['subcategory_id'];
            $brandId = $this->request->data['Product']['brand_id'];
            $data['Product']['category_id'] = $this->request->data['Product']['category_id'];
            $data['Product']['subcategory_id'] = $this->request->data['Product']['subcategory_id'];
            $data['Product']['product_title'] = $this->request->data['Product']['product_title'];
            $data['Product']['product_type'] = $this->request->data['Product']['product_type'];
            $data['Product']['product_code'] = $this->request->data['Product']['product_code'];
            $data['Product']['brand_id'] = $this->request->data['Product']['brand_id'];
            $data['Product']['product_price'] = $this->request->data['Product']['product_price'];
            $data['Product']['short_description'] = $this->request->data['Product']['short_description'];
            $data['Product']['description'] = $this->request->data['Product']['description'];
            //pr($productsize);exit;
            if ($this->Product->save($data)) {
                $productId = $this->Product->getLastInsertID();
                if (!empty($productId)) {
                    $i = 1;
                    $sizes = array();
                    foreach ($productsize as $result) {
                        //pr($result);exit;
                        $sizes['ProductSize'][$i]['category_id'] = $categoryId;
                        $sizes['ProductSize'][$i]['subcategory_id'] = $subcategoryId;
                        $sizes['ProductSize'][$i]['brand_id'] = $brandId;
                        $sizes['ProductSize'][$i]['product_size'] = $result;
                        $sizes['ProductSize'][$i]['product_id'] = $productId;
                        $i++;
                    }

                    $this->ProductSize->create();
                    $this->ProductSize->saveAll($sizes['ProductSize']);
                }
                
                $this->redirect(array('controller' => 'products', 'action' => 'admin_productImage',$productId));
            }
        }
    }

    function admin_productListing() {
        $this->layout = "admin";
		if (isset($_GET['sort'])) {
                 $value = $_GET['sort'];
        }
        if (isset($_GET['name'])) {
                 $name = $_GET['name'];
        }
        $this->Session->write('name',$name);
        $conditions = array();
        if ($name != "") {
            $conditions[] = array('Product.product_title LIKE' => "%" . $name . "%");
        }
       if(!empty($value)){
           $order = array('Product.product_title' => $value);
        }else{
          $order = array('Product.id' => 'DESC');   
        }
		
        $this->paginate = array(
            'order' => $order,
            'conditions'=>$conditions,
            'limit' =>  20
        );
        $userList = $this->paginate('Product');
        
        $this->set(compact('userList','value','val'));
    }

    function admin_editProduct($id = NULL) {
        $this->layout = "admin";
        $order2 = array('SuperCategory.super_name' => 'ASC');
        $super = $this->SuperCategory->find('list', array('fields' => array('SuperCategory.super_name'), 'order' => $order2,));
        $order = array('Category.category_name' => 'ASC');
        $category = $this->Category->find('list', array('fields' => array('Category.category_name'),'order' => $order));
        $brand = $this->Brand->find('list', array('fields' => array('Brand.brand_name')));
        $size = $this->Size->find('list', array('fields' => array('Size.product_size')));
        $products = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
        $subcategory = $this->SubCategory->find('first', array('conditions' => array('SubCategory.id' => $products['Product']['subcategory_id'])));
        $cat = $this->Category->find('first', array('conditions' => array('Category.id' => $products['Product']['category_id'])));
        $order1 = array('SubCategory.sub_category_name' => 'ASC');
        $subList = $this->SubCategory->find('list', array('fields' => array('SubCategory.sub_category_name'),'order' => $order1));
        $userDetail = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
        $productImage = $this->ProductImage->find('all', array('conditions' => array('ProductImage.product_id' => $id)));
        $produtsize = $this->ProductSize->find('list', array('conditions' => array('ProductSize.product_id' => $id), 'fields' => array('ProductSize.id', 'ProductSize.product_size')));

        // pr($userDetail);exit;
        $this->set(compact('userDetail', 'brand', 'category', 'subcategory', 'size', 'produtsize', '$subList', 'products','super','cat'));
        if (!empty($this->request->data)) {
            // pr($this->request->data);exit;
            $productsizes = $this->request->data['ProductSize']['size'];
            $categoryId = $this->request->data['Product']['category_id'];
            $subcategoryId = $this->request->data['Product']['subcategory_id'];
            $superId = $this->request->data['Product']['super_id'];
            $brandId = $this->request->data['Product']['brand_id'];
            $this->Product->id = $id;
            if ($this->Product->save($this->data)) {
               $conditions = array('ProductSize.product_id' => $id);
                $productsizecount = $this->ProductSize->find('count', array('conditions' => $conditions));
                if ($productsizecount > 0) {
                    $simg = $this->admin_deleteProductSize($id);
                }
                $i = 1;
                $sizes = array();
                foreach ($productsizes as $result) {
                    //pr($result);exit;
                    $sizes['ProductSize'][$i]['category_id'] = $categoryId;
                    $sizes['ProductSize'][$i]['subcategory_id'] = $subcategoryId;
                    $sizes['ProductSize'][$i]['brand_id'] = $brandId;
                    $sizes['ProductSize'][$i]['super_id'] = $superId;
                    $sizes['ProductSize'][$i]['product_size'] = $result;
                    $sizes['ProductSize'][$i]['product_id'] = $id;
                    $i++;
                }
                $this->ProductSize->create();
                $this->ProductSize->saveAll($sizes['ProductSize']);

                //$this->Session->setFlash('Product has been updated successfully');
                $this->redirect(array('controller' => 'products', 'action' => 'editProductImage',$id));
            }
             $this->redirect(array('controller' => 'products', 'action' => 'editProductImage',$id));
        }
    }

    function admin_is_deactive($id = NULL) {
        if ($this->Product->updateAll(array('Product.featured_flag' => 0), array('Product.id' => $id))) {
            $this->Session->setFlash('This product has been deactived from featured product list');
            $this->redirect($this->referer());
        }
    }

    function admin_is_active($id = NULL) {
        if ($this->Product->updateAll(array('Product.featured_flag' => 1), array('Product.id' => $id))) {
            $this->Session->setFlash('This product has been added to featured product list');
            $this->redirect($this->referer());
       
       }
    }
	function admin_deactive($id = NULL) {
        if ($this->Product->updateAll(array('Product.is_active' => 1), array('Product.id' => $id))) {
			$this->Product->updateAll(array('Product.featured_flag' => 0), array('Product.id' => $id));
            $this->Session->setFlash('This product has been deactivated from product list');
            $this->redirect($this->referer());
        }
    }

    function admin_active($id = NULL) {
        if ($this->Product->updateAll(array('Product.is_active' => 0), array('Product.id' => $id))) {
            $this->Session->setFlash('This product has been activated from product list');
            $this->redirect($this->referer());
       
       }
    }

    function admin_new_deactive($id = NULL) {
       if ($this->Product->updateAll(array('Product.new_flag' => 1), array('Product.id' => $id))) {
           $this->Session->setFlash('Product is now out of stock.');
            $this->redirect($this->referer());
        }
    }
    
//    function admin_is_active($id = NULL) {
//        $productCount = $this->Product->find('count',array('conditions'=>array('Product.featured_flag'=>1)));
//       if( $productCount > 3){
//        $product = $this->Product->find('list',array('conditions'=>array('Product.featured_flag'=>1),'order'=>array('Product.updated'=>'DESC'),'fields'=>array('Product.id')));
//        $productId = end($product);
//        $date = date('Y-m-d H:i:s');
//        $data['Product']['featured_flag'] =  0;
//        $data['Product']['updated'] =  $date;
//        $this->Product->id = $productId;
//        if ($this->Product->save($data)) {
//            $date = date('Y-m-d H:i:s');
//            $data['Product']['featured_flag'] =  1;
//            $data['Product']['updated'] =  $date;
//            $this->Product->id = $id;
//            if ($this->Product->save($data)) {
//            $this->Session->setFlash('This product has been added to featured product list');
//            $this->redirect(array('controller' => 'products', 'action' => 'admin_productListing'));
//       
//       }
//       }
//       }else{
//        $date = date('Y-m-d H:i:s');
//        $data['Product']['featured_flag'] =  1;
//        $data['Product']['updated'] =  $date;
//        $this->Product->id = $id;
//        if ($this->Product->save($data)) {
//            $this->Session->setFlash('This product has been added to featured product list');
//            $this->redirect(array('controller' => 'products', 'action' => 'admin_productListing'));
//       
//       }
//    }
//    }

    function admin_new_active($id = NULL) {
        if ($this->Product->updateAll(array('Product.new_flag' => 0), array('Product.id' => $id))) {
            $this->Session->setFlash('Product is now available in stock.');
            $this->redirect($this->referer());
        }
    }

//    function admin_deleteProductImage($id = NULL) {
//        $this->autoRender = false;
//        $product = $this->ProductImage->find('list', array(
//            'conditions' => array(
//                'ProductImage.product_id' => $id
//            )
//        ));
//
//        $this->ProductImage->delete($product);
//        return 1;
//    }

    function admin_deleteProductSize($id = NULL) {
        $this->autoRender = false;
        $products = $this->ProductSize->find('list', array(
            'conditions' => array(
                'ProductSize.product_id' => $id
            )
        ));
        $this->ProductSize->delete($products);
        return 1;
    }

    function admin_delete($id = Null) {
        $this->autoRender = false;
        $productsize = $this->ProductSize->find('all', array('conditions' => array('ProductSize.product_id' => $id)));
      
        if (!$this->request->is('post')) {
            
        }
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            
        }
        $i = 0;
        $sizeId = array();
        foreach ($productsize as $result) {
            $sizeId[] = $result['ProductSize']['id'];
            $i++;
        }
        if ($this->Product->delete($id)) {
            $simg = $this->admin_deleteProductImage($id);
            $this->ProductSize->delete($sizeId);
            $this->Session->setFlash('Product has been deleted successfully');
            $this->redirect($this->referer());
        }
    }

    function admin_deleteProductImage($id=NULL){
        $this->autoRender = FALSE;
        $productImage = $this->ProductImage->find('list', array('conditions' => array('ProductImage.product_id' => $id),'fields'=>array('ProductImage.id')));
        $this->ProductImage->delete($productImage);
        return 1;
        
    }
    
    function admin_productDetail($id = NULL) {
        $this->layout = "admin";
        //Sachin Code
        $this->ProductSize->bindModel(array(
            'belongsTo' => array(
                'Size' => array('className' => 'Size',
                    'foreignKey' => 'product_size'
                ),
            ),
                ), false);


        $conditions = array('Product.id' => $id);
        $sizeconditions = array('ProductSize.product_id' => $id);
        $userData = $this->Product->find('first', array('conditions' => $conditions));
        //Sachin singh Code
        $productSize = $this->ProductSize->find('all', array('conditions' => $sizeconditions));
        //pr($userData);exit;
        $this->set(compact('userData', 'productSize'));
        //Sachin Code Ends here
    }

    function admin_addSub() {
      $this->layout='';
        
        if (!empty($this->data)) {

            $sub = $this->data['cid'];

            if (!empty($sub)) {
                $conditions = array('SubCategory.category_id' => $sub);
            }
            $subList = $this->SubCategory->find('list', array('conditions' => $conditions, 'fields' => array('SubCategory.sub_category_name')));
            //pr($subList);exit;
            $this->set(compact('subList'));
        }
    }
        function admin_addCat() {
        $this->layout='';
        
        if (!empty($this->data)) {

            $cat = $this->data['sid'];

            if (!empty($cat)) {
                $conditions = array('Category.super_id' => $cat);
            }
            $catList = $this->Category->find('list', array('conditions' => $conditions, 'fields' => array('Category.category_name')));
            //pr($subList);exit;
            $this->set(compact('catList'));
        }
    }

    function productView($id = NULL) {
        $this->layout = "jtc_layout";
        $productSize = $this->ProductSize->find('list', array('conditions' => array('ProductSize.subcategory_id' => $id),'group'=>array('ProductSize.product_size'),'fields'=>array('ProductSize.product_size')));
        $sizeName = $this->Size->find('all',array('conditions'=>array('Size.id'=>$productSize)));
        $productId = $this->ProductSize->find('list', array('conditions' => array('ProductSize.subcategory_id' => $id),'group'=>array('ProductSize.product_id'),'fields'=>array('ProductSize.product_id')));
        
        $productDetails = $this->Product->find('all',array('conditions'=>array('Product.id'=>$productId,'Product.is_active'=>'0')));
        
        
        $this->set(compact('sizeName','productDetails'));
        
    }

    function productDetail($id = NULL, $size_id = NULL) {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $this->ProductSize->bindModel(array(
            'belongsTo' => array(
                'Size' => array('className' => 'Size',
                    'foreignKey' => 'product_size',
                ),
            ))
        );
        $list = $this->ProductSize->find('all', array('conditions' => array('ProductSize.product_id' => $id)));
        //$list = $this->Size->find('list', array('fields' => array('Size.product_size')));
        // pr($list);exit;
        $productDetail = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
        $size = $this->Size->find('first', array('conditions' => array('Size.id' => $size_id)));
        //pr($size);exit;
        $countproduct = $this->ProductImage->find('count', array('conditions' => array('ProductImage.Product_id' => $id)));
        $wish = $this->Wishlist->find('first', array('conditions' => array('Wishlist.product_id' => $id, 'Wishlist.size' => $size_id)));
        $basket = $this->Basket->find('all', array('conditions' => array('Basket.product_id' => $id, 'Basket.is_basket' => 0)));
        //pr($basket);exit;
        //pr($countproduct);exit;
        //pr($productDetail);exit;
        $this->set(compact('productDetail', 'countproduct', 'userId', 'id', 'basket', 'size', 'wish', 'list', 'size_id'));
    }

    function productList($id = NULL, $category_id = NULL, $subcategory_id = NULL) {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $order = array('Size.id' => 'DESC');
        $this->Size->bindModel(array(
            'hasMany' => array(
                'ProductSize' => array('className' => 'ProductSize',
                    'foreignKey' => 'product_size',
                    'conditions' => array('ProductSize.product_size' => $id, 'ProductSize.subcategory_id' => $subcategory_id, 'ProductSize.category_id' => $category_id),
                    'order' => array('ProductSize.id' => 'DESC'),
                ),
            ))
        );
        $this->ProductSize->bindModel(array(
            'belongsTo' => array(
                'Product' => array('className' => 'Product',
                    'foreignKey' => 'product_id',
                ),
            ))
        );
        $this->ProductImage->bindModel(array(
            'belongsTo' => array(
                'Product' => array('className' => 'Product',
                    'foreignKey' => 'product_id',
                ),
            ))
        );
        $this->Size->recursive = 3;
        $this->paginate = array(
            'order' => $order,
            'conditions' => array('Size.id' => $id),
            'limit' => '12'
        );
        $productList = $this->paginate('Size');
        //pr($productList);exit;
        $this->set(compact('productList', 'value', 'userId'));
    }

    function searchProduct() {
        $this->layout = 'jtc_layout';
        // search for product title
        $userId = $this->Auth->User('id');
        @$product = $this->request->data['name'];
       if($product!==""){
       //pr($product);
        $order = array('Product.id' => 'DESC');
        if (!empty($product)) {
            $conditions = array('Product.product_title  LIKE' => '%' . $product . '%','Product.is_active'=>'0');
        } else {
            $conditions = array();
        }
        $this->paginate = array(
            'order' => $order,
            'conditions' => $conditions,
            'limit' => 12
        );
        $serachproduct = $this->paginate('Product');
        //pr($searchproduct);
       
        // search for category
        $userId = $this->Auth->User('id');
        @$cat = $this->request->data['name'];
       // pr($cat);
        $order = array('Product.id' => 'DESC');
        if (!empty($cat)) {
            $conditions = array('Category.category_name' => $cat,'Product.is_active'=>'0');
        } else {
            $conditions = array();
        }
        $this->paginate = array(
            'order' => $order,
            'conditions' => $conditions,
            'limit' => 12
        );
        $searchcat = $this->paginate('Product');
        //pr($searchcat);
       
        // search for subcategory
        $userId = $this->Auth->User('id');
        @$sub = $this->request->data['name'];
        //pr($product);die;
        $order = array('Product.id' => 'DESC');
        if (!empty($sub)) {
            $conditions = array('SubCategory.sub_category_name' =>$sub,'Product.is_active'=>'0');
        } else {
            $conditions = array();
        }
        $this->paginate = array(
            'order' => $order,
            'conditions' => $conditions,
            'limit' => 12
        );
        $searchsub = $this->paginate('Product');
        //pr($searchproduct);
       $this->set(compact('serachproduct','searchcat','searchsub', 'userId'));
    } else {
        $order = array('Product.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 12
        );
        $serachpro = $this->paginate('Product');
        //pr($serachpro);
        $this->set(compact('serachpro'));
    }
    }

    function addWishlist($id = NULL) {
        $this->autoRender = false;
        //pr($this->data);die;
        $userId = $this->Auth->User('id');
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        if (!empty($this->data)) {
                $quentity = $this->data['quentity'];
                $sizes['Wishlist']['user_id'] = $userId;
                $sizes['Wishlist']['cookies_id'] = $cookieId;
                $sizes['Wishlist']['product_id'] = $id;
                $sizes['Wishlist']['price'] = $this->data['price'];
                $sizes['Wishlist']['quentity'] = $quentity;
               
            $conditions = array( 'Wishlist.user_id' => $userId, 'Wishlist.product_id' => $id);
            // pr($conditions);die;
            if ($this->Wishlist->hasAny($conditions)) {
                echo "2";
                exit;
            } else {
               
                if ($this->Wishlist->save($sizes['Wishlist'])) {
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    die;
                }
            }
        }
    }

    function wishList() {
        $this->layout = 'jtc_layout';
        $userId = $this->Auth->User('id');
        $url = $this->params['controller'] . "/" . $this->params['action'];
        //pr($url);exit;
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        $this->Wishlist->recursive = 2;
        $wishData = $this->Wishlist->find('all', array('conditions' => array('Wishlist.user_id' => $userId)));
        //$basket = $this->Basket->find('first', array('conditions' => array('Basket.product_id' => $id, 'Basket.size' => $size_id, 'Basket.is_basket' => '0')));
        //pr($wishData);exit;
        //basketData = $this->Wishlist->find('list', array('conditions' => array('Wishlist.user_id' => $userId),'fields'=>array('Wishl
        $this->set(compact('wishData', 'url', 'userId', 'basket'));
    }

    function deleteItem($id = NULL) {
        $this->autoRender = false;
        if ($this->Wishlist->delete($id)) {
            $this->Session->setFlash('Product has been removed successfully.');
            $this->redirect(array('controller' => 'products', 'action' => 'wishList'));
        }
    }

    function updateQuentity($id = NULL) {
        $this->autoRender = false;
        $quentity = $this->data['que'];
        if ($this->Wishlist->updateAll(array('Wishlist.quentity' => $quentity), array('Wishlist.id' => $id))) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function sizeQuentity() {
        $this->layout = "";
        $sizeId = $this->data['size'];
        $size = $this->Size->find('list', array('conditions' => array('Size.id' => $sizeId), 'fields' => array('Size.product_size')));
        $this->set(compact('size'));
    }

    function admin_duplicateProduct($id = NULL) {
        $this->autoRender = FALSE;
        $product = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
        $data['Product']['category_id'] = $product['Product']['category_id'];
        $data['Product']['subcategory_id'] = $product['Product']['subcategory_id'];
        $data['Product']['super_id'] = $product['Product']['super_id'];
        $data['Product']['product_title'] = $product['Product']['product_title'];
        $data['Product']['brand_id'] = $product['Product']['brand_id'];
        $data['Product']['product_type'] = $product['Product']['product_type'];
        $data['Product']['product_code'] = $product['Product']['product_code'];
        $data['Product']['product_price'] = $product['Product']['product_price'];
        $data['Product']['short_description'] = $product['Product']['short_description'];
        $data['Product']['description'] = $product['Product']['description'];
        //pr($productsize);exit;
        if ($this->Product->save($data)) {
            $productId = $this->Product->getLastInsertID();
            $k = 1;
            $image = array();
            foreach ($product['ProductImage'] as $value) {

                $image['ProductImage'][$k]['image'] = $value['image'];
                $image['ProductImage'][$k]['product_id'] = $productId;

                $k++;
            }

            $this->ProductImage->create();
            $this->ProductImage->saveAll($image['ProductImage']);


            $i = 1;
            $sizes = array();
            foreach ($product['ProductSize'] as $result) {

                $sizes['ProductSize'][$i]['category_id'] = $result['category_id'];
                $sizes['ProductSize'][$i]['subcategory_id'] = $result['subcategory_id'];
                $sizes['ProductSize'][$i]['product_size'] = $result['product_size'];
                $sizes['ProductSize'][$i]['product_id'] = $productId;
                $i++;
            }

            $this->ProductSize->create();
            $this->ProductSize->saveAll($sizes['ProductSize']);
        }
        $this->Session->setFlash('Duplicate product has been added successfully.');
        $this->redirect(array('controller' => 'products', 'action' => 'admin_productListing'));
    }

 

   
    
    function admin_deleteImage($id=NULL,$productId=NULL){
        $this->autoRender = FALSE;
        if(!empty($id)){
            if($this->ProductImage->delete($id)){
                 $this->redirect($this->referer());
            }
        }
    }
    
    
     function admin_editProductImage($id=NULL){
        $this->layout = "admin";
        $productImage = $this->ProductImage->find('all',array('conditions'=>array("ProductImage.product_id"=>$id)));
        $this->set(compact('productImage','id'));
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['ProductImage']['image']['name'])) {
            $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
            $imagename = $this->request->data['ProductImage']['image']['name'];
            $size = $this->request->data['ProductImage']['image']['size'];
           $path = $_SERVER["DOCUMENT_ROOT"] . "/app/webroot/img/product1/";
            //pr($path);exit;
            $upload = move_uploaded_file($this->request->data['ProductImage']['image']['tmp_name'], $path . $imagename);
            if ($upload) {
                $ext = $this->getExtension($imagename);
              
                if (in_array($ext, $valid_formats)) {
                    $actual_image_name = time() . $imagename ;
                    $uploadedfile = $_SERVER["DOCUMENT_ROOT"]."/app/webroot/img/product1/" . $this->request->data['ProductImage']['image']['name'];
                    $widthArray = array(50,230,450); //You can change dimension here.
                    foreach ($widthArray as $newwidth) {
                        $filename = $this->compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth);
                        move_uploaded_file($this->request->data['ProductImage']['image']['tmp_name'], $filename);
                       
                        }
                        
                }
            }
            $data['ProductImage']['image'] = $actual_image_name;
            $data['ProductImage']['product_id'] = $id;
           if($this->ProductImage->save($data)){
               $this->Session->setFlash('Product has been edited successfully.');
                $this->redirect(array('controller' => 'products', 'action' => 'editProductImage',$id));
           }
        }
        }
    }
    
    
      function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }  
    
    
   function compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth) {
      //  echo $ext."==".$uploadedfile."==".$path."==".$actual_image_name."===".$newwidth; die;
        if ($ext == "jpg" || $ext == "jpeg") {

            $src = imagecreatefromjpeg($uploadedfile);
        } else if ($ext == "png") {
            $src = imagecreatefrompng($uploadedfile);
        } else if ($ext == "gif") {
            $src = imagecreatefromgif($uploadedfile);
        }else if ($ext == "JPEG") {
           $src = imagecreatefromjpeg($uploadedfile);
        }else if ($ext == "JPG") {
           $src = imagecreatefromjpeg($uploadedfile);
        }else {
            $src = imagecreatefrombmp($uploadedfile);
        }

        list($width, $height) = getimagesize($uploadedfile);
      //  pr($width); echo "=="; pr($height);
       if($height > $width){
        
            
            $newheight1 = $newwidth;
            $newwidth1 = ($width/$height)*$newwidth;
           
              $tmp = imagecreatetruecolor($newwidth1, $newheight1);
        }else if($width > $height){
         
           
//            $newheight=($width/$height)*$newwidth;
                $newheight1 = $newwidth;
                $newwidth1 = $newwidth;
                
             $tmp = imagecreatetruecolor($newwidth1, $newheight1);    
        }else{
            
                $newheight1 = $newwidth;
                $newwidth1 = $newwidth;
                
                
                  $tmp = imagecreatetruecolor($newwidth1, $newheight1);
        
        
           $whiteBackground = imagecolorallocate($tmp, 255, 255, 255);
            imagefill($tmp,0,0,$whiteBackground);
        }
    
      
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
        $filename = $path . $newwidth . '_' . $actual_image_name; //PixelSize_TimeStamp.jpg
    //    echo $filename; die;
        imagejpeg($tmp, $filename, 100);
        imagedestroy($tmp);
        return $filename;
    }
    
    
    
    function getrandomstr() {
        $length = 10;
        $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
        $string = "";
        for ($p = 0; $p < $length; $p++) {
            @$string .= $characters[mt_rand(0, strlen($characters))];
        }
        return $string;
    }

    function coverImage(){
        $this->autoRender = FALSE;
        $id = $this->data['id'];
        $coverImage = $this->ProductImage->find('first',array('conditions'=>array('ProductImage.cover_image'=>1)));
        if(!empty($coverImage)){
            $data['ProductImage']['cover_image'] = 0;
            $this->ProductImage->id = $coverImage['ProductImage']['id'];
            if($this->ProductImage->save($data)){
             $data['ProductImage']['cover_image'] = 1;
            $this->ProductImage->id = $id;
            $this->ProductImage->save($data);
            echo 0;die;
            }else{
                echo 1; die;
            }
        }else{
            $data['ProductImage']['cover_image'] = 1;
            $this->ProductImage->id = $id;
        if($this->ProductImage->save($data)){
            echo 0;die;
        }else{
            echo 1;die;
        }
    }
    }
    
    function productCoverImage($id=NULL){
        $this->autoRender = FALSE;
        $productCoverImage = $this->ProductImage->find('first',array('conditions'=>array('ProductImage.product_id'=>$id,'ProductImage.cover_image'=>1)));
        return $productCoverImage;
    }
}

