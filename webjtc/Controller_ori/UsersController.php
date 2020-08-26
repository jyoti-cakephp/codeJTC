<?php

class UsersController extends AppController {

    var $uses = array('User', 'Country','Address','Order','Shipping','Billing','Basket');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler','Common');

    function beforeFilter() {
        $this->Auth->allow('register', 'checkEmail', 'login', 'resetPassword', 'setForgotPassword', 'signout','userAccount','changePassword','addressBook','addAddress','deleteAddress','updateAddress','myOrder','viewOrder');
    }

    function admin_login() {
        $this->layout = 'admin_layout';
        if (!empty($this->request->data)) {
            //pr($this->Auth->password( $this->request->data['User']['password']));exit;
            if ($this->Auth->login()) {
                //pr($_SESSION);exit;
                if ($_SESSION['Auth']['User']['user_type'] == "admin") {
                    $this->redirect(array('controller' => 'users', 'action' => 'admin_dashboard'));
                }
            } else {
                $this->Session->setFlash("<font size='3' color='red'>please enter valid email and password </font>");
            }
        }
    }

    function admin_logout() {
        if ($this->Auth->logout()) {
            $this->redirect(array("controller" => 'users', "action" => "admin_login"));
        }
    }

    function admin_dashboard() {
        $this->layout = 'admin';
    }

    function admin_userListing($value=NULL,$value1=NULL) {
        $this->layout = 'admin';
        $countryList = $this->User->find('list',array('fields'=>'User.country','conditions'=>array('User.user_type =' => 'User'),'group'=>array('User.country')));
        //pr($country);
        $this->User->virtualFields = array(
        'user' => "CONCAT(User.first_name, ' ', User.last_name)");
        @$name = $this->data['name'];
        $this->Session->write('name',$name);
        @$email = $this->data['email'];
        $this->Session->write('email',$email);
        @$country = $this->data['country'];
        $this->Session->write('country',$country);
        $order = array('User.id' => 'DESC');
        $conditions = array();
        $conditions[] = array('User.user_type =' => 'User');
        if ($name != "") {
            $conditions[] = array('user LIKE' => "%" . $name . "%",'User.user_type =' => 'User');
        }
         if ($email != "") {
            $conditions[] = array('User.email' =>$email,'User.user_type =' => 'User');
        }
         if ($country != "") {
            $conditions[] = array('User.country' =>$country,'User.user_type =' => 'User');
        }
       
        
        if(!empty($value) && !empty($value1)){
           $order = array('User.'.$value => $value1);
        }else{
          $order = array('User.id' => 'DESC');   
        }
     //pr($order);die;
        $this->paginate = array(
            'order' => $order,
            'conditions'=>$conditions,
            'limit' => 10
        );
        $userList = $this->paginate('User');
        //pr($userList);exit;
        $this->set(compact('userList','countryList','value','value1'));
    }

    function admin_active($id = NULL) {
        if ($this->User->updateAll(array('User.is_active' => 0), array('User.id' => $id))) {
            $this->Session->setFlash('User has been deactivated');
            $this->redirect(array('controller' => 'Users', 'action' => 'admin_userListing'));
        }
    }

    function admin_deactive($id = NULL) {
        if ($this->User->updateAll(array('User.is_active' => 1), array('User.id' => $id))) {
             $this->Session->setFlash('User has been activated');
            $this->redirect(array('controller' => 'Users', 'action' => 'admin_userListing'));
        }
    }

    function admin_changePassword() {
        $this->layout = 'admin';
        $user_id = $this->Auth->user('id');
        if (!empty($this->request->data)) {
            $oldpassword = $this->Auth->password($this->request->data['User']['old_password']);
            $newpassword = $this->request->data['User']['new_password'];

            $count = $this->User->find('count', array(
                'conditions' => array(
                    'User.password' => $oldpassword,
                    'User.id' => $user_id
                )
            ));
          
            if ($count > 0) {
                $datapass['User']['password'] = $this->Auth->password($newpassword);
                $this->User->id = $user_id;
                $this->User->save($datapass);
                $this->Session->setFlash('You have successfully changed your password.');
                $this->redirect(array('controller' => 'users', 'action' => 'admin_changePassword'));
            } else {
                $this->Session->setFlash('Please enter correct old password.');
            }
        }
    }

    function register() {
        $this->autoRender = false;
        //pr($this->request->data);exit;
        if (!empty($this->request->data)) {
            //pr($this->request->data);exit;
            $this->request->data['User']['first_name'] = $this->request->data['User']['first_name'];
            $this->request->data['User']['last_name'] = $this->request->data['User']['last_name'];
            $this->request->data['User']['email'] = $this->request->data['email'];
            $this->request->data['User']['username'] = $this->request->data['email'];
            $this->request->data['User']['mobile_no'] = $this->request->data['User']['mobile_no'];
            $this->request->data['User']['city'] = $this->request->data['User']['city'];
            $this->request->data['User']['post_code'] = $this->request->data['User']['post_code'];
            $this->request->data['User']['user_type'] = 'User';
            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
              if($this->User->save($this->data)){
                $name = $this->request->data['User']['first_name'] . " " . $this->data['User']['last_name'];
                $email1 = $this->request->data['User']['email'];
                //pr($email1);exit;
                $email = "info@justtoocute.org";
                $from = $email;
                $subject = "Registration Confirmation";
                $userName = $name;
                $to = $email1;
                $sitename = 'JTC Team';
                $Body = $this->Common->signtemplate($userName,$email);
                $resultnew = $this->Common->sendMail($email1, $from, $subject, $Body, $sitename, $to);
                //pr($resultnew);exit;
                 if ($resultnew) {
                $this->User->save($this->data);
                $this->redirect(array('controller' => 'users', 'action' => ''));
            }
         }
        }
    }

    function checkEmail() {
        $this->autoRender = false;
        $email = $_POST['email'];
        $count = $this->User->find('count', array('conditions' => array('User.email' => $email, 'User.user_type' => 'User')));
        if ($count == 0) {
            echo "true";
            exit;
        } else {
            echo "false";
            exit;
        }
    }

    function login() {
        $this->autoRender = false;
        $username = $this->request->data['user'];
        $password = $this->Auth->password($this->request->data['pass']);
        $remberme = $this->request->data['remember'];
        
        $action= $this->request->data['action'];
        //pr($remberme);exit;
        $userDetail = $this->User->find('first', array('conditions' => array('User.username' => $username, 'User.user_type' => "User")));
        
        if (!empty($userDetail)) {
            if ($username == $userDetail['User']['username'] && $password == $userDetail['User']['password']) {
                if (!empty($userDetail)) {
                    if ($userDetail['User']['is_active'] == 1 && $userDetail['User']['user_type'] == "User") {
                      
                        if ($this->Auth->login($userDetail['User'])) {
                            
                            if ($remberme == true) {
                                setcookie('username', $username, time() + 60 * 60 * 24 * 365, "/");
                                setcookie('password', $this->request->data['pass'], time() + 60 * 60 * 24 * 365, "/");
                            }
                            
                            //echo $action; die;
                           if($action =='' || $action =='index'){
                              echo 4; exit;
                           } else{
                              echo 5; exit;
                           }
                        } else {
                            echo 0;
                            exit;
                        }
                    } else {
                        echo 2;
                        exit;
                    }
                }
            }
            exit();
        }
    }

    function signout() {
        if ($this->Auth->logout()) {
            $this->Session->setFlash('You have successfully logged out.', 'default', array('class' => 'errormessage'));
           $this->redirect(array("controller" => 'homes', "action" => "index"));
        }
    }

    function resetPassword() {
        $email = $this->request->data['email'];
        //pr($email);exit;
        $userCount = $this->User->find('count', array(
            'conditions' => array(
                'User.email' => $email
            )
        ));

        if ($userCount == 0) {
            $this->Session->setFlash('Please enter correct email id.', 'default', array('class' => 'errormessage'));
            $this->redirect($this->referer());
        } else {
            $userinfo = $this->User->find('first', array('conditions' => array('User.email' => $email)));
            $Name = $userinfo['User']['first_name'] . "" . $userinfo['User']['last_name'];
        }
        $forgotRandStr = $this->getrandomstr();
        $from = $email;
        $subject = "Password Request";
        App::import('Vendor', 'phpmailer', array(
            'file' => 'phpmailer/class.phpmailer.php'));
        $message = "<p>Dear '" . $Name . "',
                 </p>
                 <p>Please<a href=" . SITEPATH . "users/setForgotPassword/" . "/" . $forgotRandStr . ">Click Here</a> to Change your Password  </p>
                 <p>For any assistance or queries you can contact support@jtc.com  </p>
                 <p>Regards,  </p>
                 <p>JTC Team</p>";
        $to = ' info@justtoocute.org';

        $mail = new PHPMailer();


        $mail->IsHTML(true);

        $mail->SetFrom($to, 'JTC Team');

        $mail->AddReplyTo($to, "JTC Team");
        $mail->Subject = $subject;
        $mail->Body = $message;


        $mail->AddAddress(trim($email));

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        } else {
            $resultnew = "1";
        }

        if ($resultnew) {
            $userDetails = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $email
                )
            ));
            $datafor['User']['forgot_str'] = $forgotRandStr;

            $this->User->id = $userDetails['User']['id'];
            $this->User->save($datafor);
            echo 1;
            exit;
        } else {
            echo 2;
            exit;
        }
    }

    function setForgotPassword($forgotRandStr = NULL) {
        $this->layout = "jtc_layout";
        $userDetails = $this->User->find('first', array(
            'conditions' => array(
                'User.forgot_str' => $forgotRandStr
            )
        ));

        $this->set(compact('userDetails'));
        if (!empty($this->request->data)) {

            $pass = $this->Auth->password($this->request->data['User']['password']);
            //pr($pass);exit;
            $id = $this->request->data['User']['id'];
            //pr($id);exit;
            $rand = "";
            $updated = $this->User->updateAll(array('User.password' => "'$pass'"), array('User.id' => $id));
           //pr($updated);exit;
            if ($updated) {
                $this->Session->setFlash('You Have Successfully Changed your password', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'homes', 'action' => 'index'));
            } else {
                $this->Session->setFlash('Password is not changed .Please try again.', 'default', array('class' => 'errorsmessage'));
                $this->redirect(array('controller' => 'homes', 'action' => 'index'));
            }
        }
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

    function admin_deleteUser($id = NULL) {
        $this->autoRender = FALSE;
        if ($this->User->delete($id)) {
            $this->Session->setFlash('You have successfully deleted user');
            $this->redirect(array('controller' => 'users', 'action' => 'admin_userListing'));
        }
    }

    function admin_editUser($id = NULL) {
        $this->layout = "admin";
        $userDetail = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        $countryList = $this->Country->find('list', array('fields' => array('Country.countries_name')));
        $this->set(compact('userDetail', 'countryList'));
        if (!empty($this->request->data)) {
            $this->User->id = $id;
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('You have successfully updated user details');
                $this->redirect(array('controller' => 'users', 'action' => 'admin_userListing'));
            }
        }
    }

    function admin_viewUser($id = NULL) {
        $this->layout = "admin";
        $userDetail = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        //pr($userDetail);exit;
        $this->set(compact('userDetail'));
    }
    
    function userAccount()
    {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $userDetails = $this->User->find('first',array('conditions'=>array('User.id'=>$userId)));
        //pr($userDetails);exit;
        $this->set(compact('userDetails','userId'));
          if (!empty($this->request->data)) {
            $this->User->id = $userId;
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Your account information has been updated.');
                $this->redirect(array('controller' => 'users', 'action' => 'userAccount'));
            }
        }
    }  
    
     function changePassword(){
        $this->layout = "jtc_layout";
        $user_id = $this->Auth->user('id');
        if (!empty($this->request->data)) {
            $oldpassword = $this->Auth->password($this->request->data['User']['old_password']);
            $newpassword = $this->request->data['User']['new_password'];

            $count = $this->User->find('count', array(
                'conditions' => array(
                    'User.password' => $oldpassword,
                    'User.id' => $user_id
                )
            ));
             //pr($count);exit;
            if ($count > 0) {
                $datapass['User']['password'] = $this->Auth->password($newpassword);
                $this->User->id = $user_id;
                $this->User->save($datapass);
                $this->Session->setFlash('You have successfully changed your password.');
                $this->redirect(array('controller' => 'users', 'action' => 'changePassword'));
            } else {
                $this->Session->setFlash('Please enter correct old password.');
            }
        }
    }
    
     function addressBook()
    {
       $this->layout = "jtc_layout";
       $user_id = $this->Auth->user('id');
       $count = $this->Address->find('count',array('conditions'=>array('Address.user_id'=>$user_id)));
       $userbook = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));
       $addressbook = $this->Address->find('all',array('conditions'=>array('Address.user_id'=>$user_id),'limit' => '4'));
       //pr($addressbook);exit;
       //$shipping = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $user_id)));
       //$billing = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $user_id)));
       $this->set(compact('userbook','addressbook','user_id','count'));
    } 
    
    function addAddress()
    {
       $this->layout = "jtc_layout";
       $user_id = $this->Auth->user('id');
       if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        if (!empty($this->request->data)) {
            $this->request->data['Address']['user_id'] = $user_id ;
            $this->request->data['Address']['cookies_id'] = $cookieId;
            if ($this->Address->save($this->data)) {
                $this->Session->setFlash('Address details has been added successfully');
                $this->redirect(array('controller' => 'users', 'action' => 'addressBook'));
            }
        }
       
    } 
    
     function deleteAddress($id = NULL) {
        $this->autoRender = false;
        if ($this->Address->delete($id)) {
            $this->Session->setFlash('Address has been deleted successfully');
            $this->redirect(array('controller' => 'users', 'action' => 'addressBook'));
        }
    }
    
       function updateAddress()
    {
       $this->layout = "jtc_layout";
       $user_id = $this->Auth->user('id');
       if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        if (!empty($this->request->data)) {
            $this->request->data['Address']['user_id'] = $user_id ;
            $this->request->data['Address']['cookies_id'] = $cookieId;
            if ($this->Address->save($this->data)) {
                $this->Session->setFlash('Address details has been added successfully');
                $this->redirect(array('controller' => 'users', 'action' => 'addressBook'));
            }
        }
       
    } 
    
      function myOrder()
    {
       $this->layout = "jtc_layout";
       $user_id = $this->Auth->user('id');
       $order = array('Order.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10,
            'conditions'=>array('Order.user_id'=>$user_id)
        );
        $myorder = $this->paginate('Order');
        //pr($user_id);exit;
        $this->set(compact('myorder'));
       
       
    } 
    
     function viewOrder($id = NULL) {
        $this->layout = "jtc_layout";
        $orderDetails = $this->Order->find('first', array('conditions' => array('Order.id' => $id)));
        //pr($orderDetails);exit;
        $userId = $orderDetails['User']['id'];
        //pr($userId);exit;
        $billing = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $userId)));
        //pr($billingDetails);exit;
        $shipping = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $userId)));
        $productId = $orderDetails['Order']['product_id'];
       // pr($productId);exit;
        $pid = explode(',', $productId);
        //pr($pid);exit;
        $productName = $this->Basket->find('all', array('conditions' => array('Basket.product_id' => $pid,'Basket.user_id' => $userId,'Basket.is_basket' => 1,'Basket.order_id' => $id)));
        //$basketdetail = $this->Basket->find('all', array('conditions' => array('Basket.user_id' => $userId, 'Basket.is_basket' => 1)));
        //pr($basketdetail);exit;
        //pr($productName);exit;
        $this->set(compact('orderDetails','productName','billing','shipping'));
    }
    
    
    
    
}

