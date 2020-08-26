<?php

class CartsController extends AppController {

    var $uses = array('Basket', 'User', 'Shipping', 'Billing', 'Order');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler', 'Common');

    function beforeFilter() {
        $this->Auth->allow('getrandomstr', 'addCart', 'addWish', 'index', 'shipping', 'updateQuentity', 'deleteItem', 'editShipping', 'editBilling', 'checkoutConfirm', 'addOrder', 'thankYou', 'increaseQuantity', 'decreaseQuantity');
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

    function addCart($id = NULL) {
        //$this->autoRender = false;
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
                $sizes['Basket']['cookies_id'] = $cookieId;
                $sizes['Basket']['user_id'] = $userId;
                $sizes['Basket']['product_id'] = $id;
                $sizes['Basket']['price'] = $this->data['price'];
                $sizes['Basket']['quentity'] = $quentity;
               

            $conditions = array( 'Basket.user_id' => $userId, 'Basket.product_id' => $id, 'Basket.is_basket' => 0);
            // pr($conditions);die;
            if ($this->Basket->hasAny($conditions)) {
                echo "2";
                exit;
            } else {
                
                if ($this->Basket->save($sizes['Basket'])) {
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    die;
                }
            }
        }
    }

    function addWish($id = NULL) {
        //$this->autoRender = false;
        $userId = $this->Auth->User('id');
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }

        //   pr($this->data);exit;
        if (!empty($this->data)) {
            $data['Basket']['cookies_id'] = $cookieId;
            $data['Basket']['user_id'] = $userId;
            $data['Basket']['product_id'] = $id;
            $data['Basket']['quentity'] = $this->data['quentity'];
            $data['Basket']['size'] = $this->data['size'];
            //   $data['Basket']['price'] = $this->data['price'];
            $conditions = array('Basket.size' => $this->data['size'], 'Basket.user_id' => $userId, 'Basket.product_id' => $id, 'Basket.is_basket' => 0);
            //pr($conditions);die;
            if ($this->Basket->hasAny($conditions)) {
                echo "2";
                exit;
            } else {
                if ($this->Basket->save($data)) {
                    //$basketId = $this->Basket->getLastInsertID(); 
                    echo 1;
                    exit;
                    //$this->redirect(array('controller' => 'carts', 'action' => 'addPaymentDetail'));
                } else {
                    echo 0;
                    exit;
                }
            }
        }
    }

    function index() {
        $this->layout = 'jtc_layout';
        $id = $this->Auth->User('id');
        $url = $this->params['controller'] . "/" . $this->params['action'];
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        $this->Basket->recursive = 2;
        $basketData = $this->Basket->find('all', array('conditions' => array('Basket.user_id' => $id, 'Basket.is_basket' => 0)));
        //pr($basketData);exit;
        $this->set(compact('basketData', 'url'));
    }

    function deleteItem($id = NULL) {
        $this->autoRender = false;
        if ($this->Basket->delete($id)) {
            $this->Session->setFlash('Cart item has been deleted successfully.');
            $this->redirect(array('controller' => 'carts', 'action' => 'index'));
        }
    }

    function updateQuentity($id = NULL) {
        $this->autoRender = false;
        $quentity = $this->data['que'];
        if ($this->Basket->updateAll(array('Basket.quentity' => $quentity), array('Basket.id' => $id))) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function shipping($id = NULL) {
        $this->layout = "jtc_layout";
        $id = $this->Auth->User('id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        $shipping = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $id)));
        $billing = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $id)));
        //pr($shipping);exit;
        $this->set(compact('user', 'shipping', 'billing'));
    }

    function editShipping() {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userId)));
        $shippingDetails = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $userId)));
        //pr($shippingDetails);exit;
        $this->set(compact('shippingDetails', 'user'));
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        if (!empty($this->request->data)) {
            $this->request->data['Shipping']['user_id'] = $userId;
            $this->request->data['Shipping']['cookies_id'] = $cookieId;
            $this->Shipping->id = $shippingDetails['Shipping']['id'];
            if ($this->Shipping->save($this->data)) {
                $this->Session->setFlash('Shipping details has been updated successfully.');
                $this->redirect(array('controller' => 'carts', 'action' => 'shipping'));
            }
        }
    }

    function editBilling() {
        $this->layout = "jtc_layout";
        $userId = $this->Auth->User('id');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userId)));
        $billingDetails = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $userId)));
        //pr($billingDetails);exit;
        $this->set(compact('billingDetails', 'user'));
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        if (!empty($this->request->data)) {
            $this->request->data['Billing']['user_id'] = $userId;
            $this->request->data['Billing']['cookies_id'] = $cookieId;
            $this->Billing->id = $billingDetails['Billing']['id'];
            if ($this->Billing->save($this->data)) {
                $this->Session->setFlash('Billing details has been updated successfully.');
                $this->redirect(array('controller' => 'carts', 'action' => 'shipping'));
            }
        }
    }

    function checkoutConfirm() {
        $this->layout = "jtc_layout";
        $id = $this->Auth->User('id');
        $basketdetail = $this->Basket->find('all', array('conditions' => array('Basket.user_id' => $id, 'Basket.is_basket' => 0)));
        //pr($basketdetail);exit;
        $user = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        $shipping = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $id)));
        $billing = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $id)));
        //pr($shipping);exit;
        $this->set(compact('user', 'shipping', 'billing', 'basketdetail'));
    }

    function thankYou($id = NULL) {
        $this->layout = "jtc_layout";
        //$id = $this->Auth->User('id');
        $orderDetails = $this->Order->find('first', array('conditions' => array('Order.id' => $id)));
        // pr($orderDetails);exit;
        $this->set(compact('orderDetails'));
    }

    function addOrder() {
        $this->autoRender = false;
        $userId = $this->Auth->User('id');
        $randomStr = $this->getrandomstr();
        $productdetail = $this->Basket->find('all', array('conditions' => array('Basket.user_id' => $userId, 'Basket.is_basket' => 0)));
        //pr($productdetail);exit;
        $productId = array();
        foreach ($productdetail as $result) {
            $basketdata[] = $result['Basket']['product_id'];
            //$basketquentity[] = $result['Basket']['quantity'];
        }
        $productId = implode(",", $basketdata);
        //pr($productId);exit;
        $this->set(compact('productdetail', 'productId'));
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            //pr($randomStr);exit;
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        if (!empty($this->data)) {
            $data['Order']['cookies_id'] = $cookieId;
            $data['Order']['user_id'] = $userId;
            $data['Order']['total_price'] = $this->data['price'];
            $data['Order']['order_number'] = $randomStr;
            $data['Order']['product_id'] = $productId;
            //pr($data);exit;
            if ($this->Order->save($data)) {
                $orderId = $this->Order->getLastInsertID();
                $basketId = $this->Basket->find('list', array(
                    'conditions' => array(
                        'Basket.user_id' => $userId,
                        'Basket.is_basket' => 0,
                    )
                ));

                $update = $this->Basket->updateAll(array('Basket.is_basket' => '1', 'Basket.order_id' => $orderId), array('Basket.id' => $basketId));
                echo $orderId;
                EXIT;
//                $this->redirect(array('controller' => 'carts', 'action' => 'thankYou',$orderId));
            } else {
                echo 0;
                exit;
            }
        }
    }

    function admin_orderListing($value = NULL) {
        //pr($value);exit;
        $this->layout = "admin";
       if (!empty($value)) {
        if($value == 'pending'){
         $order = array('Order.order_status' => 'ASC');  
       }else if($value == 'completed'){
           $order = array('Order.order_status' => 'DESC'); 
       }else{
           $order = array('User.first_name' => $value);
       }
       }else{
            $order = array('Order.id' => 'DESC');
       }
        
        
       
//        if (!empty($value1)) {
//           $order = array('Order.order_status' => $value1);
//       } else {
//            $order = array('Order.id' => 'DESC');
//        }
        $this->paginate = array(
            'order' => $order,
            'limit' => 10,
        );
        $orderList = $this->paginate('Order');
         //pr($orderList);exit;
        $this->set(compact('orderList', 'value', 'value1'));
    }

//    end

    function admin_is_deactive($id = NULL) {
        if ($this->Order->updateAll(array('Order.order_status' => 0), array('Order.id' => $id))) {
            $this->Session->setFlash('Order has been deactivated');
            $this->redirect(array('controller' => 'carts', 'action' => 'admin_orderListing'));
        }
    }

    function admin_is_active($id = NULL) {
        $orderDetails = $this->Order->find('first', array('conditions' => array('Order.id' => $id)));
        //pr($orderDetails);exit;
        $name = $orderDetails['User']['first_name'] . " " . $orderDetails['User']['last_name'];
        $email1 = $orderDetails['User']['email'];
        $order = $orderDetails['Order']['order_number'];
        $date = date('d-m-Y', strtotime($orderDetails['Order']['created']));
        $userId = $orderDetails['User']['id'];
        //pr($userId);exit;
        $productId = $orderDetails['Order']['product_id'];
        //$price = $orderDetails['Order']['total_price'];
        $pid = explode(',', $productId);
        $productName = $this->Basket->find('all', array('conditions' => array('Basket.product_id' => $pid)));
        //pr($productName);exit;
        $product = array();
        foreach ($productName as $result) {
            $basketdata[] = $result['Product']['product_title'];
        }
        $product = implode(",", $basketdata);
        $billing = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $userId)));
        $com = $billing['Billing']['company'];
        $name1 = $billing['Billing']['first_name'] . " " . $billing['Billing']['last_name'];
        $address = $billing['Billing']['address'] . "," . $billing['Billing']['post_code'];
        $country = $billing['Billing']['city'] . "," . $billing['Billing']['country'];
        $shipping = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $userId)));
        $com1 = $shipping['Shipping']['company'];
        $name2 = $shipping['Shipping']['first_name'] . " " . $shipping['Shipping']['last_name'];
        $address1 = $shipping['Shipping']['address'] . "," . $shipping['Shipping']['post_code'];
        $country1 = $shipping['Shipping']['city'] . "," . $shipping['Shipping']['country'];
        $email = "info@justtoocute.org";
        $from = $email;
        $subject = "Order Confirmation";
        $userName = $name;
        $order = $order;
        $date = $date;
        $product = $product;
        //$price = $price;
        $com = $com;
        $name1 = $name1;
        $address = $address;
        $country = $country;
        $com1 = $com1;
        $name2 = $name2;
        $address1 = $address1;
        $country1 = $country1;
        $to = $email1;
        $sitename = 'JTC Team';
        $Body = $this->Common->producttemplate($userName, $email, $order, $date, $product, $com, $name1, $address, $country, $com1, $name2, $address1, $country1);
        //pr($Body);exit;
        $resultnew = $this->Common->sendMail($email1, $from, $subject, $Body, $sitename, $to);
        //pr($resultnew);exit;
        if ($resultnew) {
            if ($this->Order->updateAll(array('Order.order_status' => 1), array('Order.id' => $id))) {
                $this->Session->setFlash('Order has been completed');
                $this->redirect(array('controller' => 'carts', 'action' => 'admin_orderListing'));
            }
        }
    }

    function admin_viewOrder($id = NULL) {
        $this->layout = "admin";
        $orderDetails = $this->Order->find('first', array('conditions' => array('Order.id' => $id)));
        //pr($orderDetails);exit;
        $userId = $orderDetails['User']['id'];
        //pr($userId);exit;
        $billing = $this->Billing->find('first', array('conditions' => array('Billing.user_id' => $userId)));
        //pr($billingDetails);exit;
        $shipping = $this->Shipping->find('first', array('conditions' => array('Shipping.user_id' => $userId)));
        $productId = $orderDetails['Order']['product_id'];
        $pid = explode(',', $productId);
        //pr($pid);exit;
        $productName = $this->Basket->find('all', array('conditions' => array('Basket.product_id' => $pid, 'Basket.user_id' => $userId, 'Basket.is_basket' => 1, 'Basket.order_id' => $id)));
        //pr($productName);exit;
        $this->set(compact('orderDetails', 'productName', 'billing', 'shipping'));
    }

    function editIndex($id = NULL) {
        $this->layout = 'jtc_layout';
        $user_id = $this->Auth->User('id');
        $url = $this->params['controller'] . "/" . $this->params['action'];
        if (!isset($_COOKIE['cart_product'])) {
            $cookie_name = "cart_product";
            $randomStr = $this->getrandomstr();
            $cookieId = setcookie($cookie_name, $randomStr, time() + (2592000 * 30), "/");
        } else {
            $cookieId = $_COOKIE["cart_product"];
        }
        $this->Basket->recursive = 2;
        $basketData = $this->Basket->find('all', array('conditions' => array('Basket.user_id' => $user_id, 'Basket.order_id' => $id, 'Basket.is_basket' => 1,)));
        //pr($basketData);exit;
        $this->set(compact('basketData', 'url'));
    }

    function increaseQuantity($id = NULL) {
        $quantity = $this->data['val'];
        $update = $this->Basket->updateAll(array('Basket.quentity' => $quantity), array('Basket.id' => $id));
        if ($update) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function decreaseQuantity($id = NULL) {
        $quantity = $this->data['val'];
        $update = $this->Basket->updateAll(array('Basket.quentity' => $quantity), array('Basket.id' => $id));
        if ($update) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

}
