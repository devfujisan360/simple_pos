<div class="page-header">
  <h1>Users </h1>
</div>
<p>
	<a href='<?= site_url();?>users/create' class="btn btn-success"  ><span class="glyphicon glyphicon-user"></span> Add User/ Employee</a>
</p>
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
 <thead>
   <tr>
     <th>Username/ Employee</th>
     <th>Usertype/ Role</th>
     <th>Remove</th>
   </tr>
 </thead>
 <? if(!empty($users)) :?>
 <? foreach($users as $u) :?>
   <tr>
     <td><?= $u->username; ?></td>
     <td><?= $u->usertype; ?></td>
     <td>
     <a href="<?= site_url();?>users/view/<?= $u->id ?>" class="btn btn-primary "><span class="glyphicon glyphicon-eye-open"></span> Edit</a>
     <a href="<?= site_url();?>users/remove/<?= $u->id ?>" class="btn btn-danger "><span class="glyphicon glyphicon-minus"></span> Remove</a>
     <a href="<?= site_url();?>users/number_of_hours/<?= $u->username ?>" class="btn btn-primary "><span class="glyphicon glyphicon-time"></span> Number of Hours</a>
     </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
 <thead>
   <tr>
     <th>Username/ Employee</th>
     <th>Usertype/ Role</th>
     <th>Restore</th>
   </tr>
 </thead>
 <? if(!empty($users_removed)) :?>
 <? foreach($users_removed as $u) :?>
   <tr>
     <td><?= $u->username; ?></td>
     <td><?= $u->usertype; ?></td>
     <td>
     <a href="<?= site_url();?>users/restore/<?= $u->id ?>" class="btn btn-success "><span class="glyphicon glyphicon-plus"></span> Restore</a>
     <a href="<?= site_url();?>users/number_of_hours/<?= $u->username ?>" class="btn btn-primary "><span class="glyphicon glyphicon-time"></span> Number of Hours</a>
     </td>
   </tr>
 <? endforeach ;?>
 <? endif ;?>
</table>
</div>
</div>
</div>

