<?php

class ContactsController extends AppController {

    var $uses = array('Contact');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler','Common');

    function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('contactUs');
    }

    /* function for job index
     * purpose: show about the project
     * date: 22 march 2016
     * return type :array
     * by: shekhar saini
     */

    function contactUs() {
        $this->layout = "jtc_layout";
       
        if (!empty($this->request->data)) {
           $email1 = $this->request->data['Contact']['email'];
            $name = $this->request->data['Contact']['name'];
            $comment = $this->request->data['Contact']['message'];
            $email = "info@jtcbabywear.co.uk";
            $from = $email1;
            $subject = "Contact Request";
            $userName = $name;
            $to         = $email;
            $sitename='JTC';
            $Body = $this->Common->contacttemplate($from,$userName,$comment);
            $resultnew = $this->Common->sendMail($email, $from, $subject, $Body,$sitename,$to);
            //pr($resultnew);exit;
            if ($resultnew) {
                $this->Contact->save($this->data);
                $this->Session->setFlash('Thank you for contacting us , We will get back to you soon.','default',array('class'=>'success'));
                $this->redirect(array('controller' => 'contacts', 'action' => 'contactUs'));
            }
        }
   
    }
     function admin_contactList(){
       $this->layout = "admin";
       $order = array('Contact.id'=>'DESC');
       $this->paginate = array(
            'order' => $order,
           
            'limit' => 10
        );
        $contactList = $this->paginate('Contact');
        $this->set(compact('contactList'));
    }
    
    function admin_contactView($id=NULL){
        $this->layout = "admin";
        $contactDetail = $this->Contact->find('first',array('conditions'=>array('Contact.id'=>$id)));
        $this->set(compact('contactDetail'));
    }
    
 }
