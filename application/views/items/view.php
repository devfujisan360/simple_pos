
<div class="well">
	<p>
		Item/ Menu the restaurant sells.
	</p>
</div>
<form action="" method="post" accept-charset="utf-8">
  <div class="form-group">
  <input type="text" name="name" placeholder="<?= !empty($item->name) ? $item->name : 'Name' ?>"  />
  </div>
  <div class="form-group">
  <input type="text" name="description" placeholder="<?= !empty($item->description) ? $item->description : 'Description'?>" />
  </div>
  <div class="form-group">
  <input type="text" name="description" placeholder="<?= !empty($item->category) ? $item->category : 'Category'?>" />
  </div>
  <div class="form-group">
   <select name="area_category" class="form-control">
	  <option value="kitchen">Kitchen</option>
	  <option value="bar">Bar</option>
   </select>
  </div>
  <div class="form-group">
  <input type="text" name="value" placeholder="<?= !empty($item->value) ? $item->value : '0.0'?>" />
  </div>
  <div class="form-group">
   <input type="submit" value="Update" />
  </div>
</form>
