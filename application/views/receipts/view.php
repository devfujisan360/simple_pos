<div class="row">
<div class="col-md-8">
<? if(!$receipt->paid) :?>
<div class="page-header">
  <h1><?= $receipt->name; ?> <small>list of items</small></h1>
</div>

<div class="table-responsive">
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
     <td><?= $i->name; ?></td>
     <td><?= $i->description; ?></td>
     <td>&#8369; <?= $i->value; ?></td>
     <td>
     <a href="<?= site_url();?>orders/create/<?= $receipt->pos_table_id; ?>/<?= $i->id; ?>/<?= $receipt->id; ?>" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> </a>
   </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
<? endif;?>
</div>

<? if($receipt->paid) :?>
<? $col = "12"; ?>
<? else :?>
<? $col = "4"; ?>
<? endif ;?>

<div class="col-md-<?= $col; ?>">
<div class="row">
<div class="col-md-12">
<div class="page-header">
  <h1>Orders <small>list of orders</small></h1>
</div>
<div class="table-responsive">
<table class="table table-striped">
   <tr>
     <th>Name</th>
     <th>#</th>
     <th>Price</th>
     <th class='text-right'>Total</th>
     <? if(!$receipt->paid) :?>
     <th>Remove</th>
     <? endif ;?>
   </tr>
 <? if(!empty($orders)) :?>
 <? foreach($orders as $o) :?>
   <tr>
     <td><?= $o->name; ?></td> 
     <td><?= $o->count; ?></td>
     <td>&#8369; <?= $o->value; ?></td>
     <td class="text-right">&#8369; <?= number_format((float)($o->count * $o->value), '2', '.', ''); ?></td>
     <? if(!$receipt->paid) :?>
     <td>
     <a href="<?= site_url();?>orders/remove/<?= $o->orderid ?>" class="btn btn-danger btn-block authorize"><span class="glyphicon glyphicon-minus"></span> </a>
     </td>
     <? endif; ?>
   </tr>
 <? endforeach ;?>
 <tr>
<td class='text-left'><b>Total</b></td>
<td colspan=3 class="text-right"><b>&#8369; <?= $receipt->total; ?></b> </td></tr>
 <tr>
<td colspan=4 class="text-right"><a href="<?= base_url(); ?>receipts/receipt_print/<?= $receipt->id?>" class="btn btn-block btn-info">Print</a></td></tr>
 <? endif ;?>
</table>
</div>
</div>
</div>

<? if(!$receipt->paid) :?>
<form action="" method="post" accept-charset="utf-8">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<div class="input-group">
Payment:
<span class='input-group-addon'>&#8369;</span>
<input type="text" name="cash_handed" id="cash_handed" placeholder="0.00" class="input-lg" />
<input type="hidden" name="cash_handed_value" id="cash_handed_value"  />
</div>
</div>
<br />
<div class="form-group">
<div class="input-group">
Change:
<span class='input-group-addon'>&#8369;</span>
<input type="text" name="change" id="change" placeholder="0.00" class="input-lg" />
<input type="hidden" name="change_value" id="change_value"  />
</div>
</div>
</div>
</div>

	<div class="row">
	  <div class="col-md-3 col-sm-1">
	  <a href="#" class="btn btn-block btn-primary cash" id='1'><b>1</b></a>
	  </div>
	  <div class="col-md-3 col-sm-1">
	  <a href="#" class="btn btn-block btn-primary cash" id='5'><b>5</b></a>
	  </div>
	  <div class="col-md-3 col-sm-1">
	  <a href="#" class="btn btn-block btn-primary cash" id='10'><b>10</b></a>
	  </div>
	  <div class="col-md-3 col-sm-1">
	  <a href="#" class="btn btn-block btn-primary cash" id='20'><b>20</b></a>
	  </div>
        </div><br />	
	<div class="row">
	  <div class="col-md-3">
	  <a href="#" class="btn btn-block btn-primary cash" id='50'><b>50</b></a>
	  </div>
	  <div class="col-md-3">
	  <a href="#" class="btn btn-block btn-primary cash" id='100'><b>100</b></a>
	  </div>
	  <div class="col-md-3">
	  <a href="#" class="btn btn-block btn-primary cash" id='500'><b>500</b></a>
	  </div>
	  <div class="col-md-3">
	  <a href="#" class="btn btn-block btn-primary cash" id='1000'><b>1000</b></a>
	  </div>
        </div><br />	
	<div class="row">
	  <div class="col-md-6">
	  <button type="submit" class="btn btn-default btn-block" disabled='disabled' id='bill'><span class="glyphicon glyphicon-ok-circle" ></span> <b>Accept Payment</b></button>
	  </div>
	  <div class="col-md-6">
	  <a href="#" class="btn btn-block btn-danger clear_cash"><span class="glyphicon glyphicon-ban-circle"></span> <b>Clear</b></a>
	  </div>
        </div><br />	
</form>
<? endif;?>
</div>
</div>

<script type="text/javascript" charset="utf-8">
$('#cash_handed').attr('disabled','disabled');
$('#change').attr('disabled','disabled');
$('.cash').click(function(){
 payable = <?= $receipt->total; ?>;
 current_value = parseInt($('#cash_handed').attr('placeholder'));
 current_value = current_value + parseInt($(this).attr('id'));

 $('#cash_handed').val(current_value);
 $('#cash_handed_value').val(current_value);
 $('#cash_handed').attr('placeholder', current_value);

 change = parseInt(payable) - parseInt(current_value);

 if(change < 0){
  change *= -1
 }
 if(current_value > 0 && change >= 0){
   $('#bill').removeAttr('disabled');
   $('#bill').removeAttr('class');
   $('#bill_icon').removeAttr('class');
   $('#bill').addClass('btn btn-block btn-success');
  }

 $('#change').val(change);
 $('#change_value').val(change);
 $('#change').attr('placeholder', change);

});

$('.clear_cash').click(function(){
 $('#cash_handed').val('');
 $('#cash_handed_value').val('0.0');
 $('#cash_handed').attr('placeholder', '0.00');

 $('#change').val('');
 $('#change_value').val('0.0');
 $('#change').attr('placeholder', '0.00');

  $('#bill').attr('disabled', 'disabled');
  $('#bill').removeAttr('class');
  $('#bill').addClass('btn btn-block btn-default');
});
	
</script>
