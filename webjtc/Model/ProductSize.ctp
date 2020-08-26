<?php 
class ProductSize extends AppModel {
     var $name = 'ProductSize';
 public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'id',
            ),   
     );
    
}
?>

