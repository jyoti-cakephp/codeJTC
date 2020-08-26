<?php

class CategoriesController extends AppController {

    var $uses = array('Category', 'SubCategory', 'SuperCategory');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {
        $this->Auth->allow('category');
    }

    function admin_addCategory() {
        $this->layout = "admin";
        $order = array('SuperCategory.super_name' => 'ASC');
        $super = $this->SuperCategory->find('list', array('fields' => array('SuperCategory.super_name'), 'order' => $order,));
        //pr($super);exit;
        $this->set(compact('super'));
        if (!empty($this->request->data)) {
            $this->request->data['Category']['category_name'] = $this->request->data['Category']['category_name'];
            if ($this->Category->save($this->data)) {
                $this->Session->setFlash(_('Category has been added successfully'));
                $this->redirect(array('controller' => 'categories', 'action' => 'admin_categoryListing'));
            }
        }
    }

    function admin_categoryListing($value = NULL) {
        //pr($value);
        $this->layout = "admin";
        $this->Category->bindModel(array(
            'belongsTo' => array(
                'SuperCategory' => array('className' => 'SuperCategory',
                    'foreignKey' => 'super_id',
                ),
            ))
        );
        if(!empty($value)){
        $order = array('Category.category_name' => $value);
        }else{
          $order = array('Category.id' => 'DESC');   
        }
        $this->paginate = array(
            
            'order' => $order,
            'limit' => 10
        );
        $userList = $this->paginate('Category');
        //pr( $userList);exit;
        $this->set(compact('userList', 'value'));
    }

    function admin_delete($id = NULL) {
        $this->layout = "admin";
        if (!$this->request->is('post')) {
            
        }
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            
        }
        if ($this->Category->delete()) {
            $this->Session->setFlash(_('Category has been deleted'));
            $this->redirect(array('controller' => 'categories', action => 'admin_categoryListing'));
        }
    }

    function admin_edit($id = NULL) {
        $this->layout = "admin";
          $this->Category->bindModel(array(
            'belongsTo' => array(
                'SuperCategory' => array('className' => 'SuperCategory',
                    'foreignKey' => 'super_id',
                ),
            ))
        );
        $order = array('SuperCategory.super_name' => 'ASC');
        $super = $this->SuperCategory->find('list', array('fields' => array('SuperCategory.super_name'), 'order' => $order,));
        $userDetail = $this->Category->find('first', array('conditions' => array('Category.id' => $id)));
        //pr($userDetail);exit;
        $this->set(compact('userDetail','super'));
        if (!empty($this->request->data)) {
            $this->Category->id = $id;
            if ($this->Category->save($this->data)) {
                $this->Session->setFlash("Category has been updated successfully");
                $this->redirect(array('controller' => 'categories', action => 'admin_categoryListing'));
            }
        }
    }

    function admin_addSubcategory() {
        $this->layout = "admin";
        $order1 = array('SuperCategory.super_name' => 'ASC');
        $super = $this->SuperCategory->find('list', array('fields' => array('SuperCategory.super_name'), 'order' => $order1,));
        $order = array('Category.category_name' => 'ASC');
        $Category = $this->Category->find('list', array('fields' => array('Category.category_name'), 'order' => $order,));
        $this->set(compact('Category','super'));
        if (!empty($this->request->data)) {
            if ($this->SubCategory->save($this->data)) {
                $this->Session->setFlash('Sub Category has been added successfully.');
                $this->redirect(array('controller' => 'categories', 'action' => 'admin_subcategoryListing'));
            }
        }
    }

    function admin_subcategoryListing($value = NULL) {
        $this->layout = "admin";
     $this->Category->bindModel(array(
          'hasMany' => array(
             'SubCategory' => array('className' => 'SubCategory',                    'foreignKey' => 'category_id',
               )
            ))
       );
         
      $this->SubCategory->bindModel(array(            'belongsTo' => array(             
                 'SuperCategory' => array('className' => 'SuperCategory',
                   'foreignKey' => 'super_id',
              )          ))
     );  
      
     
       $this->Category->recursive = 2; 

       
         if(!empty($value)){
             
           $order = array('Category.category_name' => $value);
        }else{
          $order = array('Category.id' => 'DESC');   
        }
        $this->paginate = array(
            'order' => $order,
            'limit' => 7
        );
        $sublist = $this->paginate('Category');
        //pr( count($sublist));exit;
        
        $this->set(compact('sublist', 'value'));
    }

    function admin_editSubcategory($id = NULL) {
        $this->layout = "admin";
        $this->SubCategory->bindModel(array(
            'belongsTo' => array(
                'Category' => array('className' => 'Category',
                    'foreignKey' => 'category_id',
                ),
                 'SuperCategory' => array('className' => 'SuperCategory',
                    'foreignKey' => 'super_id',
                ),
            )
            )
        );
        $order1 = array('SuperCategory.super_name' => 'ASC');
        $super = $this->SuperCategory->find('list', array('fields' => array('SuperCategory.super_name'), 'order' => $order1,));
        //pr($super);exit;
        $order = array('Category.category_name' => 'ASC');
        $Category = $this->Category->find('list', array('fields' => array('Category.category_name'), 'order' => $order));
        $SubCategory = $this->SubCategory->find('first', array('conditions' => array('SubCategory.id' => $id)));
         //pr($SubCategory);exit;
        $this->set(compact('Category', 'SubCategory','super'));
        if (!empty($this->request->data)) {
            $this->SubCategory->id = $id;
            if ($this->SubCategory->save($this->data)) {
                $this->Session->setFlash('Sub Category has been updated successfully.');
                $this->redirect(array('controller' => 'categories', 'action' => 'admin_subcategoryListing'));
            }
        }
    }

    function admin_deleteSubcategory($id = NULL) {
        $this->layout = "admin";
        if ($this->SubCategory->delete($id)) {
            $this->Session->setFlash('Sub Category has been deleted successfully.');
            $this->redirect(array('controller' => 'categories', 'action' => 'admin_subcategoryListing'));
        }
    }

    function category() {
        $this->autoRender = false;
        $category = $this->Category->find('all', array('Category.id' => 'DESC', 'limit' => '5'));
        //pr($category);exit;
        return $category;
    }

    function admin_superListing() {
        //pr($value);
        $this->layout = "admin";
        $order = array('SuperCategory.id' => 'Desc');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $superList = $this->paginate('SuperCategory');
        $this->set(compact('superList'));
    }

    function admin_superEdit($id = NULL) {
        $this->layout = "admin";
        $superDetail = $this->SuperCategory->find('first', array('conditions' => array('SuperCategory.id' => $id)));
        //pr($userDetail);exit;
        $this->set(compact('superDetail','super'));
        if (!empty($this->request->data)) {
            $this->SuperCategory->id = $id;
            if ($this->SuperCategory->save($this->data)) {
                $this->Session->setFlash("SuperCategory has been updated successfully");
                $this->redirect(array('controller' => 'categories', action => 'admin_superListing'));
            }
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

}

