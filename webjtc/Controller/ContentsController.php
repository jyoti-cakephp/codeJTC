<?php

class ContentsController extends AppController {
 
   var $uses = array('Product', 'ProductImage', 'SubCategory', 'Category', 'User', 'Size','ProductSize','Content','Brand','SuperCategory');
   
   var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeRender() {
        
    }

    function beforeFilter() {
        $this->Auth->allow('aboutUs','orderDel','termCondition','privacyPolicy','categoryDetail','productListing');
    }

    function admin_contentListing() {
        $this->layout = 'admin';
        $order = array('Content.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $content = $this->paginate('Content');
        $this->set(compact('content'));
    }

    function admin_editcontent($id = NULL) {
        $this->layout = "admin";
        $pageDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        $this->set(compact('pageDetail'));
        if (!empty($this->request->data)) {
            $this->Content->id = $id;
            if ($this->Content->save($this->data)) {
                $this->Session->setFlash('Content has been updated successfully.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'contents', 'action' => 'admin_contentListing'));
            }
        }
    }

    function admin_viewContent($id = NULL) {
        $this->layout = "admin";
        $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        //pr($propertyDetail);exit;
        $this->set(compact('contentDetail'));
    }

    function aboutUs() {
        $this->layout = "jtc_layout";
        $aboutUs = $this->Content->find('first', array('conditions' => array('Content.page_title' => 'About Us')));
        $this->Set(compact('aboutUs'));
    }
    
     function orderDel() {
        $this->layout = "jtc_layout";
        $order = $this->Content->find('first', array('conditions' => array('Content.page_title' => 'Orders & Delivery')));
        $this->Set(compact('order'));
    }
    
       function termCondition() {
        $this->layout = "jtc_layout";
        $term = $this->Content->find('first', array('conditions' => array('Content.page_title' => 'Terms & Conditions')));
        $this->Set(compact('term'));
    }
    
     function privacyPolicy() {
        $this->layout = "jtc_layout";
        $privacy = $this->Content->find('first', array('conditions' => array('Content.page_title' => 'Privacy Policy')));
        $this->Set(compact('privacy'));
    }
    
     function categoryDetail($id = NULL) {
        $this->layout = "jtc_layout";
        $productSize = $this->ProductSize->find('list', array('conditions' => array('ProductSize.category_id' => $id),'group'=>array('ProductSize.product_size'),'fields'=>array('ProductSize.product_size')));
        //pr($productSize);die;
        $sizeName = $this->Size->find('all',array('conditions'=>array('Size.id'=>$productSize)));
        $productId = $this->ProductSize->find('list', array('conditions' => array('ProductSize.category_id' => $id),'group'=>array('ProductSize.product_id'),'fields'=>array('ProductSize.product_id')));
        
        $productDetails = $this->Product->find('all',array('order' => array('Product.product_title' => 'ASC'),'conditions'=>array('Product.id'=>$productId,'Product.is_active'=>'0')));
        //pr($productDetails);die;
        
        $this->set(compact('sizeName','productDetails'));
}

function admin_addBrand(){
    $this->layout = "admin";
    if(!empty($this->request->data)){
        if($this->Brand->save($this->data)){
        $this->Session->setFlash('Brand has been saved successfully.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'contents', 'action' => 'admin_brandListing'));    
    }
    }
}

//function admin_brandListing(){
//    $this->layout = "admin";
//     $order = array('Brand.id' => 'DESC');
//     $this->paginate = array(
//            'order' => $order,
//            'limit' => 10
//        );
//        $brandList = $this->paginate('Brand');
//   // $brandList = $this->Brand->find('all',array('order'=>array('Brand.id'=>'DESC')));
//    $this->set(compact('brandList'));
//}
//code added by anup
    function admin_brandListing($value = null) {
        $this->layout = "admin";
        @$name = $this->data['name'];
        $this->Session->write('name', $name);
        $conditions = array();
        if ($name != "") {
            $conditions[] = array('Brand.brand_name LIKE' => "%" . $name . "%");
        }
        if (!empty($value)) {
            $order = array('Brand.brand_name' => $value);
        } else {
            $order = array('Brand.id' => 'DESC');
        }
        //$order = array('Brand.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'conditions' => $conditions,
            'limit' => 10
        );
        $brandList = $this->paginate('Brand');
        $this->set(compact('brandList', 'value'));
    }
//end

function admin_editBrand($id=NULL){
    $this->layout = "admin";
    $brandList = $this->Brand->find('first',array('conditions'=>array('Brand.id'=>$id)));
    $this->set(compact("brandList"));
    if(!empty($this->request->data)){
        $this->Brand->id = $id;
        if($this->Brand->save($this->data)){
            $this->Session->setFlash('Brand has been updated successfully.', 'default', array('class' => 'success'));
            $this->redirect(array('controller' => 'contents', 'action' => 'admin_brandListing'));
        }
    }
}
function admin_delete($id=NULL){
    $this->autoRender = FALSE;
    if(!empty($id)){
        if($this->Brand->delete($id)){
            $this->Session->setFlash('Brand has been deleted successfully.', 'default', array('class' => 'success'));
            $this->redirect(array('controller' => 'contents', 'action' => 'admin_brandListing'));
        }
    }
}
    function productListing($id = NULL, $category_id = NULL) {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $order = array('Size.id' => 'DESC');
        $this->Size->bindModel(array(
            'hasMany' => array(
                'ProductSize' => array('className' => 'ProductSize',
                    'foreignKey' => 'product_size',
                    'conditions' => array('ProductSize.product_size' => $id, 'ProductSize.category_id' => $category_id),
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
    
    
     function dashboard($id = Null) {
      $this->layout = "jtc_layout";
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
        
        $this->set(compact('cat', 'featureProduct','brand','super','super1'));
    }
    



}
