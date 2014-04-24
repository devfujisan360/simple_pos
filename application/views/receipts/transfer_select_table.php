<div class="well">
<p>Select table</p>
</div>
<div class="page-header">
  <h1><?= $pos_table_category->name; ?></h1>
</div>

 <? if(!empty($tables)) :?>
 <? foreach($tables as $table) :?>
  <div class="row">
   <? foreach($table as $t) :?>
  <div class="col-sm-3 col-md-<?= $table_division;?>">
    <div class="thumbnail">
      <div class="caption ">
        <p><span class="glyphicon glyphicon-cutlery"></span> <?= $t->name ?></p>
        <p>
	<a href="<?= site_url();?>receipts/transfer_table/<?= $id; ?>/<?= $t->id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Select</a> 
	</p>
      </div>
    </div>
  </div>
  <? endforeach ;?>
  </div><br />
 <? endforeach ;?>
 <? endif ;?>
