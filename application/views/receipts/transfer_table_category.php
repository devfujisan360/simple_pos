<div class="well">
<p>Select Category to transfer.</p>
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
 	<div class="btn-group">
	<a href="<?= site_url(); ?>pos_table_categories/view/<?= $t->id; ?>" class="btn btn-success" role="button"><span class="glyphicon glyphicon-ok"></span> Select </a>
	</div>
	</p>
      </div>
    </div>
  </div>
  <? endforeach ;?>
  </div><br />
 <? endforeach ;?>
 <? endif ;?>
