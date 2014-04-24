<div class="row">
<div class="col-md-12">
<div class="page-header">
  <h1><?= $receipt->name; ?> <small>list of items</small></h1>

<div class="page-header">
  <h1>Orders <small>list of orders</small></h1>
</div>
<table class="table table-bordered">
 <thead>
   <tr>
     <th>Name</th>
     <th>Description</th>
     <th>Value</th>
   </tr>
 </thead>
 <? if(!empty($orders)) :?>
 <? foreach($orders as $o) :?>
   <tr>
     <td><?= $o->name; ?></td>
     <td><?= $o->description; ?></td>
     <td class="text-right"><?= $o->value; ?></td>
   </tr>
 <? endforeach ;?>
 <tr><td colspan=2 class="text-right"><b>TOTAL:</b></td><td class='text-right'><b><?= $receipt->total ?></b></td></tr>
 <? endif ;?>
</table>
</div>
</div>

