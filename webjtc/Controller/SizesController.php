<?php

class SizesController extends AppController {

    var $uses = array('User', 'Size', 'ProductSize', 'Wishlist', 'Basket','Brand');
   
    function beforeFilter() {
        $this->Auth->allow();
    }
    
//    function admin_sizeListing() {
//        $this->layout = "admin";
//        $order = array('Size.id' => 'DESC');
//        $this->paginate = array(
//            'order' => $order,
//           'limit' => 10
//        );
//        $sizeList = $this->paginate('Size');
//        //$sizeList = $this->Size->find('all', array('order' => array('Size.id' => "DESC")));
//        $this->set(compact('sizeList'));
//    }
//    code added by anup
    function admin_sizeListing($value=NULL) {
        $this->layout = "admin";
        @$name = $this->data['name'];
        $this->Session->write('name', $name);
        $conditions = array();
        if ($name != "") {
            $conditions[] = array('Size.product_size LIKE' => "%" . $name . "%");
        }
        if (!empty($value)) {
            $order = array('Size.product_size' => $value);
        } else {
            $order = array('Size.id' => 'DESC');
        }
        $this->paginate = array(
            'order' => $order,
            'conditions' => $conditions,
            'limit' => 10
        );
        $sizeList = $this->paginate('Size');
        $this->set(compact('sizeList', 'value'));
    }

    function admin_addSize() {
        $this->layout = "admin";
       
        if (!empty($this->request->data)) {
            if ($this->Size->save($this->data)) {
                $this->Session->setFlash('You have successfully added the size.');
                $this->redirect(array('controller' => 'sizes', 'action' => 'admin_sizeListing'));
            }
        }
    }
    
    
     function admin_editSize($id = NULL) {
        $this->layout = "admin";
        $sizeDetail = $this->Size->find('first', array('conditions' => array('Size.id' => $id)));
        $this->set(compact('sizeDetail'));
        if (!empty($this->request->data)) {
            $this->Size->id = $id;
            if ($this->Size->save($this->data)) {
                $this->Session->setFlash('You have successfully updated the size.');
                $this->redirect(array('controller' => 'sizes', 'action' => 'admin_sizeListing'));
            }
        }
    }

}