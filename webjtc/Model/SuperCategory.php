<?php
class SuperCategory extends AppModel {
    var $name = 'SuperCategory';
    public $hasMany = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'super_id',
        ),
   
      
        'SubCategory' => array(
            'className' => 'SubCategory',
            'foreignKey' => 'super_id',
        ),
     );

}

?>