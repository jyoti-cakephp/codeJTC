<?php
class Product extends AppModel {
     var $name = 'Product';
     public $belongsTo = array(
         'SuperCategory' => array(
            'className' => 'SuperCategory',
            'foreignKey' => 'super_id',
            ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            ),
         'SubCategory' => array(
            'className' => 'SubCategory',
            'foreignKey' => 'subcategory_id',
            ),
          'Brand' => array(
            'className' => 'Brand',
            'foreignKey' => 'brand_id',
            ),
         );
     public $hasMany = array(
        'ProductImage' => array(
            'className' => 'ProductImage',
            'foreignKey' => 'product_id',
            'order' => 'ProductImage.id DESC'
            ), 
          'ProductSize' => array(
            'className' => 'ProductSize',
            'foreignKey' => 'product_id',
            'order'=>array('ProductSize.id'=>'DESC')
            ),
);
   }
?>
