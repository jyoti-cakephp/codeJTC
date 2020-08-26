<?php

class NewsController extends AppController {

    var $uses = array('SubcribeEmail', 'Newsletter');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {
        $this->Auth->allow('addEmail','checkEmail');
    }

    function addEmail() {
        $this->layout = "main_layout";
        if (!empty($this->request->data)) {
            if ($this->SubcribeEmail->save($this->request->data)) {
                $this->Session->setFlash('You are subscribed to newsletter.');
                $this->redirect(array('controller' => 'homes', 'action' => 'index'));
            }
        }
    }

    function admin_emailListing() {
        $this->layout = 'admin';
        $order = array('SubcribeEmail.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10,);
        $emaillists = $this->paginate('SubcribeEmail');
        $this->set(compact('emaillists')
        );
    }

    function admin_deleteemail($id = NULL) {
        $this->SubcribeEmail->delete($id);
        $email = $this->SubcribeEmail->find('first', array('conditions' => array('SubcribeEmail.id' => $id)));
        $this->set(compact('email'));
        $this->Session->setFlash("Email has been deleted");
        $this->redirect(array('controller' => 'news', 'action' => 'admin_emailListing'));
    }

    function admin_addNewsletter() {
        $this->layout = "admin";
        if (!empty($this->request->data)) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash('You have successfully added the Newsletter.');
                $this->redirect(array('controller' => 'news', 'action' => 'admin_listNewsletter'));
            }
        }
    }

    function admin_listNewsletter() {
        $this->layout = 'admin';
        $order = array('Newsletter.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10,);
        $newslist = $this->paginate('Newsletter');
        //pr($newslist);exit;
        $this->set(compact('newslist')
        );
    }

    function admin_viewNewsletter($id = NULL) {
        $this->layout = 'admin';
        $newsview = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
        //pr(  $newsview);exit;
        $this->set(compact('newsview'));
    }

    function admin_editNewsletter($id = null) {
        $this->layout = "admin";
        $message = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
        $this->set(compact("message"));
        if (!empty($this->request->data)) {
            $this->Newsletter->id = $id;
            if ($this->Newsletter->save($this->data)) {
                $this->Session->setFlash('Newsletter has been updated successfully');
                $this->redirect(array('controller' => 'news', 'action' => 'admin_listNewsletter'));
            }
        }
    }

    function admin_sendNewsLetter($id = NULL) {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $Letter = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
        $subcribeemail = $this->SubcribeEmail->find('list', array('fields' => 'SubcribeEmail.email'));
        //pr($subcribeemail);exit;
        //pr($result);exit;
        foreach ($subcribeemail as $SubcribeEmails) {
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            //pr($Email);exit;
            $Email->from(array('info@jtcbabywear.co.uk' => 'JTC'));
            $Email->to($SubcribeEmails);
            //pr($SubcribeEmails);exit;
            $Email->subject($Letter['Newsletter']['email_title']);
            //pr($Email);exit;
            $message = $Letter['Newsletter']['message'];
            $Email->emailFormat('both');

            if ($Email->send($message)) {
                // pr($message);exit;
            }
        }
        $this->Session->setFlash('News Letter has been sent successfully');
        $this->redirect(array('controller' => 'news', 'action' => 'admin_listNewsletter'));
        exit;
    }
//    
//       function admin_sendNewsLetter($id = NULL) {
//        $this->layout = 'ajax';
//        $this->autoRender = false;
//        $Letter = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
//       
//        $subcribeemail = $this->SubcribeEmail->find('list', array('fields' => 'SubcribeEmail.email'));
//        foreach ($subcribeemail as $UserEmails) {
//           
//        App::uses('CakeEmail', 'Network/Email');
//            $Email = new CakeEmail();
//            $Email->from(array('muk@sdssoftwares.co.uk' => '10yar'));
//            $Email->to($UserEmails);
//            $Email->subject($Letter['Newsletter']['email_title']);
//            $message = $Letter['Newsletter']['message'];
//            $Email->emailFormat('both');
//            if ($Email->send($message)) {
//                
//             
//            }
//        }
//       
//        $this->Session->setFlash('News Letter has been sent successfully');
//         $this->redirect(array('controller' => 'news', 'action' => 'listNewsletter'));
//       
//    }
    

    function admin_deletenewsletter($id = NULL) {
        $this->Newsletter->delete($id);
        $news = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
        $this->set(compact('news'));
        $this->Session->setFlash("Newsletter has been deleted");
        $this->redirect(array('controller' => 'news', 'action' => 'admin_listNewsletter'));
    }
    
      function checkEmail() {
        $this->autoRender = false;
        $email = $_POST['email'];
        $count = $this->SubcribeEmail->find('count', array('conditions' => array('SubcribeEmail.email' => $email)));
        if ($count == 0) {
            echo "true";
            exit;
        } else {
            echo "false";
            exit;
        }
    }

}

