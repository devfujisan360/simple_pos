<? if($this->session->flashdata('msg')) :?>
<div class="row">
 <div class="col-md-12 text-center">
 <div class="alert alert-success">
  <?= $this->session->flashdata('msg'); ?>
 </div>
 </div>
</div>
<? endif ;?>
<div class="row">
  <div class="col-md-3 text-left">
	  <h1>AREA </h1>
  </div>
  <div class="col-md-3 text-right">
  <? if($userInfo['usertype'] == 'admin') :?>
  <a href='<?= site_url();?>pos_table_categories' class="btn btn-primary" ><span class="glyphicon glyphicon-eye-open"></span> View Area</a><a href='<?= site_url();?>pos_table_categories/create' class="btn btn-success"  ><span class="glyphicon glyphicon-plus"></span> Add Area</a>
  <? endif ;?>
  </div>
  <div class="col-md-3 text-left">
	  <h1>TABLE </h1>
  </div>
  <div class="col-md-3 text-right">
  <? if($userInfo['usertype'] == 'admin') :?>
  <a href='<?= site_url();?>pos_tables' class="btn btn-primary" ><span class="glyphicon glyphicon-eye-open"></span> View Table</a><a href='<?= site_url();?>pos_tables/create' class="btn btn-success"  ><span class="glyphicon glyphicon-plus"></span> Add Table</a>
  <? endif ;?>
  </div>
</div>

<? if($area) :?>
<? foreach($area as $a) :?>
<div class="row">
<div class="col-md-6">
<table class="table table-striped">
<tr>
  <th><?= strtoupper($a->name); ?></th>
</tr>
</table>
</div>

<div class="col-md-6">
<? if($table[$a->id]) :?>
	<table class="table table-striped"> <? foreach($table[$a->id] as $t) :?>
	<tr>
	  <td class="text-left"><?= strtoupper($t->name);?></td>
	<td class="text-right">
	<? $receipt = $table_receipt[$t->id]; ?>
	<? if(!empty($receipt)) :?>
	<? if(!$receipt->remove) :?>
	<a href="<?= site_url(); ?>receipts/view/<?= $receipt->id; ?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-eye-open"></span> View Order</a>
	<a href="<?= site_url(); ?>receipts/transfer_select_table_category/<?= $receipt->id; ?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-transfer"></span> Transfer Table</a>
	<a href="<?= site_url(); ?>receipts/cancel/<?= $receipt->id; ?>" class="btn btn-danger authorize" role="button"><span class="glyphicon glyphicon-minus"></span> Cancel</a>
	<? else :?>
<a href="<?= site_url();?>receipts/create/<?= $a->id; ?>/<?= $t->id; ?>" class="btn btn-success "><span class="glyphicon glyphicon-plus-sign"></span> Add Order</a> 
	<? endif ;?>
	<? else :?>
<a href="<?= site_url();?>receipts/create/<?= $a->id; ?>/<?= $t->id; ?>" class="btn btn-success "><span class="glyphicon glyphicon-plus-sign"></span> Add Order</a> 
	<? endif;?>
	</td>
	</tr>
	<? endforeach; ?>
	</table>
<? endif;?>
</div>
</div>
<? endforeach; ?>
<? endif;?>
