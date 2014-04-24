<div class="page-header">
  <h1>Table Management</h1>
</div>

 <? if(!empty($area)) :?>
 <? foreach($area as $a) :?>
  <div class="row">
  <div class="col-md-12">
   <? foreach($area[$a->id] as $table) :?>
    <?= var_dump($table); ?>
  <? endforeach ;?>
  </div><br />
 <? endforeach ;?>
 <? endif ;?>
