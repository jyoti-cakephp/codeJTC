<ul class="list-inline second_menu_right style pull-right set">
    <?php
     echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev('«', array('tag' => 'li'), null, null) : '<li class="disabled"><a href="#">«</a></li>';
     echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li'));   
     echo ($this->Paginator->hasNext()) ? $this->Paginator->next('»', array('tag' => 'li'), null, null) : '<li class="disabled"><a href="#">»</a></li>';
   ?>
</ul>

