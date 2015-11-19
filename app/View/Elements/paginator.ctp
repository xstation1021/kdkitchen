<!--<div class="paginator-wrapper">
    <span class="paginator" id="Paginator">
    <?php
        // Shows the page numbers
        echo $this->Paginator->numbers();
        // Shows the next and previous links
        echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled'));
        echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled'));
        
        // // prints X of Y, where X is current page and Y is number of pages
        echo $this->Paginator->counter();
    ?>
    </span>
</div>-->
<?php
$paginator_numbers = $this->Paginator->numbers(array('tag'=>'li'));
if($paginator_numbers != '') {
?>
<ul class="pagination">
   <?php

       echo $this->Paginator->prev(__('« Previous'), array('tag'=>'li'), null, array('class' => 'disabled'));
       // Shows the page numbers
       echo $paginator_numbers;
       // Shows the next and previous links
       echo $this->Paginator->next(__('Next »'), array('tag'=>'li'), null, array('class' => 'disabled'));

      // // prints X of Y, where X is current page and Y is number of pages
      //echo $this->Paginator->counter();
  ?>
</ul>
<?php
}
?>
