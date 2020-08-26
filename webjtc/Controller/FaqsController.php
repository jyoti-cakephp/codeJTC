<?php

class FaqsController extends AppController {

    var $uses = array('Faq');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {
        $this->Auth->allow('faq');
    }
    function admin_addFaq(){
        $this->layout="admin";
        if(!empty($this->request->data)){
            //pr($this->request->data);exit;
            $this->request->data['Faq']['question']= $this->request->data['Faq']['question'];
             $this->request->data['Faq']['answer']= $this->request->data['Faq']['answer'];
             if($this->Faq->save($this->data)){
                 
                   $this->Session->setFlash("FAQ has been added successfully");
              $this->redirect(array('controller'=>'faqs','action'=>'admin_faqList')); 
             }
        }
    }
      function admin_faqList($id=NULL) {
        $this->layout = "admin";

        $order = array('Faq.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $userList = $this->paginate('Faq');
        //pr( $products);exit;
        $this->set(compact('userList'));
    }
    function admin_editFaq($id=NULL){
        $this->layout="admin";
         $userDetail=  $this->Faq->find('first',array('conditions'=>array('Faq.id'=>$id)));
       //pr($userDetail);exit;
        $this->set(compact('userDetail'));
        if(!empty($this->request->data)){
            $this->Faq->id=$id;
            if($this->Faq->save($this->data)){
                $this->Session->setFlash(_('FAQ has been edited successfully'));
                $this->redirect(array('controller'=>'faqs',action=>'admin_faqList'));
            }
        }
    }
    function admin_delete($id=NULL){
         $this->layout = "admin";
        if (!$this->request->is('post')) {
            
        }
        $this->Faq->id = $id;
        if (!$this->Faq->exists()) {
            
        }
        if ($this->Faq->delete()) {
            $this->Session->setFlash(_('Faq has been deleted successfully'));
            $this->redirect(array('controller' => 'faqs', action => 'admin_faqList'));
        }
        
    }
    function admin_faqDetail($id=NULL){
        $this->layout="admin";
         $conditions = array('Faq.id' => $id);
        $userData = $this->Faq->find('first', array('conditions' => $conditions));
        //pr($userData);exit;
        $this->set(compact('userData'));
    }
      function faq() {
        $this->layout = "jtc_layout";
        $order = array('Faq.id' => 'DESC');
        $faq = $this->Faq->find('all', array('order' => $order));
       // pr($faq);die;
        $this->Set(compact('faq'));
    }
    
}
