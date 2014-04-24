
<div class="row">
<div class="col-md-12">
<div class="page-header">
  <h1>Today's Sale<small>list of paid receipts</small></h1>
</div>
<table class="table table-bordered">
 <thead>
   <tr>
     <th>View</th>
     <th>#</th>
     <th>Area</th>
     <th>Table</th>
     <th class="text-right">Total</th>
   </tr>
 </thead>
 <? $num = 1; ?>
 <? $total = 0.0; ?>
 <? if(!empty($paid_receipts)) :?>
 <? foreach($paid_receipts as $r) :?>
   <tr>
     <td>
	<a href="<?= site_url(); ?>receipts/view/<?= $r->id; ?>" class="btn btn-info btn-block" role="button"><span class="glyphicon glyphicon-eye-open"></span> View Order</a>
     </td>
     <td><?= $num ++; ?></td>
     <td><?= $r->pos_table_category_name; ?></td>
     <td><?= $r->pos_table_name; ?></td>
     <td class="text-right">&#8369;<?= $r->total; ?></td>
   </tr><? $total += $r->total; ?>
 <? endforeach ;?>
   <tr class="info">
    <td class="text-left" colspan=4>Total</td>
    <td class="text-right">&#8369;<?= number_format((float)$total, '2','.',''); ?></td>
   </tr>
 <? endif ;?>
</table>
</div>
</div>
