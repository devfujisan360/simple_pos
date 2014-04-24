<div class="page-header">
  <h1>Area</h1>
</div>

<div class="row">
<div class="col-md-6">
<div class="page-header">
  <h3>Active </h3>
</div>
<div class="table-responsive">
<table class="table table-bordered">
 <thead>
   <tr>
     <th>Name</th>
     <th>&nbsp;</th>
   </tr>
 </thead>
 <? if(!empty($active)) :?>
 <? foreach($active as $a) :?>
   <tr>
     <td><?= strtoupper($a->name); ?></td>
     <td>
     <a href="<?= site_url();?>pos_table_categories/remove/<?= $a->id ?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-minus"></span> Remove </a>
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
<table class="table table-bordered">
 <thead>
   <tr>
     <th>Name</th>
     <th>&nbsp;</th>
   </tr>
 </thead>
 <? if(!empty($inactive)) :?>
 <? foreach($inactive as $a) :?>
   <tr>
     <td><?= strtoupper($a->name); ?></td>
     <td>
     <a href="<?= site_url();?>pos_table_categories/restore/<?= $a->id ?>" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Restore </a>
     </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>
</div>
