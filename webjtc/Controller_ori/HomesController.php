<?php

class HomesController extends AppController {

    var $uses = array('Category', 'Product', 'Country', 'Size', 'Basket','ProductImage','Brand','ProductSize','SuperCategory','SubCategory');
    
    var $components = array('Resize');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'countryList', 'getrandomstr', 'countItem','jtc','brandDetail','productListing');
    }

    function index($id = Null) {
        $this->layout = "jtc_layout";
        //$this->SubCategory->query("ALTER TABLE `sds_jtc_sub_categories` ADD `super_id` INT( 11 ) NOT NULL AFTER `id`;");
//$cat = $this->Category->find("all", array('Category.id' => 'DESC'));
        $cat = $this->Category->find('all', array('order' => array('Category.id' => 'DESC')));
       // pr($cat);exit;
        $this->SuperCategory->recursive =2;
        $super = $this->SuperCategory->find('all', array('conditions' => array('SuperCategory.id' => 1)));
        //pr($super);exit;
        $this->SuperCategory->recursive =2;
        $super1 = $this->SuperCategory->find('all', array('conditions' => array('SuperCategory.id' => 2)));
        //pr($super1);exit;
        $brand = $this->Brand->find('all', array('order' => array('Brand.id' => 'DESC')));
        //pr($brand);exit;
        $featureProduct = $this->Product->find('all', array('conditions' => array('Product.featured_flag' => 1), 'limit' => 6, 'order' => array('Product.id' => 'DESC')));
        //pr($featureProduct);exit;
        $this->set(compact('cat', 'featureProduct','brand','super','super1'));
    }
    
    
    function dashboard($id = Null) {
        $this->layout = "jtc_layout";
        //$cat = $this->Category->find("all", array('Category.id' => 'DESC'));
        $cat = $this->Category->find('all', array('order' => array('Category.id' => 'DESC')));
        //pr($cat);exit;
        $brand = $this->Brand->find('all', array('order' => array('Brand.id' => 'DESC')));
        //pr($brand);exit;
        $featureProduct = $this->Product->find('all', array('conditions' => array('Product.featured_flag' => 1), 'limit' => 4, 'order' => array('Product.id' => 'DESC')));
      echo "dfsdf"; die;
        $this->set(compact('cat', 'featureProduct','brand'));
    }
    

    function countryList() {
        $this->autoRender = FALSE;
        $countryList = $this->Country->find('list', array('fields' => array('Country.countries_name')));
        return $countryList;
    }

    function admin_addSize() {
        $this->layout = "admin";
        
        echo "add size"; die;
        if (!empty($this->request->data)) {
            if ($this->Size->save($this->data)) {
                $this->Session->setFlash('You have successfully added the size.');
                $this->redirect(array('controller' => 'homes', 'action' => 'admin_sizeListing'));
            }
        }
    }

    function admin_sizeListing() {
        $this->layout = "admin";
        $order = array('Size.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
           'limit' => 10
        );
        $sizeList = $this->paginate('Size');
        //$sizeList = $this->Size->find('all', array('order' => array('Size.id' => "DESC")));
        $this->set(compact('sizeList'));
    }

    function admin_editSize($id = NULL) {
        $this->layout = "admin";
        $sizeDetail = $this->Size->find('first', array('conditions' => array('Size.id' => $id)));
        $this->set(compact('sizeDetail'));
        if (!empty($this->request->data)) {
            $this->Size->id = $id;
            if ($this->Size->save($this->data)) {
                $this->Session->setFlash('You have successfully updated the size.');
                $this->redirect(array('controller' => 'homes', 'action' => 'admin_sizeListing'));
            }
        }
    }

    function admin_delete($id = NULL) {
        $this->autoRender = FALSE;
        if ($this->Size->delete($id)) {
            $this->Session->setFlash('You have successfully deleted the size.');
            $this->redirect(array('controller' => 'homes', 'action' => 'admin_sizeListing'));
        }
    }

    function countItem() {
        $this->autoRender = false;
        $id = $this->Auth->User('id');
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        $countProduct = $this->Basket->find('all', array('conditions' => array('Basket.is_basket' => 0, 'Basket.user_id' => $id)));
        return $countProduct;
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

         function brandDetail($id = NULL) {
        $this->layout = "jtc_layout";
        $productSize = $this->ProductSize->find('list', array('conditions' => array('ProductSize.brand_id' => $id),'group'=>array('ProductSize.product_size'),'fields'=>array('ProductSize.product_size')));
        //pr($productSize);die;
        $sizeName = $this->Size->find('all',array('conditions'=>array('Size.id'=>$productSize)));
        $productId = $this->ProductSize->find('list', array('conditions' => array('ProductSize.brand_id' => $id),'group'=>array('ProductSize.product_id'),'fields'=>array('ProductSize.product_id')));
        
        $productDetails = $this->Product->find('all',array('conditions'=>array('Product.id'=>$productId,'Product.is_active'=>'0')));
        //pr($productDetails);die;
        
        $this->set(compact('sizeName','productDetails'));
}
       function productListing($id = NULL, $brand_id = NULL) {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $order = array('Size.id' => 'DESC');
        $this->Size->bindModel(array(
            'hasMany' => array(
                'ProductSize' => array('className' => 'ProductSize',
                    'foreignKey' => 'product_size',
                    'conditions' => array('ProductSize.product_size' => $id, 'ProductSize.brand_id' => $brand_id),
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
}
?>
