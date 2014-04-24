<div class="well">
	<p>
		Edit User/ Employee.
	</p>
</div>
<form action="" method="post" accept-charset="utf-8">
  <div class="form-group">
  <input type="text" name="name" placeholder="<?= !empty($user->name) ? $user->name : 'Name' ?>" />
  </div>
  <div class="form-group">
   <input type="text" name="username" placeholder="<?= !empty($user->username) ? $user->username : 'Username' ?>" />
  </div>
  <div class="form-group">
   <input type="password" name="password" placeholder="<?= !empty($user->password) ? $user->password : 'Password' ?>" />
  </div>
  <div class="form-group">
   <input type="text" name="usertype" placeholder="<?= !empty($user->usertype) ? $user->usertype : 'Usertype/ Role' ?>" />
  </div>
  <div class="form-group">
   <input type="submit" value="Update" />
  </div>
</form>
