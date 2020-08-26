<?php

class Order extends AppModel {
     var $name = 'Order';
       public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            ),
         );
}