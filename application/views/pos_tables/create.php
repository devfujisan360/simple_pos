<div class="well">
	<p>
		Number/ Name of table to identify where guest dine.
	</p>
</div>
<form action="" method="post" accept-charset="utf-8">
  <div class="form-group">
   <input type="text" name="name" placeholder="Name" />
  </div>
  <div class="form-group">
    <? if($table_categories) :?>
	<select name="pos_table_category_id" class='form-control'>
	 <? foreach($table_categories as $tc) :?>
	   <option value="<?= $tc->id; ?>"><?= $tc->name; ?></option>
	 <? endforeach ;?>
	</select>
    <? endif ;?>
  </div>
  <div class="form-group">
   <input type="submit" value="Submit" />
  </div>
</form>
