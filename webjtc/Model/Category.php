<?php
class Category extends AppModel {
    var $name = 'Category';
    public $hasMany = array(
        'SubCategory' => array(
            'className' => 'SubCategory',
            'foreignKey' => 'category_id',
        ),
    );

}

?>