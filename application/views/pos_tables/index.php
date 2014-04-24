<div class="page-header">
  <h1>Tables </h1>
</div>

<div class="row">
<div class="col-md-6">
<div class="page-header">
  <h3>Active </h3>
</div>
<div class="table-responsive">
<table class="table table-striped">
 <thead>
   <tr>
     <th>Area</th>
     <th>Name</th>
     <th>Restore</th>
   </tr>
 </thead>
 <? if(!empty($active)) :?>
 <? foreach($active as $t) :?>
   <tr>
     <td><?= $t->area_name; ?></td>
     <td><?= $t->name; ?></td>
     <td>
     <a href="<?= site_url();?>pos_tables/remove/<?= $t->id ?>" class="btn btn-danger "><span class="glyphicon glyphicon-plus"></span> Remove</a>
     </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>


<div class="col-md-6">
<div class="page-header">
  <h3>Inactive </h3>
</div>
<div class="table-responsive">
<table class="table table-striped">
 <thead>
   <tr>
     <th>Area</th>
     <th>Name</th>
     <th>Restore</th>
   </tr>
 </thead>
 <? if(!empty($inactive)) :?>
 <? foreach($inactive as $t) :?>
   <tr>
     <td><?= $t->area_name; ?></td>
     <td><?= $t->name; ?></td>
     <td>
     <a href="<?= site_url();?>pos_tables/restore/<?= $t->id ?>" class="btn btn-success "><span class="glyphicon glyphicon-plus"></span> Restore</a>
     </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>
</div>
