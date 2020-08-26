<?php
class Wishlist extends AppModel {
     var $name = 'Wishlist';
     public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            ),
          'Size' => array(
            'className' => 'Size',
            'foreignKey' => 'size',
            ),
         );
}
