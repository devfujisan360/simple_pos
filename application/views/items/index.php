<div class="page-header">
  <h1>Menu <small>list of items</small></h1>
</div>
<a href='<?= site_url();?>items/create' class="btn btn-success"  ><span class="glyphicon glyphicon-plus"></span> Add Item</a>
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
 <thead>
   <tr>
     <th>Name</th>
     <th>Description</th>
     <th>Category</th>
     <th>Area Category</th>
     <th>Value</th>
     <th>&nbsp;</th>
   </tr>
 </thead>
 <? if(!empty($items)) :?>
 <? foreach($items as $i) :?>
   <tr>
     <td><?= $i->name; ?></td>
     <td><?= $i->category; ?></td>
     <td><?= $i->description; ?></td>
     <td><?= $i->area_category; ?></td>
     <td><?= $i->value; ?></td>
     <td>
     <? if($i->remove == 1) :?>
     <a href="<?= site_url();?>items/view/<?= $i->id ?>" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> </a>
     <a href="<?= site_url();?>items/restore/<?= $i->id ?>" class="btn btn-success "><span class="glyphicon glyphicon-plus"></span> </a>
     <? else :?>
     <a href="<?= site_url();?>items/view/<?= $i->id ?>" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> </a>
     <a href="<?= site_url();?>items/remove/<?= $i->id ?>" class="btn btn-danger "><span class="glyphicon glyphicon-minus"></span> </a>
     <? endif; ?>
     </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>
</div>
