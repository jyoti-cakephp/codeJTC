<?php
class Basket extends AppModel {
     var $name = 'Basket';
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

