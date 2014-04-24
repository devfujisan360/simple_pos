<div class="page-header">
  <h1><?= $table->name; ?> </h1>
</div>

<div class="row">
<div class="col-md-12">
<table class="table table-bordered">
 <thead>
   <tr>
     <th>Name</th>
     <th>Description</th>
     <th>Value</th>
     <th>Add</th>
   </tr>
 </thead>
 <? if(!empty($items)) :?>
 <? foreach($items as $i) :?>
   <tr>
     <td><?= $i->description; ?></td>
     <td><?= $i->value; ?></td>
     <td><a href="<?= site_url();?>orders/create/<?= $table->id; ?>/<?= $i->id; ?>" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"> Add Order </a></td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>

