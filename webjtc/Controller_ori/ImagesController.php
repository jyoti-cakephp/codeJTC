<?php

class ImagesController extends AppController {

    var $uses = array('Product', 'ProductImage', 'SubCategory', 'Category', 'User', 'Size', 'ProductSize', 'Wishlist', 'Basket', 'Brand','SuperCategory');
    
    function beforeFilter() {
        $this->Auth->allow();
    }

    function admin_addProduct($id = NULL) {
        $this->layout = "admin";
        $order2 = array('SuperCategory.super_name' => 'ASC');
        $super = $this->SuperCategory->find('list', array('fields' => array('SuperCategory.super_name'), 'order' => $order2,));
        $order = array('Category.category_name' => 'ASC');
        $category = $this->Category->find('list', array('fields' => array('Category.category_name'),'order' => $order));
        $brand = $this->Brand->find('list', array('fields' => array('Brand.brand_name')));
        $this->set(compact('category', 'brand','super'));
        $order1 = array('SubCategory.sub_category_name' => 'ASC');
        $subcategory = $this->SubCategory->find('list', array('fields' => array('SubCategory.sub_category_name'),'order' => $order1));
        $size = $this->Size->find('list', array('fields' => array('Size.product_size')));
        $this->set(compact('subcategory', 'size'));

        if (!empty($this->request->data)) {
           // pr($this->request->data); die;
            $productsize = $this->request->data['ProductSize']['size'];
            $categoryId = $this->request->data['Product']['category_id'];
            $subcategoryId = $this->request->data['Product']['subcategory_id'];
            $brandId = $this->request->data['Product']['brand_id'];
            $superId = $this->request->data['Product']['super_id'];
            $data['Product']['category_id'] = $this->request->data['Product']['category_id'];
            $data['Product']['subcategory_id'] = $this->request->data['Product']['subcategory_id'];
            $data['Product']['super_id'] = $this->request->data['Product']['super_id'];
            $data['Product']['product_title'] = $this->request->data['Product']['product_title'];
            $data['Product']['product_type'] = $this->request->data['Product']['product_type'];
            //$data['Product']['product_code'] = $this->request->data['Product']['product_code'];
            $data['Product']['brand_id'] = $this->request->data['Product']['brand_id'];
            $data['Product']['product_price'] = $this->request->data['Product']['product_price'];
            //$data['Product']['short_description'] = $this->request->data['Product']['short_description'];
            $data['Product']['description'] = $this->request->data['Product']['description'];
            if ($this->Product->save($data)) {
                $productId = $this->Product->getLastInsertID();
                if (!empty($productId)) {
                    $i = 1;
                    $sizes = array();
                    foreach ($productsize as $result) {
                        $sizes['ProductSize'][$i]['category_id'] = $categoryId;
                        $sizes['ProductSize'][$i]['subcategory_id'] = $subcategoryId;
                        $sizes['ProductSize'][$i]['brand_id'] = $brandId;
                        $sizes['ProductSize'][$i]['super_id'] = $superId;
                        $sizes['ProductSize'][$i]['product_size'] = $result;
                        $sizes['ProductSize'][$i]['product_id'] = $productId;
                        $i++;
                    }
                     $this->ProductSize->create();
                    $this->ProductSize->saveAll($sizes['ProductSize']);
                }
                $this->redirect(array('controller' => 'images', 'action' => 'admin_productImage', $productId));
            }
        }
    }
    
    
    function admin_productImage($id=NULL) {
        $this->layout = "admin";
        $productImage = $this->ProductImage->find('all',array('conditions'=>array("ProductImage.product_id"=>$id)));
        //pr($productImage);exit;
        $this->set(compact('productImage','id'));
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['ProductImage']['image']['name'])) {
            $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
            
            $imagename = $this->request->data['ProductImage']['image']['name'];
            $size = $this->request->data['ProductImage']['image']['size'];
            $path = $_SERVER["DOCUMENT_ROOT"] . "/app/webroot/img/product1/";
         // pr($imagename);die;
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
            //pr($actual_image_name);die;
            $data['ProductImage']['image'] = $actual_image_name;
            $data['ProductImage']['product_id'] = $id;
           if($this->ProductImage->save($data)){
               //$this->Session->setFlash('You have successfully added the product.');
                $this->redirect(array('controller' => 'images', 'action' => 'productImage',$id));
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
//echo $ext."===".$uploadedfile."===".$path."===".$actual_image_name."===".$newwidth; die;
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
       
       // $tmp = imagecreatetruecolor($newwidth1, $newheight1);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
        $filename = $path . $newwidth . '_' . $actual_image_name; //PixelSize_TimeStamp.jpg
        imagejpeg($tmp, $filename, 100);
        imagedestroy($tmp);
        return $filename;
    }
    
    
    
     function admin_deleteImage($id=NULL,$productId=NULL){
        $this->autoRender = FALSE;
        if(!empty($id)){
            if($this->ProductImage->delete($id)){
                 $this->redirect(array('controller' => 'products', 'action' => 'editProductImage',$productId));
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
            ini_set('max_input_time', 30000000000000);
            ini_set('max_execution_time', 30000000000000);
            $imagename = $this->request->data['ProductImage']['image']['name'];
            $size = $this->request->data['ProductImage']['image']['size'];
            $path = $_SERVER["DOCUMENT_ROOT"] . "/jtc/Construction/Code/app/webroot/img/product1/";
            move_uploaded_file($this->request->data['ProductImage']['image']['tmp_name'], $path . $imagename);
            if (strlen($imagename)) {
                $ext = $this->getExtension($imagename);
                if (in_array($ext, $valid_formats)) {
                    $actual_image_name = time() . $imagename . "." . $ext;
                    $uploadedfile = IMGPATH."product1/" . $this->request->data['ProductImage']['image']['name'];
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
               //$this->Session->setFlash('You have successfully added the product.');
                $this->redirect(array('controller' => 'products', 'action' => 'editProductImage',$id));
           }
        }
        }
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
    
    
    

}
